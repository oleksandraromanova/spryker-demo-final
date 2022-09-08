<?php

namespace Pyz\Shared\FaqSearch;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
class FaqSearchConstants
{
    /**
     * Specification:
     * - Queue name as used for processing faq messages
     *
     * @api
     *
     * @var string
     */
    public const FAQ_SYNC_SEARCH_QUEUE = 'sync.search.faq';
}
