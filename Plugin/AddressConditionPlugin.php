<?php
/**
 * Copyright © MagestyApps. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MagestyApps\FixRules\Plugin;

use Magento\SalesRule\Model\Rule\Condition\Address;

class AddressConditionPlugin
{
    /**
     * Add 'Payment Method' option to rule conditions
     *
     * @param Address $subject
     * @param $result
     * @return mixed
     */
    public function afterLoadAttributeOptions(Address $subject, $result)
    {
        $options = $subject->getAttributeOption();

        if (!isset($options['payment_method'])) {
            $options['payment_method'] =    __('Payment Method');
            $subject->setAttributeOption($options);
        }

        return $result;
    }
}
