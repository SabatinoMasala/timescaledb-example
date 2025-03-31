SELECT time_bucket(:bucket, time) AS period,
       SUM(price) revenue
FROM orders
WHERE time >= :from AND time < :to
GROUP BY period
ORDER BY period
