<?php
class Estdevs_Clothing_Model_Observer
{

			public function addcustomoptions(Varien_Event_Observer $observer)
			{
				$product = $observer->getProduct();	
				 $options = $product->getProductOptions();
		            if ($options) {
		                foreach ($options as $option) {
		                     
		                    if ($option['title'] == 'Adult' || $option['title'] == 'Child') {
		                        //we've already added the option
		                        return;
		                    }
		                     
		                }
		            }
		            $adult         = $product->getAdult(); /* this is my custom attribute to get value */
		            $adultPrice    = $product->getAdultPrice();  /* this is my custom attribute to get value */
		            $child         = $product->getChild();  /* this is my custom attribute to get value */
		            $childPrice    = $product->getChildPrice();  /* this is my custom attribute to get value */
		            $isRequired    = array(
		                1,
		                0
		            );
		            $optionTitle   = array(
		                'Adult',
		                'Child'
		            );
		            $optionPrice   = array(
		                $adultPrice,
		                $childPrice
		            );
		            $adultchildFor = array(
		                $adult,
		                $child
		            );
		            $optionsArray  = $this->getOptions($optionTitle, 'drop_down', $adultchildFor, $optionPrice, $isRequired);
		            try {
		                $product->setCanSaveCustomOptions(true);
		                foreach ($optionsArray as $option) {
		                    $product->getOptionInstance()->addOption($option);
		                }
		                 
		                $product->setHasOptions(true);
		            }
		            catch (Exception $e) {
		                Mage::Log($e->getMessage());
		            }
			}
			 protected function getOptions($title = '', $type = '', $adultchildFor, $optionPrice, $isRequired)
    {
         
        if (is_array($title)) {
            $j = 0;
            foreach ($title as $ttl) {
                $option[$j]               = array();
                $optionvalue              = array();
                $option[$j]['title']      = $ttl;
                $option[$j]['type']       = $type;
                $option[$j]['is_require'] = $isRequired[$j];
                $option[$j]['sort_order'] = $j;
                for ($i = 1; $i <= $adultchildFor[$j]; $i++) {
                    $optionvalue[$i]['title']      = $i;
                    $optionvalue[$i]['price']      = $i * $optionPrice[$j];
                    $optionvalue[$i]['price_type'] = 'fixed';
                    $optionvalue[$i]['sku']        = '';
                    $optionvalue[$i]['sort_order'] = $i;
                     
                }
                $option[$j]['values'] = $optionvalue;
                $j++;
            }
        } else {
            $optionvalue = array();
            for ($i = 1; $i <= $for; $i++) {
                $optionvalue[$i]['title']      = $i;
                $optionvalue[$i]['price']      = $i * $price;
                $optionvalue[$i]['price_type'] = 'fixed';
                $optionvalue[$i]['sku']        = '';
                $optionvalue[$i]['sort_order'] = $i;
            }
            $option = array(
                'title' => (string) $title,
                'type' => $type, // could be drop_down ,checkbox , multiple
                'is_require' => $isrequired,
                'sort_order' => 0,
                'values' => $optionvalue
            );
             
             
        }
        return $option;
    }
		
}
