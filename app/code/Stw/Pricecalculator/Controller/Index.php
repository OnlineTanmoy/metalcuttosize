<?php


    /**
     * Webkul Hello CustomPrice Observer
     *
     * @category    Webkul
     * @package     Webkul_Hello
     * @author      Webkul Software Private Limited
     *
     */
    namespace Stw\Pricecalculator\Controller\Index;
 
    use Magento\Framework\App\RequestInterface;
     use Magento\Framework\Controller\ResultFactory;


 
class Index extends \Magento\Framework\App\Action\Action
{
     /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;


    /**     * @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,        \Magento\Catalog\Model\ProductFactory $productFactory) {
        $this->resultPageFactory = $resultPageFactory;
                $this->productFactory = $productFactory;

        parent::__construct($context);
    }

        /* Get Label by option id */
    public function getOptionLabelByValue($attributeCode,$optionId)
    {
        $_product = $this->productFactory->create();
        $isAttributeExist = $_product->getResource()->getAttribute($attributeCode); 
        $optionText = '';
        if ($isAttributeExist && $isAttributeExist->usesSource()) {
            $optionText = $isAttributeExist->getSource()->getOptionText($optionId);
        }
        return $optionText;
    }
    public function execute()
    {

          $_objectManager = \Magento\Framework\App\ObjectManager::getInstance(); //instance of\Magento\Framework\App\ObjectManager
          $resultPage = $this->resultPageFactory->create();
          $post = $this->getRequest()->getPostValue();

          $productid = $post['productid'];
          $selected_product_id = $post['selected_product_id'];
			echo $shape = $post['shape']; exit;
      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productid);
      $product_weight = $product->getData('weight');
      $product_price = $product->getData('default_price');

      $sproduct = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
      $product_weight = $sproduct->getData('weight');
      $product_price = $sproduct->getData('default_price');


      $type =  $product->getResource()->getAttribute('material_type')->getFrontend()->getValue($product); 
      $metal =  $product->getResource()->getAttribute('metal')->getFrontend()->getValue($product);
      $d_length =  $product->getResource()->getAttribute('length')->getFrontend()->getValue($sproduct);
      $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
/*******************  Sheet  ***************************/
      if($type == "Sheet" && $metal == "Aluminium" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
          if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
          {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_sheet/alu_sheet'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_sheet1/p_sheet');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else { // $msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;        
			if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
      if($type == "Sheet" && $metal == "Brass" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_sheet/bras_sheet'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_sheet1/p_sheet');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;  
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
	         if($type == "Sheet" && $metal == "Mild Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_sheet/mid_sheet'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_sheet1/p_sheet');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  
			if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }			
			
                           $data = array(  'msg' => $msg, 'status' => false);}
       }
	         if($type == "Sheet" && $metal == "Copper" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
            if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_sheet/cop_sheet'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_sheet1/p_sheet');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;  
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}

       }
	   if($type == "Sheet" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_sheet/steel_sheet'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_sheet1/p_sheet');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;   
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
     }
/*******************  Sheet END  ***************************/

/*******************  Spashblack   ***************************/
      if($type == "splashback" && $metal == "Aluminium" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
          if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
          {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_splashback/alu_splashback'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_splashback1/p_splashback');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width; 
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
      if($type == "Splashback" && $metal == "Brass" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_splashback/bras_splashback'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_splashback1/p_splashback');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else { // $msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width; 
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
           if($type == "Splashback" && $metal == "Mild Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_splashback/mid_splashback'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_splashback1/p_splashback');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
			
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
           if($type == "Splashback" && $metal == "Copper" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
            if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_splashback/cop_splashback'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_splashback1/p_splashback');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width; 
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
					
                           $data = array(  'msg' => $msg,
                  'status' => false);}

       }
     if($type == "Splashback" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_splashback/steel_splashback'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_splashback1/p_splashback');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width; 
					if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
     }
/*******************  Splashbak  END  ***************************/


