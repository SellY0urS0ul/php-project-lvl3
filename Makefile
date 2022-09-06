start:
	php artisan serve --host 0.0.0.0

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	npm ci
	npm run build

migrate:
	php artisan migrate

deploy:
	git push heroku main

lint:
	composer phpcs

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml
