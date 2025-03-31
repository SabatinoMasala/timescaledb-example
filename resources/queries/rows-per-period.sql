SELECT COUNT(time)
FROM orders
WHERE time >= :from AND time < :to
