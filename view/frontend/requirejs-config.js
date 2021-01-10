var config = {
    map: {
        '*': {
            tagify: 'Bodak_CheckoutCustomForm/js/tagify/tagify.min',
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Bodak_CheckoutCustomForm/js/view/shipping-mixin': true
            }
        }
    }
};
