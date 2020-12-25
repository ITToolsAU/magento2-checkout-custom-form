<?php
/**
 * @package   Bodak\CheckoutCustomForm
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Bodak\CheckoutCustomForm\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Bodak\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFields
 *
 * @category Model/Data
 * @package  Bodak\CheckoutCustomForm\Model\Data
 */
class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{

    /**
     * Get checkout serial number
     *
     * @return string|null
     */
    public function getCheckoutSerialNumber()
    {
        return $this->_get(self::CHECKOUT_SERIAL_NUMBER);
    }

    /**
     * Set checkout goods mark
     *
     * @param string|null $checkoutSerialNumber Goods mark
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutSerialNumber(string $checkoutSerialNumber = null)
    {
        return $this->setData(self::CHECKOUT_SERIAL_NUMBER, $checkoutSerialNumber);
    }

}
