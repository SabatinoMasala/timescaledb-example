# TimescaleDB + Laravel test


In this video, I talked about how we use TimescaleDB over at [Pakske](https://pakske.be/), for our data platform.

[![Watch the video](https://i.ytimg.com/vi/YFujIFWrkZQ/maxresdefault.jpg)](https://youtu.be/YFujIFWrkZQ)

# Valet?

Using Laravel Valet? You might encounter a 502 error using the Laravel Postgres database driver, refer to this blogpost for help:
https://www.sabatino.dev/laravel-valet-502-error-when-using-postgres-pgsql-driver/

# Setup 

Set up your pgsql connection in your .env file and make sure the timescale plugin is installed.
Then, run your migrations:
```php
php artisan migrate
```

And finally, you can import storage/orders.csv using TablePlus.

# Running the project

Simply run:
```
yarn build
```

And serve the application any way you like.
