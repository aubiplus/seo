<?php
namespace Aubiplus\Seo\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;
use Aubiplus\Seo\Service;

/**
 * Class Url
 *
 * @package Aubiplus\Seo\View\Helper
 * @author  Fabian Köstring
 */
class Url extends AbstractHelper
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
