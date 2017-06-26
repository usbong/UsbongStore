<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">	
				<?php 
					$reformattedBookName = str_replace(':','',str_replace('\'','',$result->name)); //remove ":" and "'"				
				?>
				<img class="Product-image" src="<?php echo base_url('assets/images/books/'.$reformattedBookName.'.jpg');?>">				
			</div>
			<div class="col-sm-5">	
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
						if (!empty($result->product_overview)) {							
							echo $result->product_overview;
						}
						else {
							echo 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)», reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.';							
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
						echo '&#x20B1;'.$result->price.' [Free Delivery]';
					}
					?>
					</b>					
				</div>					
				<div class="row Product-quantity">
					<label class="Quantity-label">Quantity:</label>
					<div class="dropdown">
					  <button onclick="myFunction()" class="dropbtn">1</button>
					  <div id="myDropdown" class="dropdown-content">
					    <a href="#">1</a>
					    <a href="#">2</a>
					    <a href="#">3</a>
					  </div>
					</div>
				</div>
					<div class="row Product-purchase-button">				
						<?php 
								$quantity = 1;
								//TODO: fix quantity and price
									
								echo '<input type="hidden" id="product_idParam" value="'.$result->product_id.'" required>';
								echo '<input type="hidden" id="customer_idParam" value="'.$this->session->userdata('customer_id').'" required>';										
								echo '<input type="hidden" id="quantityParam" value="'.$quantity.'" required>';
								echo '<input type="hidden" id="priceParam" value="'.$result->price.'" required>';							
						?>						
						<button onclick="myPopupFunction()" class="Button-purchase">ADD TO CART</button>				
						<div id="myPopup" class="popup-content">
							<div class="row">
								<div class="col-sm-4">									
									<img class="Popup-product-image" src="<?php echo base_url('assets/images/books/'.$reformattedBookName.'.jpg');?>">				
								</div>
								<div class="col-sm-8 Popup-product-details">
									<?php 
										$quantity=1;
										if ($quantity>1) {
											echo 'Added<b>'.$quantity.'</b> copies of ';									
										}
										else {
											echo 'Added <b>1</b> copy of ';
										}
										echo '<b>'.$result->name.'</b>!'
									?>
									<br><b>Order Total: </b>
									<label class="Popup-product-price">&#x20B1;<?php echo $result->price;?></label>
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
			</div>
		</div>	
	</div>		
</body>
</html>