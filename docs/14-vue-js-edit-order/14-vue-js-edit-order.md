### 104 Подключаем Vue.js

**_Задача._**

1. Настроить работу на проекте с Vue.js

**_Решение._**

1. Устанавливаем зависимости  
   `yarn add vue@2.6.12 vue-loader@15.9.8 vue-template-compiler@2.6.12`
2. Подключим vue на странице редактирования заказа
3. Создадим 2 файла, являющиеся инициализацией vue для страницы редактирования заказа

- `app/assets/js/section/admin/admin-order/app.js`
- `app/assets/js/section/admin/admin-order/App.vue`

4. Подключим `app/assets/js/section/admin/admin-order/app.js` в настройках webpack
5. Добавляем загрузчик для vue в `app/webpack.config.js`
6. Подключаем стили(пока их нет) и js скрипты на странице редактирования заказа  
   `encore_entry_link_tags('appAdminOrder')`  
   `encore_entry_script_tags('appAdminOrder')`

### 106 Проектирование архитектуры

**_Задача._**

1. Установить vuex.  
   Хранилище, действует как посредник, который упрощает, стандартизирует и централизует обмен данными между компонентами
   Vue.
2. Внедрить vuex в приложение vue.js

**_Решение._**

1. Устанавливаем библиотеку vuex
   `sudo yarn add vuex@3.6.2`
2. Реализуем структуру хранилища -  
   app/assets/js/section/admin/admin-order/store/modules/products.js
3. Регистрируем структуру во vuex -  
   app/assets/js/section/admin/admin-order/store/index.js
4. Передаём vuex в приложение vue.js
5. Подключаем хранилище и выводим тестовое св-во - состояние в шаблоне 
   