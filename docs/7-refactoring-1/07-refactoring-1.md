
### 052 Папки шаблонов main и admin
1. Перемещаем шаблоны в более подходящие директории
2. Проверяем работу фун-ала.
- mailtrap вход в лк через почту гугл

### 053 Класс AbstractBaseManager
1. Вынесли общую логику менеджеров в абстрактного менеджера

### 054 Uuid  
1. Устанавливаем зависимость для генерации uuid  
`composer require symfony/uid`  
2. Добавляем новое поле в модель Продукта  
3. Создаём миграцию  
`symfony console make:migration`  
4. Добавляем в миграцию заполнение uuid для уже созданных записей  
` $this->addSql('UPDATE product SET uuid=uuid_generate_v4() WHERE uuid IS NULL');`  
5. Если postgres не видит фун-ию uuid_generate_v4(), то установите расширение для него  
`CREATE EXTENSION IF NOT EXISTS "uuid-ossp"`  
6. Запускаем миграцию  
`symfony console doctrine:migrations:migrate`  
7. После простановки значений существующим продуктам устанавливаем uuid - обязательно для заполнения, в моделе убираем  
`nullable=true`  
8. Создаём миграцию на изменение параметров столбца uuid изменяем столбец в бд