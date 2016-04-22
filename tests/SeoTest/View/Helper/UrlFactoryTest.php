<?php
namespace SeoTest\View\Helper;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\View\Helper;
use Aubiplus\Seo\Service;
use Zend\Config\Config;
use Zend\ServiceManager\ServiceManager;
use Zend\View\HelperPluginManager;

/**
 * Class UrlFactoryTest
 *
 * @package SeoTest\View\Helper
 * @author  Fabian Köstring
 */
class UrlFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @throws \Exception
     * @author Fabian Köstring
     */
    public function testCreateService()
    {
        $urlServiceMock = $this->getMock(Service\Url::class, [], [], '', false);

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', ['seo' => []]);
        $serviceManager->setService(Service\Url::class, $urlServiceMock);

        $helperPluginManager = new HelperPluginManager();
        $helperPluginManager->setServiceLocator($serviceManager);

        $urlFactory = new Helper\UrlFactory();
        $service = $urlFactory->createService($helperPluginManager);
        $this->assertTrue($service instanceof Helper\Url);
    }
}