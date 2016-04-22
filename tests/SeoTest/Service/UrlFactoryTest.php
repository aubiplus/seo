<?php
namespace SeoTest\Service;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\Service;
use Zend\Config\Config;
use Zend\ServiceManager\ServiceManager;

/**
 * Class UrlFactoryTest
 *
 * @package SeoTest\Service
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
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', ['seo' => []]);

        $urlFactory = new Service\UrlFactory();
        $service = $urlFactory->createService($serviceManager);
        $this->assertTrue($service instanceof Service\Url);
    }

    /**
     * @throws \Exception
     * @author Fabian Köstring
     */
    public function testCreateServiceThrowsExceptionWithEmptyConfig()
    {
        $this->setExpectedException(\Exception::class, 'Configuration of Seo-Module not set.');
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', []);

        $urlFactory = new Service\UrlFactory();
        $service = $urlFactory->createService($serviceManager);
        $this->assertTrue($service instanceof Service\Url);
    }
}