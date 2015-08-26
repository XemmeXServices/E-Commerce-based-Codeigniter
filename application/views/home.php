<?php 
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Home view to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */
echo modules::run('_main/top');
?>
	
<?php
if (!empty($content['body'])){
	echo  $content['body'];
}else{
	echo '<p style="text-align: center;">- Content Here -</p>';
}
?>	

<?php echo modules::run('_main/bottom'); ?>