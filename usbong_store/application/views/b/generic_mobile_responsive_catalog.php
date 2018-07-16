<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // session fields
    $customer_id = $this->session->userdata('customer_id');
    $merchant_id = $this->session->userdata('merchant_id');
    $is_admin = $this->session->userdata('is_admin');
    
    // css fields
    $left_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    if (isset($categories)) {
        $main_pane_col = 'col-xs-12 col-sm-12 col-md-6 col-lg-8';
        $right_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    } else {
        $main_pane_col = 'col-xs-12 col-sm-12 col-md-9 col-lg-10';
        $right_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    }
    
    // display fields
    $header = $product_type;    
    if ($product_type == 'Beverages') {
        $header = $product_type;
    }
?>

<!--import javascript-->
<script src="https://store.usbong.ph/assets/js/responsive_bootstrap_toolkit/bootstrap-toolkit.min.js"></script>
<script src="https://store.usbong.ph/assets/js/b/common.js"></script>

<div class="container-fluid">
    <div class="row">
        <!-- Left Pane: optional -->
        <?php if (isset($categories)) { ?>
            <!-- Prepare Data -->
            <?php
                //remove ":" and "'"
                $reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($categories)['product_type_name']));
                //replace "&", " ", and "-"
                $URLFriendlyReformattedCategoryName = str_replace("(","",
                    str_replace(")","",
                    str_replace("&","and",
                    str_replace(',','',
                    str_replace(' ','-',
                    str_replace('/','-',
                    $reformattedCategoryName))))));
            ?>            
            <div class="<?php echo $left_pane_col;?> Merchant-category-b">
                <!-- Header -->
	            <div class="row">
	                <div class="hidden-xs hidden-sm vissible-md vissible-lg col-xs-12">
	                        <h2 class="header"><?php echo $header;?></h2>
	                </div>
	                <div class="vissible-xs vissible-sm hidden-md hidden-lg col-xs-12 text-center">
	                        <h2 class="header"><?php echo $header;?></h2>
	                </div>                
	            </div>
            
                <div class="row Merchant-category-image">
                    <a href="<?php echo site_url('b/'.$URLFriendlyReformattedCategoryName.'/'.$this->uri->segment(3)); ?>">
                        <img class="image-responsive center-block" src="<?php echo create_merchant_image_url($merchant->merchant_name); ?>">
                    </a>
                </div>
                <?php foreach ($categories as $value) { ?>
                    <?php
                        $fileFriendlyCategoryName = str_replace(
                            "'",
                            "",
                            str_replace(
                                " & ",
                                "_and_",
                                strtolower($value['product_type_name'])
                            )
                        );
                    ?>
                    <div class="row text-center">
                        <div class="Merchant-category-content col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-0 col-md-12">
                            <a class="Merchant-category-content-link" href="<?php echo site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']);?>">
                                <?php echo strtoupper($value['product_type_name']); ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>        
        <!-- Main Pane -->
        <div class="<?php echo $main_pane_col; ?>" data="main-pane">
        	<?php 
        		if (!isset($categories)) { //if not on Merchant page due to no Merchant categories?>
	            <!-- Header -->
	            <div class="row">
	                <div class="hidden-xs hidden-sm vissible-md vissible-lg col-xs-12">
	                        <h2 class="header"><?php echo $header;?></h2>
	                </div>
	                <div class="vissible-xs vissible-sm hidden-md hidden-lg col-xs-12 text-center">
	                        <h2 class="header"><?php echo $header;?></h2>
	                </div>                
	            </div>
	        <?php 
               } 
	        ?>
            <!-- Products -->
            <?php if (!isset($categories)) { //if not on Merchant page due to no Merchant categories
            ?>
	            <div class="row">
	        <?php 
	        }
	        else {
	        ?>
	            <div class="row Main-pane">
	        <?php 
	        }
	        ?>
                <!-- Prepare Data -->            
                <?php
                    foreach ($products as $value) {
                        // remove ":" and "'"
                        $reformattedProductName = str_replace(':','',str_replace('\'','',$value['name']));
                        $trimmedName = $value['name'];
                        if (strlen($value['name'])>40) {
                                $trimmedName = trim(substr($value['name'],0,40))."...";
                        }
                ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 Product-item text-center" data="product-item-div">
                        <a class="Product-item" href="<?php echo create_product_url($value['product_id'], $value['name'], $value['author']);?>">
                            <!-- General Description -->
                            <img class="img-responsive center-block Image-item" src="<?php echo create_image_url($value['name'], $product_type); ?>">
                            <!-- Essential Reading Overlay -->
                            <?php if (isset($value['is_essential_reading']) && ($value['is_essential_reading'])) { ?>
                                <img class="img-responsive center-block Image-item-essential-reading" src="<?php echo base_url('assets/images/essential_reading.png'); ?>">
                            <?php } ?>
                            <br><div id="Product-item-titleOnly" class="Product-item-titleOnly"><?php echo $trimmedName;?></div>
                            <!-- Details -->
                            <label class="Product-item-details">
                                <!-- Author -->
                                <?php if(!empty($value['author'])) { ?>
                                    <!-- Prepare Display -->
                                    <?php
                                        $trimmedAuthor = $value['author'];
                                        if (strlen($value['author']) > 40) {
                                            $trimmedAuthor = trim(substr($value['author'],0,40))."...";
                                        }
                                    ?>
                                    <!-- Display -->
                                    <div><?php echo $trimmedAuthor; ?></div>
                                <?php } ?>
                                <!-- In Stock/Out of Stock -->
                                <?php if ($value['quantity_in_stock'] !=0 ) { ?>
                                    <label class="Product-item-price">&#x20B1;<?php echo $value['price']; ?></label>
                                    <!-- Has Old Price -->
                                    <?php if (isset($value['previous_price'])) { ?>
                                        <label class="Product-item-previous-price">&ensp;(<?php echo $value['previous_price']; ?>)</label>
                                    <?php } ?>
                                    <!-- Delivery Tag -->
                                    <br><label class="Product-item-price">Free Delivery</label>
                                <?php } else { ?>
                                    <label class="Product-item-price">out of stock</label>
                                <?php } ?><!-- In Stock/Out of Stock -->
                                
                                <!-- Admin or Not Admin -->
                                <?php if (($customer_id != "-1") && ($is_admin == "1")) { ?>
                                    <br><label class="Product-item-view-num">View Num: <?php echo $value['product_view_num']; ?></label>
                                    <br><label class="Product-item-view-num">Qty Sold: <?php echo $value['quantity_sold'];    ?></label>
                                <?php } else { ?>
                                    <?php foreach ($merchant_customer_categories as $v) { ?>
                                        <?php if ($v['product_type_name'] == $product_type) { ?>
                                            <br><label class="Product-item-view-num">View Num: <?php echo $value['product_view_num']; ?></label>
                                            <br><label class="Product-item-view-num">Qty Sold: <?php echo $value['quantity_sold'];    ?></label>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?><!-- Admin or Not Admin -->
                            </label>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Right Pane -->
        <div class="<?php echo $right_pane_col; ?> right-pane" data="right-pane">
            <?php $this->load->view($right_side_bar); ?>
        </div>
    </div>
</div>