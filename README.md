# Carnival Costumes Site

## MVP

> [!NOTE]
> PHP 8.3.4 Symfony 7.0

## Installation

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework,
with [FrankenPHP](https://frankenphp.dev) and [Caddy](https://caddyserver.com/) inside!

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. `git clone https://github.com/mateuszlichwiarz/carnival_costumes.git`
3. Run `docker compose build --no-cache` to build fresh images
4. Run `docker compose up --pull always -d --wait` to start the project
5. Run `docker exec -it carnival_symfony-php-1 sh` to enter app container
6. Run `php bin/console doctrine:fixtures:load` to fill database
7. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
8. Run `docker compose down --remove-orphans` to stop the Docker containers

Dashboard `https://localhost/dashboard` <br>
Credentials: <br>
login: admin <br>
password: admin <br>
