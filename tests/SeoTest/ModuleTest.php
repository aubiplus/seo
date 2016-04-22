<?php
namespace SeoTest;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\Module;

/**
 * Class ModuleTest
 *
 * @package SeoTest
 * @author  Fabian Köstring
 */
class ModuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @author Fabian Köstring
     */
    public function testGetAutoloaderConfig()
    {
        $module = new Module();
        $this->assertInternalType('array', $module->getAutoloaderConfig());
    }

    /**
     * @author Fabian Köstring
     */
    public function testGetConfig()
    {
        $module = new Module();
        $this->assertInternalType('array', $module->getConfig());
    }
}
