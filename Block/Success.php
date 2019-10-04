<?php

namespace OrviSoft\Tracking\Block;


class Success extends \Magento\Framework\View\Element\Template {
    protected $_helper;
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        array $data = [],
        \OrviSoft\Tracking\Helper\Data $helper
    ){
        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    function getOrder(){
        return $this->_helper->getOrder();
    }
    
    public function getHelper(){
        return $this->_helper;
    }

}
