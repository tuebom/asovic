<!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">
<head>
	<meta charset="<?php echo $charset; ?>">
	<title>Kitchen equipments and Food Service supplies | Home :: ASOVIC</title>
<?php if ($mobile === FALSE): ?>
	<!--[if IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
<?php else: ?>
	<meta name="HandheldFriendly" content="true">
<?php endif; ?>
<?php if ($mobile == TRUE && $mobile_ie == TRUE): ?>
	<meta http-equiv="cleartype" content="on">
<?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="google" content="notranslate">
	<meta name="robots" content="noindex, nofollow">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Kitchen equipments and Food Service supplies" />
	<meta name="keywords" content="Apparel, Bakeware, Bar Tools, Container, Pantry, Cookware, Knives, Cutlery, Table Top, Utensil" />
	<meta name="author" content="ASOVIC" />
	<meta name="reply-to" content="marketing@asovic.com" />
	<meta name="owner" content="webmaster@asovic.com" />
<?php if ($mobile == TRUE && $ios == TRUE): ?>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Kitchen equipments and Food Service supplies | Home :: ASKITCHEN">
<?php endif; ?>
<?php if ($mobile == TRUE && $android == TRUE): ?>
	<meta name="mobile-web-app-capable" content="yes">
<?php endif; ?>
	<link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAASdAAAEnQB3mYfeAAAABN0RVh0U29mdHdhcmUAUGhvdG9TY2FwZYB1kb8AAALWSURBVEhLrVW/b9NAFA5DGQAJkHx3dmLfuS0sRSCVgFRY2BFigYmNvwCxIEYm/gHEgmBjYClSlzJRUANUiX/Eza+WBtpKoCIksnRggGLznnuGJJzjhPaTPimy/b5337v3XnKjYEkrnPSouODr5vk0ulTMVNnkKRmyf6iaZiFg/EuVidBlYieNAbN/uZRvz2v5aRm6PwDRJ5vGRLTMRCprQB8IB43g+xcydO/wdOtcQxc7y8yOE6QxAL4mZlimVtQ2xiOPWlelxN4Abl59QMG+hN2Eq4nKlIdwgPj3e3088ilvNaamDkqZ/4NP+HV0g6KqxAnx/ULsnv/5dj2ugrgtpUZHwNhhEGqvohspqiKW/t2u+xB/J8+buh1VqeiUCdGl5GhwmXV3AxqvO1k/0S1ezUtSCJ0u9wk3oArw/KGUHB6eZeWhszsNcNEt2E90XALni/Lu+9/jZNSZ+OHRwhkpPRxcaj3G02c1HpYZ3EewA5TfYPxH0IFGnpfS2XA0frbBxE+cbZVowjqM5RtqvsUKwAJSfoPEg+JUuBq/IlMMBtzZQtbYrYJzj/G1EufHPcpLbUgw6Hs8AExE0y3mxmQaNSo6v4ZiqvtMiO/wgD4VNzDG1+xLTahA9wSoiGMJV3srTqSCaxiH0BW6Uwkg0eXuluOLUS53QIZi1Z6tw8QMqkI8lkx8W6KUybBeeITfyRo77AtwG1YIvyjDYnimeaJG7e/1jKnBxq5Q8UCG/UWLcwNK2MFTqgKR6C7ebkQ8lWE9gCrczzJQg6vCsXSoeVqG7cJh4hGeThWUEHcCVGDb020hw3pQPSqOBVR8Xskw8c9YBpqYHmbs4r1ArHsyTAmPmTcxwaAmxmbFqXB0cTnnFotj8K/lfM1PRmvwMI2f8hOw1/lmg5AjMpcS2JjQoO5Wht4W6EEVWrDxxAysyzmf8Vk4SCrbhj3rsuEWCWquMFup00PGn/8G6hb68uYMhAoAAAAASUVORK5CYII=">
	<link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Calibri'>
	<link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300'>
	
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css');?>" media="all"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/font-awesome.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/jquery-ui.css');?>">
	
	<!--<link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>">-->
	<link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url($frameworks_dir . '/adminlte/plugins/iCheck/flat/blue.css'); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css');?>" media="all"/>
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- <script src="<?=base_url('js/jquery.min.js');?>"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<?php if (current_url() == site_url()): ?>
<script src="<?=base_url('js/responsiveslides.min.js');?>"></script>
<script>
  $(function () {
   $("#slider").responsiveSlides({
   	auto: true,
   	nav: true,
   	speed: 500,
    namespace: "callbacks",
    pager: true,
   });

  });
