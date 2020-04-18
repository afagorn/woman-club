init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
build: docker-build
stop-all: docker-stop-all

docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
#Полное удаление. -v удаление volumes(напр данные БД). --remove-orphans - чистит все services
#docker-down-clear:
#	docker-compose down -v --remove-orphans
docker-down-clear:
	docker-compose down --remove-orphans
docker-pull:
	docker-compose pull
docker-build:
	docker-compose build

docker-php:
	docker-compose exec php-fpm php $(args)
docker-node:
	docker-compose exec node $(args)

docker-stop-all:
	docker stop $(docker ps -a -q)
