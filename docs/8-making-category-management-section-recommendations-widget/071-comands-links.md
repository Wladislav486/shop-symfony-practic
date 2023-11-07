### Создание сущности Category:

`symfony console make:entity Category`



### Создание контроллера CategoryController в папке Controller/Admin:

`symfony console make:controller Admin\\CategoryController`



### Очистить таблицы Category и Product:

`symfony console doctrine:query:sql "TRUNCATE category CASCADE";`



### Сформировать миграции:

`symfony console make:migration`



### Выполнить миграции:

`symfony console doctrine:migrations:migrate`