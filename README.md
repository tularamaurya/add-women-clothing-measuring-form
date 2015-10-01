# addoption
<b>Plugin Installation</b></br>
1. Create an attibute "addcustomoption"  type Yes/No</br>
2. Download the plugin</br>
3. Extract the plugin and place the files in respective folders</br>
4. Now create new product and check the attibute "addcustomoption"</br>
5. 
$installer = $this;
$installer->startSetup();
$installer->run("
    ALTER TABLE `catalog_product_option` ADD
    `custom_css` text");
$installer->endSetup();


Custom Option</br>
1. Do you want stitiching ?        type radio  button  required </br>
Yes / NO</br>

2. size selection      dropdown   (standard , customize)</br>
3. size attibute
4. cutome-size   type textarea (hidden)

