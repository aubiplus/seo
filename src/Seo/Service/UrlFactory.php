<?php
namespace Aubiplus\Seo\Service;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Config\Config;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class UrlFactory
 *
 * @package Aubiplus\Seo\Service
 * @author  Fabian Köstring
 */
class UrlFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return Url
     * @throws \Exception
     * @author Fabian Köstring
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $applicationConfig = $container->get('Config');
        if (!isset($applicationConfig['seo'])) {
            throw new \Exception('Configuration of Seo-Module not set.');
        }

        $seoConfig = new Config($applicationConfig['seo']);

        return new Url(
            $seoConfig
        );
    }
}
