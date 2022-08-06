<?php
namespace rohan\observers\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
 
class Cart implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //get the item just added to cart
        $item = $observer->getEvent()->getData('quote_item');
        $product = $observer->getEvent()->getData('product');
        // set your custom price
        $price = 100;
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        $item->getProduct()->setIsSuperMode(true);
    }
}

?>