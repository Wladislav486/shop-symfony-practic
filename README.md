# Запуск приложения

1. Установить докер на windows https://youtu.be/gAYPxmtbadc
2. Установить настройки среды cp .env.test .env && cp app/.env.test app/.env
3. Установить зависимости sudo composer install
4. Зайти в контейнер в интерактивном режиме docker exec -it container_name bash
5. Настроить https sudo symfony server:ca:install
6. Запустить сервер sudo symfony serve 
