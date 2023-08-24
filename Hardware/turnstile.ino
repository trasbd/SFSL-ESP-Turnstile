#include <Arduino.h>
#include <Wire.h>
#include <LiquidCrystal_PCF8574.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <time.h>

#include "secrects.h"

#define MY_NTP_SERVER "time.windows.com"
#define MY_TZ "CST6CDT,M3.2.0,M11.1.0"

const char *ssid = SECRET_SSID;
const char *password = SECRET_PASS;

const char *serverName = "http://tmr19vm001/post-hourly.php";

LiquidCrystal_PCF8574 lcd(0x27); // set the LCD address to 0x27 for a 16 chars and 2 line display

const int waitButtonPin = 15;
const int emptyButtonPin = 16;
const int cycleButtonPin = 13;
const int unitButtonPin = 12;
const int sclPin = 5;
const int sdaPin = 4;

// Variables will change:
time_t now; // this is the epoch
tm tm;      // the structure tm holds time information in a more convenient way

int reading[3];
int buttonState[3];                       // the current reading from the input pin
int lastButtonState[3] = {LOW, LOW, LOW}; // the previous reading from the input pin
int cycles = 0;
int empties = 0;
int wait = 15;
int hourlyCycles[24];
// int hourlyWait[24];
int hourlyTotal[24];
int hourlyUnits[24];
int hourlyEmpty[24];
int currentHour;
int currentMin;
int lastHour;

String rideName = "American Thunder";
int seats = 24;
int rideUnits = 1;

// the following variables are unsigned long's because the time, measured in miliseconds,
// will quickly become a bigger number than can be stored in an int.
unsigned long lastDebounceTime[3] = {0, 0, 0}; // the last time the output pin was toggled
unsigned long debounceDelay = 50;              // the debounce time; increase if the output flickers

void setup()
{
  Serial.begin(9600);

  lcd.begin(16, 2); // initialize the lcd
  lcd.setBacklight(HIGH);

  lcd.clear();
  lcd.home();
  lcd.print("Starting");
  lcd.setCursor(0, 1);
  lcd.print("Please Wait...");

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }

  Serial.println();
  Serial.println(WiFi.macAddress());

  pinMode(waitButtonPin, INPUT);
  pinMode(emptyButtonPin, INPUT);
  pinMode(cycleButtonPin, INPUT);
  pinMode(unitButtonPin, INPUT);

  configTime(MY_TZ, MY_NTP_SERVER);

  WiFiClient client;
  HTTPClient http;
  http.begin(client, "http://tmr19vm001/get-seats.php?mac=" + WiFi.macAddress());
  http.GET();
  String getResult = http.getString();
  int bracketIndex = getResult.indexOf('<');
  seats = getResult.substring(0, bracketIndex).toInt();
  rideName = getResult.substring(bracketIndex + 4);
  http.end();

  lcd.clear();
  lcd.home();
  lcd.print("Selected Ride:");
  lcd.setCursor(0, 1);
  lcd.print(rideName);

  delay(15000);

  time(&now);
  localtime_r(&now, &tm);
  lastHour = tm.tm_hour;
  currentHour = tm.tm_hour + 1 % 24;
  currentMin = tm.tm_min;
}

void loop()
{
  time(&now);
  localtime_r(&now, &tm);

  if (currentMin != tm.tm_min)
  {
    lcd.setBacklight(LOW);
    currentMin = tm.tm_min;
  }

  if (lastHour != tm.tm_hour)
  {
    hourlyCycles[currentHour] = cycles;
    hourlyTotal[currentHour] = cycles * seats - empties;
    // hourlyWait[currentHour] = wait;
    hourlyUnits[currentHour] = rideUnits;
    hourlyEmpty[currentHour] = empties;

    cycles = 0;
    empties = 0;
    lastHour = tm.tm_hour;
    currentHour = tm.tm_hour + 1 % 24;
    lcd.setBacklight(HIGH);
    postHourly();
  }

  updateScreen();

  if (digitalRead(waitButtonPin))
  {

    wait -= 5 * buttonInput(1, emptyButtonPin);
    wait += 5 * buttonInput(2, cycleButtonPin);
    if (wait < 0)
    {
      wait = 0;
    }
    lcd.setBacklight(HIGH);
  }
  else if(digitalRead(unitButtonPin))
  {
    rideUnits -= buttonInput(1, emptyButtonPin);
    rideUnits += buttonInput(2, cycleButtonPin);
    if (rideUnits < 1)
    {
      rideUnits = 1;
    }
  }
  else
  {
    empties += buttonInput(1, emptyButtonPin);
    cycles += buttonInput(2, cycleButtonPin);
  }
}

