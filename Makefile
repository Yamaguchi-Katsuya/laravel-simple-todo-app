up:
	docker compose up -d
build:
	docker compose up -d --build
create-project:
	@make build
	docker compose exec app composer install
	docker compose exec app cp .env.example .env
	docker compose exec app php artisan key:generate
	@make fresh
	@make yarn-install
	@make yarn-dev
down:
	docker compose down
destroy:
	docker-compose down --rmi all --volumes --remove-orphans
web:
	docker compose exec web ash
app:
	docker compose exec app bash
migrate:
	docker compose exec app php artisan migrate
fresh:
	docker compose exec app php artisan migrate:fresh --seed
seed:
	docker compose exec app php artisan db:seed
yarn-install:
	docker compose exec web yarn install
yarn-dev:
	docker compose exec web yarn dev