</script>
<?php endif; ?>
<script type="text/javascript" src="<?=base_url('js/bootstrap-3.1.1.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- cart -->
<script src="<?=base_url('js/simpleCart.min.js');?>"></script>
<!-- cart -->

<!--start-rate-->
<script src="<?=base_url('js/jstarbox.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('css/jstarbox.css');?>" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript">
jQuery(function() {

	jQuery('.starbox').each(function() {
		var starbox = jQuery(this);
			starbox.starbox({
			average: 0, //starbox.attr('data-start-value'),
			changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
			ghosting: starbox.hasClass('ghosting'),
			autoUpdateAverage: true, //starbox.hasClass('autoupdate'),
			buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
			stars: starbox.attr('data-star-count') || 5
			}).bind('starbox-value-changed', function(event, value) {
				starbox.starbox('setOption', 'average', value);
				var el = $(this).parents("#formReview").find('#rating')[0];
				if (el) el.value = value;
			// if(starbox.hasClass('random')) {
			// var val = Math.random();
			// starbox.next().text(' '+val);
			// return val;
			// }
		})
	});

	$.ajax({
		url: "https://geoip-db.com/jsonp",
		jsonpCallback: "callback",
		dataType: "jsonp",
		success: function( location ) {
			// $('#country').html(location.country_name);
			$('#state').html(location.state);
			$('#city').html(location.city);
			// $('#latitude').html(location.latitude);
			// $('#longitude').html(location.longitude);
			// $('#ip').html(location.IPv4);  
		}
	});     

});
</script>
<!--//End-rate-->

<script defer src="<?=base_url('js/jquery.flexslider.js');?>"></script>
<link rel="stylesheet" href="<?=base_url('css/flexslider.css');?>" type="text/css" media="screen" />
<script src="<?=base_url('js/imagezoom.js');?>"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });

});
</script>

<link href="<?=base_url('css/owl.carousel.css');?>" rel="stylesheet">
<script src="<?=base_url('js/owl.carousel.js');?>"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 5,
			loop:true,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
	});
</script>

<?php if ($mobile === FALSE): ?>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url($plugins_dir . '/html5shiv/html5shiv.min.js'); ?>"></script>
		<script src="<?php echo base_url($plugins_dir . '/respond/respond.min.js'); ?>"></script>
	<![endif]-->
