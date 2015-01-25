Symfony2 Bundle для API 2GIS
============================

[![Build Status](https://travis-ci.org/pavelgopanenko/2GisApiBundle.svg)](https://travis-ci.org/pavelgopanenko/2GisApiBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pavelgopanenko/2GisApiBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pavelgopanenko/2GisApiBundle/?branch=master)

Бандл интеграции API 2GIS в проекты на основе Symfony2. Провайдер оборачивает компонент `2gis/api-client`.

## Установка

####Расширение composer.json
```yaml
{
    "require": {
        "2gis/api-symfony-bundle": "dev-master"
    }
}
```

#### Установка пакета
`composer update` в каталоге проекта

#### Регистрация бандла
```php
// app/AppKernel.php
// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new DGis\Bundle\ApiBundle\DGisApiBundle(),
        );
        // ...
    }
    // ...
}
```

#### Добавление конфигурации
```yaml
#app/config.yml
# ...
d_gis_api:
    key: %dgis_key%
```

#### Определение парметров
```yaml
#app/parameters.yml
parameters:
    # ...
    dgis_key: test
```

## Использование

### Параметры `d_gis_api`
* `key` - Уникальный [ключ для доступа к API](http://partner.api.2gis.ru/), обязательный параметр.
* `class_map` - Массив сопоставления сущностей API с классами приложения, например ``Address: \MyCustomAddress``. По-умолчанию используются классы клинтской библиотеки.

### Сервисы
* ``gdis.api.region`` - [API регионов](http://api.2gis.ru/doc/2.0/region/quickstart)
* ``gdis.api.catalog`` - [API справочника](http://api.2gis.ru/doc/2.0/catalog/quickstart)
* ``gdis.api.transport`` - [API транспорта](http://api.2gis.ru/doc/2.0/transport/route/search)
* ``gdis.api.geo`` - [API геоданных](http://api.2gis.ru/doc/2.0/geo/method/search-query/query)

## Лицензия
* Билиотека поставляется под лицензией `MIT`
* [Правовая информация по API 2ГИС](http://help.2gis.ru/api-rules/)
