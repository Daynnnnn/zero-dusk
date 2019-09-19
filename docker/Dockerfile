FROM markadams/chromium-xvfb

RUN apt-get update && apt-get install composer php-curl wget libappindicator1 libappindicator3-1 lsb-release -y

RUN mkdir /src && cd /src
RUN wget https://www.slimjet.com/chrome/download-chrome.php?file=files%2F71.0.3578.80%2Fgoogle-chrome-stable_current_amd64.deb
RUN dpkg -i download-chrome.php?file=files%2F71.0.3578.80%2Fgoogle-chrome-stable_current_amd64.deb
RUN cd / && rm -rf /src

ADD / /src

RUN cd /src;\
 composer install --ignore-platform-reqs --no-scripts

ADD /docker/customChrome.php /src/vendor/nunomaduro/laravel-console-dusk/src/Drivers/Chrome.php

RUN chmod 777 /src/docker/startup.sh

CMD ["/src/docker/startup.sh"]