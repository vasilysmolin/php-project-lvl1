install:
	composer install

autoload:
	composer dump-autoload

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

validate:
	composer validate

lint:
	vendor/bin/phpcbf -- src bin
	composer run-script phpcs -- --standard=PSR12 src bin
