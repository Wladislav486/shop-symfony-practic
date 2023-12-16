### 091 Что такое ApiPlatform

1. Устанавливаем ApiPlatform  
   `sudo composer require api-platform/api-pack ^1.3`

- после установки пакета добавились новые настройки и появился новый route для запросов к api.
- пришлось поменять версию пакета на 2.6, не работало без этого
- поменял версию в composer.json  
  `"api-platform/core": "^2.6"`
- обновил пакет  
  `sudo composer update api-platform/core`

2. Прописываем маршруты в моделе продукта для того чтобы ApiPlatform смог работать с сущностью
3. Проверяем создание новых маршрутов, убеждаемся что они появились
   `symfony console debug:route`



