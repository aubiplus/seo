<?php
namespace Aubiplus\Seo\Service;

use Zend\Config\Config;

/**
 * Class Url
 *
 * @package Aubiplus\Seo\Service
 * @author  Fabian Köstring
 */
class Url
{
    /** @var Config $config */
    private $config;

    /**
     * Url constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param String $string
     *
     * @return String
     * @throws \Exception
     * @author Fabian Köstring
     */
    public function create(String $string)
    {
        $string = trim($string);

        if (empty($string)) {
            throw new \Exception('No string was supplied.');
        }

        $transformation = array(
            '[^a-z0-9 _-]'                                                => '',
            '\s+'                                                         => $this->config->get('seperator'),
            '(' . preg_quote($this->config->get('seperator'), '#') . ')+' => $this->config->get('seperator'),
        );

        $string = strip_tags($string);
        $string = $this->convert($string);

        foreach ($transformation as $key => $value) {
            $string = preg_replace('#' . $key . '#i', $value, $string);
        }

        $string = mb_strtolower($string);
        $string = trim($string, $this->config->get('seperator'));
        return trim($string);
    }

    /**
     * @param String $string
     *
     * @return String
     * @author Fabian Köstring
     */
    private function convert(String $string)
    {
        if (!$this->config->offsetExists('chars')) {
            return $string;
        }

        $chars = $this->config->get('chars')->toArray();
        $from = array_keys($chars);
        $to = array_values($chars);

        return preg_replace($from, $to, $string);
    }
}