/*******************  Trade Plate  ***************************/
      if($type == "Tread Plate" && $metal == "Aluminium" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
          if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
          {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_treadplate/alu_treadplate'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_treadplate1/p_treadplate');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else { // $msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;   
					if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
			
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
      if($type == "Tread Plate" && $metal == "Brass" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick'];$shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_treadplate/bras_treadplate'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_treadplate1/p_treadplate');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;  
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
           if($type == "Tread Plate" && $metal == "Mild Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick']; $shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_treadplate/mid_treadplate'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_treadplate1/p_treadplate');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else { // $msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;   
					if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
       }
           if($type == "Tread Plate" && $metal == "Copper" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick']; $shape = $post['shape'];
            if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_treadplate/cop_treadplate'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_treadplate1/p_treadplate');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else { // $msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;  
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}

       }
     if($type == "Tread Plate" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000; // echo "  length";
          $width = $post['width'];  $mtr_width = $width / 1000; //echo "  width";
          $thick = $post['thick']; $shape = $post['shape'];
           if( ($length >= 100 && $length <= $d_length) && ($width >= 100 && $width <= $d_width))
            {
            if( $d_length == $length &&  $d_width == $width)
                {
                 $final_price = $product_price;
            }else {         
                $steel_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_treadplate/steel_treadplate'); 
                $price_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_treadplate1/p_treadplate');               
                $sheet_weight = $mtr_length * $mtr_width * (float)$thick * (float)$steel_sheet_form_value;

                $final_price = $sheet_weight/$product_weight * ($price_sheet_form_value*$product_price);                
                  }
                $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
            } else {  //$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    
						if($shape == "Circle"){
					$msg = " Diameter should be between 100 - ".$d_length;  // Width should be between 100 - " .$d_width
			} else if($shape == "Square") {
				$msg = " Width should be between 100 - " .$d_width;  //Length should be between 100 - ".$d_length."
			} else { 	$msg = "Length should be between 100 - ".$d_length." Width should be between 100 - " .$d_width;    }	
                           $data = array(  'msg' => $msg,
                  'status' => false);}
     }
/*******************  Tread PLate END  ***************************/




      if($type == "Angle" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {            
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {
                $angle_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_angle/s_angle'); 
                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_angle1/p_angle');               
                $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $calulte *  $d_thick * $mtr_length * $angle_sheet_form_value; 
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }
	       if($type == "Angle" && $metal == "Mild Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {            
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {
                $angle_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_angle/mid_angle'); 
                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_angle1/p_angle');               
                $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $calulte *  $d_thick * $mtr_length * $angle_sheet_form_value; 
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }
	       if($type == "Angle" && $metal == "Copper" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {            
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {
                $angle_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_angle/cop_angle'); 
                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_angle1/p_angle');               
                $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $calulte *  $d_thick * $mtr_length * $angle_sheet_form_value; 
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }
	       if($type == "Angle" && $metal == "Brass" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {            
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {
                $angle_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_angle/bras_angle'); 
                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_angle1/p_angle');               
                $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $calulte *  $d_thick * $mtr_length * $angle_sheet_form_value; 
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }
	 	       if($type == "Angle" && $metal == "Aluminium" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {            
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {
                $angle_sheet_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_angle/alu_angle'); 
                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_angle1/p_angle');               
                $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $calulte *  $d_thick * $mtr_length * $angle_sheet_form_value; 
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }

/******** Round TUbe *********************/
      if($type == "Round Tube" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
          $d_odthick =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
          $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct); 
           if( ($length >= 100 && $length <= $d_length))
            {           
				      if( $d_length == $length)
				        {
                          $final_price = $product_price;
				        }else {
                    $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_tube/steel_round_tube'); 

                    $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_tube1/p_round_tube');               
                    $angle_weight =  (float)$d_odthick *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; 
                    $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
                  }
                      $final_price1 = number_format((float)$final_price, 2, '.', '');          
                           $data = array(  'price' => $final_price1, 'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;       
                           $data = array(  'msg' => $msg, 'status' => false); }
     }
	 /*      if($type == "Round Tube" && $metal == "Mild Steel" )
			{
				   $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
          $d_odthick =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);

						 $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

				   if( ($length >= 100 && $length <= $d_length))
					{           
						if( $d_length == $length)
						{
							 $final_price = $product_price;
						}else {
						$angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_tube/mid_round_tube'); 

						$price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_tube1/p_round_tube');               
          $angle_weight =  $d_odthick *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800


            //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
												//  echo  "angle weight ".$angle_weight;
						$final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
					  }
					 $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
								   $data = array(  'price' => $final_price1,
						  'status' => true);
					 } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
								   $data = array(  'msg' => $msg,
						  'status' => false); }
			}
			if($type == "Round Tube" && $metal == "Aluminium" )
			{
					$length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
          $d_odthick =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);

					$d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

					if( ($length >= 100 && $length <= $d_length))
					{           
					if( $d_length == $length)
					{
					$final_price = $product_price;
					}else {
        $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_tube/alu_round_tube'); 

            $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_tube1/p_round_tube');               
          $angle_weight =  $d_odthick *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side 
					$final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
					}
					$final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
					   $data = array(  'price' => $final_price1,
					'status' => true);
					} else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
					   $data = array(  'msg' => $msg,
					'status' => false); }
			}
			if($type == "Round Tube" && $metal == "Brass" )
			{
					$length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

					$d_odthick =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
            $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
            //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

					if( ($length >= 100 && $length <= $d_length))
					{           
					if( $d_length == $length)
					{
					$final_price = $product_price;
					}else {
				    $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_tube/brass_round_tube'); 

            $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_tube1/p_round_tube');              
					$angle_weight =  $d_odthick *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
									//  echo  "angle weight ".$angle_weight;
					$final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
					}
					$final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
					   $data = array(  'price' => $final_price1,
					'status' => true);
					} else {  $msg = "Length should be between 100 - ".$d_length;            
					   $data = array(  'msg' => $msg,
					'status' => false); }
			}
			if($type == "Round Tube" && $metal == "Copper" )
			{
					$length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
          $d_odthick =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);

					$d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

					if( ($length >= 100 && $length <= $d_length))
					{           
					if( $d_length == $length)
					{
					$final_price = $product_price;
					}else {
				     $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_tube/cop_round_tube'); 

              $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_tube1/p_round_tube'); OD-wall thickness)×wall thickness(mm)×length(m)           
            $angle_weight =  $d_odthick *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side 
					   $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
					}
					$final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
					   $data = array(  'price' => $final_price1,
					'status' => true);
					} else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
					   $data = array(  'msg' => $msg,
					'status' => false); }
			}*/
	/******** Round Tube  End *********************/
 
/******** Round Bar *********************/
      if($type == "Round Bar" && $metal == "Stainless Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

                 $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {           
        if( $d_length == $length)
        {
                     $final_price = $product_price;
        }else {
                $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_bar/steel__round_bar'); 

                $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_bar1/p_round_bar');               
                $angle_weight =  $d_diameter *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                                        //  echo  "angle weight ".$angle_weight;
                $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }
     }
         if($type == "Round Bar" && $metal == "Mild Steel" )
      {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

             $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
          {           
            if( $d_length == $length)
            {
               $final_price = $product_price;
            }else {
            $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_bar/mid_round_bar'); 

            $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_bar1/p_round_bar');               
            $angle_weight =  $d_diameter *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                        //  echo  "angle weight ".$angle_weight;
            $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
            }
           $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                   $data = array(  'price' => $final_price1,
              'status' => true);
           } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                   $data = array(  'msg' => $msg,
              'status' => false); }
      }
      if($type == "Round Bar" && $metal == "Aluminium" )
      {
          $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

          $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

          if( ($length >= 100 && $length <= $d_length))
          {           
          if( $d_length == $length)
          {
          $final_price = $product_price;
          }else {
          $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_bar/alu_round_bar'); 

          $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_bar1/p_round_bar');               
          $angle_weight =  $d_diameter *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                  //  echo  "angle weight ".$angle_weight;
          $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
          }
          $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
             $data = array(  'price' => $final_price1,
          'status' => true);
          } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
             $data = array(  'msg' => $msg,
          'status' => false); }
      }
      if($type == "Round Bar" && $metal == "Brass" )
      {
          $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

          $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

          if( ($length >= 100 && $length <= $d_length))
          {           
          if( $d_length == $length)
          {
          $final_price = $product_price;
          }else {
          $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_bar/bras_round_bar'); 

          $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_bar1/p_round_bar');               
          $angle_weight =  $d_diameter *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                  //  echo  "angle weight ".$angle_weight;
          $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
          }
          $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
             $data = array(  'price' => $final_price1,
          'status' => true);
          } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
             $data = array(  'msg' => $msg,
          'status' => false); }
      }
      if($type == "Round Bar" && $metal == "Copper" )
      {
          $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;

          $d_diameter =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

          if( ($length >= 100 && $length <= $d_length))
          {           
          if( $d_length == $length)
          {
          $final_price = $product_price;
          }else {
          $angle_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_round_bar/cop_round_bar'); 

          $price_angle_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_round_bar1/p_round_bar');               
          $angle_weight =  $d_diameter *  $d_diameter * $mtr_length * (float)$angle_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                  //  echo  "angle weight ".$angle_weight;
          $final_price = $angle_weight/$product_weight * ($price_angle_form_value * $product_price); //1.12
          }
          $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
             $data = array(  'price' => $final_price1,
          'status' => true);
          } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
             $data = array(  'msg' => $msg,
          'status' => false); }
      }
  /******** Round Bar  End *********************/	 

	/******** Square Bar *********************/
 
	 
        if($type == "Square Bar" && $metal == "Mild Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_bar/midsteel_square_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_bar1/p_square_bar');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $d_width *  $d_width * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12
                $simple_product = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }

		}   
        if($type == "Square Bar" && $metal == "Stainless Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_bar/steel_square_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_bar1/p_square_bar');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $d_width *  $d_width * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12
                $simple_product = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }

		} 
        if($type == "Square Bar" && $metal == "Aluminium" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_bar/alu_square_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_bar1/p_square_bar');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $d_width *  $d_width * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12
                $simple_product = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }

		}  
        if($type == "Square Bar" && $metal == "Copper" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_bar/cop_square_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_bar1/p_square_bar');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $d_width *  $d_width * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12
                $simple_product = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }

		}
        if($type == "Square Bar" && $metal == "Brass" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);  //echo  "d_thick  price".$d_thick;  echo  "d_width price".$d_width;

           if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_bar/bras_square_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_bar1/p_square_bar');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  $d_width *  $d_width * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12
                $simple_product = $objectManager->create('Magento\Catalog\Model\Product')->load($selected_product_id);
                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,
                  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,
                  'status' => false); }

		}  		
/******** Square Bar End *********************/

/******** Square TUbe  *********************/
		
		if($type == "Square Tube" && $metal == "Aluminium" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
                 $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_tube/alu_square_tube'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_tube1/p_square_tube');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  (2*$d_width)* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,'status' => false); }

		}
		if($type == "Square Tube" && $metal == "Mild Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
                 $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_tube/mid_square_tube'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_tube1/p_square_tube');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  (2*$d_width)* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,'status' => false); }

		}
		if($type == "Square Tube" && $metal == "Copper" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
                 $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_tube/cop_square_tube'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_tube1/p_square_tube');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  (2*$d_width)* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,'status' => false); }

		}
		if($type == "Square Tube" && $metal == "Brass" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
                 $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_tube/bras_square_tube'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_tube1/p_square_tube');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  (2*$d_width)* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,'status' => false); }

		}
		if($type == "Square Tube" && $metal == "Stainless Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
                 $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
                 $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {          
				if( $d_length == $length)
				{
                     $final_price = $product_price;
				}else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_square_tube/steel_square_tube'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_square_tube1/p_square_tube');               
               // $calulte = ($d_width * 2) -  $d_thick;
                $angle_weight =  (2*$d_width)* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; 
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg,'status' => false); }

		}		
