<?php
namespace Aubiplus\Seo;

use Zend\Loader\StandardAutoloader;

/**
 * Class Module
 *
 * @package Aubiplus\Seo
 * @author  Fabian Köstring
 */
class Module
{
    /**
     * {@InheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@InheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            StandardAutoloader::class => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/Seo/',
                ),
            ),
        );
    }
}
