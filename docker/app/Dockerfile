FROM wladislav486/ubuntu-shop-symfony:v1

## user
ARG user=shop
ARG uid=1000
ARG pass=shop

RUN useradd -rm -d /var/www -s /bin/bash -g root -G sudo -u $uid $user -p "$(openssl passwd -1 $pass)"
USER $user
WORKDIR /var/www/shop-symfony/

EXPOSE 8000