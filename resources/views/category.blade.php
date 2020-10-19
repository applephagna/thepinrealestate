
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="assets/img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Hanuman" rel="stylesheet">
	<title>Select a Category</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://unpkg.com/ionicons@4.3.0/dist/css/ionicons.min.css" rel="stylesheet">
	<link href="assets/css/post.css" rel="stylesheet">
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script src="assets/js/plupload.full.min.js"></script>
	<script src="assets/js/jquery.chained.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>

	<style type="text/css">
		body {
			min-width: 1090px;
		}
	</style>
</head>
<body>

	<header id="header" class="bg-white border-bottom">
		<div class="my-container header-content">
			<nav class="navbar row">
				<a href="https://www.khmer24.com/en/" class="navbar-brand"><img src="https://www.khmer24.com/khmer24-reform21/template/img/khmer24.gif" alt="Khmer24"></a>
				<ul class="nav mr-auto left-nav">
					<li class="nav-item">
						<a class="nav-link disabled btn-change-lang" href="https://www.khmer24.com/km/post.html"><span class="icon khmer-flage"></span></a>
					</li>
				</ul>
				<ul class="nav nav-pills justify-content-end right-nav">
					<li class="nav-item item-wide-screen">
						<a class="nav-link" href="https://www.khmer24.com/en/login">Log in</a>
					</li>
					<li class="nav-item item-wide-screen">
						<sapn class="nav-link disabled pl-0 pr-0">Or</sapn>
					</li>
					<li class="nav-item item-wide-screen">
						<a class="nav-link" href="https://www.khmer24.com/en/register">Register</a>
					</li>
					<li class="nav-item item-small-screen">
						<a class="nav-link" href="https://www.khmer24.com/en/register"><span class="icon icon-user2"></span></a>
					</li>
					<li class="nav-item ml-2">
						<a class="nav-link btn-post btn-warning long-text" href="https://www.khmer24.com/en/post">POST FREE AD</a>
						<a class="nav-link btn-post btn-warning short-text" href="https://www.khmer24.com/en/post">POST</a>
					</li>
				</ul>
			</nav>
			<div id="header-search">
				<form class="form-inline form-mini-search p-0 pb-2 mr-auto" action="https://www.khmer24.com/en/search" method="get">
					<input class="form-control col-12 pr-4 input-keyword" type="search" placeholder="What are you looking for..." aria-label="What are you looking for..." value="" name="q">
					<select name="category" class="form-control select-category">
						<option value="">All Category</option>
						<option value="mobile-phones-tablets" class="main">Phones & Tablets</option>
						<option value="phones-tablets" class="child">Phones, Tablets</option>
						<option value="smart-watches" class="child">Smart Watches</option>
						<option value="phone-accessories" class="child">Phone Accessories</option>
						<option value="phone-numbers" class="child">Phone Numbers</option>
						<option value="computer-and-accessories" class="main">Computers & Accessories</option>
						<option value="computers" class="child">Computers</option>
						<option value="computer-accessories" class="child">Computer accessories</option>
						<option value="softwares" class="child">Softwares</option>
						<option value="electronics-appliances" class="main">Electronics & Appliances</option>
						<option value="consumer-electronics" class="child">Consumer Electronics</option>
						<option value="security-camera" class="child">Security Camera</option>
						<option value="cameras-camcorders" class="child">Cameras, camcorders</option>
						<option value="tvs-videos-and-audios" class="child">TVs, Videos and Audios</option>
						<option value="home-appliances" class="child">Home appliances </option>
						<option value="video-games-consoles-toys" class="child">Video games, consoles, toys </option>
						<option value="cars-and-vehicles" class="main">Cars and Vehicles</option>
						<option value="cars-for-sale" class="child">Cars for Sale</option>
						<option value="bicycles" class="child">Bicycles</option>
						<option value="motorcycles-for-sale" class="child">Motorcycles for Sale</option>
						<option value="vehicles-for-rent" class="child"> Vehicles for Rent</option>
						<option value="car-maintenance-repair" class="child">Car Maintenance & Repair</option>
						<option value="lorries-vans" class="child">Lorries & Vans</option>
						<option value="financing-insurance" class="child">Financing & Insurance</option>
						<option value="car-parts-accessories" class="child">Car Parts & Accessories</option>
						<option value="others-vihicles" class="child">Others</option>
						<option value="property-housing-rentals" class="main">House & Lands</option>
						<option value="house-for-sale" class="child">House for Sale</option>
						<option value="house-for-rent" class="child">House for Rent</option>
						<option value="apartment-for-sale" class="child">Apartment for Sale</option>
						<option value="apartment-for-rent" class="child">Apartment for Rent</option>
						<option value="landed-properties-for-sale" class="child">Land for Sale</option>
						<option value="landed-properties-for-rent" class="child">Landed Properties for Rent</option>
						<option value="commercial-properties-for-sale" class="child">Commercial for Sale</option>
						<option value="commercial-properties-for-rent" class="child">Commercial for Rent</option>
						<option value="room-for-rent" class="child">Room for Rent</option>
						<option value="properties-wanted" class="child">Properties Wanted</option>
						<option value="agent-services" class="child">Agent Services</option>
						<option value="others-properties" class="child">Others</option>
						<option value="jobs" class="main">Jobs</option>
						<option value="jobs-accounting" class="child">Accounting</option>
						<option value="jobs-administration" class="child">Administration</option>
						<option value="jobs-architecture-engineering" class="child">Architecture/Engineering</option>
						<option value="jobs-assistant-secretary" class="child">Assistant/Secretary</option>
						<option value="jobs-audit-taxation" class="child">Audit/Taxation</option>
						<option value="jobs-banking-insurance" class="child">Banking/Insurance</option>
						<option value="jobs-cashier-receptionist" class="child">Cashier/Receptionist</option>
						<option value="jobs-catering-restaurant" class="child">Catering/Restaurant</option>
						<option value="jobs-cleaner-maid" class="child">Cleaner/Maid</option>
						<option value="jobs-consultancy" class="child">Consultancy</option>
						<option value="jobs-customer-service" class="child">Customer Service</option>
						<option value="jobs-design" class="child">Design</option>
						<option value="jobs-education-training" class="child">Education/Training</option>
						<option value="jobs-finance" class="child">Finance</option>
						<option value="jobs-freight-shipping-delivery-warehouse" class="child">Freight/Shipping /Delivery/Warehouse</option>
						<option value="jobs-hotel-hospitality" class="child">Hotel/Hospitality</option>
						<option value="jobs-human-resource" class="child">Human Resource</option>
						<option value="jobs-information-technology" class="child">Information Technology</option>
						<option value="jobs-lawyer-legal-service" class="child">Lawyer/Legal Service</option>
						<option value="jobs-management" class="child">Management</option>
						<option value="jobs-manufacturing" class="child">Manufacturing</option>
						<option value="jobs-marketing" class="child">Marketing</option>
						 <option value="jobs-media-advertising" class="child">Media/Advertising</option>
						<option value="jobs-medical-health-nursing" class="child">Medical/Health/Nursing</option>
						<option value="jobs-merchandising-purchasing" class="child">Merchandising/Purchasing</option>
						<option value="jobs-operations" class="child">Operations</option>
						<option value="jobs-project-management" class="child">Project Management</option>
						<option value="jobs-quality-control" class="child">Quality Control</option>
						<option value="jobs-resort-casino" class="child">Resort/Casino</option>
						<option value="jobs-sales" class="child">Sales</option>
						<option value="jobs-security-driver" class="child">Security/Driver</option>
						<option value="jobs-technician" class="child">Technician</option>
						<option value="jobs-telecommunication" class="child">Telecommunication</option>
						<option value="jobs-translation-interpretation" class="child">Translation/Interpretation</option>
						<option value="jobs-travel-agent-ticket-sales" class="child">Travel Agent/Ticket Sales</option>
						<option value="jobs-others" class="child">Others</option>
						<option value="services" class="main">Services</option>
						<option value="accounting" class="child">Accounting</option>
						<option value="automotive" class="child">Automotive</option>
						<option value="advertising-media" class="child">Advertising & Media</option>
						<option value="bridal-services" class="child">Bridal Services</option>
						<option value="cleaning-maid-services" class="child">Cleaning & Maid Services</option>
						<option value="construction-arch.-interiors" class="child">Construction, Arch. & Interiors</option>
						<option value="education-training" class="child">Education & Training</option>
						<option value="engineering" class="child">Engineering</option>
						<option value="insurance" class="child">Insurance</option>
						<option value="massage-spa" class="child">Massage & Spa</option>
						<option value="hospitality-travel-tourism" class="child">Hospitality, Travel & Tourism</option>
						<option value="health-medical-pharma" class="child">Health, Medical & Pharma</option>
						<option value="it-telecom" class="child">IT & Telecom</option>
						<option value="interior-design-renovation" class="child">Interior Design & Renovation</option>
						<option value="legal" class="child">Legal</option>
						<option value="movers-logistics" class="child">Movers & Logistics</option>
						<option value="plumbing-electrical" class="child">Plumbing & Electrical</option>
						<option value="property-real-estate" class="child">Property & Real Estate</option>
						<option value="science" class="child">Science</option>
						<option value="supply-chain-logistics" class="child">Supply Chain & Logistics</option>
						<option value="printing-publishing" class="child">Printing & Publishing</option>
						<option value="other-services" class="child">Other Services</option>
						<option value="fashion-beauty" class="main">Fashion & Beauty</option>
						<option value="jewellery-watches" class="child">Jewelry, watches </option>
						<option value="clothing-accessories" class="child">Clothing, accessories</option>
						<option value="beauty-healthcare-products" class="child">Beauty & Healthcare</option>
						<option value="books-sports-hobbies" class="main">Books, Sports & Hobbies</option>
						<option value="cds-dvds-vhs" class="child">CDS, DVDS, VHS</option>
						<option value="books" class="child">Books</option>
						<option value="sports-equipment" class="child">Sports Equipment</option>
						<option value="others-buy-sell" class="child">Others</option>
						<option value="furniture-decor" class="main">Furniture & Decor</option>
						<option value="household-items" class="child">Household Items</option>
						<option value="office-furniture" class="child">Office Furniture</option>
						<option value="home-furniture" class="child">Home Furniture</option>
						<option value="kitchenware" class="child">Kitchenware</option>
						<option value="handicrafts-paintings" class="child">Handicrafts Paintings</option>
						<option value="pets" class="main">Pets</option>
						<option value="dogs" class="child">Dogs</option>
						<option value="cats" class="child">Cats</option>
						<option value="birds" class="child">Birds</option>
						<option value="fish" class="child">Fish</option>
						<option value="pet-food" class="child">Pet Food</option>
						<option value="pet-accessories" class="child">Pet Accessories</option>
						<option value="other-pets" class="child">Other</option>
						<option value="foods" class="main">Foods</option>
						<option value="meat" class="child">Meat</option>
						<option value="seafood" class="child">Seafood</option>
						<option value="fruits" class="child">Fruits</option>
						<option value="vegetables" class="child">Vegetables</option>
						<option value="beverages" class="child">Beverages</option>
						<option value="grocery" class="child">Grocery</option>
						<option value="bread-and-bakery" class="child">Bread & Bakery</option>
						<option value="beer-and-wine" class="child">Beer & Wine</option>
						<option value="rice-and-cereal" class="child">Rice & Cereal</option>
						<option value="other-foods" class="child">Other</option>
					</select>
					<button class="btn my-0 my-sm-0" type="submit"><span class="icon ion-ios-search"></span></button>
				</form>
			</div>
		</div>
	</header>

	<section class="pt-3 pb-3 posting-form">
		<div class="my-container">
			<div class="ads_form bg-white rounded border my_content">
				<div class="header p-3">
					<h1 class="title">POST FREE AD</h1>
					<div class="step">
					<ul class="list-unstyled">
						<li class="active"><span class="text"><i>1</i> Choose a category</span></li>
						<li><span class="text"><i>2</i> Fill Description</span></li>
					</ul>
					</div>
				</div>
				<div id="category" class="p-3">
					<div class="category-step">
						<div><h3 class="title"><span>1</span>Select a category:</h3></div>
						<div><h3 class="title"><span>2</span>Select a subcategory:</h3></div>
					</div>
					<div class="categories-box">
						<div class="main_cat">
							<ul class="list-unstyled items-main-categories">
								<li>
									<a href="#Mobile Phones &Tablets" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/mobile-phones-tablets.png" /> Phones & Tablets</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
										<li><a href="https://www.khmer24.com/en/post?category=61">&raquo; Phones, Tablets</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=193">&raquo; Smart Watches</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=121">&raquo; Phone Accessories</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=115">&raquo; Phone Numbers</a></li>
										</ul>
									</div>
								</li>
								
								<li>
									<a href="#Computers & Accessories" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/computer-and-accessories.png" /> Computers & Accessories</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
										<li><a href="https://www.khmer24.com/en/post?category=50">&raquo; Computers</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=51">&raquo; Computer accessories</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=120">&raquo; Softwares</a></li>
									</ul>
									</div>
								</li>

								<li>
									<a href="#Electronics & Appliances" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/electronics-appliances.png" /> Electronics & Appliances</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
											<li><a href="https://www.khmer24.com/en/post?category=64">&raquo; Consumer Electronics</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=161">&raquo; Security Camera</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=53">&raquo; Cameras, camcorders</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=123">&raquo; TVs, Videos and Audios</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=52">&raquo; Home appliances </a></li>
											<li><a href="https://www.khmer24.com/en/post?category=56">&raquo; Video games, consoles, toys </a></li>
										</ul>
									</div>
								</li>

								<li>
									<a href="#Cars and Vehicles" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/cars-and-vehicles.png" /> Cars and Vehicles</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
											<li><a href="https://www.khmer24.com/en/post?category=67">&raquo; Cars for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=192">&raquo; Bicycles</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=116">&raquo; Motorcycles for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=70">&raquo; Vehicles for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=73">&raquo; Car Maintenance & Repair</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=71">&raquo; Lorries & Vans</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=69">&raquo; Financing & Insurance</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=72">&raquo; Car Parts & Accessories</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=75">&raquo; Others</a></li>
										</ul>
									</div>
								</li>

								<li>
									<a href="#House & Land" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/property-housing-rentals.png" /> House & Lands</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
											<li><a href="https://www.khmer24.com/en/post?category=76">&raquo; House for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=77">&raquo; House for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=78">&raquo; Apartment for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=79">&raquo; Apartment for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=80">&raquo; Land for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=81">&raquo; Landed Properties for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=82">&raquo; Commercial for Sale</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=83">&raquo; Commercial for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=84">&raquo; Room for Rent</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=85">&raquo; Properties Wanted</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=86">&raquo; Agent Services</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=87">&raquo; Others</a></li>
										</ul>
									</div>
								</li>

								<li>
									<a href="#Jobs" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/jobs.png" /> Jobs</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
											<li><a href="https://www.khmer24.com/en/post?category=125">&raquo; Accounting</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=126">&raquo; Administration</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=127">&raquo; Architecture/Engineering</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=128">&raquo; Assistant/Secretary</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=129">&raquo; Audit/Taxation</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=130">&raquo; Banking/Insurance</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=131">&raquo; Cashier/Receptionist</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=132">&raquo; Catering/Restaurant</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=133">&raquo; Cleaner/Maid</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=134">&raquo; Consultancy</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=135">&raquo; Customer Service</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=136">&raquo; Design</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=137">&raquo; Education/Training</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=138">&raquo; Finance</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=139">&raquo; Freight/Shipping /Delivery/Warehouse</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=140">&raquo; Hotel/Hospitality</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=141">&raquo; Human Resource</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=142">&raquo; Information Technology</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=143">&raquo; Lawyer/Legal Service</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=144">&raquo; Management</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=145">&raquo; Manufacturing</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=146">&raquo; Marketing</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=147">&raquo; Media/Advertising</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=148">&raquo; Medical/Health/Nursing</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=149">&raquo; Merchandising/Purchasing</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=150">&raquo; Operations</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=152">&raquo; Project Management</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=153">&raquo; Quality Control</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=154">&raquo; Resort/Casino</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=155">&raquo; Sales</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=156">&raquo; Security/Driver</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=157">&raquo; Technician</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=158">&raquo; Telecommunication</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=159">&raquo; Translation/Interpretation</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=160">&raquo; Travel Agent/Ticket Sales</a></li>
											<li><a href="https://www.khmer24.com/en/post?category=151">&raquo; Others</a></li>
										</ul>
									</div>
								</li>

								<li>
									<a href="#Services" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/services.png" /> Services</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
										<li><a href="https://www.khmer24.com/en/post?category=6">&raquo; Accounting</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=17">&raquo; Automotive</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=14">&raquo; Advertising & Media</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=104">&raquo; Bridal Services</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=108">&raquo; Cleaning & Maid Services</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=20">&raquo; Construction, Arch. & Interiors</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=92">&raquo; Education & Training</a></li>
										 <li><a href="https://www.khmer24.com/en/post?category=23">&raquo; Engineering</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=112">&raquo; Insurance</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=110">&raquo; Massage & Spa</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=29">&raquo; Hospitality, Travel & Tourism</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=28">&raquo; Health, Medical & Pharma</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=31">&raquo; IT & Telecom</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=106">&raquo; Interior Design & Renovation</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=33">&raquo; Legal</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=107">&raquo; Movers & Logistics</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=113">&raquo; Plumbing & Electrical</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=38">&raquo; Property & Real Estate</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=40">&raquo; Science</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=42">&raquo; Supply Chain & Logistics</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=109">&raquo; Printing & Publishing</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=114">&raquo; Other Services</a></li>
									</ul>
									</div>
								</li>

								<li>
									<a href="#Fashion & Beauty" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/fashion-beauty.png" /> Fashion & Beauty</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
									<li><a href="https://www.khmer24.com/en/post?category=54">&raquo; Jewelry, watches </a></li>
									<li><a href="https://www.khmer24.com/en/post?category=62">&raquo; Clothing, accessories</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=59">&raquo; Beauty & Healthcare</a></li>
									</ul>
									</div>
								</li>

								<li>
									<a href="#Books, Sports & hobbies" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/books-sports-hobbies.png" /> Books, Sports & Hobbies</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
									<li><a href="https://www.khmer24.com/en/post?category=55">&raquo; CDS, DVDS, VHS</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=57">&raquo; Books</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=60">&raquo; Sports Equipment</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=63">&raquo; Others</a></li>
									</ul>
									</div>
								</li>

								<li>
									<a href="#Furniture & Decor" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/furniture-decor.png" /> Furniture & Decor</a>
									<div class="sub_cat">
										<ul class="list-unstyled items-sub-categories">
										<li><a href="https://www.khmer24.com/en/post?category=58">&raquo; Household Items</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=169">&raquo; Office Furniture</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=170">&raquo; Home Furniture</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=171">&raquo; Kitchenware</a></li>
										<li><a href="https://www.khmer24.com/en/post?category=172">&raquo; Handicrafts Paintings</a></li>
										</ul>
									</div>
								</li>

								<li>
									<a href="#Pets" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/pets.png" /> Pets</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
									<li><a href="https://www.khmer24.com/en/post?category=175">&raquo; Dogs</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=176">&raquo; Cats</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=177">&raquo; Birds</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=178">&raquo; Fish</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=179">&raquo; Pet Food</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=180">&raquo; Pet Accessories</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=181">&raquo; Other</a></li>
									</ul>
									</div>
								</li>

								<li>
									<a href="#Foods" class="btn_main_cat"><img class="icon img-cover" src="https://www.khmer24.com/khmer24-reform21/template/img/categories/foods.png" /> Foods</a>
									<div class="sub_cat">
									<ul class="list-unstyled items-sub-categories">
									<li><a href="https://www.khmer24.com/en/post?category=182">&raquo; Meat</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=183">&raquo; Seafood</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=184">&raquo; Fruits</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=185">&raquo; Vegetables</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=186">&raquo; Beverages</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=187">&raquo; Grocery</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=188">&raquo; Bread & Bakery</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=189">&raquo; Beer & Wine</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=190">&raquo; Rice & Cereal</a></li>
									<li><a href="https://www.khmer24.com/en/post?category=191">&raquo; Other</a></li>
									</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function(e) {
			function do_setMaxH() {
				if($(document).width()>=720) {
					$('.sub_cat ul').css('max-height', $('.main_cat ul').height());
				} else {
					$('.sub_cat ul').removeAttr('style');
				}
			}
			do_setMaxH();
			$(window).resize(function() {
				do_setMaxH();
			})
			
			// $('.sub_cat a').click(function(event){
			// 	event.stopPropagation();
			// 	window.location = $(this).attr('href');
			// });

	   	$('body').on('click mouseover', '.btn_main_cat', function(event){
				event.preventDefault();
				$('.main_cat li').removeClass('active');
				$(this).parent().addClass('active');

				// if($(document).scrollTop()!=$(this).next('.sub_cat').offset().top-45) {
				// 	$('html, body').animate({
				// 		scrollTop: $(this).next('.sub_cat').offset().top-45
				// 	}, 300);
				// }

			});

	    });
	</script>

	<a href="#totop" id="totop"><i class="icon-up"></i></a>

	<footer>
		<div class="my-container">
			<div class="row">
				<div class="col">
				<h5>Follow Khmer24</h5>
				<ul class="list-unstyled has-icon">
				<li><a href="https://khmer24.page.link/facebook" target="_blank" rel="nofollow"><span class="icon icon-facebook"></span> Facebook</a></li>
				<li><a href="https://khmer24.page.link/youtube" target="_blank" rel="nofollow"><span class="icon icon-youtube"></span> YouTube</a></li>
				</ul>
				</div>
				<div class="col">
					<h5>Customer Service</h5>
					<ul class="list-unstyled">
					<li><a href="https://www.khmer24.com/en/contact.html" title="Contact Us">Contact Us</a></li>
					<li><a href="https://www.khmer24.com/en/membership.html">Membership</a></li>
					<li><a href="https://www.khmer24.com/en/promote-ad.html">Promote Ad</a></li>
					<li><a href="https://www.khmer24.com/en/privacy-policy.html" title="Privacy Policy">Private Policy</a></li>
					</ul>
				</div>
				<div class="col">
					<h5>Useful Information</h5>
					<ul class="list-unstyled">
					<li><a href="https://www.khmer24.com/en/safety-tips.html">Safety Tip</a></li>
					<li><a href="https://www.khmer24.com/en/posting-rule.html">Ad Posting Rule</a></li>
					</ul>
				</div>
				<div class="col">
					<h5>Download khmer24 app for FREE</h5>
					<div class="row app-link">
					<div class="col-6 text-right">
					<a href="https://khmer24.page.link/app" target="_blank" rel="nofollow">
					<img class="img-fluid icon-qr" src="https://www.khmer24.com/khmer24-reform21/template/img/khmer24-qr-code.png">
					</a>
					</div>
					<div class="col-6 text-left">
					<div class="mt-2">
					<a href="https://khmer24.page.link/ios" target="_blank" rel="nofollow">
					<img class="img-fluid icon-app" src="https://www.khmer24.com/khmer24-reform21/template/img/appstore.png">
					</a>
					</div>
					<div class="mt-3">
					<a href="https://khmer24.page.link/android" target="_blank" rel="nofollow">
					<img class="img-fluid icon-app" src="https://www.khmer24.com/khmer24-reform21/template/img/playstore.png">
					</a>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<p class="copy-right text-center p-2 m-0">Copyright ©2015 <a href="https://www.khmer24.com/en/">KHMER24</a> (Cambodia). All rights reserved.</p>
	</footer>
	
	<div class="fix-feedback">
	<a href="https://www.khmer24.com/en/feedback" class="btn btn-primary btn-sm">Feedback</a>
	</div>
</body>
</html>