<?php

namespace DisplaySpecialProduct;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;

class DisplaySpecialProduct extends Plugin
{
    public function install(InstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');
        $service->update('s_articles_attributes', 'display_product', 'boolean', [
            'label' 			=> 'Display product without checking stock',
            'supportText' 		=> 'If check this field, the product will be shown on the front page without checking the stock.',
            'helpText' 			=> 'It is displayed when checked. Otherwise it will disappear.',
            'translatable' 		=> true,
            'displayInBackend' 	=> true,
            'position' 			=> 4
        ]);
    }
    
    public function uninstall(UninstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');
        $service->delete('s_articles_attributes', 'display_product');
    }
}
