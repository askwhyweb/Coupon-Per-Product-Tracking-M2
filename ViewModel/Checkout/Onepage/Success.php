<?php

namespace OrviSoft\Tracking\ViewModel\Checkout\Onepage;

class Success implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $_checkoutSession;
    protected $_helper;
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \OrviSoft\Tracking\Helper\Data $helper
    ) {        
        $this->_checkoutSession = $checkoutSession;
        $this->_helper = $helper;
    }

    public function getOrder()
    {
        return $this->_checkoutSession->getLastRealOrder();
    }
    
    public function getSomething()
    {
        return 'returned something from custom block.';
    }

    public function getHelper(){
        return $this->_helper;
    }
}
