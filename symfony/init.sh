composer install
php bin/console doctrine:database:create
php bin/console doctrine:database:create --env=test
php bin/console doctrine:schema:create
php bin/console doctrine:schema:create --env=test
./vendor/bin/simple-phpunit
phpunit --coverage-html=/var/www/web/test
chmod -R 777 var/
chmod 777 .
