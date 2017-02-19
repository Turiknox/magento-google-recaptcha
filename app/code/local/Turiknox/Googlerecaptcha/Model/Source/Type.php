<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Model_Source_Type
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'image', 'label' => Mage::helper('core')->__('Image')),
            array('value' => 'audio', 'label' => Mage::helper('core')->__('Audio')),
        );
    }
}