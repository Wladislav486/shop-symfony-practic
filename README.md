# Инструкция по сборке проекта

## Первый запуск
1. Установить докер на windows: https://youtu.be/gAYPxmtbadc
2. Установить настройки среды: cp .env.test .env && cp app/.env.test app/.env
3. Создать образ: docker-compose build up
4. Запустить приложение: docker-compose up -d
5. Зайти в контейнер в интерактивном режиме: docker exec -it container_name bash
6. Установить зависимости: sudo composer install
7. Настроить https: symfony server:ca:install
8. Запустить сервер: symfony serve 

## Дальнейшая работа
1. Запустить приложение: docker-compose up -d
2. Зайти в контейнер в интерактивном режиме: docker exec -it container_name bash
3. Настроить https: symfony server:ca:install
4. Запустить сервер: symfony serve
5. Если необходимо работать с файлами бд то необходимо поменять права на доступ к папке /var/lib/postgresql/data
> docker-compose exec db chmod 777 -R /var/lib/postgresql/data 

## Синтаксис файла READNE.md
> https://gist.github.com/Jekins/2bf2d0638163f1294637
