

### Установить пакет symfony/uid:  

`symfony composer require symfony/uid`



### Подключиться к базе ranked_choice_2 как пользователь rc_super_admin:  

`psql -h 127.0.0.1 -d ranked_choice_2 -U rc_super_admin -W`



### Подключиться к базе ranked_choice_2 как администратор postgres:  

`sudo -u postgres psql ranked_choice_2`



### [PostgreSQL] Сформировать uuid:  

`SELECT uuid_generate_v4();`



### [PostgreSQL] Создать расширение для uuid:  

`CREATE EXTENSION "uuid-ossp";`