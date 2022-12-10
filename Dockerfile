FROM wyveo/nginx-php-fpm:php81

COPY --from=wordpress:cli /usr/local/bin/wp /usr/bin/wp

WORKDIR /usr/share/nginx/html/wp-content/themes/devopress
