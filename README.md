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

## Test

For testing Log into 'freelance_app' container and install composer. Use this command `docker exec -it freelance_app /bin/bash`.
    - Execute `php artisan test`