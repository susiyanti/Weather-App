## Weather App

Show weather forcast for the next 5 days for selected city. Build with Laravel + Tailwind CSS, with [OpenWeaterMap API](https://openweathermap.org/)

## How To Run
- Clone this repo
- cd into cloned folder
- copy .env.example to .env
- open .env, set OPENWEATHERMAP_KEY value
- Run following command
```
composer install
npm install
npm run build
php artisan key:generate --ansi
php artisan serve
```

## Design Decision
1. City drop down list is populated from json file.
2. Weather forecast data is retrieve for the first city on the city list as default city.
3. On change of city drop down list value, forecast data will be retrieve by city id send from query param
