<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Model_Source_Theme
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'light', 'label' => Mage::helper('core')->__('Light')),
            array('value' => 'dark', 'label' => Mage::helper('core')->__('Dark')),
        );
    }
}