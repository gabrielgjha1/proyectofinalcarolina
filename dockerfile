FROM php:7.3-apache
RUN apt-get update                                              \
    && apt-get install -y --no-install-recommends git zip       \
    && docker-php-ext-install mysqli pdo pdo_mysql              \
    && a2enmod rewrite                                          \
    && chmod 777 -R -c /var/www
    
RUN chown -R ./SemestralProyectos/databases/mysql_3.7/schemas/db_killme

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# python
# FROM python:3
RUN apt-get install python3.7 -y

# vim
RUN apt-get install vim -y


# node

# RUN apt-get install git-core curl build-essential openssl libssl-dev  \
    # && git clone https://github.com/nodejs/node.git                   \
    # && cd node                                                        \
    # && ./configure                                                    \
    # && make                                                           \
    # && sudo make install
