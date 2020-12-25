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
    const CHECKOUT_SERIAL_NUMBER = 'checkout_serial_number';

    /**
     * Get checkout comment
     *
     * @return string|null
     */
    public function getCheckoutSerialNumber();

    /**
     * Set checkout goods mark
     *
     * @param string|null $checkoutSerialNumber
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutSerialNumber(string $checkoutSerialNumber = null);

}