int buttonInput(int index, int pinNum)
{
  int returnValue = 0;
  // read the state of the switch into a local variable:
  reading[index] = digitalRead(pinNum);

  // check to see if you just pressed the button
  // (i.e. the input went from LOW to HIGH),  and you've waited
  // long enough since the last press to ignore any noise:

  // If the switch changed, due to noise or pressing:
  if (reading[index] != lastButtonState[index])
  {
    // reset the debouncing timer
    lastDebounceTime[index] = millis();
  }

  if ((millis() - lastDebounceTime[index]) > debounceDelay)
  {
    // whatever the reading is at, it's been there for longer
    // than the debounce delay, so take it as the actual current state:

    // if the button state has changed:
    if (reading[index] != buttonState[index])
    {
      buttonState[index] = reading[index];

      // only toggle the LED if the new button state is HIGH
      if (buttonState[index] == HIGH)
      {
        returnValue = 1;
        // Serial.println(cycles);
        // Serial.println(empties);
        // Serial.println(wait);
      }
    }
  }

  // save the reading.  Next time through the loop,
  // it'll be the lastButtonState:
  lastButtonState[index] = reading[index];
  return returnValue;
}

void updateScreen()
{
  lcd.home();
  // lcd.clear();
  lcd.print(cycles);
  lcd.print("*");
  lcd.print(seats);
  lcd.print("-");
  lcd.print(empties);
  lcd.print("=");
  lcd.print(cycles * seats - empties);
  lcd.print(" ");
  lcd.print(wait);
  lcd.print(" ");
  lcd.print(rideUnits);
  lcd.print("     ");

  lcd.setCursor(0, 1);
  lcd.print("@");
  lcd.print((lastHour > 12) ? (lastHour % 12) : lastHour);
  lcd.print(" C");
  lcd.print(hourlyCycles[lastHour]);
  lcd.print(" H");
  lcd.print(hourlyTotal[lastHour]);
  lcd.print("         ");

  // delay(1000);
}

void postHourly()
{
  if (WiFi.status() == WL_CONNECTED)
  {
    WiFiClient client;
    HTTPClient http;

    String todayDate = String(tm.tm_mon + 1) + "/" + tm.tm_mday + "/" + String(tm.tm_year + 1900);

    // Your Domain name with URL path or IP address with path
    http.begin(client, serverName);

    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    // Prepare your HTTP POST request data
    String httpRequestData = "date=" + todayDate + "&time=" + String(lastHour) + ":00&ride=" + rideName + "&units=" + hourlyUnits[lastHour] + "&cycles=" + String(hourlyCycles[lastHour]) + "&empty=" + hourlyEmpty[lastHour] + "&hourly=" + hourlyTotal[lastHour] + "&wait=" + wait + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);

    // Send HTTP POST request
    int httpResponseCode = http.POST(httpRequestData);

    // If you need an HTTP request with a content type: text/plain
    // http.addHeader("Content-Type", "text/plain");
    // int httpResponseCode = http.POST("Hello, World!");

    // If you need an HTTP request with a content type: application/json, use the following:
    // http.addHeader("Content-Type", "application/json");
    // int httpResponseCode = http.POST("{\"value1\":\"19\",\"value2\":\"67\",\"value3\":\"78\"}");

    if (httpResponseCode > 0)
    {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else
    {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  }
}
