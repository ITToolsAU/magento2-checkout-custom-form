<?php
/**
 * Checkout custom fields interface
 *
 * @package   Bodak\CheckoutCustomForm
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Bodak\CheckoutCustomForm\Api\Data;

/**
 * Interface CustomFieldsInterface
 *
 * @category Api/Data/Interface
 * @package  Bodak\CheckoutCustomForm\Api\Data
 */
interface CustomFieldsInterface
{
    const CHECKOUT_GOODS_MARK = 'checkout_goods_mark';

    /**
     * Get checkout goods mark
     *
     * @return string|null
     */
    public function getCheckoutGoodsMark();

    /**
     * Set checkout goods mark
     *
     * @param string|null $checkoutGoodsMark Goods mark
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutGoodsMark(string $checkoutGoodsMark = null);

}
