<?php
use Zend\Loader\StandardAutoloader;

if (!(@include_once __DIR__ . '/../vendor/autoload.php') && !@(include_once __DIR__ . '/../../../autoload.php')) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$loader = new StandardAutoloader();
$loader->registerNamespace('Aubiplus\Seo', __DIR__ . '/../src/Seo');
$loader->registerNamespace('Aubiplus\SeoTest', __DIR__ . '/SeoTest');
$loader->register();