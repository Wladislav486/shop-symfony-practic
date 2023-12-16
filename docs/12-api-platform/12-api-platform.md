### 091 Что такое ApiPlatform

1. Устанавливаем ApiPlatform  
   `sudo composer require api-platform/api-pack ^1.3`

- после установки пакета добавились новые настройки и появился новый route для запросов к api.
- пришлось поменять версии пакетов, не работало без этого
- поменял версии пакетов в composer.json, не работало без этого  
  `"api-platform/core": "^2.6"`
  `"nelmio/cors-bundle": "^2.1"`
- обновил пакеты  
  `sudo composer update api-platform/core`
  `sudo composer update nelmio/cors-bundle`

2. Прописываем маршруты в моделе продукта для того чтобы ApiPlatform смог работать с сущностью
3. Проверяем создание новых маршрутов, убеждаемся что они появились
   `symfony console debug:route`

### 092 Расширение JsonFormatter. Метод POST

1. В браузере установили расширения для удобного просмотра json файлов
2. Запрещаем отправку запроса пользователям не из группы админ
3. Помечаем поля продукта которые должны будут отправлены в пост запросе
4. Добавляем анатацию ApiResource в сущность категории, задаём http методы отображаемы в документации api.
5. Помечаем id категории для вывода при запросе списка товаров
6. Делаем заполнение поля description для продукта необязательным nullable=true  
   `
   /**  
   @ORM\Column(type="text", nullable=true)  
   */  
   private $description;  
   `
7. Создаём миграцию
   `php bin/console doctrine:migrations:diff`
8. Выполняем  
   `php bin/console doctrine:migrations:migrate`
9. Совершаем запрос на добавление нового продукта через ApiPlatform  
   `  {
   "title": "Product from Api",
   "price": "120",
   "quantity": 5,
   "category": "/api/categories/5"
   }
   `


