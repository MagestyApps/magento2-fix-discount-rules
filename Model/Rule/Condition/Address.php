<?php
/**
 * Copyright Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagestyApps\FixRules\Model\Rule\Condition;

class Address extends \Magento\SalesRule\Model\Rule\Condition\Address
{
    /**
     * Load attribute options
     *
     * @return $this
     */
    public function loadAttributeOptions()
    {
        $attributes = [
            'base_subtotal' => __('Subtotal'),
            'total_qty' => __('Total Items Quantity'),
            'weight' => __('Total Weight'),
            'shipping_method' => __('Shipping Method'),
            'payment_method' => __('Payment Method'),
            'postcode' => __('Shipping Postcode'),
            'region' => __('Shipping Region'),
            'region_id' => __('Shipping State/Province'),
            'country_id' => __('Shipping Country'),
        ];

        $this->setAttributeOption($attributes);

        return $this;
    }
}
