# Тестовое задание для компании «Skilla»

![PHP Version](https://img.shields.io/badge/php-%5E8.4-7A86B8)
![MySQL Version](https://img.shields.io/badge/mysql-8.0-F29221)
![Laravel Version](https://img.shields.io/badge/laravel-%5E11.31-F13C30)
![PHPUnit Version](https://img.shields.io/badge/phpunit-%5E11.0-3A97D0)

## О проекте

Реализовать RESTful API для управления исполнителями и заказами. Общая концепция: есть компании, у которых есть менеджеры и исполнители, менеджеры создают заказы, исполнители их выполняют.

## Начало работы

Чтобы развернуть проект локально выполните последовательно следующие действия:

0. Для запуска проекта необходимо установить WSL, если вы пользуетесь Windows. Так же потребуется Docker Desktop для разворачивания проекта.

1. Клонируйте репозиторий:

```bash
git clone git@github.com:kiipod/test-tasks.git
```

2. Перейдите в директорию проекта:

```bash
cd test-tasks
```

3. Для запуска проекта необходимо выдать разрешения к директориям: `bootstrap` и `storage`, выполните команды:

```bash
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap
```

4. Установите зависимости Composer, выполнив команду:

```bash
composer install
```

5. Установите зависимости NPM, выполнив команду:

```bash
npm install
```

6. Затем создайте файл .env:

```bash
cp .env.example .env
```

И пропишите в нем настройки, соответствующие вашему окружению.

7. После этого сгенерируйте ключ приложения:

```bash
php artisan key:generate
```

8. Для запуска Docker-контейнера запустите команду:

```bash
make start
```

9. В случае падение образа с MySQL, остановите контейнер, найдите в Docker Desktop пункт меню `Volumes` откройте содержимое образа и удалите файлы `mysql.sock` и `mysql.sock.lock`. Перезапустите контейнер и настройте соединение с MySQL.

10. После запуска Docker-контейнера создайте БД и накатите миграции вместе с исходными данными:

```bash
make migrate
```
