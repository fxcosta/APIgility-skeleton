<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Beers\\V1\\Rest\\Beers\\BeersResource' => 'Beers\\V1\\Rest\\Beers\\BeersResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'beers.rest.beers' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/beers[/:beers_id]',
                    'defaults' => array(
                        'controller' => 'Beers\\V1\\Rest\\Beers\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'beers.rest.beers',
        ),
    ),
    'zf-rest' => array(
        'Beers\\V1\\Rest\\Beers\\Controller' => array(
            'listener' => 'Beers\\V1\\Rest\\Beers\\BeersResource',
            'route_name' => 'beers.rest.beers',
            'route_identifier_name' => 'beers_id',
            'collection_name' => 'beers',
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
            'entity_class' => 'Beers\\V1\\Rest\\Beers\\BeersEntity',
            'collection_class' => 'Beers\\V1\\Rest\\Beers\\BeersCollection',
            'service_name' => 'Beers',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Beers\\V1\\Rest\\Beers\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Beers\\V1\\Rest\\Beers\\Controller' => array(
                0 => 'application/vnd.beers.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Beers\\V1\\Rest\\Beers\\Controller' => array(
                0 => 'application/vnd.beers.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Beers\\V1\\Rest\\Beers\\BeersEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'beers.rest.beers',
                'route_identifier_name' => 'beers_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Beers\\V1\\Rest\\Beers\\BeersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'beers.rest.beers',
                'route_identifier_name' => 'beers_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Beers\\V1\\Rest\\Beers\\Controller' => array(
            'input_filter' => 'Beers\\V1\\Rest\\Beers\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Beers\\V1\\Rest\\Beers\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'name',
                'description' => 'Beer name',
                'error_message' => 'the name is need!',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'description',
                'continue_if_empty' => true,
                'allow_empty' => true,
            ),
        ),
    ),
);
