<?php
namespace Aubiplus\Seo\View\Helper;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\HelperPluginManager;
use Aubiplus\Seo\Service;

/**
 * Class UrlFactory
 *
 * @package Aubiplus\Seo\View\Helper
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
     * @author Fabian Köstring
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var Service\Url $urlService */
        $urlService = $container->get(Service\Url::class);

        return new Url(
            $urlService
        );
    }
}
