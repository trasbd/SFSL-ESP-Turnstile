SELECT
    hourly.ride,
    SUM(hourly.hourly) AS totalHourly,
    SUM(tcpu.dailyCap) AS totalCap,
    ROUND(SUM(hourly.hourly) / SUM(tcpu.dailyCap) * 100, 1) AS "PU",
    ROUND(SUM(hourly.hourly) / 14000 , 3 ) AS "RPG"
FROM
    (
    SELECT
        hourly.ride,
        hourly.`units`,
        capacity.hourlyCap,
        (
            COUNT(hourly.units) * capacity.hourlyCap
        ) AS 'dailyCap'
    FROM
        `hourly`,
        capacity
    WHERE
        hourly.ride = capacity.ride AND hourly.units = capacity.units
    GROUP BY
        hourly.units,
        hourly.ride,
        hourly.units ASC
    ) AS tcpu
RIGHT JOIN hourly ON hourly.ride = tcpu.ride
GROUP BY
    tcpu.ride
ORDER BY
    hourly.ride ASC;