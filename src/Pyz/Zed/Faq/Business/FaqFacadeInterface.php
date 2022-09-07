<?php
namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
interface FaqFacadeInterface
{
    /**
     * Specification:
     * - stores FAQ to the database based on input transfer
     * - returns enhanced `FaqTransfer` with ID
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;
}

