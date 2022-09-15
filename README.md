Project Installation
--------------------

1. composer install
2. Configure .env file, WEATHER_API_KEY should be set.
3. php artisan key:generate
4. php artisan migrate:fresh --seed
5. This is command in being ran on every 2 minutes, the Laravel's schedule should be called in the cron job   ->  <stong>php artisan update:weather</strong>

Postman Documentation
---------------------------

<a target="_blank" href="https://documenter.getpostman.com/view/6660278/2s7YfLfaqN">https://documenter.getpostman.com/view/6660278/2s7YfLfaqN</a>
