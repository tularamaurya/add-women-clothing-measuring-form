<?php
class Estdevs_Clothing_Model_Observer
{

			public function addcustomoptions(Varien_Event_Observer $observer)
			{
				$product = $observer->getProduct();	
				 $options = $product->getProductOptions();
		            if ($options) {
		                foreach ($options as $option) {
		                     
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
		                'type' => 'drop_down', // could be drop_down ,checkbox , multiple
		                'is_require' => 0,
		                'sort_order' => 0,
		                'values' => $optionvalue
		            );
		             try {
			                $product->setCanSaveCustomOptions(true);
			               
			                    $product->getOptionInstance()->addOption($option);
			               // }
			                 
			                $product->setHasOptions(true);
			            }
			            catch (Exception $e) {
			                Mage::Log($e->getMessage());
			            }
					            
		            
		            
		            
		            
		           
			}
		
		
}
