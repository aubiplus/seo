<?php
use Aubiplus\Seo\View\Helper;
use Aubiplus\Seo\Controller\Plugin;
use Aubiplus\Seo\Service;

return [
    'service_manager' => [
        'factories' => [
            Service\Url::class => Service\UrlFactory::class
        ]
    ],
    'controller_plugins' => [
        'factories' => [
            Plugin\Url::class => Plugin\UrlFactory::class
        ],
        'aliases' => [
            'seoUrl' => Plugin\Url::class,
        ]
    ],
    'view_helpers' => [
        'factories' => [
            Helper\Url::class => Helper\UrlFactory::class
        ],
        'aliases' => [
            'seoUrl' => Helper\Url::class,
        ]
    ],
    'seo' => [
        'seperator' => '-',
        'chars' => [
            '/ä|Ä/' => 'ae',
            '/ö|Ö/' => 'oe',
            '/ü|Ü/' => 'ue'
        ]
    ]
];
