<?php
namespace rohan\observers\Observer;
 
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
class Data implements ObserverInterface
{
    public function execute(Observer $observer)
        {
            $quote_item = $observer->getEvent()->getQuoteItem();
            $price = 400;
            $quote_item->setCustomPrice($price);
            $quote_item->setOriginalCustomPrice($price);
            $quote_item->getProduct()->setIsSuperMode(true);
        }
    }
?>