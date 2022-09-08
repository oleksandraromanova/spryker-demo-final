<?php

namespace Pyz\Client\Faq;

interface FaqClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getFaqByName(string $name): array;
}
