<?php
namespace Perspective\BDScript\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{


    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Perspective\BDScript\Model\Post', 'Perspective\BDScript\Model\ResourceModel\Post');
    }
}
