### 098 Установка Webpack

_**Задача.**_

1. Установить webpack как пакет symfony через composer.
2. Установить js зависимости.

**_Решение._**

1. Установить webpack как пакет symfony через composer
   `sudo composer require symfony/webpack-encore-bundle ^1.11`
2. Добавил в образ yarn, перекомпилировал образ, запушил на dockerHub, подтянул свежий образ в проект
3. Установить js зависимости.
   `sudo yarn install`
4. Установил в ручную пакет
   `sudo yarn add @babel/plugin-proposal-class-properties --dev`

**_Описание._**

1. `app/assets/` - папка для файлов фронтенд - скрипты, стили, изображения.  
   После компиляции скомпилированные файлы будут внесены в папку `app/public/build`.
2. `app/config/packages/assets.yaml` - маппинг файлов скомпилированных и нет.  
   Позволяет обращаться к скомпилированному файлу по имени до компиляции.
3. `app/config/packages/prod/webpack_encore.yaml` - конфигурации webpack для прод. среды.
4. `app/config/packages/webpack_encore.yaml` - глобальные конфигурации webpack
5. `app/webpack.config.js` - настройки компиляции

### 099 Стили

**_Задача._**

1. Настроить компиляцию стилей

**_Решение._**

1. Удаляем всё содержимое папки assets
2. Поменяем права и пользователя, для работы с файлом настроек webpack
   `sudo chgrp wlad app/webpack.config.js`
   `sudo chmod 664 app/webpack.config.js`
3. Поменяем права и пользователя для директории assets
   `sudo chgrp wlad app/assets/`
   `sudo chmod 775 app/assets/`
4. Создаём и наполняем директорию `app/assets/css/section/` стилями для публичной и админ. части сайта
5. Создаём `app/assets/section-main.js` в котором подключаем все css стили для публ. части сайта
6. Устанавливаем зависимости
   `sudo npm install --save @fortawesome/fontawesome-free@5.15.3`
   `sudo npm install --save bootstrap@4.3.1`
   `sudo npm install --save-dev sass@1.32.0 sass-loader@10.1.1`
7. Добавляем подключение зависимостей через js файл
   `app/assets/section-main.js`
8. Подключаем `app/assets/section-main.js` в `app/webpack.config.js`
   Комментируем `.enableStimulusBridge('./assets/controllers.json')`  
   Добавляем `.enableSassLoader()`
9. Компилируем стили
   `sudo npm install`
   `sudo npm run dev`
10. Подключаем все стили через section-main в хедере сайта
    `encore_entry_link_tags('section-main')`

### 100 Изображения

**_Задача._**

1. Настроить компиляцию изображений

**_Решение._**

1. Добавляем изображения в директорию `app/assets/images`
2. В `app/webpack.config.js` настраиваем копирование файлов
3. Устанавливаем зависимость для работы с файлами
   `sudo yarn add file-loader@^6.0.0 --dev`
4. Компилируем стили и изображения
   `yarn run dev`