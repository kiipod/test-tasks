#LARAVEL
keygen:
	php artisan key:generate
start:
	./vendor/bin/sail up
migrate:
	./vendor/bin/sail artisan migrate
seed:
	./vendor/bin/sail artisan db:seed
migrate-rollback:
	./vendor/bin/sail artisan migrate:rollback
cache-clear:
	./vendor/bin/sail artisan optimize:clear
pass-keys:
	./vendor/bin/sail artisan passport:keys
pass-client:
	./vendor/bin/sail artisan passport:client --personal
