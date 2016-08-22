/*
 * Copyright © 2016 MagestyApps. All rights reserved.
 *  * See COPYING.txt for license details.
 */

define(
    [
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/full-screen-loader',
        'jquery',
        'Magento_Checkout/js/action/get-totals',
    ],
    function (quote, fullScreenLoader, jQuery, getTotalsAction) {
        'use strict';
        return function (paymentMethod) {
            quote.paymentMethod(paymentMethod);

            fullScreenLoader.startLoader();

            jQuery.ajax('/magestyapps_fixrules/checkout/applyPaymentMethod', {
                data: {payment_method: paymentMethod},
                complete: function () {
                    getTotalsAction([]);
                    fullScreenLoader.stopLoader();
                }
            });

        }
    }
);
