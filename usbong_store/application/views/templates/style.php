<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script>
		//Reference: https://www.w3schools.com/howto/howto_js_dropdown.asp;
		//last accessed: 20170622
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		    document.getElementById("myDropdown").classList.toggle("show");
		}
		
		// Close the dropdown menu if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
		
		    var dropdowns = document.getElementsByClassName("dropdown-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}
	</script>

	<title>Usbong Store</title>
	<style type="text/css">

	::selection { background-color: #f07746; color: #fff; }
	::-moz-selection { background-color: #f07746; color: #fff; }

	body {
		background-color:  #f6f6f6;
		margin: 0px 0px 0px 0px;
		max-width: 100%;
		font: 16px/24px normal "Helvetica Neue",Helvetica,Arial,sans-serif;
		color: #808080;
	}
	
	.navbar {
		background-color: #1a0d00;
	}
	
	a {
		color: #dec32e;
	}

	a:hover {
		color: #dec32e;
	}
	
	hr {
		margin-right: 142px;
		border: 1px solid #6d8f48;
	}
	
	p {
		 padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 12px;
		border-top: 1px solid #d0d0d0;
		line-height: 32px;
		background: #52493f;
		color:#fff;
		margin: 0; 
		padding: 0 10px 0 10px;
	}
	
	.Search-container {
		float: left;
		margin-top: 6px;	
		margin-left: 16px;	
	}

	.Search-input {
		float: left;
		font-size: 18px;
		padding: 4px;
		border: #ffffff;		
		border-radius: 3px;
	}
	
	.Button-container {
	}
	
	.Button {		
		padding: 5.5px;
		border-top: 1px solid #d0d0d0;
		border-right: 1px solid #d0d0d0;
		border-bottom: 1px solid #d0d0d0;
		border-left: #ffffff;		
		background:#ffffff;
	}
	
	.Image-item {
	    max-width: 75%;
    	height: auto;
	}
	
	.Product-item {
		border-radius: 4px;	
		color: #222222;
	}

	.Product-item:hover {
		text-decoration: underline;
		color: #222222;
	}

	.Product-item-titleOnly {
		color: #222222;
		font-weight: bold;
	}

	.Product-item-details {
		color: #4b4b4b;	
		font-weight: normal;
	}

	.Product-item-price {
		color: #b88a1b;
	}

			
	.Product-image {
	    max-width: 75%;
    	height: auto;
	}
		
	.Product-name {
		color: #222222;
		font-size: 30px;
		font-weight: bold;	
	}

	.Product-author {
		color: #4b4b4b;
		font-size: 18px;
		margin-left: 6px;
	}

	.Product-price {
		color: #b88a1b;
		font-size: 24px;
		margin-top: 24px;		
		margin-left: 6px;
	}

	.Product-overview-header {
		color: #8bbf4f;
		margin-top: 12px;
		font-size: 18px;
	}

	.Product-overview-content {
		font-size: 16px;
	}

	.Product-quantity {
		color: #4b4b4b;
		font-size: 16px;
		margin-top: 24px;
	}

	.Quantity-label {
		padding-right: 8px;
	}

	.Product-purchase-button {
		color: #4b4b4b;
		font-size: 16px;
		margin-top: 12px;
	}

	.Button-purchase {
		padding: 8px 42px 8px 42px;
		background-color: #ffe400;
		border: 0px solid;		
		border-radius: 4px;
		margin-left: 16px;
	}

	.Button-purchase:hover {
		background-color: #d4be00;
	}
		
	.col-sm-3 {
		text-align:center
	}

	.col-sm-2 {
		text-align:center
	}
	
	.container {
		margin-left: 142px;
		margin-bottom: 48px;
	}	
	
	
	.Cart-container {
		float: right;
		margin-right: 24px;
		margin-left: 12px;
	}	
	
	.Topbar-container {
		width: 100%;
		overflow: hidden;
		float: right;
	}
	
	.Login-container {
		float: left;
		margin-top: 16px;	
		margin-left: 36px;		
	}
	
	.Button-cart {
		background: #0000000;
		border: 0px solid;		
		padding: 0px;
		margin-top: 4px;
		margin-left: 6px;
	}	

	.Text-cart {
		position: absolute;
		color: white;
		padding-left: 15px;		
	    padding-top: 14px;
		font-size: 14px;
	}	

	.Text-cart-2digits {
		position: absolute;
		color: white;
		padding-left: 10px;		
	    padding-top: 14px;
		font-size: 14px;
	}	

	.Text-cart-3digits {
		position: absolute;
		color: white;
		padding-left: 8px;		
	    padding-top: 14px;
		font-size: 14px;
	}	
	
	.Customer-dropdown {
		margin-top: 16px;
	}
	
	.nav {
	}
	
	.header {
		margin: 0px 10px 0px 10px;	
	}

	.Search-result {
		margin-left: 100px;
		margin-bottom: 32px;	
		font-size: 18px;
		color: #1a0d00;
	}
	
	.Search-noResult {
		margin-left: 100px;
		margin-bottom: 32px;	
		font-size: 18px;
		color: #1a0d00;
	}

	.Cart-noResult {
		margin-top: 56px;
		margin-left: 560px;
		margin-bottom: 56px;	
		font-size: 18px;
		color: #1a0d00;
	}

	.usbongLogo {
		margin-top: 3px;
	}
	
	.login-and-create {
		border: 1px solid #d0d0d0;
		max-width: 30%;		
		float: none;
    	display: block;
    	margin: 0 auto;
    	font-size: 24px;    	
    	padding: 16px;
	}
	
	.login-text {
		border-right: 1px solid;	
		display: inline-block; 
		padding-right: 12px;	
	}
	
	.register-text {
    	font-size: 16px;    		
		display: inline-block; 
		padding-left: 12px;		
		padding-bottom: 12px;	
	}

	.login-text-in-create {
    	font-size: 16px;    		
		display: inline-block; 
		padding-left: 12px;		
		padding-bottom: 12px;	
	}
	
	.register-text-in-create {
		border-right: 1px solid;	
		display: inline-block; 
		padding-right: 12px;	
	}

	.Login-input {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin-bottom: 12px;		    
	}
	
	.Button-login {
	    font-size: 20px;    			
	    padding: 10px;		
	    display: inline-block; 	    
	}

	.forgotPassword-text {
	    font-size: 14px;    			
	    padding: 10px;		
	    display: inline-block; 	    
	}	
	
	.Register-input {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin-bottom: 12px;		    
	}
	
	.Register-error {		
		font-size: 16px;
		color: #c14646;		
		background-color: #f6aaaa;
		border-top: 1px solid #c98989;	
		border-right: 1px solid #c98989;	
		border-left: 1px solid #c98989;		

		border-bottom: 1px solid #f6aaaa;					
		margin-bottom: -1px;
	}		
	
	
	/* 
	 * ------------------------------------------------------------------
	 * DROPDOWN
	 * Reference: https://www.w3schools.com/howto/howto_js_dropdown.asp;
	 * last accessed: 20170622	 
	 * ------------------------------------------------------------------
	 */

	/* Dropdown Button */
	.dropbtn {
	    background-color: #68502b;
	    color: white;
	    padding: 16px;
	    font-size: 16px;
	    border: none;
	    cursor: pointer;
	}
	
	/* Dropdown button on hover & focus */
	.dropbtn:hover, .dropbtn:focus {
	    background-color: #9f7b42;
	}
	
	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	    position: relative;
	    display: inline-block;
	}
	
	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 40px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}
	
	/* Links inside the dropdown */
	.dropdown-content a {
	    color: black;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	}
	
	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {background-color: #f1f1f1}
	
	/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
	.show {display:block;}
		
	}	
</style>
</head>
<body>
</body>
</html>
