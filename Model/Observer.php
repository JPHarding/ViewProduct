<?php
class JP_ViewProduct_Model_Observer
{
    public function addViewProductButton($observer)
    {
        $block = $observer->getBlock();
        $type = $block->getType();

        // Only add button to product edit page
        if ($type == 'adminhtml/catalog_product_edit') {
            $deleteButton = $block->getChild('delete_button');

            // Create our custom button block
            $block->setChild(
                'view_product_button',
                $block->getLayout()->createBlock('jp_viewproduct/adminhtml_widget_button')
            );

            // Inject our button's HTML before the delete button
            $deleteButton->setBeforeHtml(
                $block->getChild('view_product_button')->toHtml()
            );
        }
    }
}
