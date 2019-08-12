<?php

namespace LeadCommerce\Shopware\SDK\Query;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class ArticleQuery
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class ArticleQuery extends Base
{
    /**
     * Find one article based on given article number
     * @param string $number
     * @return \LeadCommerce\Shopware\SDK\Entity\Base
     * @throws GuzzleException
     */
    public function findOneByNumber(string $number)
    {
        return $this->fetch($this->queryPath . '/' . $number, 'GET', null, ['useNumberAsId' => 'true']);
    }

    /**
     * @return mixed
     */
    protected function getConverterClass()
    {
        return 'LeadCommerce\\Shopware\\SDK\\Converter\\ArticleConverter';
    }

    /**
     * @return string
     */
    protected function getQueryPath()
    {
        return 'articles';
    }
}
