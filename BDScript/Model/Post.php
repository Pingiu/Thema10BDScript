<?php
namespace Perspective\BDScript\Model;

class Post extends \Magento\Framework\Model\AbstractModel{
    
    protected function _construct()
    {
    $this->_init('Perspective\BDScript\Model\ResourceModel\Post');
    }
    }
