<?php
class Estdevs_Clothing_Model_Observer
{

		public function addcustomoptions(Varien_Event_Observer $observer)
			{
				
				$product = $observer->getProduct();	
				 $options = $product->getProductOptions();
		            if ($options) {
		                foreach ($options as $option) {
		                     echo $option['title'];
		                    if ($option['title'] == 'Do you want stitiching ?') {
		                        //we've already added the option
		                        return;
		                    }
		                     
		                }
		            }
		            // foreach ($optionsArray as $option) {
		                 $optionvalue[0]['title']      = 'Yes';
		                $optionvalue[0]['price']      = 0;
		                $optionvalue[0]['price_type'] = 'fixed';
		                $optionvalue[0]['sku']        = '';
		                $optionvalue[0]['sort_order'] = 0;
		
		                     $optionvalue[1]['title']      = 'No';
		                $optionvalue[1]['price']      = 0;
		                $optionvalue[1]['price_type'] = 'fixed';
		                $optionvalue[1]['sku']        = '';
		                $optionvalue[1]['sort_order'] = 0;
		                // echo "<pre>";
		                // print_r($optionvalue);
		
		                // die;
		
		                 $option = array(
		                'title' => 'Do you want stitiching ?',
		                'type' => 'radio', // could be drop_down ,checkbox , multiple
		                'is_require' => 1,
		                'sort_order' => 0,
		                'customcss'=>'wow',
		                'values' => $optionvalue
		            );
		              $product->setCanSaveCustomOptions(true);
			               
			                    $product->getOptionInstance()->addOption($option);
			               // }
			                 
			                $product->setHasOptions(true);
					          // die;  
		            
		            // $product->save();
		            
		            
		           
			}
		
}
