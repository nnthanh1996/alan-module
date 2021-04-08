<?php


namespace Alan\CustomerStatus\Controller\CustomerStatus;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Save extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Customer\Model\Session $customerSession */
    protected $customerSession;
    /** @var \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator */
    protected $formKeyValidator;

    public function __construct(
        Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
    )
    {
        parent::__construct($context);
        $this->customerSession = $customerSession;
        $this->formKeyValidator = $formKeyValidator;
    }


    public function execute()
    {

        if($this->formKeyValidator->validate($this->getRequest())) {
            if($this->customerSession->isLoggedIn()) {

                $status = $this->getRequest()->getParam('customer_status');

                try{
                    $customer = $this->customerSession->getCustomer();

                    $customer->setData('customer_status', $status);

                    $customer->save();

                    $this->messageManager->addSuccessMessage(__('Update status successully'));

                }catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__('Can not save status data'));
                }

            }else {

                $this->messageManager->addErrorMessage(__('Customer do not login'));

            }
        }

        return $this->resultRedirectFactory->create()->setPath('customer/account/index');

    }
}
