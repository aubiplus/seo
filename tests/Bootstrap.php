<?php
use Zend\Loader\StandardAutoloader;

$loader = new StandardAutoloader();
$loader->registerNamespace('Aubiplus\Seo', __DIR__ . '/../src/Seo');
$loader->registerNamespace('Aubiplus\SeoTest', __DIR__ . '/SeoTest');
$loader->register();