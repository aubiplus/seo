<?php
namespace SeoTest\Service;

use PHPUnit_Framework_TestCase;
use Aubiplus\Seo\Service\Url as UrlService;
use Zend\Config\Config;
use Zend\ServiceManager\ServiceManager;

/**
 * Class UrlTest
 *
 * @package SeoTest\Service
 * @author  Fabian Köstring
 */
class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @author Fabian Köstring
     */
    public function testCreateWillThrowExceptionWithEmptyString()
    {
        $this->setExpectedException(\Exception::class, 'No string was supplied.');
        $service = new UrlService(new Config([]));

        $service->create('');
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillThrowExceptionWithStringOfWhitespaces()
    {
        $this->setExpectedException(\Exception::class, 'No string was supplied.');
        $service = new UrlService(new Config([]));

        $service->create('   ');
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillUseSeperator()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('just a test'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillConvertChars()
    {
        $service = new UrlService(new Config(['seperator' => '-', 'chars' => ['/ä/' => 'ae']]));

        $this->assertEquals('just-ae-test', $service->create('just ä test'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillRemoveNonAlphanumericValues()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a1-test', $service->create('just a1 ? ... test'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillRemoveDuplicateWhitespaces()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('just        a          test'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillRemoveDuplicateSeperators()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('just----------a----------test'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillConvertToLowercase()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('JUST A TEST'));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillRomoveWhitespaceFromBeginningAndEnd()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('     just a test     '));
    }

    /**
     * @author Fabian Köstring
     */
    public function testCreateWillRemoveDashFromBeginningAndEnd()
    {
        $service = new UrlService(new Config(['seperator' => '-']));

        $this->assertEquals('just-a-test', $service->create('-just a test-'));
    }
}