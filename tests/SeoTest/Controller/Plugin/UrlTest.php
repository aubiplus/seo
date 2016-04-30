<?php
namespace SeoTest\Controller\Plugin;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\Controller\Plugin;
use Aubiplus\Seo\Service;

/**
 * Class UrlTest
 *
 * @package SeoTest\Controller\Plugin
 * @author  Fabian Köstring
 */
class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @throws \Exception
     * @author Fabian Köstring
     */
    public function testInvoke()
    {
        $urlServiceMock = $this->getMock(Service\Url::class, ['create'], [], '', false);
        $urlServiceMock
            ->expects($this->once())
            ->method('create')
            ->with($this->equalTo('just a small test'))
            ->willReturn('just-a-small-test');
        $urlControllerPlugin = new Plugin\Url($urlServiceMock);

        $this->assertEquals('just-a-small-test', $urlControllerPlugin->__invoke('just a small test'));
    }
}