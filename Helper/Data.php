<?php


namespace OrviSoft\Tracking\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\Cookie\PublicCookieMetadata;
use Magento\Framework\Stdlib\CookieManagerInterface;

class Data extends AbstractHelper
{
    protected $_checkoutSession;
    protected $_coreSession;
    protected $_cookies;
    protected $orderRepository;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Sales\Model\Order $orderRepository,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory,
        SessionManagerInterface $sessionManager,
        \Magento\Framework\ObjectManagerInterface $objectManager

    ) {
        $this->orderRepository = $orderRepository;
        $this->_cookies = $cookieManager;
        parent::__construct($context);
    }

    public function getCookies($key){
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        //echo 'value in $_COOKIE["getStudenttracking"] = '. $_COOKIE['getStudenttracking'];
        echo '<pre>'.print_r($_COOKIE, true).'</pre>';
    }

    public function getOrder()
    {
        return $this->getOrderBypass(); // this is a force bypass.
        return $this->_checkoutSession->getLastRealOrder();
    }

    public function getOrderBypass(){
        return $this->orderRepository->load('000000001');
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return true;
    }
}
