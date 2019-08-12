<?php

namespace LeadCommerce\Shopware\SDK\Util;

/**
 * Class Query
 * @package LeadCommerce\Shopware\SDK\Util
 */
class Query
{
    /**
     * @var array
     */
    private $query = [];

    /**
     * @param string $key
     * @param string $value
     * @return Query
     */
    public function add(string $key, string $value): Query
    {
        $this->query[$key] = $value;
        return $this;
    }

    /**
     * @param string $property
     * @param string $value
     * @return Query
     */
    public function addFilter(string $property, string $value): Query
    {
        $this->query['filter'][] = ['property' => $property, 'value' => $value];
        return $this;
    }

    /**
     * Returns query array which can be passed as parameters to the request.
     *
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }
}