<?php endif; ?>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c2f0a6a04c7730011f604db&product=sticky-share-buttons' async='async'></script>
</head>
<body>

	<?php if (current_url() !== site_url().'cart/add' && current_url() !== site_url().'checkout'): ?>
	<a href="#menu-modal" class="float" data-toggle="modal"><img id="maskot" src="<?= site_url('images/mb2.png'); ?>" alt="maskot"><!--<i class="fa fa-question-circle my-float"></i>--></a>
	<?php
	  $sTmp = (current_url() == site_url())? "true;" : "false;";
	?>
	<script type="text/javascript">
	// var bShowDlg = <?php echo $sTmp; ?>

    // $(window).load(function(){
    //   if (bShowDlg) modal.open();
	// });
	
	</script>
	<div class="label-container">
	<div class="label-text">Show Suggestions</div>
	<i class="fa fa-play label-arrow"></i>
	</div>
	<?php endif; ?>

	<script>
	$(document).ready(function() {
		$('.modal').on("shown.bs.modal",function(l){
			$("#menu-modal").velocity("callout.bounce");
		});
		
		$("#cart").on("click", function() {
			$(".shopping-cart").fadeToggle( "fast");
		});
	
	  // $('#img-logo').hover(function(){
		// 	$(this).attr('src','<?= site_url('images/asovic2.png'); ?>');
		// },function(){
		// 	$(this).attr('src','<?= site_url('images/asovic.png'); ?>');
		// });
	
	  // $('.dropdown-toggle').hover(function(){
		// 	var menu = $(this).attr('data-menu');
		// 	$('#'+menu).not('.in .dropdown-menu').stop(true, true).delay(100).fadeIn(400);
		// 	$(this).toggleClass('open');
		// },function(){
		// 	var menu = $(this).attr('data-menu');
		// 	$('#'+menu).not('.in .dropdown-menu').stop(true, true).delay(100).fadeOut(400);
		// 	$(this).toggleClass('open');
		// });
	
	    $('#maskot').hover(function(){
			$(this).attr('src','<?= site_url('images/mb1.png'); ?>');
		},function(){
			$(this).attr('src','<?= site_url('images/mb2.png'); ?>');
		});

	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
			$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
			$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	
		var navbar = document.getElementById("nav1");
		var navmenu = document.getElementById("bs-megadropdown-tabs");
		var sticky = navbar.offsetTop;
		var topPos = (window.screen.width > 768) ? 132: 210;
		
		$(".dropdown-menu.catalog").css( 'top', topPos+'px');
		
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("myBtn").style.display = "block";
			} else {
				document.getElementById("myBtn").style.display = "none";
			}
			
			if (window.pageYOffset >= sticky) {
				
				navbar.classList.add("sticky");
				navmenu.classList.add("sticky")
				
				topPos = 40;
				$(".dropdown-menu.catalog").css( 'top', topPos+'px');
			} else {
				
				navbar.classList.remove("sticky");
				navmenu.classList.remove("sticky");
				
				if (window.screen.width > 768)
				{
					topPos = 132 - window.pageYOffset;
				}
				else
				{
					topPos = 210 - window.pageYOffset;
				}
				$(".dropdown-menu.catalog").css( 'top', topPos+'px');
			}
		}
	});
	</script>

	<!--header-->
		<div class="header">
			<div class="header-top-most">
				<div class="container2">
					<div class="top-left">
						<a href="#"><img id="img-logo" class="img-header" src="<?= site_url('images/askitchen.jpg'); ?>" alt="ASKITCHEN Logo" hspace="3" /></a>
						<a href="http://www.asovic.co.id/" target="_blank"><img class="img-header" src="<?= site_url('images/asovic.jpg'); ?>" alt="ASOVIC Logo" hspace="3" /></a>
						<a href="http://www.muchef.com/" target="_blank"><img class="img-header" src="<?= site_url('images/muchef.jpg'); ?>" alt="MUCHEF Logo" hspace="3" /></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="header-top">
				<div class="container top">
					<div class="top-left">
						<div>
							<a href="<?php echo site_url(); ?>"><img src="<?= site_url('images/logo1.png'); ?>" alt="ASOVIC Logo"></a>
						</div>
						<div class="location">
							<img src="<?= site_url('images/location.png'); ?>" alt="location"/>
							<span style="display: inline-block; vertical-align: middle; color:#fff;">Deliver To<br><span id="city"></span>,&nbsp<span id="state"></span></span></a>
						</div>
					</div>
					<div class="top-left2">
						<!-- search form -->
						<form id="frmSearch" action="<?php echo site_url('search'); ?>" method="get" class="sidebar-form">
							<div class="input-group search">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All <span class="caret"></span></button>
									<ul class="dropdown-menu">
									<?php
										foreach ($this->data['golongan'] as $item) {
									?>
										<li><a href="<?php echo site_url('categories/'.$item->kdgol); ?>"><?= $item->nama ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
								<input type="text" name="q" class="form-control" placeholder="Search for..." value="">
								<span class="input-group-btn">
									<button id='search-btn' class="btn btn-default-go" type="button" onclick="frmSearch.submit();"><img class="img-go" src="<?= site_url('images/search.png'); ?>"></button>
								</span>
							</div>
						</form>
						
						<nav class="navbar navbar-default" id="nav1">
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">

									<!-- Mega Menu -->
									<?php 
										$index = 0;

										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown" data-menu="dropdown-<?=$item->kdgol?>">
										<a href="<?php echo site_url('products/'.$item->kdgol); ?>" class="dropdown-toggle" data-toggle="dropdown" data-menu="dropdown-<?=$item->kdgol?>"><?php echo $item->nama ?><b class="caret"></b></a>
										<!-- <ul class="dropdown-menu multi-column columns-3">
										</ul> -->
									</li>
									<?php 
											$index++;
											// if ($index == 5) break;
										}
									?>
								</ul>
							</div>
						</nav>
					</div>
					<div class="top-right">
						<ul>
							<?php if ($admin_link): ?>
							<li><a href="<?php echo site_url('admin'); ?>">Admin</a></li>
							<?php endif; ?>
							<?php if ($logout_link): ?>
							<li class="dropdown"><a href="<?= isset($_SESSION['guest'])? '#': site_url('akun'); ?>"><?= $first_name .' '.$last_name ?>&nbsp;<b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li class=""><a href="<?= site_url('akun'); ?>"><i class="mi fa fa-user"></i> Profile</a></li>
									<li class=""><a href="<?= site_url('akun?p=bb'); ?>"><i class="mi fa fa-heart"></i> Orders</a></li>
									<li class=""><a href="<?= site_url('akun?p=histori'); ?>"><i class="mi fa fa-heart-o"></i> Quotations</a></li>
									<li role="separator" class="divider"></li>
									<li class=""><a href="<?= site_url('auth/logout/public'); ?>"><i class="mi fa fa-sign-out"></i> Logout</a></li>
								</ul>
							</li>
							<!-- <li><a href="<?php echo site_url('akun'); ?>">Akun Saya</a></li> -->
							<li><a href="<?php echo site_url('auth/logout/public'); ?>">Logout</a></li>
							<?php else: ?>
							<li><a href="<?php echo site_url('register'); ?>">Register</a></li>
							<li><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
							<!--<li><a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">Sign In</a></li>-->
							<?php endif; ?>
							<li><a href="#" id="cart">Cart&nbsp;<img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>
							&nbsp;<span class="badge badge-primary"><?php if($this->session->userdata('totqty')): echo $this->session->userdata('totqty'); else: echo '0'; endif; ?></span></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default" id="nav2">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs2">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs2">
								
								<ul class="nav navbar-nav">

									<!-- Mega Menu -->
									<?php 
										$index = 0;

										foreach ($this->data['golongan'] as $item) {
									?>
									<li class="dropdown">
										<a href="<?php echo site_url('products/'.$item->kdgol); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $item->nama ?><b class="caret"></b></a>
											<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
												<li class="col-sm-2 multi-gd-img">
													<div class="row text-center"><label class="block-with-text"><?php echo $detail->nama ?></label></div>
													<div class="row">
														<div class="sample">
														<a href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">
															<img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
														</div>
													</div>
													<!-- <div><label class="block-with-text"><?php echo $detail->nama ?></label></div> -->
													<div class="row text-center">
														<a class="view-more btn- btn-sm" href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">More</a>
													</div>
												</li>
												<?php } ?>
											</div>
										</ul>
									</li>
									<?php 
											$index++;
										}
									?>
								</ul>
							</div>
							</nav>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
	
			</div>
		</div>
	<!--header-->
	
	<!--modal-->
	<div id="menu-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog menu-modal">
			<a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="menu-close"><i class="fa fa-times"></i></a>
			<div class="hello-body">
				<h3 class="tittle text-center">hello,</h3>
				<h4 class="hello-tittle text-center">Choose your restaurant type..</h4>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=asia'); ?>">Chinese/Asian Food</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=western'); ?>">Western Food</a></span>
					</div>
				</div>
					
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bakery'); ?>">Bakery &amp; Pastry</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=indonesia'); ?>">Indonesian Food</a></span>
					</div>
				</div>

				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bbq'); ?>">BBQ/Outdoor</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=coffee'); ?>">Coffee Shop</a></span>
					</div>
				</div>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=bar'); ?>">Bar</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=ftruck'); ?>">Food Truck</a></span>
					</div>
				</div>
				<div class="hello-bar">
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=minimarket'); ?>">Minimarket/Supermarket</a></span>
					</div>
					<div class="col-sm-6 col-xs-12">
						<span class="detail"><a class="hello-menu" href="<?php echo site_url('searchtag?tag=other'); ?>">Others...</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--modal-->

	<?php 
		$index = 0;

		foreach ($this->data['golongan'] as $item) {
	?>
	<div id="dropdown-<?=$item->kdgol?>" class="dropdown-menu catalog">
	<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
		<div class="col-sm-2 multi-gd-img">
			<div class="row text-center"><label class="block-with-text"><?php echo $detail->nama ?></label></div>
			<div class="row">
				<div class="sample">
				<a href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">
					<img src="<?php echo site_url($this->data['products_dir'].'/'.$detail->gambar); ?>" alt="<?php echo $detail->nama ?>"/></a>
				</div>
			</div>
			<!-- <div class="row text-center"><label class="block-with-text"><?php echo $detail->kdbar ?></label></div> -->
			<div class="row text-center">
				<a class="view-more btn- btn-sm" href="<?php echo site_url('subcategories/'.$item->kdgol.'/'.$detail->kdgol2); ?>">More</a>
			</div>
		</div>
	<?php } ?>
	</div>
	<?php } ?>

	<div class="shopping-cart">
		<div class="shopping-cart-header">
		<i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php if($this->session->userdata('totqty')): echo number_format($this->session->userdata('totqty'),0,",","."); else: echo '0'; endif; ?></span>
		<div class="shopping-cart-total">
			<span class="lighter-text">Total:&nbsp;</span>
			<span class="main-color-text">Rp<?php if($this->session->userdata('tot_price')): echo number_format($this->session->userdata('tot_price'),0,",","."); else: echo '0'; endif; ?></span>
		</div>
		</div> <!--end shopping-cart-header -->

		<ul class="shopping-cart-items">
		<?php 
			$item_price = 0;
			
			if(isset($_SESSION["cart_item"])):
			foreach ($_SESSION["cart_item"] as $item) {
			
			$item_price  = (float)$item["qty"]*$item["harga"];

		?><li class="clearfix">
			<div style="display: flex; align-items: center;">
				<div class="cart-img">
					<img src="<?= site_url($this->data['products_dir'].'/'.$item["gambar"]); ?>" alt="item1" />
				</div>
				<div class="cart-desc">
					<span class="item-name"><?= $item["nama"]; ?></span>
					<span class="item-price">Rp<?= number_format($item_price, 0, ',', '.') ?></span>
					<span class="item-quantity">Qty: <?= $item["qty"]; ?></span>
				</div>
				<div class="rem2">
				<a href="<?= current_url().'?action=remove&code='.$item["kdurl"] ?>"><span class="close2"></span></a>
				</div>
			</div>
		</li>
		<?php } endif; ?>
		</ul>

		<a href="<?php echo site_url('cart'); ?>" class="button <?php if($this->session->userdata('totqty')): echo ''; else: echo 'btn disabled'; endif;?>">Checkout</a>
	</div> <!--end shopping-cart -->
