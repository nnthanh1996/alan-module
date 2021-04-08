<?php


namespace Alan\CustomerStatus\Block\Customer;
use Magento\Framework\View\Element\Template;

class StatusForm extends Template
{

    public function getPostUrl(){
        return $this->_urlBuilder->getUrl('alan/customerstatus/save',['_secure' => true]);
    }

}
