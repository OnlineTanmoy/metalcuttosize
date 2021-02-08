<?php
namespace Magiccart\Lookbook\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    
    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        if (version_compare($context->getVersion(), "1.0.0", "<")) {
        //Your upgrade script
        }
        if (version_compare($context->getVersion(), '2.2.1', '<')) {
          $installer->getConnection()->addColumn(
                $installer->getTable('magiccart_lookbook'),
                'content',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 1024,
                    'nullable' => true,
                    'comment' => 'content'
                ]
            );
        }
        $installer->endSetup();
    }
}