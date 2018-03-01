<?php

class StuntCoders_CmsHints_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function coreBlockAbstractToHtmlAfter(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getData('block');
        if (!$block instanceof Mage_Cms_Block_Block || !$this->_getHelper()->isEnabled()) {
            return;
        }

        /** @var Varien_Object $transport */
        $transport = $observer->getEvent()->getData('transport');

        $transport->setData('html', implode('', array(
            '<span class="sc-cms-hint" style="position: relative; display: inline-block; border: 1px dotted #f00">',
            '<span style="position: absolute; top: 0; right: 0; background-color: #f00; color: #fff; font-size: 12px">',
            $block->getData('block_id'),
            '</span>',
            $transport->getData('html'),
            '</span>',
        )));
    }

    /**
     * @return StuntCoders_CmsHints_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('stuntcoders_cmshints');
    }
}
