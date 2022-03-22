.PHONY: analyse phpstan ecs-fixer phpcpd churn-php fix tests phpmd


composer-unused:
	@echo "\Check unused composer dependencies...\e[0m"
	vendor/bin/composer-unused

analyse: composer-valid composer-unused ecs-fixer phpcpd phpmd phpstan

composer-valid:
	@echo "\nRunning container valid...\e[0m"
	composer valid

phpstan:
	@echo "\nRunning phpstan...\e[0m"
	@$(PHP) vendor/bin/phpstan analyse --configuration=phpstan.neon

ecs-fixer:
	@echo "\nRunning easy Coding Standard...\e[0m"
	@$(PHP) vendor/bin/ecs check --ansi --no-interaction --fix --config ecs.php

phpcpd:
	@echo "\nRunning phpcpd...\e[0m"
	@$(PHP) vendor/bin/phpcpd src

phpmd:
	@echo "\nRunning Phpmd...\e[0m"
	@$(PHP) vendor/bin/phpmd src html phpmd.xml.dist --reportfile reports/phpmd-report.html --ignore-violations-on-exit

churn-php:
	@echo "\nRunning churn-php...\e[0m"
	@$(PHP) vendor/bin/churn run --configuration=churn.yml

tests:
	@echo "\nRunning tests...\e[0m"
	@$(PHP) bin/phpunit  --colors=always --coverage-text --testdox

tests-coverage:
	@echo "\nRunning tests coverage...\e[0m"
	@$(PHP_XDEBUG) bin/phpunit  --colors=always --coverage-text --testdox

