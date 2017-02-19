<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Model_Observer
{

    /**
     * Add reCAPTCHA template to form.additonal.info block
     *
     * @param $observer
     */
    public function injectGoogleRecaptcha($observer)
    {
        $block = $observer->getBlock();

        if ($block->getNameInLayout() == 'form.additional.info') {
            if (Mage::getStoreConfigFlag('google/recaptcha/enable')) {
                $layout = Mage::app()->getLayout();

                $messageBlock = $layout->createBlock('turiknox_googlerecaptcha/googlerecaptcha', 'googlerecaptcha')
                    ->setTemplate('googlerecaptcha/googlerecaptcha.phtml');

                $layout->getBlock('form.additional.info')
                    ->append($messageBlock);
            }
        }

    }
}