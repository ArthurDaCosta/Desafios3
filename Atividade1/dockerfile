FROM php:7.4-apache

WORKDIR /var/www/html
COPY . /var/www/html

RUN apt-get update

# Drivers PDO E PGSQL
RUN apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql

# docker build -t nomedaimagem .
#docker run -dp 8080:80 nomedaimagem
#5docker ps e docker ps -a
#service postgresql status
#netstat -an | grep 5431
#docker compose up
#psql -h localhost -p 8101 -U postgres db
#sudo apt-get install php-pgsql