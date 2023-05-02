go:
	php artisan serve
railway: migrate start
install:
	composer install
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 app public routes tests
test:
	php artisan test --coverage --min=80

