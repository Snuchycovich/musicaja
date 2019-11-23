DOCKER_NAME := musicaja
env ?= dev

up:
	sudo docker-compose -p $(DOCKER_NAME)-$(env) -f docker-compose.$(env).yml up -d --remove-orphans

build:
	sudo docker-compose -p $(DOCKER_NAME)-$(env) -f docker-compose.$(env).yml build

stop:
	sudo docker-compose -p $(DOCKER_NAME)-$(env) -f docker-compose.$(env).yml stop

clean:
	make stop
	sudo docker rm $(shell sudo docker ps -a -q)

clean-full:
	sudo docker rmi -f $(shell sudo docker images -q)

logs:
	sudo docker-compose -f docker-compose.$(env).yml -p $(DOCKER_NAME)-$(env) logs -f

php:
	sudo docker-compose -f docker-compose.$(env).yml -p $(DOCKER_NAME)-$(env) exec php bash
