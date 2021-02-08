<?php
return [
    'backend' => [
        'frontName' => 'metalbackoffice'
    ],
    'crypt' => [
        'key' => 'c0e588ed960c5e8abd12305a3f85fdc6'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'db4yztk76zya99',
                'username' => 'uvdd7tf3pub63',
                'password' => '`5{#{#`E?h5?',
                'active' => '1',
                'driver_options' => [

                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'id_prefix' => '2d0_'
            ],
            'page_cache' => [
                'id_prefix' => '2d0_'
            ]
        ]
    ],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => null
        ]
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'google_product' => 1,
        'full_page' => 0,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1
    ],
    'downloadable_domains' => [
        'm2.metalcuttosize.co.uk'
    ],
    'install' => [
        'date' => 'Tue, 05 May 2020 10:52:40 +0000'
    ]
];
