#!/bin/bash
composer update
cp docker/customChrome.php vendor/nunomaduro/laravel-console-dusk/src/Drivers/Chrome.php