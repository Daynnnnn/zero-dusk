#!/bin/bash
composer update
cp docker/customChrome.php vendor/nunomaduro/laravel-console-dusk/src/Drivers/Chrome.php
cp .env.example .env

echo +--------------------+
echo 
echo \| FILL IN .env FILE! \|
echo
echo +--------------------+