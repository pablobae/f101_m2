<?php

namespace Pablobaenas\PickupSystem\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('pablobaenas_pickup_system')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('pablobaenas_pickup_system')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Pickup Point ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Name'
                )
                ->addColumn(
                    'latitude',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '10,8',
                    [
                        'nullable' => false,
                    ],
                    'Latitude'
                )
                ->addColumn(
                    'longitude',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '11,8',
                    [
                        'nullable' => false,
                    ],
                    'Longitude'
                )
                ->addColumn(
                    'shipping_method',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Shipping Method'
                )
                ->addColumn(
                    'status',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    255,
                    [
                        'nullable' => false,
                        'default' => true
                    ],
                    'Shipping Method'
                )
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT
                    ],
                    'Created At'
                )->addColumn(
                    'updated_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE
                    ],
                    'Updated At'
                )
                ->setComment('Pickup System Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
