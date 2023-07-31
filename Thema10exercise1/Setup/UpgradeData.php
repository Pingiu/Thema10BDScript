<?php
namespace Perspective\Thema10exercise1\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_reviewFactory;

    /**
     * @var \Magento\Review\Model\ResourceModel\Review\CollectionFactory
     */
    private $collectionFactory;


    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface 
     */
    private $_productRepository;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface 
     */
    private $_customerRepositoryInterface;

    public function __construct(\Perspective\Thema10exercise1\Model\ReviewFactory $reviewFactory,
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $collectionFactory,

        \Magento\Catalog\Api\ProductRepositoryInterface  $productRepository,
        \Magento\Customer\Api\CustomerRepositoryInterface  $customerRepositoryInterface)
    {

        $this->_reviewFactory = $reviewFactory;
        $this->collectionFactory = $collectionFactory;
        $this->_productRepository = $productRepository;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    

    public function getProduct($sku)
    {

        return $this->_productRepository->get($sku)->getId();
    }

    public function Review($id)
    {   $collection = $this->collectionFactory->create()->addEntityFilter(
        'product',
        $id);
        foreach($collection as $detail)
        {
        $detail = $detail->getDetail();
        }
        return $detail;
    }
    public function getCustomer($customerId)
    {
        $customer = $this->_customerRepositoryInterface->getById($customerId);
        return $customer;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $sku = ["24-MB01","WJ06","24-MB04","WJ09"];
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
        foreach($sku as $sk){
        $id = $this->getProduct($sk);
        $customerId = rand(1,3);
        
        $data = ['IDProd' => $id,
        'TextRev'=> "Rev ".$id." ".$this->Review($id),
        'Name'=> $this->getCustomer($customerId)->getFirstname(),
        'Email'=> $this->getCustomer($customerId)->getEmail(),
        ];
        $post = $this->_reviewFactory->create();
        $post->addData($data)->save();
        }
        }
        
    }
}