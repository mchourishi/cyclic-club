# Cyclic Club App with Laravel7
This is a Laravel 7 based simple CRUD app to manage Races & Riders for a Cyclic Club.
The UI has been created using AdminLTE3.

## Description
- User can add new riders.
- User can add new races and can choose the riders for a race.
- A race can have many riders and a rider can belong to multiple races.
- Clicking the results on the race record, allows the user to update the race results.
- Clicking the title on the race record, displays race results.

## Installation
- Run ``composer install``  and ``npm install`` to install dependencies. 
- Copy .env.example to .env and update database credentials and database name.
- Run ``php artisan key:generate``
- Run ``php artisan migrate --seed`` to migrate and seed data. (Seeder will create users and clubs)

## Users
- Default users will be added by seeder.They are as follows:-
- User 1  
        - Username : admin1@admin.com  
        - Password : password
- User 2  
        - Username : admin2@admin.com  
        - Password : password

### Usage
- Access panel (Eg: localhost/cyclic_club/public/) and login with one of the above user credentials.
- Create Riders.
- Create Race, select Riders that should belong to a race.
- Click the Results icon (pencil icon) to update results of rider for a race.
- Click the title icon to display the results of a race.

