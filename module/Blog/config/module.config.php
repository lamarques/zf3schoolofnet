<?php

namespace Blog;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
return [
    'router' => [
        'routes' => [
            'admin-blog' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/admin'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'post' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/blog[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\BlogController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                ]
            ],
            'site-post' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/post[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\PostController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            #Controller\BlogController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Blog_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'Blog\Entity' => 'Blog_driver'
                ]
            ]
        ],
        'fixtures' => [
            'BlogFixture' => __DIR__ . '/../src/Fixture',
        ]
    ],
];