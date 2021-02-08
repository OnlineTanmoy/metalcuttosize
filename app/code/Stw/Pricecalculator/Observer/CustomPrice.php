<?php
    /**
     * Webkul Hello CustomPrice Observer
     *
     * @category    Webkul
     * @package     Webkul_Hello
     * @author      Webkul Software Private Limited
     *
     */
    namespace Stw\pricecalculator\Observer;
 
    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
 
    class CustomPrice implements ObserverInterface
    {   

        public function __construct(
                \Magento\Framework\App\RequestInterface $request
            )
            {
                $this->_request = $request;
            }
        public function execute(\Magento\Framework\Event\Observer $observer) {
            $item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
               $price =  $this->_request->getParam('custom_price');
			   $qty = $this->_request->getParam('qty');
               $custom_option_price =  $this->_request->getParam('custom_option_price');
               $advanced_custom_option_price =  $this->_request->getParam('advanced_custom_option_price');
               $finl_pp = $price;
               if(!empty($custom_option_price))
               {
                $finl_pp = $finl_pp + $custom_option_price; 
               }
               if(!empty($advanced_custom_option_price))
               {
                $finl_pp = $finl_pp + $advanced_custom_option_price; 
               }
			   $final_ = $qty *  $finl_pp;

               

          /*      $additionalOptions =  $this->_request->getParam('additionalOptions');
               if(!empty($custom_option_price))
               { $product = $item->getProduct();
                  
                   // $item->getProduct()->addCustomOption('additional_options', serialize($additionalOptions));
                    if (!$optionsProduct) {
            $product->addCustomOption('additional_options', serialize($additionalOptions));
        }
                }*/


           // $price = 100; //set your price here
            /* $pro_id = $item->getProduct()->getId();
                $product_1 = $objectManager->create('Magento\Catalog\Model\Product')->load($proid);
                $price = $product_1->getData('Calculated_price');*/
               // echo "price  -  -  -".$price;
    $item->setCustomPrice($final_);
            $item->setOriginalCustomPrice($final_);
            $item->getProduct()->setIsSuperMode(true);

          /*  $pro_id = $item->getProduct()->getId();


            $abc = $this->update_value($pro_id);*/
/**/


        }
    /*    public function update_value($proid)
        {
                $price1 = 0;
               
                $product_1->setPrice($price1);
                $product_1->save();
        }*/
 
    }