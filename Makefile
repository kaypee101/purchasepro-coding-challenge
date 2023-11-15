start:
	sudo service docker start

stop:
	sudo service docker stop

restart:
	sudo service docker restart
	
build:
	./vendor/bin/sail up -d --build

build-no-cache:
	./vendor/bin/sail build --no-cache

up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

logs:
	./vendor/bin/sail logs

user:
	sudo chown -R $(shell whoami):$(shell whoami) .