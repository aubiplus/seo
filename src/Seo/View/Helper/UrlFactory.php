<?php
namespace Aubiplus\Seo\View\Helper;

use Zend\ServiceManager\FactoryInterface;
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
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Url
     * @author Fabian Köstring
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var HelperPluginManager $serviceLocator */
        /* @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $serviceLocator->getServiceLocator();

        /** @var Service\Url $urlService */
        $urlService = $serviceManager->get(Service\Url::class);

        return new Url(
            $urlService
        );
    }
}
