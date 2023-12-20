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
