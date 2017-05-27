FROM whatwedo/symfony3

RUN apt-get -qq  update
RUN apt-get -qq -y install curl
RUN apt-get -qq -y install php-xml
RUN wget https://phar.phpunit.de/phpunit-5.4.6.phar
RUN chmod +x phpunit-5.4.6.phar
RUN mv phpunit-5.4.6.phar /usr/local/bin/phpunit

RUN apt-get -qq -y install php-pear pkg-config libbson-1.0 libmongoc-1.0-0 php-xml php7.0-xml php-dev
RUN pecl install xdebug
RUN echo 'zend_extension=/usr/lib/php/20160303/xdebug.so'>>/etc/php/7.1/cli/php.ini
RUN apt-get -qq -y install php7.0-zip
RUN apt-get -qq -y install php-mysql
RUN apt-get -qq -y install php-sqlite3
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD ./symfony /var/www
RUN chmod 777 -R var

WORKDIR /var/www

