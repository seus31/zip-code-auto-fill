.PHONY: build up down shell install update test

RUN := docker compose run --rm app

build:
	docker compose build

up:
	docker compose up -d

down:
	docker compose down

shell:
	$(RUN) sh

install:
	$(RUN) composer install

update:
	$(RUN) composer update

test:
	$(RUN) vendor/bin/phpunit