/******** Square TUbe End  *********************/

/******** Hexagon  *********************/
	 
		if($type == "Hexagon" && $metal == "Stainless Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_hexagon/steel_hexagon'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_hexagon1/p_hexagon');               
                $angle_weight =  $d_thick* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
		}
		if($type == "Hexagon" && $metal == "Mild Steel" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_hexagon/mid_hexagon'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_hexagon1/p_hexagon');               
                $angle_weight =  $d_thick* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
		}
		if($type == "Hexagon" && $metal == "Aluminium" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_hexagon/alu_hexagon'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_hexagon1/p_hexagon');               
                $angle_weight =  $d_thick* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
		}
		if($type == "Hexagon" && $metal == "Copper" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_hexagon/cop_hexagon'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_hexagon1/p_hexagon');               
                $angle_weight =  $d_thick* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
		}
		if($type == "Hexagon" && $metal == "Brass" )
		{
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
			if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_hexagon/bras_hexagon'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_hexagon1/p_hexagon');               
                $angle_weight =  $d_thick* $d_thick * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
		}		
/******** Hexagon End  *********************/


/******** Flat Bar  *********************/
   
    if($type == "Flat bar" && $metal == "Stainless Steel" )
    {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
      if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_flat_bar/steel_flat_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_flat_bar1/p_flat_bar');               
                $angle_weight =  $d_thick* $d_width * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
    }
    if($type == "Flat bar" && $metal == "Mild Steel" )
    {
            $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
      if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_flat_bar/mid_flat_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_flat_bar1/p_flat_bar');               
                $angle_weight =  $d_thick* $d_width * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
    }
    if($type == "Flat bar" && $metal == "Aluminium" )
    {
            $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
      if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_flat_bar/alu_flat_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_flat_bar1/p_flat_bar');               
                $angle_weight =  $d_thick* $d_width * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
    }
    if($type == "Flat bar" && $metal == "Copper" )
    {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
      if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_flat_bar/copper_flat_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_flat_bar1/p_flat_bar');               
                $angle_weight =  $d_thick* $d_width * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
    }
    if($type == "Flat bar" && $metal == "Brass" )
    {
           $length = $post['length'];   $mtr_length = $length / 1000;  //echo "  length".$mtr_length;
           $d_thick =  $product->getResource()->getAttribute('thick')->getFrontend()->getValue($sproduct);
           $d_width =  $product->getResource()->getAttribute('width')->getFrontend()->getValue($sproduct);
      if( ($length >= 100 && $length <= $d_length))
            {    if( $d_length == $length)
              {
                     $final_price = $product_price;
               }else {         
                $sbar_sheet_form_value1 = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian/f_flat_bar/bras_flat_bar'); 
                $price_sbar_form_value = $_objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('sleekaccordian1/f_flat_bar1/p_flat_bar');               
                $angle_weight =  $d_thick* $d_width * $mtr_length * (float)$sbar_sheet_form_value1; //(side width ×2 - thickness) ×thickness ×length(m) ×0.00800
                $final_price = $angle_weight/$product_weight * ($price_sbar_form_value * $product_price); //1.12                      
              }
             $final_price1 = number_format((float)$final_price, 2, '.', '');              //  echo  "final price".$final_price;
                           $data = array(  'price' => $final_price1,  'status' => true);
             } else {  $msg = "Length should be between 100 - ".$d_length;            //  echo  "final price".$final_price;
                           $data = array(  'msg' => $msg, 'status' => false); }
    }   
/******** flat bar End  *********************/



      
      $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
      $resultJson->setData($data);
      return $resultJson;

       exit;


    } 
}