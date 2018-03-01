<?php

class StuntCoders_CmsHints_Helper_Data extends Mage_Core_Helper_Abstract
{
    const ENABLED_SYSTEM_CONFIG_PATH = 'dev/debug/cms_hints';

    /**
     * @param mixed $store
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return Mage::getStoreConfig(self::ENABLED_SYSTEM_CONFIG_PATH, $store) && Mage::helper('core')->isDevAllowed();
    }
}
