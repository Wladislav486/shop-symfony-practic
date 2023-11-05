# Описание

## Первый запуск
1. Установить докер на windows:
> https://youtu.be/gAYPxmtbadc
2. Установить настройки среды:  
   `cp .env.test .env && cp app/.env.test app/.env`
3. Создать образ:  
   `docker-compose build app`
4. Запустить приложение:  
   `docker-compose up -d`
5. Зайти в контейнер в интерактивном режиме:  
   `docker exec -it shop-symfony-app bash`
6. Установить зависимости:  
   `sudo composer install`
7. Настроить https:  
   `symfony server:ca:install`
8. Запустить сервер:  
   `symfony serve`
9. Установить миграции:  
   `php bin/console doctrine:migrations:migrate`
10. Проверьте наличие последовательности, если нет добавьте её:  
   `SELECT * FROM information_schema.sequences WHERE sequence_name = 'user_id_seq';`  
   `CREATE SEQUENCE user_id_seq;`
11. Через консоль создаём пользователя:  
    `php bin/console app:add-user`  
   > Для того чтобы попасть в административную панель нужно Is admin = 1 проставить


## Дальнейшая работа
1. Запустить приложение:
   `docker-compose up -d`
2. Зайти в контейнер в интерактивном режиме:  
   `docker exec -it shop-symfony-app bash`
3. Настроить https:  
   `symfony server:ca:install`
4. Запустить сервер:  
   `symfony serve`
5. Если необходимо работать с файлами бд то необходимо поменять права на доступ к папке /var/lib/postgresql/data  
   `docker-compose exec db chmod 777 -R /var/lib/postgresql/data`

## Синтаксис файла README.md
> https://gist.github.com/Jekins/2bf2d0638163f1294637

## Создание шаблона проекта
1. Создал файловую структуру
2. Создал Dockerfile
3. Создал docker-compose.yml
4. Настроил гит. Нужен для установки synfony.    
   `   git config --global user.name "Your Name" &&
   git config --global user.email "you@example.com"`
5. Установил symfony  
   `symfony new --version=5.2 --dir=./ --full`
6. Удалил лишние файлы
+ .git
+ docker-compose.override.yml
+ docker-compose.yml