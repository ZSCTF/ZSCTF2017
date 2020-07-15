FROM php:5.6.31-fpm
RUN apt-get update && apt-get install -y php5-mysql mysql-client zlib1g-dev libmcrypt-dev cron awscli
RUN docker-php-ext-install -j$(nproc) zip mysqli mcrypt mbstring bcmath

COPY php.ini /usr/local/etc/php/php.ini
COPY flag.txt /etc/dbus-1/system.d/system/lib/you/find/me/flag.txt
