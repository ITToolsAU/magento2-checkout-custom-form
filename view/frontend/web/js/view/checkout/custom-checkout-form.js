/*global define*/
define([
    'knockout',
    'jquery',
    'mage/url',
    'Magento_Ui/js/form/form',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/quote',
    'Magento_Checkout/js/model/url-builder',
    'Magento_Checkout/js/model/error-processor',
    'Magento_Checkout/js/model/cart/cache',
    'Bodak_CheckoutCustomForm/js/model/checkout/custom-checkout-form',
    'uiRegistry',
    'tagify'
], function (ko, $, urlFormatter, Component, customer, quote, urlBuilder, errorProcessor, cartCache, formData, registry, tagify) {
    'use strict';

    return Component.extend({
        customFields: ko.observable(null),
        formData: formData.customFieldsData,

        /**
         * Initialize component
         *
         * @returns {exports}
         */
        initialize: function () {
            var self = this;
            this._super();
            formData = this.source.get('customCheckoutForm');
            var formDataCached = cartCache.get('custom-form');
            if (formDataCached) {
                formData = this.source.set('customCheckoutForm', formDataCached);
            }

            this.customFields.subscribe(function (change) {
                self.formData(change);
            });

            return this;
        },

        /**
         * Trigger save method if form is change
         */
        onFormChange: function () {
            this.saveCustomFields();
        },

        insertNewSerial: function () {
            this.setTagElement();
            this.tagifyField.addEmptyTag();
        },

        setTagElement: function() {
            if (!this.tagifyField) {
                $("#serial_header").show();
                var input = document.querySelector('[name="checkout_goods_mark"]');
                this.tagifyField = new tagify(input, {
                    dropdown: {
                        position: 'text',
                        enabled: 1
                    }
                });
                $("input[name='checkout_goods_mark']").show();
                this.tagifyField.removeAllTags();
            }
        },

        /**
         * Form submit handler
         */
        saveCustomFields: function () {
            var formData = this.source.get('customCheckoutForm');
            var quoteId = quote.getQuoteId();
            var isCustomer = customer.isLoggedIn();
            var url;

            if (isCustomer) {
                url = urlBuilder.createUrl('/carts/mine/set-order-custom-fields', {});
            } else {
                url = urlBuilder.createUrl('/guest-carts/:cartId/set-order-custom-field', {cartId: quoteId});
            }

            var payload = {
                cartId: quoteId,
                customFields: formData
            };
            var result = true;
            $.ajax({
                url: urlFormatter.build(url),
                data: JSON.stringify(payload),
                global: false,
                contentType: 'application/json',
                type: 'PUT',
                async: true
            }).done(
                function (response) {
                    cartCache.set('custom-form', formData);
                    result = true;
                }
            ).fail(
                function (response) {
                    result = false;
                    errorProcessor.process(response);
                }
            );

            return result;
        },

        hideLoader: function() {
            this.setTagElement();
        },
    });
});
