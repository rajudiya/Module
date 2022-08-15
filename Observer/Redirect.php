<?php
namespace rohan\login\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Redirect implements \Magento\Framework\Event\ObserverInterface
{

    protected $_responseFactory;
    protected $_url;
    protected $_session;

    public function __construct(
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->_session = $session;
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $isCustomerLoggedIn = $this->_session->isLoggedIn();

        if ($isCustomerLoggedIn) {
            $event = $observer->getEvent();
            $CustomRedirectionUrl = $this->_url->getUrl('checkout/cart');
            $this->_session->setBeforeAuthUrl($CustomRedirectionUrl);
            return $this;
        }
    }
}