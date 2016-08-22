<?php
/**
 * Copyright © 2016 MagestyApps. All rights reserved.
 *  * See COPYING.txt for license details.
 */

namespace MagestyApps\FixRules\Controller\Checkout;

class ApplyPaymentMethod extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Checkout\Model\Cart $cart
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        $this->layoutFactory = $layoutFactory;
        $this->cart = $cart;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $pMethod = $this->getRequest()->getParam('payment_method');

        $quote = $this->cart->getQuote();

        $quote->getPayment()->setMethod($pMethod['method']);

        $quote->setTotalsCollectedFlag(false);
        $quote->collectTotals();
        $quote->save();
    }
}