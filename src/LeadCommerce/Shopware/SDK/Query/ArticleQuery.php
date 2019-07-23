<?php

namespace LeadCommerce\Shopware\SDK\Query;

/**
 * Class ArticleQuery
 *
 * @author Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class ArticleQuery extends Base
{
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
