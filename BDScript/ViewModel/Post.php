<?php

namespace Perspective\BDScript\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Post implements ArgumentInterface
{
    private $_postFactory;


    public function __construct(\Perspective\BDScript\Model\PostFactory $postFactory) 
    {
        $this->_postFactory = $postFactory;
    }


    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();


        return $collection;
    }
}
