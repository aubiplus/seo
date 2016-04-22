<?php
namespace SeoTest\View\Helper;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\View\Helper;
use Aubiplus\Seo\Service;

/**
 * Class UrlTest
 *
 * @package SeoTest\View\Helper
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
        $urlViewHelper = new Helper\Url($urlServiceMock);

        $this->assertEquals('just-a-small-test', $urlViewHelper->__invoke('just a small test'));
    }
}