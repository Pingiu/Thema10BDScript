<?php
namespace Perspective\Thema10exercise1\Setup;


class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('Review')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('Review')
            )
                ->addColumn(
                    'ID',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,      'primary'  => true,
                        'unsigned' => true,
                    ],
                    'ID Review'
                )
                ->addColumn(
                    'IDProd',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'IDProd'
                )->addColumn(
                    'TextRev',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'TextRev'
                )
                ->addColumn(
                    'DataRev',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'DataRev'
                )
                ->addColumn(
                    'Name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Name Customer'
                )
                ->addColumn(
                    'Email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Email Customer'
                )->setComment('Review Table');
            $installer->getConnection()->createTable($table);
            $installer->getConnection()->addIndex(
                $installer->getTable('Review'),
                $setup->getIdxName(
                    $installer->getTable('Review'),
                    ['IDProd', 'TextRev', 'Name', 'Email'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['IDProd', 'TextRev', 'Name', 'Email'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
