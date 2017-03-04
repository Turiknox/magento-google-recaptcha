<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Model_Source_Size
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'normal', 'label' => Mage::helper('core')->__('Normal')),
            array('value' => 'compact', 'label' => Mage::helper('core')->__('Compact')),
        );
    }
}