Symfony2 Bundle для API 2GIS
============================

Бандл интеграции API 2GIS в проекты на основе Symfony2. Провайдер
оборачивает компонент ``2gis/api-client``.

Установка
---------

Расширение composer.json
^^^^^^^^^^^^^^^^^^^^^^^^

.. code:: yaml

    {
        "require": {
            "2gis/api-symfony-bundle": "dev-master"
        }
    }

Установка пакета
^^^^^^^^^^^^^^^^

``composer update`` в каталоге проекта

Регистрация бандла
^^^^^^^^^^^^^^^^^^

.. code:: php

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

Добавление конфигурации
^^^^^^^^^^^^^^^^^^^^^^^

.. code:: yaml

    #app/config.yml
    # ...
    d_gis_api:
        key: %dgis_key%

Определение парметров
^^^^^^^^^^^^^^^^^^^^^

.. code:: yaml

    #app/parameters.yml
    parameters:
        # ...
        dgis_key: test

Использование
-------------

Параметры ``d_gis_api``
~~~~~~~~~~~~~~~~~~~~~~~

-  ``key`` - Уникальный `ключ для доступа к
   API <http://partner.api.2gis.ru/>`__, обязательный параметр.
-  ``class_map`` - Массив сопоставления сущностей API с классами
   приложения, например ``Address: \MyCustomAddress``. По-умолчанию
   используются классы клинтской библиотеки.

Сервисы
~~~~~~~

-  ``gdis.api.region`` - `API
   регионов <http://api.2gis.ru/doc/2.0/region/quickstart>`__
-  ``gdis.api.catalog`` - `API
   справочника <http://api.2gis.ru/doc/2.0/catalog/quickstart>`__
-  ``gdis.api.transport`` - `API
   транспорта <http://api.2gis.ru/doc/2.0/transport/route/search>`__
-  ``gdis.api.geo`` - `API
   геоданных <http://api.2gis.ru/doc/2.0/geo/method/search-query/query>`__

Лицензия
--------

-  Билиотека поставляется под лицензией ``MIT``
-  `Правовая информация по API 2ГИС <http://help.2gis.ru/api-rules/>`__

