<h1>Mailer <sub><sup>💌 API Mail Sender</sup></sub></h1>

[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

* [Installation](#installation)
	* [Development](#development)

## Installation
### Development
* Клонировать репозитарий
* Установить **Php 7.1** ```brew install php71```
* Установить **Composer** ```brew install composer```
* Создать конфиг ```cp .env.exmaple .env```
* Установить **Mysql** ```brew install mysql```
* Установить **Valet** ```composer global require laravel/valet```
* Запустить в папке проекта ```composer install --no-scripts --no-interaction```
* Запустить миграции ```php artisan migrate```
* Установить глобальные зависимости ```npm install -g gulp yarn```
* Установить локальные зависимости в папке ```yarn```
* Собрать фронт ```npm run watch```
* Подключить **Valet** ```valet link website```

## License

The MIT License ([MIT](https://opensource.org/licenses/MIT)). Please see [License File](LICENSE) for more information.

[ico-license]: https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square

[ico-travis]: https://img.shields.io/travis/finagin/mailer/master.svg?style=flat-square
[link-travis]: https://travis-ci.org/finagin/mailer

[ico-styleci]: https://styleci.io/repos/110014860/shield
[link-styleci]: https://styleci.io/repos/110014860
