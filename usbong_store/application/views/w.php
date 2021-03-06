<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
<?php 
			$reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($merchant_categories)['product_type_name'])); //remove ":" and "'"
			$URLFriendlyReformattedCategoryName = str_replace("(","",
					str_replace(")","",
					str_replace("&","and",
					str_replace(',','',
					str_replace(' ','-',
					str_replace('/','-',
					$reformattedCategoryName)))))); //replace "&", " ", and "-"									
?>
	<h3 class="header">
	<?php 
		switch($result->product_type_id) {
			case 10: //childrens
				echo "Children's Books";			
				break;
			case 12: //miscellaneous
				echo "Miscellaneous Items";
				break;
			default:				
				echo $result->product_type_name; 
				break;
		}
	?>
	</h3>	
	<br>
	<div class="container-product-item">
		<div class="row">
			<div class="col-sm-2 Merchant-category">
			<?php 
				echo '<div class="row Merchant-category-image"><a href="'.site_url('b/'.strtolower($URLFriendlyReformattedCategoryName).'/'.$result->merchant_id).'"><img class="" src="'.base_url('assets/images/merchants/'.$result->merchant_name.'.jpg').'"></a></div>';
				
				foreach ($merchant_categories as $value) {
					$fileFriendlyCategoryName = str_replace("'","",
							str_replace(" & ","_and_",
									strtolower($value['product_type_name'])));
					echo '<div class="row Merchant-category-content"><a class="Merchant-category-content-link" href="'.site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']).'">'.strtoupper($value['product_type_name']).'</a></div>';
				}						
			?>
			</div>
			<div class="col-sm-3">	
				<?php 					
					$reformattedProductName = str_replace(':','',str_replace('\'','',$result->name)); //remove ":" and "'"
					$URLFriendlyReformattedProductName = str_replace("(","",
					str_replace(")","",
					str_replace("&","and",
					str_replace(',','',
					str_replace(' ','-',
					str_replace('/','-',
					$reformattedProductName)))))); //replace "&", " ", and "-"
					
					
					$productType="books"; //default
