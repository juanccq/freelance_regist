# Freelancer registro de horas

## Requirements

* Docker
* Docker compose

## Installation

* Duplicate the `.env.example` file to `.env`
* Duplicate the `docker-compose.yml.example` file to `docker-compose.yml`
    - Set the `${USER}` and `${UID}` values with your OS data. For Linux use the commands `whoami` and `id -u <username>` respectively.
* Check the ports used in `docker-compose.yml` file and change if required.
* Build the docker compose file, use the command `docker compose build` (use sudo if required).
* Start the docker container, use the command `docker compose up`
* Log into 'freelance_app' container and install composer. Use this command `docker exec -it freelance_app /bin/bash`.
    - Execute composer install with this command `composer install`.
    - Create `storage` sub directories and give them rights.
        - `cd storage`
        - `mkdir -pv framework/views app framework/sessions framework/cache`
        - `cd ..`
        - `chmod 777 -R storage`
        - `chown -R <username>:<username> storage` (`${USER}` is the same as step 2)
* Log into 'freelance_app' container and install composer. Use this command `docker exec -it freelance_app /bin/bash`.
    - Execute `npm install`
    - `npm run build`
* Execute migrations. Log into 'freelance_app' container and install composer. Use this command `docker exec -it freelance_app /bin/bash`.
    - Execute `php artisan migrate:fresh --seed`

## Project Structure

The current project has two interfaces:
* Web interface, can be accessible through `http://localhost:9021`. This interface is mostly used by freelancers to track their time entries, request a report via email and see a list of past time entries.
* RESTApi interface, can be accessed at the same address through an API client. This interface is mostly used by the Admin to manage the projects, and tasks CRUDs. For testing the API you can use the file `postman/Freelancer.postman_collection.json`.

## Test

For testing Log into 'freelance_app' container and install composer. Use this command `docker exec -it freelance_app /bin/bash`.
    - Execute `php artisan test`

The following tests were created manually:
* `TaskRestTest.php`
* `TrackingTimeTest.php`
* `AuthRestTest.php`

## Swagger Documentation

To avoid generating PHP classes with many lines, Swagger documentation is on a separate directory. Please check `app\Swagger` directory structure.

To generate the swagger documentation use `php artisan l5-swagger:generate`.

To view the documentation check the URL: `http://localhost:9021/api/documentation` (The port `9021` is defined in the `docker-compose.yml` file)


## Running Cronjobs

The current project has tasks that need to be executed by Laravel Scheduler, in order to execute all tasks we need to create a cron tab with the following configuration.

```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
