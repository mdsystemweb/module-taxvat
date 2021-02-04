<?php
/**
 * Mdsystemweb Soluções Web
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://www.mdsystemweb.com.br for more information.
 *
 * @category Mdsystemweb
 *
 * @copyright Copyright (c) 2020 Mdsystemweb Soluções Web. (https://www.mdsystemweb.com.br)
 *
 * @author Mdsystemweb Core Team <contato@mdsystemweb.com.br>
 */

namespace Mdsystemweb\Taxvat\Observer;

use Magento\Customer\Model\Data\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;

/**
 * Class UpgradeQuoteCustomerTaxvatObserver
 * @package Magento\Customer\Observer
 */
class UpgradeQuoteCustomerTaxvatObserver implements ObserverInterface
{
    /**
     * @var CartRepositoryInterface
     */
    private $quoteRepository;

    /**
     * @param CartRepositoryInterface $quoteRepository
     */
    public function __construct(
        CartRepositoryInterface $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * Upgrade quote customer taxvat when customer has changed taxvat
     * @param Observer $observer
     * @throws NoSuchEntityException
     */
    public function execute(Observer $observer)
    {
        /** @var Customer $customer */
        $customer = $observer->getEvent()->getCustomerDataObject();
        if (!$customer) {
            return;
        }
        $taxvat = $customer->getTaxvat();
        $taxvatOrig = null;

        /** @var Customer $customerOrig */
        $customerOrig = $observer->getEvent()->getOrigCustomerDataObject();
        if ($customerOrig) {
            $taxvatOrig = $customerOrig->getTaxvat();
        }

        if (!$taxvat || !$taxvatOrig) {
            return;
        }

        if ($taxvat != $taxvatOrig) {
            try {
                $quote = $this->quoteRepository->getForCustomer($customer->getId());
                $quote->setCustomerTaxvat($taxvat);
                $this->quoteRepository->save($quote);
            } catch (NoSuchEntityException $e) {
                return;
            }
        }
    }
}