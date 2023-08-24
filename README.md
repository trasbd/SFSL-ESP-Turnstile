<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<!-- <br />
<div align="center">
  <a href="https://github.com/trasbd/SFSL-ESP-Turnstile">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a> -->
<br>
<h3 align="center">SFSL-ESP-Turnstile</h3>
  <p align="center">
    <br />
    <a href="https://github.com/trasbd/SFSL-ESP-Turnstile"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/trasbd/SFSL-ESP-Turnstile">View Demo</a>
    ·
    <a href="https://github.com/trasbd/SFSL-ESP-Turnstile/issues">Report Bug</a>
    ·
    <a href="https://github.com/trasbd/SFSL-ESP-Turnstile/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li><a href="#hardware">Hardware</a></li>
        <li><a href="#database">Database</a></li>
        <li><a href="#web">Web Files</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

<P>Replaces mechanical turnstile/clicker and manual calculation with an ESP8266 that automatically reports counts to an MSSQL Server. 
<br>The ESP uses HTTP POST/GET requests that are handled by an IIS server running PHP.</p>

<!--
<br><img style="max-width: 50%; height: auto; " src="googlecal.png"> -->

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

![Arduino](https://img.shields.io/badge/-Arduino-00979D?style=for-the-badge&logo=Arduino&logoColor=white)
![MicrosoftSQLServer](https://img.shields.io/badge/Microsoft%20SQL%20Server-CC2927?style=for-the-badge&logo=microsoft%20sql%20server&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
<img src="https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white" />

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Hardware

* 1 x ESP8266 (NodeMCU v3)
* 1 x LCD 2x16 (PCF8574 Attached)
* 4 x Momentary Push Button
* 4 x 10kΩ Resistor

<br><img style="max-width: 50%; height: auto; " src="Hardware/Turnstile_bb.png">

## Database

Three tables are required:
* hourly
* seats
* mac

```CREATE TABLE``` files are included

### `hourly`

| `Column`      | `Type`             |
| ----------- | --------------------- |
| date | date |
| time | time |
| ride | text |
| units | int |
| cycles | int |
| empty | int |
| hourly | int |
| wait | int | 

## Installation

1. Setup Google Workspace API [https://developers.google.com/calendar/api/quickstart/python](https://developers.google.com/calendar/api/quickstart/python)
2. Clone the repo
   ```sh
   git clone https://github.com/trasbd/SFSL-ESP-Turnstile.git
   ```
3. Place ```credentials.json``` in base folder

4. Enter your Badge and Calendar (optional) information in `secrects.py`
   ```python
   company = "sfsl"
   eid = "YOUR_EID"
   pin = "YOUR_PIN"
   calendarId = "primary"
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

   ```python
   python .\SFSL-ESP-Turnstile.py
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [ ] Update Calendar Events
- [ ] Import Timesheets


See the [open issues](https://github.com/trasbd/SFSL-ESP-Turnstile/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Thomas Robert

Project Link: [https://github.com/trasbd/SFSL-ESP-Turnstile](https://github.com/trasbd/SFSL-ESP-Turnstile)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/trasbd/SFSL-ESP-Turnstile.svg?style=for-the-badge
[contributors-url]: https://github.com/trasbd/SFSL-ESP-Turnstile/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/trasbd/SFSL-ESP-Turnstile.svg?style=for-the-badge
[forks-url]: https://github.com/trasbd/SFSL-ESP-Turnstile/network/members
[stars-shield]: https://img.shields.io/github/stars/trasbd/SFSL-ESP-Turnstile.svg?style=for-the-badge
[stars-url]: https://github.com/trasbd/SFSL-ESP-Turnstile/stargazers
[issues-shield]: https://img.shields.io/github/issues/trasbd/SFSL-ESP-Turnstile.svg?style=for-the-badge
[issues-url]: https://github.com/trasbd/SFSL-ESP-Turnstile/issues
[license-shield]: https://img.shields.io/github/license/trasbd/SFSL-ESP-Turnstile.svg?style=for-the-badge
[license-url]: https://github.com/trasbd/SFSL-ESP-Turnstile/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/thomas-robert-142b02b2
[product-screenshot]: images/screenshot.png