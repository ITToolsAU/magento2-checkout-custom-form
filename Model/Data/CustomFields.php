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
     * Get checkout goods mark
     *
     * @return string|null
     */
    public function getCheckoutGoodsMark()
    {
        return $this->_get(self::CHECKOUT_GOODS_MARK);
    }

    /**
     * Set checkout goods mark
     *
     * @param string|null $checkoutGoodsMark Goods mark
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutGoodsMark(string $checkoutGoodsMark = null)
    {
        return $this->setData(self::CHECKOUT_GOODS_MARK, $checkoutGoodsMark);
    }

}
