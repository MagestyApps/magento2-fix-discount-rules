/**
 * Copyright © MagestyApps. All rights reserved.
 * See LICENSE.txt for license details.
 */

define([
    'mage/utils/wrapper',
    'mage/storage',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/model/url-builder',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/action/get-totals',
    'Magento_Checkout/js/model/full-screen-loader'
], function (wrapper, storage, quote, urlBuilder, customer, getTotalsAction, fullScreenLoader) {
    'use strict';

    return function (selectPaymentMethod) {
        return wrapper.wrap(selectPaymentMethod, function (selectPaymentMethodOrig, paymentMethod) {
            var serviceUrl, payload;

            selectPaymentMethodOrig(paymentMethod);

            if (typeof paymentMethod.__disableTmpl != 'undefined') {
                delete paymentMethod.__disableTmpl;
            }

            payload = {
                method: paymentMethod
            };
            if (customer.isLoggedIn()) {
                serviceUrl = urlBuilder.createUrl('/carts/mine/selected-payment-method', {});
            } else {
                serviceUrl = urlBuilder.createUrl('/guest-carts/:cartId/selected-payment-method', {
                    cartId: quote.getQuoteId()
                });
            }

            fullScreenLoader.startLoader();
            storage.put(
                serviceUrl,
                JSON.stringify(payload)
            ).success(function () {
                getTotalsAction([]);
            }).always(function () {
                fullScreenLoader.stopLoader();
            });
        });
    };
});
