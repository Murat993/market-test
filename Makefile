init: docker-down-clear	docker-pull docker-build docker-up app-init npm-install npm-run-dev
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

app-init: app-composer-install app-migrations app-fixtures

app-composer-install:
	docker-compose run --rm php-fpm composer install

app-migrations:
	docker-compose run --rm php-fpm php artisan migrate

app-fixtures:
	docker-compose run --rm php-fpm php artisan db:seed

npm-install:
	docker-compose run --rm node-cli npm install

npm-run-dev:
	docker-compose run --rm node-cli npm run development
