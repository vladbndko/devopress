down:
	docker compose down

up: down
	docker compose up -d --build

dev:
	npm run dev

build:
	npm run build
