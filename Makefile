install:
	composer install --no-interaction --dev

update:
	composer update

test:
	vendor/bin/phpunit --coverage-clover ./build/logs/clover.xml
