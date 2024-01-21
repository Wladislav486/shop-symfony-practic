### 122 Подключение Vue.js

**_Задача._**

1. Создать структуру vue приложения для корзины в публичной части сайта
2. Проверить работу vue приложения
3. Убрать часть страницы из twig шаблона, которая будет реализована через vue компоненты

**_Решение._**

1. Создаём отдельную директорию под vue приложение для страницы корзины
2. Наполняем директорию ключевыми директориями и файлами

- components - директория для дочерних компонентов
- store - директория для модулей хранилища vuex и файла их инициализации
- app.js - файл инициализации vue приложения
- App.vue - главный vue компонент

3. Заполняем файлы логикой
4. Подключаем файл инициализации приложения в настройках webpack
5. Редактируем twig шаблон, удаляем вёрстку создаём главный div на который подключаем файл инициализации приложения

### 123 Подключение Vuex

**_Задача, Решение._**

1. Подключили хранилище для vue приложения страницы корзины заказа
2. Инициализировали компоненты вывода списка продуктов и общей суммы заказов в корзине
3. Создали кнопку "Создать заказ" и её обработчик

### 124 Получение корзины из API

**_Задача._**

1. Получить данные корзин на странице "Корзина" через Api Platform

**_Решение._**

1. Настраиваем сущности на работу с Api Platform
2. Отмечаем поля сущностей, которые надо получать
3. Передаём url получения данных корзин из шаблона twig в хранилище
4. В хранилище реализуем хранителя корзин/корзины
5. Реализуем действие, которое обращается к Api Platform и пишет в хранителя информацию о корзине/корзинах
6. Вызываем действие в главном vue компоненте до взаимодействия с dom