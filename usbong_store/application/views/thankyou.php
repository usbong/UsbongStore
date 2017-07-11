<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Thank you! Your order is confirmed.</h3>
	<p class="Thankyou-text"> We've accepted your order, and are now processing it. You will receive a confirmation email from us with the next steps.</p>
	<br>
	<h4 class="header"><b>Order Details</b></h4>
	<p class="Thankyou-order-detail-date-and-number">Order on July 11, 2017 | Order# 1234567890</p>
	<div class="Thankyou-order-container">
		<div class="row">
			<div class="col-sm-3 Thankyou-order-details">
				<div class="Thankyou-order-details-text">
					<b>Shipping Address</b><br>
					Usbong Social Systems, Inc.<br>
					2 E. Rodriguez Ave. Sto. Nino<br>
					Marikina City, 1800,<br>
					Philippines<br>
				</div>
			</div>
			<div class="col-sm-3 Thankyou-order-details">		
				<b>Payment Method</b><br>
				Bank Deposit
			</div>
			<div class="col-sm-3 Thankyou-order-details">		
			</div>
			<div class="col-sm-3 Thankyou-order-details">		
				<b>Order Summary</b>
				<div class="Cart-order-total">
					<div class="row Cart-order-total-row">
						<div class="col-sm-6">		
							<?php 
								$totalQuantity=1;
								$orderTotal=1000;
								
								if ($totalQuantity>1) {	
									echo '<span id="totalQuantityId">'.$totalQuantity.'</span> items';
								}
								else {
									echo '<span id="totalQuantityId">'.$totalQuantity.'</span> item';
								}
							?>		
						</div>
						<div class="col-sm-6 Cart-order-price">		
						    <?php echo '<label>&#x20B1;<span id="orderTotalId1">'.$orderTotal.'</span></label>';?>
						
							<?php //echo '&#x20B1; '.$orderTotal?>		
						</div>								
					</div>
					<div class="row Cart-order-total-row">
						<div class="col-sm-6">		
							Shipping (PH)
						</div>
						<div class="col-sm-6">		
							FREE
						</div>		
					</div>						
					<div class="row Cart-order-total-with-checkout-row">
						<div class="col-sm-6">		
							Order Total
						</div>
						<div class="col-sm-6 Cart-order-price">		
						    <?php echo '<label>&#x20B1;<span id="orderTotalId2">'.$orderTotal.'</span></label>';?>

							<?php //echo '&#x20B1; '.$orderTotal?>		
						</div>								
					</div>
				  </div>
			</div>			
		</div>		
	</div>
</body>
</html>