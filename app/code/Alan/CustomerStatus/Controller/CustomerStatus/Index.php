<?php


namespace Alan\CustomerStatus\Controller\CustomerStatus;


use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $page = $this->pageFactory->create();

        $page->getConfig()->getTitle()->set(__('Status'));

        return $page;


    }
}
