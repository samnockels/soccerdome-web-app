# Soccerdome Web Application

## Setting up

You will need to install Docker (https://www.docker.com/)

* Clone this repository to your machine
* `cd` to the directory
* Run `docker exec soccerdome-webserver docker-php-ext-install pdo pdo_mysql`
* Run `docker-compose up -d`

Now you'll see the application running at (http://localhost:8050)

Or if you'd rather set up your own environment, just download everything inside `/public`
