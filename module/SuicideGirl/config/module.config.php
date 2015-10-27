<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlResource' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'suicide-girl.rest.suicide-girl' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/suicide-girl[/:suicide_girl_id]',
                    'defaults' => array(
                        'controller' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'suicide-girl.rest.suicide-girl',
        ),
    ),
    'zf-rest' => array(
        'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller' => array(
            'listener' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlResource',
            'route_name' => 'suicide-girl.rest.suicide-girl',
            'route_identifier_name' => 'suicide_girl_id',
            'collection_name' => 'suicide_girl',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlEntity',
            'collection_class' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlCollection',
            'service_name' => 'SuicideGirl',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller' => array(
                0 => 'application/vnd.suicide-girl.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller' => array(
                0 => 'application/vnd.suicide-girl.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'suicide-girl.rest.suicide-girl',
                'route_identifier_name' => 'suicide_girl_id',
                'hydrator' => 'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject',
            ),
            'SuicideGirl\\V1\\Rest\\SuicideGirl\\SuicideGirlCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'suicide-girl.rest.suicide-girl',
                'route_identifier_name' => 'suicide_girl_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'SuicideGirl\\V1\\Rest\\SuicideGirl\\Controller' => array(
            'input_filter' => 'SuicideGirl\\V1\\Rest\\SuicideGirl\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'SuicideGirl\\V1\\Rest\\SuicideGirl\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'name',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'image',
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'user_entities' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => __DIR__ . '/../src/SuicideGirl/V1/Rest/SuicideGirl/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'SuicideGirl\\V1\\Rest\\SuicideGirl\\Entity' => 'user_entities',
                ),
            ),
        ),
    ),
);
