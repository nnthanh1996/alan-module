<?php


namespace Alan\CustomerStatus\Block\Customer;


use Magento\Framework\View\Element\Template;

class Status extends Template
{

    /** @var \Magento\Customer\Model\Session $customerSession */
    protected $customerSession;

    public function __construct(
        Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
    }

    public function getCustomerStatus() {

        if($this->customerSession->isLoggedIn()) {

            $customer = $this->customerSession->getCustomer();

            return $customer->getData('customer_status');

        }

        return null;
    }

}
