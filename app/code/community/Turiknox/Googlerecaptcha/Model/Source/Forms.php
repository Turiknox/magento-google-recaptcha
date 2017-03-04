<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Model_Source_Forms
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'adminhtml_index_login', 'label' => Mage::helper('core')->__('Admin Login')),
            array('value' => 'adminhtml_index_forgotpassword', 'label' => Mage::helper('core')->__('Admin Forgotten Password')),
            array('value' => 'customer_account_login', 'label' => Mage::helper('core')->__('Customer Login')),
            array('value' => 'customer_account_create', 'label' => Mage::helper('core')->__('Customer Register')),
            array('value' => 'customer_account_forgotpassword', 'label' => Mage::helper('core')->__('Customer Forgotten Password')),
        );
    }
}