<?php
namespace Aubiplus\Seo\Controller\Plugin;

use Aubiplus\Seo\Service;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Class Url
 *
 * @package Aubiplus\Seo\Controller\Plugin
 * @author  Fabian Köstring
 */
class Url extends AbstractPlugin
{
    /** @var Service\Url $urlService */
    private $urlService;

    /**
     * Url constructor.
     *
     * @param Service\Url $urlService
     */
    public function __construct(Service\Url $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * @param string $string
     *
     * @throws \Exception
     * @author Fabian Köstring
     */
    function __invoke(string $string)
    {
        return $this->urlService->create($string);
    }
}