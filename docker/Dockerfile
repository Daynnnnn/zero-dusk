FROM daynnnnn/docker-chromium-xvfb

RUN apt-get update
RUN apt-get install \
	composer \
	php-curl \
	php-zip \
	wget \
	libappindicator1 \
	libappindicator3-1 \
	lsb-release -y

ADD /composer.json /src/
ADD /composer.lock /src/
RUN cd /src;\
 composer install --ignore-platform-reqs --no-scripts

ADD / /src

ADD /docker/customChrome.php /src/vendor/nunomaduro/laravel-console-dusk/src/Drivers/Chrome.php

RUN php /src/zero-dusk dusk:update 76
RUN chmod 777 /src/docker/startup.sh
CMD ["/src/docker/startup.sh"]