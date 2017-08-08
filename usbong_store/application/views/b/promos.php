<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="Image-offers">
	<img class="Image-offers-save-more" src="<?php echo base_url('assets/images/usbongOffersBuyMoreSaveMore.jpg')?>">
	<br>	
	<a class="Request-link" href="<?php echo site_url('sell/')?>"><img class="Image-offers-buy-back" src="<?php echo base_url('assets/images/usbongOffersBuyBack.jpg')?>"></a>
	<br>
	<a class="Request-link" href="<?php echo site_url('request/')?>"><img class="Image-offers-buy-back" src="<?php echo base_url('assets/images/usbongOffersRequest.jpg')?>"></a>
	</div>

	<h2 class="header">Promos</h2>
	<br>
	<div class="container">
	<?php
			$colCounter = 0;
			foreach ($promos as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
												  		str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',													
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',															
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						echo '</label>';					
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if ($colCounter==5) {
						echo '</div>';
						$colCounter=0;
					}
				}/*
				else {
					echo '</div>';
					$colCounter=0;
				}*/
			}
			echo '</div>';
	?>
	</div>	
</body>
</html>
