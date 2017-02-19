<?php
/*
 * Turiknox_Googlerecaptcha

 * @category   Turiknox
 * @package    Turiknox_Googlerecaptcha
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-recaptcha/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Googlerecaptcha_Block_Googlerecaptcha extends Mage_Core_Block_Template
{

    const GOOGLE_RECAPTCHA_SITEKEY  = 'google/recaptcha/sitekey';
    const GOOGLE_RECAPTCHA_THEME    = 'google/recaptcha/theme';
    const GOOGLE_RECAPTCHA_TYPE     = 'google/recaptcha/type';
    const GOOGLE_RECAPTCHA_SIZE     = 'google/recaptcha/size';
    const DEFAULT_LANG = 'en';

    /**
     * Array of allowed language codes
     *
     * @var array
     */
    protected $_languageCodes = array(
        'af_ZA' => 'af',
        'ar_DZ|ar_EG|ar_KW|ar_MA|ar_SA' => 'ar',
        'az_AZ' => 'az',
        'bn_BD' => 'bn',
        'bg_BG' => 'bg',
        'ca_ES' => 'ca',
        'zh_CN' => 'zh-CN',
        'zh_HK' => 'zh-HK',
        'zh_TW' => 'zh-TW',
        'hr_HR' => 'hr',
        'cs_CZ' => 'cs',
        'da_DK' => 'da',
        'nl_NL' => 'nl',
        'en_GB|en_AU|en_NZ|en_IE|cy_GB' => 'en-GB',
        'en_US|en_CA' => 'en',
        'fil_PH' => 'fil',
        'fi_FI' => 'fi',
        'fr_CA' => 'fr-CA',
        'fr_FR' => 'fr',
        'gl_ES' => 'gl',
        'ka_GE' => 'ka',
        'de_AT' => 'de-AT',
        'de_DE' => 'de',
        'de_CH' => 'de-CH',
        'el_GR' => 'el',
        'gu_IN' => 'gu',
        'he_IL' => 'iw',
        'hi_IN' => 'hi',
        'hu_HU' => 'hu',
        'is_IS' => 'is',
        'id_ID' => 'id',
        'it_IT|it_CH' => 'it',
        'ja_JP' => 'ja',
        'ko_KR' => 'ko',
        'lo_LA' => 'lo',
        'lv_LV' => 'lv',
        'lt_LT' => 'lt',
        'nb_NO|nn_NO' => 'no',
        'fa_IR' => 'fa',
        'pl_PL' => 'pl',
        'pt_BR' => 'pt-BR',
        'pt_PT' => 'pt-PT',
        'ro_RO' => 'ro',
        'ru_RU' => 'ru',
        'sr_RS' => 'sr',
        'sk_SK' => 'sk',
        'sl_SI' => 'sl',
        'es_ES' => 'es',
        'es_AR|es_CL|es_CO|es_CR|es_MX|es_PA|es_PE|es_VE' => 'es-419',
        'sw_KE' => 'sw',
        'sv_SE' => 'sv',
        'th_TH' => 'th',
        'tr_TR' => 'tr',
        'uk_UA' => 'uk',
        'vi_VN' => 'vi'
    );

    /**
     * Get Google reCAPTCHA site key
     *
     * @return string
     */
    public function getGoogleRecaptchaSiteKey()
    {
        return Mage::getStoreConfig(self::GOOGLE_RECAPTCHA_SITEKEY);
    }

    /**
     * Get Google reCAPTCHA theme
     *
     * @return string
     */
    public function getGoogleRecaptchaTheme()
    {
        return Mage::getStoreConfig(self::GOOGLE_RECAPTCHA_THEME);
    }

    /**
     * Get Google reCAPTCHA type
     *
     * @return string
     */
    public function getGoogleRecaptchaType()
    {
        return Mage::getStoreConfig(self::GOOGLE_RECAPTCHA_TYPE);
    }

    /**
     * Get Google reCAPTCHA size
     *
     * @return string
     */
    public function getGoogleRecaptchaSize()
    {
        return Mage::getStoreConfig(self::GOOGLE_RECAPTCHA_SIZE);
    }

    /**
     * Get Google reCAPTCHA JavaScript URL
     *
     * @return string
     */
    public function getGoogleRecaptchaScript()
    {
        $locale = Mage::app()->getLocale()->getLocaleCode();
        $language = self::DEFAULT_LANG;

        foreach ($this->_languageCodes as $key => $languageCode) {
            if (strpos($key, $locale) !== false) {
                $language = $languageCode;
            }
        }

        $params = array(
            'onload' => 'onloadCallback',
            'render' => 'explicit',
            'hl'     => $language
        );

        return sprintf(
            '<script src="https://www.google.com/recaptcha/api.js?%s" async defer></script>',
            http_build_query($params)
        );
    }

    /**
     * Render Google reCAPTCHA on chosen forms selected in the admin
     *
     * @param $action
     * @return bool
     */
    public function isAllowed($action)
    {
        $forms = $this->getEnabledForms();
        foreach ($forms as $form) {
            if ($action === $form) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get chosen forms selected in the admin
     *
     * @return array
     */
    public function getEnabledForms()
    {
        return explode(',', Mage::getStoreConfig('google/recaptcha/forms'));
    }
}