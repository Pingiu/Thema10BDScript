<?php
namespace Perspective\Thema10exercise1\Model\ResourceModel\Review;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{


    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Perspective\Thema10exercise1\Model\Review', 'Perspective\Thema10exercise1\Model\ResourceModel\Review');
    }
}
