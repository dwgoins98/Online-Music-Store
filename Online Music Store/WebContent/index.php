<!-- PHP Code from Webslesson | Create Simple Shopping Cart using PHP & MySql: https://www.youtube.com/watch?v=0wYSviHeRbs -->
<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "music_store");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

?>
<!-- End PHP code -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equic="X-UA-Compatible" content="ie=edge">
		<a href="index.html">
			<title>Daniel's Music Shop</title>
		</a>
		
		<!-- Bootstrap CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<!-- Font Awesome CDN -->
		<script src="https://kit.fontawesome.com/c1b4ff7b4d.js" crossorigin="anonymous"></script>

		<!-- Slick Slider **** The link didn't work when referenced. See css file's comments for details **** -->
		<link rel="stylesheet" type="text/css" href="./css/SlickSlider.css">
		
		<!--  Custom Stylesheet -->
		<link rel="stylesheet" href="./css/style.css"/>
	</head>
	<body class="bg-primary-color">

	<!-- Header -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-12">
						<div class="btn-group">
						<button class="btn border dropdown-toggle my-md-4 my-2 text-left" 
						data-toggle="dropdown" 
						aria-haspopup="true" 
						aria-expanded="false">
						USD
						</button>
						<div class="dropdown-menu">
							<a href="#" class=dropdown-item>ERU</a>
							<a href="#" class=dropdown-item>MXN</a>
							<a href="#" class=dropdown-item>GBP</a>
							<a href="#" class=dropdown-item>JPY</a>
						</div>
						</div>
					</div>
					<div class="col-md-4 col-12 text-center">
						<h2 class="my-md-3 site-title">Daniel's Music Store</h2>
					</div>
						<div class="col-md-4-col-12" style="text-align: right;position: absolute;right: 3%;margin: 10px;line-height: 18px;">
						<p class="my-md-4 header-links">
							<a href="./login.html" class="px-2 secondary-color">Sign In</a>
							<a href="#" class="px-1">Create an Account</a>
						</p>
					</div>
				</div>
			</div>

			<!-- Navigation Menu-->
			<!-- from Bootstrap Documentation with personalized CSS classes-->
			<div class="container-fluid p-0 font-quicksand">
				<nav class="navbar navbar-expand-lg text-color bg-primary-color border-bottom border-dark">
					<a class="navbar-brand text-color" href="#">Menu</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item active">
							<a class="nav-link text-color" href="./index.html">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
							<a class="nav-link text-color" href="#">Shop</a>
							</li>
							<li class="nav-item">
							<a class="nav-link text-color" href="#">Instrument Repair</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-color" href="#">Resources</a>
							</li>
							<li class="nav-item">
							<a class="nav-link disabled" style="color: lightgray;" href="#" tabindex="-1" aria-disabled="true">Lessons</a>
							</li>
						</ul>
						<div class="covid-19-info">Due to COVID-19, we have temporarily suspended in-person lessons
							</br>Please call to inquire about virtual lessons
						</div>
					</div>
					<!-- Search Bar and Shopping Basket-->
					<div class="navbar-nav">
						<li class="nav-item border rounded-circle mx-2 search-icon">
							<i class="fas fa-search p-2"></i> <!-- From FontAwesome-->
						</li>
						<li class="nav-item border rounded-circle mx-2 basket-icon">
							<a href="cart.html">
								<i class="fas fa-shopping-basket p-2 text-color"></i> <!-- From FontAwesome-->
							</a>
						</li>
					</div>
				  </nav>
				  <!-- end Bootstrap -->
			</div>
		</header>
	<!-- /Header -->

		<!-- Main Section-->
		<main>

			<!-- First Slider-->

			<div class="container-fluid p-0">
				<div class="site-slider">
					<div class="slider-one">
						<div>
							<img src="./Images/541A4542.jpg" class="img-fluid" alt="Concert 1">
						</div>
						<div>
							<img src="./Images/541A4543.jpg" class="img-fluid" alt="Concert 2">
						</div>
						<div>
							<img src="./Images/Alvarez.jpg" class="img-fluid" alt="Alvarez">
						</div>
						<div>
							<img src="./Images/Banjo.jpg" class="img-fluid" alt="Banjo">
						</div>
						<div>
							<img src="./Images/Concert.jpg" class="img-fluid" alt="Crowd Surf">
						</div>
						<div>
							<img src="./Images/Fender Squire.jpg" class="img-fluid" alt="Fender">
						</div>
						<div>
							<img src="./Images/Jam Session.jpg" class="img-fluid" alt="Jam">
						</div>
					</div>
					<div class="slider-btn">
						<span class="prev position-top">
							<i class="fas fa-chevron-left">
							</i>
						</span>
						<span class="next position-top right-0">
							<i class="fas fa-chevron-right">
							</i>
						</span>
					</div>
				</div>
			</div>

			<!-- /First Slider-->

			<!-- Second Slider -->
			
			<div class="container-fluid" style="background-color: white;">
				<div class="site-slider-two px-md-4">
					<div class="row slider-two text-center">
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/CP CP221.jpg" alt="Bongos">
							<span class="border site-btn btn-span">CP CP221 Bongos</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Eastman.jpg" alt="Eastman">
							<span class="border site-btn btn-span">Eastman Guitar</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Laurel Canyon LA-100.jpg" alt="Laurel Canyon">
							<span class="border site-btn btn-span">Laurel Canyon Acoustic</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Nord Piano 2.jpg" alt="Nord 2">
							<span class="border site-btn btn-span">Nord Piano 2</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Sennheiser EW 300.jpg" alt="EW 300">
							<span class="border site-btn btn-span">Sennheiser EW 300</span>
						</div><div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Pintech Phoenix Pro.jpg" alt="Pintech">
							<span class="border site-btn btn-span">Pintech Phoenix Pro</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/SC-13E.jpg" alt="SC-13E">
							<span class="border site-btn btn-span">SC-13E</span>
						</div>
						<div class="col-md-2 product pt-md-5 pt-4">
							<img src="./Images/Products/Taylor Baby.jpg" alt="Baby Taylor">
							<span class="border site-btn btn-span">Baby Taylor</span>
						</div>
					</div>
					<div class="slider-btn">
						<span class="prev position-top">
							<i class="fas fa-chevron-left fa-2x text-secondary">
							</i>
						</span>
						<span class="next position-top right-0">
							<i class="fas fa-chevron-right fa-2x text-secondary">
							</i>
						</span>
					</div>
				</div>
			</div>
			<!-- /Second Slider -->

			<hr class="hr"/>

			<!-- Features Section -->

			<div class="container text-center">
				<div class="features">
					<h1>Featured Products</h1>
					<p class="text-seconday">See some of our staff's favorite pieces of gear</p>
				</div>
			</div>

			<!-- Features Third Slider -->

			<div class="container-fluid" style="background-color: white;">
				<div class="site-slider-three px-md-4">
					<div class="slider-three row text-center px-4">
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Alvarez.jpeg" class="img-fluid" alt="Alvarez">
							<div class="cart-details">
								<h6 class="pro-title p-0">Alvarez CC7HCEAR</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$605.95</s></small>
										<span class="add-to-cart-price">$550.00</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Behringer x32.png" class="img-fluid" alt="X32">
							<div class="cart-details">
								<h6 class="pro-title p-0">Behringer X32</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<i class="far fa-star"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$2,750.99</s></small>
										<span class="add-to-cart-price">$2,250.99</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Gibson.jpg" class="img-fluid" alt="Gibson">
							<div class="cart-details">
								<h6 class="pro-title p-0">Gibson Electric Guitar</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="far fa-star"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$2,995.99</s></small>
										<span class="add-to-cart-price">$2,150.99</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Les Paul.png" class="img-fluid" alt="Les Paul">
							<div class="cart-details">
								<h6 class="pro-title p-0">Les Paul Guitar</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$2,499.00</s></small>
										<span class="add-to-cart-price">$2,099.00</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Zildjian Cymbals.jpg" class="img-fluid" alt="Zildjian">
							<div class="cart-details">
								<h6 class="pro-title p-0">Zildjian Cymbals</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$184.95</s></small>
										<span class="add-to-cart-price">$149.99</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Nord 2 Piano.jpg" class="img-fluid" alt="Nord 2">
							<div class="cart-details">
								<h6 class="pro-title p-0">Nord 2 Piano</h6>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<div class="pro-price py-2">
									<h5>
										<small><s class="text-secondary">$2,699.99</s></small>
										<span class="add-to-cart-price">$2,399.99</span>
									</h5>
								</div>
								<div class="cart mt-4">
									<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
					<div class="slider-btn">
						<span class="prev position-top">
							<i class="fas fa-chevron-left fa-2x text-secondary">
							</i>
						</span>
						<span class="next position-top right-0">
							<i class="fas fa-chevron-right fa-2x text-secondary">
							</i>
						</span>
					</div>
				</div>
			</div>
			
			<!-- /Features Section -->

			<!-- Recording Equipment Section -->

			<div class="container-fluid recording bg-light">
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="row box">
							<div class="col-md-2 p-0 pl-md-3 bg-white offset-1 d-flex flex-md-column flex-sm-row">
								<div class="py-md-2 py-2 mt-3 bg-white border text-center">
									<h5 class="creme"><strong>125</strong></h5>
									<em>Days</em>
								</div>
								<div class="py-md-2 py-2 mt-3 bg-white border text-center">
									<h5 class="creme"><strong>16</strong></h5>
									<em>Hours</em>
								</div>
								<div class="py-md-2 py-2 mt-3 bg-white border text-center">
									<h5 class="creme"><strong>46</strong></h5>
									<em>Minutes</em>
								</div>
								<div class="py-md-2 py-2 mt-3 bg-white border text-center">
									<h5 class="creme"><strong>03</strong></h5>
									<em>Seconds</em>
								</div>
							</div>
							<div class="col-md-8 pd-0 bg-creme">
								<div class="text-left">
									<img src="./Images/Focusrite Scarlett Solo Studio.jpg" alt="Recording Equipment" class="img-fluid">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-12 pt-5">
						<h3 class="text-left">Focusrite Scarlett Solo Studio</h3>
						<p class="text-secondary pr-5 pt-3">
							<small> Focusrite Scarlett Solo Studio (2nd Gen) USB Sound card usb audio interface +CM25 condenser microphone + HP60 headset. Second generation 2 in / 2 out USB 2.0 audio interface with one Scarlett mic preamp and one instrument input, 24bit/192kHz & USB bus Powered. Pro Tools | First & Ableton Live Lite recording software, plug-ins and samples, Condenser Mic, Headphones and 3m/10' Microphone cable included. Mac & PC compatible.
							</small>
							</p>
						<h6><em>Description from <a href="https://www.aliexpress.com/i/32823818504.html">aliexpress.com</a></em></h6>
						<div class="rating-big">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<h4 class="pt-3">
							<small>
								<s class="text-secondary">$319.99</s>
							</small>
							<span class="text-color pl-1">$289.00</span>
						</h4>
						<div class="cart mt-4 row">
							<div class="cart mt-4">
								<button class="border add-to-cart-btn" style="padding: 0.8rem; border-radius: 4rem;">Add to Cart</button>
							</div>
							<div class="col-md-5 col-sm-12 py-3 pl-5 mt-4">
								<span class="p-3 bg-primary-color border rounded-circle"><i class="fas fa-heart" aria-hidden="true"></i></span>
								<span class="p-3 bg-primary-color border rounded-circle"><i class="fas fa-sync-alt" aria-hidden="true"></i></span>
								<span class="p-3 bg-primary-color border rounded-circle"><i class="fas fa-search" aria-hidden="true"></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<!-- /Recording Equipment Section -->

			<div class="container-fluid">
				<div class="site-slider-four px-md-4">
					<div class="slider-four row text-center">
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Scarlett Bundle/Scarlett Microphone.jpg" alt="Microphone" class="border img-fluid">
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Scarlett Bundle/Headphones.jpg" alt="Headphones" class="border img-fluid">
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Scarlett Bundle/Scarlett Solo Studio.jpg" alt="Solo Studio" class="border img-fluid">
						</div>
						<div class="col-md-2 product pt-md-5">
							<img src="./Images/Scarlett Bundle/XLR Cables.jpg" alt="XLR Cables" class="border img-fluid">
						</div>
					</div>
					<div class="slider-btn">
						<span class="prev position-top">
							<i class="fas fa-chevron-left fa-2x text-secondary">
							</i>
						</span>
						<span class="next position-top right-0">
							<i class="fas fa-chevron-right fa-2x text-secondary">
							</i>
						</span>
					</div>
				</div>
			</div>

			<!-- Facilities -->

			<div class="container-fluid p-0 py-5">
				<div class="site-info">
					<div class="row text-center py-3 bg-dark m-0">
						<div class="col-md-4 col-sm-12 my-md-0 my-4">
							<div class="row justify-content-center text-light">
								<i class="fas fa-rocket fa-4x px-4"></i>
								<div class="py-2 font-oswald text-left">
									<h6 class="m-0">Free Shipping & Return</h6>
									<small>Free shipping on any order over $69</small>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 my-md-0 my-4">
							<div class="row justify-content-center text-light">
								<i class="fas fa-hand-holding-usd fa-4x px-4"></i>
								<div class="py-2 font-oswald text-left">
									<h6 class="m-0">Money Back Guarantee</h6>
									<small>Not happy/item damaged? Send it back and we'll give you a refund!</small>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 my-md-0 my-4">
							<div class="row justify-content-center text-light">
								<i class="fas fa-headphones fa-4x px-4"></i>
								<div class="py-2 font-oswald text-left">
									<h6 class="m-0">Online Support</h6>
									<small>Call any time between 9:30am-4:30pm for free online support</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- /Facilities -->

		</main>
		<!-- /Main Section -->

		<!-- Footer -->

		<footer>
			<div class="container-fluid px-5 py-5">
				<div class="row">
					<div class="col-md-4 col-sm-20">
						<h4>Contact Us</h4>
						<div class="row pl-md-1 text-secondary">
							<div class="col-12">
								<i class="fa fa-home px-md-2 text-color"></i>
								<small class="text-color">300 Main St. Windermere, FL, 34786</small>
							</div>
							<div class="col-12">
								<i class="fa fa-paper-plane px-md-2 text-color"></i>
								<small><a href="mailto: dgoins1@mail.valenciacollege.edu">dgoins1@mail.valenciacollege.edu</a></small>
							</div>
							<div class="col-12">
								<i class="fa fa-phone-volume px-md-2 text-color"></i>
								<small class="text-color pl-1">(407) 883-1785</small>
							</div>
						</div>
						<div class="row social">
							<div class="col-12 py-3 pl-4 text-color">
								<a href="https://www.facebook.com/daniel.goins.965" class="text-color">
									<i class="fab fa-facebook"></i>
								</a>
								<a href="https://www.instagram.com/dwgoins/" class="text-color">
									<i class="fab fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-20">
						<h4>Our Stores</h4>
						<div class="row pl-md-1 text-secondary">
							<div class="col-12">
								<small class="text-color py-4">Windermere</small>
							</div>
							<div class="col-12">
								<small class="text-color py-4">College Park</small>
							</div>
							<div class="col-12">
								<small class="text-color py-4">Ocoee</small>
							</div>
							<div class="col-12">
								<small class="text-color py-4">Clermont</small>
							</div>
							<div class="col-12">
								<small class="text-color py-4">Lake Buena Vista</small>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-20">
						<h4>Extras</h4>
						<div class="row pl-md-1 text-secondary">
							<div class="col-12">
								<small class="text-color py-4">Videos</small> <!-- Add Link here-->
							</div>
							<div class="col-12">
								<small class="text-color py-4">Dealers</small> <!-- Add Link here-->
							</div>
							<div class="col-12">
							<small class="text-color py-4">Stories</small> <!-- Add Link here-->
							</div>
							<div class="col-12">
								<small class="text-color py-4">Deals</small> <!-- Add Link here-->
							</div>
							<div class="col-12">
								<small class="text-color py-4">Lessons</small> <!-- Add Link here-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- /Footer -->


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="js/SlickMin.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>