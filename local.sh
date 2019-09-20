#!/bin/bash
composer update
cp docker/customChrome.php vendor/nunomaduro/laravel-console-dusk/src/Drivers/Chrome.php
cp .env.example .env
php php /src/zero-dusk dusk:update --detect=/usr/bin/google-chrome

echo +--------------------+
echo 
echo \| FILL IN .env FILE! \|
echo
echo +--------------------+