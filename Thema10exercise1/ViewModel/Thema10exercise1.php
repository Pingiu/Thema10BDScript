<?php
namespace Perspective\Thema10exercise1\ViewModel;

class Thema10exercise1 implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    private $_reviewFactory;


    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $_productCollectionFactory;

    /**
     * @var \Magento\Catalog\Model\ProductFactory 
     */
    private $_productFactory;

    public function __construct(\Perspective\Thema10exercise1\Model\ReviewFactory $reviewFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\ProductFactory  $productFactory) 
    {
        $this->_reviewFactory = $reviewFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
    }
    
    public function getReviewCollection()
    {
        $review = $this->_reviewFactory->create();
        $collection = $review->getCollection();
        //$collection->addFieldToFilter('Name', ['like' => 'Maxim']);

        return $collection;
    }

    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }
    public function getProductImages($productId) {
        $_product = $this->_productFactory->create()->load($productId);
        $productImages = $_product->getMediaGalleryImages();
        return $productImages;
    }
}
