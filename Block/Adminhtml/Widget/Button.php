<?php
class JP_ViewProduct_Block_Adminhtml_Widget_Button extends Mage_Adminhtml_Block_Widget_Button
{
    private $_product;

    protected function _construct()
    {
        // Get the current product from registry
        $this->_product = Mage::registry('current_product');

        parent::_construct();

        if ($this->_product && $this->_product->getId()) {
            // Build the frontend URL as specified
            $productUrl = Mage::getBaseUrl() . 'catalog/product/view/id/' . $this->_product->getId();

            $this->setData(array(
                'label' => Mage::helper('catalog')->__('View on Frontend'),
                'onclick' => 'window.open(\'' . $productUrl . '\')',
                'class' => 'go'
            ));
        }
    }
}
