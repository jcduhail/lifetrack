## Requierements

- PHP >=7.3
- composer >= 2.0.4
- npm >=6.4.1

## Installation

In the root folder, run these commands :

- composer install
- npm install && npm run dev

## Run the app 

In the root folder, run this command :

- php artisan serve

Then just go to http://127.0.0.1:8000

## Content

- Laravel 8 PHP Framework
- Jquery post for the ajax call
- Output manage with a JQGrid
- API route /api/calculate_study_cost with the 3 post params to set
- Study Controller for the action
- Study Class to calculate the cost
- The number of days in a month is calculated depending on the month and the year

## Way of improvement

- Can include an authentication in the webapp, i have actually just update the welcome blade template to display the form and the output
- The API could also have a JWT Authentication for example, but here it's just public

## Screenshot

![alt text](https://raw.githubusercontent.com/jcduhail/lifetrack/main/public/screen.png)
