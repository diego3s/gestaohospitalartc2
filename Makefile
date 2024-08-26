completeRun:
	cp ./src/.env.example ./src/.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && sleep 10 && php artisan migrate:fresh --seed"

seed:
	docker exec php /bin/sh -c "php artisan migrate:fresh --seed"