//					$canSellBack=false; //added by Mike, 20180304
					switch($result->product_type_id) {
						case 3: //beverages
							$productType="beverages";
							break;
						case 13: //medical
							$productType="medical";
							break;						
						case 5: //combos/promos
							$productType="promos";
							break;
						case 6: //comics
							$productType="comics";
							break;
						case 7: //manga
							$productType="manga";
							break;
						case 8: //toys & collectibles
							$productType="toys_and_collectibles";
							break;
						case 9: //textbooks
							$productType="textbooks";
							break;						
						case 10: //childrens
							$productType="childrens";
							break;
						case 11: //food
							$productType="food";
							break;						
						case 12: //miscellaneous
							$productType="miscellaneous";
							break;						
					}
				?>
				<img class="Product-image" src="<?php echo base_url('assets/images/'.$productType.'/'.$reformattedProductName.'.jpg');?>">				
				<?php
				
				//added by Mike, 20180402
				if (isset($result->is_essential_reading) && ($result->is_essential_reading)) {
					echo '<img class="Product-image-essential-reading" src="'.base_url('assets/images/essential_reading.png').'">';
				}
				
				if (($productType=="books") || ($productType=="childrens") || ($productType=="textbooks")
							|| ($productType=="manga") || ($productType=="comics")) {
				?>						
				<div class="row Product-format">
					<?php
						echo 'Format: <b>'.$result->format.'</b>';						
					?>
				</div>					
				<div class="row Product-condition">
					<?php
						echo 'Condition: <b>'.$result->description.'</b>';						
					?>
				</div>
				<div class="row Product-language">
					<?php
						echo 'Language: <b>'.$result->language.'</b>';						
					?>
				</div>
				<div class="row Product-publisher">
					<?php
						if (isset($result->publisher) && (strcmp(trim($result->publisher),'')!=0)) {
							echo 'Publisher: <b>'.$result->publisher.'</b>';						
						}
						else {
//							echo 'Publisher: <b>N/A</b>';							
						}
					?>
				</div>
				<div class="row Product-released_date">
					<?php
						if (isset($result->released_date) && (strcmp(trim($result->released_date),'')!=0)) {
							echo 'Released Date: <b>'.$result->released_date.'</b>';						
						}
						else {
//							echo 'Publisher: <b>N/A</b>';							
						}
					?>
				</div>
				<div class="row Product-pages">
					<?php
					if (isset($result->pages)) {
						echo 'Pages: <b>'.$result->pages.'</b>';					
					}
					?>
				</div>
			<?php 	
				}
			?>
			</div>
			<div class="col-sm-4">	
				<div class="row Product-name">
					<?php
						echo $result->name;
					?>
				</div>
				<div class="row Product-author">
					<b>
					<?php
						echo $result->author;
					?>
					</b>
				</div>				
				<div class="row">	
					<div class="Product-overview-header"><b>Product Overview</b><br></div>
					<div class="Product-overview-content">
					<?php	
						if (!empty($result->product_overview) && (strcmp($result->product_overview, "<p>&nbsp;</p>")!=0)) {							
							echo $result->product_overview;
						}
						else {
							echo '<br><br><i>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;No synopsis available.</i>';							
						}
					?>
					</div>
				</div>		
			</div>
			<div class="col-sm-3">	
				<div class="row Product-price">
					<b>
					<?php
					if (trim($result->price)=='') {
						echo 'out of stock';						
					}
					else {
						echo '<a class="Product-price" href ="'.site_url('help/').'" target="_blank">';
						echo '&#x20B1;'.$result->price.' [Free Delivery]';
						echo '</a>';
					}
					?>
					</b>					
				</div>		
				<div class="row Product-quantity">
				<?php 
					if ($result->quantity_in_stock<1) {
				?>
						<label class="Quantity-label">Quantity: <span class="Quantity-out-of-stock">out of stock</span></label>						
				<?php						
					}
					else {
				?>
						<label class="Quantity-label">Quantity:</label>
                    <!-- edited by Mike, 20181029 
						 keyCodes: 8 is backspace; 46 is delete; 37 is left; 39 is right 
					-->									
					<input type="tel" id="quantityParam" class="Quantity-textbox no-spin" value="1" min="1" max="99" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;

									if (this.value.length == 2) {			
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>
				<?php 
					}
				?>
				</div>
				<?php 
					if ($result->quantity_in_stock>=1) {
				?>				
					<div class="row Product-purchase-button">				
						<?php 
								//$quantity = 1;
								//TODO: fix quantity and price
									
								echo '<input type="hidden" id="product_idParam" value="'.$result->product_id.'" required>';
								echo '<input type="hidden" id="customer_idParam" value="'.$this->session->userdata('customer_id').'" required>';										
// 								echo '<input type="hidden" id="quantityParam" value="'.$quantity.'" required>';
								echo '<input type="hidden" id="priceParam" value="'.$result->price.'" required>';							
						?>												
						<button onclick="myPopupFunction()" class="Button-purchase">ADD TO CART</button>				
						
						<div>					
						<br>
						<?php 
							if ($productType=="manga") {
						?>
								<a href="https://www.linkedin.com/in/michaelsyson/" target="_blank"><img class="Product-item-page-image-offers-jlpt" src="<?php echo base_url('assets/images/usbongSchoolJLPTReview_L.jpg')?>"></a>						
						<?php 
							}
							else {
						?>
								<img class="Product-item-page-image-offers-save-more" src="<?php echo base_url('assets/images/usbongOffersBuyMoreSaveMore_L.jpg')?>">
						<?php 						
							}
						?>
						<br><br>
						<!--  $this->uri->segment(2) is a URL friendly product name-->
						<a class="Sell-link" href="<?php echo site_url('sell/'.$URLFriendlyReformattedProductName.'/'.$result->product_id)?>"><img class="Product-item-page-image-offers-sell" src="<?php echo base_url('assets/images/usbongOffersBuyBack_L.jpg')?>"></a>
						</div>															
						
						<div id="myPopup" class="popup-content">
							<div class="row">
								<div class="col-sm-4">									
									<img class="Popup-product-image" src="<?php echo base_url('assets/images/'.$productType.'/'.$reformattedProductName.'.jpg');?>">				
								</div>
								<div class="col-sm-8 Popup-product-details">
									<span id="quantityId"></span>
									<?php 
									
/*									
										$quantity=1;
										if ($quantity>1) {
											echo 'Added<b>'.$quantity.'</b> copies of ';									
										}
										else {
											echo 'Added <b>1</b> copy of ';
										}
*/										
										echo '<b>'.$result->name.'</b>!'
									?>
									<br><b>Total Amt: </b>
									<label class="Popup-product-price">&#x20B1;<span id="productPriceId"><?php echo $result->price;?></span></label>
									<label class="Popup-product-free-delivery"><br>[Free Delivery]</label> 												
								<form method="post" action="<?php echo site_url('cart/shoppingcart')?>">
									<button type="submit" class="Button-view-cart">
										View Cart 
									</button>
								</form>						
								</div>
							</div>
						</div>					
					</div>												
				<?php 
					}
					else {
				?>
					<br><br>
					<div>						
					<!--  $this->uri->segment(2) is a URL friendly product name-->
					<a class="Request-link" href="<?php echo site_url('request/'.$this->uri->segment(2).'/'.$result->product_id)?>"><img class="Product-item-page-image-offers-request" src="<?php echo base_url('assets/images/usbongOffersRequest_L.jpg')?>"></a>
					</div>	
				<?php 						
					}
				?>				
			</div>
		</div>	
	</div>		
<!-- 
</body>
</html>
-->