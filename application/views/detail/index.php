
	<!--content-->
        <div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						<div clas="single-top">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="row">
									<div class="flexslider">
										<ul class="slides">
											<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
												<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
												<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
											</li>
											<li data-thumb="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>">
												<div class="thumb-image"> <img src="<?=base_url($this->data['products_dir'].'/'.$this->data['product']->gambar);?>" data-imagezoom="true" class="img-responsive"> </div>
											</li> 
										</ul>
									</div>
								</div>
							</div>

							<!-- <div class="single-right simpleCart_shelfItem"> -->
							<div class="col-md-4 col-sm-4 col-xs-12">
								<form id="formAdd" action="<?= site_url('cart/add'); ?>" method="post">
								<input type="hidden" name="kode" value="<?= $this->data['product']->kdbar ?>">
								<input type="hidden" id="qty" name="qty" value="1">
								
								<h4><?= $this->data['product']->nama . '<br>('. $this->data['product']->kdbar .')' ?></h4>
								<div class="block">
									<div class="starbox small ghosting unchangeable" data-start-value="<?= $this->data['item_rating']->rating ?>"> </div>
								</div>
								<p class="price item_price">Rp <?= $this->data['product']->hjual ?></p>
								
								<div class="color-quality">
									<h6>Quantity:</h6>
										<div class="quantity"> 
											<div class="quantity-select">                           
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value"><span>1</span></div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
										<script>
										$('.value-plus').on('click', function(){
											var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
											divUpd.text(newVal);
											$(this).parents("#formAdd").find('#qty')[0].value = divUpd.text();

											var theUrl = "<?= current_url().'?action=add&code='.$this->data['product']->kdurl ?>";
											var newUri = theUrl + '&qty='+divUpd.text();
											$('#qtyOrder').attr("href", newUri);
										});

										$('.value-minus').on('click', function(){
											var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
											if(newVal>=1) divUpd.text(newVal);
											$(this).parents("#formAdd").find('#qty')[0].value = divUpd.text();

											var theUrl = "<?= current_url().'?action=add&code='.$this->data['product']->kdurl ?>";
											var newUri = theUrl + '&qty='+divUpd.text();
											$('#qtyOrder').attr("href", newUri);
										});
										</script>
								</div>
								<div class="women">
									<!-- <a href="javascript:{}" onclick="document.getElementById('formAdd').submit(); return false;" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a> -->
									<a id="qtyOrder" href="<?= current_url().'?action=add&code='.$this->data['product']->kdurl ?>" class="my-cart-b item_add">Add To Cart</a>
								</div>
								<div class="social-icon">
									<h6>Share:</h6>
									<a href="#"><i class="icon"></i></a>
									<a href="#"><i class="icon1"></i></a>
									<!-- <a href="#"><i class="icon2"></i></a>
									<a href="#"><i class="icon3"></i></a> -->
								</div>
								</form>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="box box-primary">
									<div class="box-header with-border">

									<!-- <div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									</div> -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">
									<?php if( count($promotion) > 0) { ?>
									<h3 class="box-title">Promotion Products</h3>
									<ul class="products-list product-list-in-box">
										<?php 
											$index = 0;
											foreach ( $promotion as $item) { ?>
										<li class="item">
											<div class="product-img">
												<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar)?>" alt="Image">
											</div>
											<div class="product-info">
												<a class="product-title promo" href="<?= site_url('detail/'.$item->kdurl); ?>"><?=$item->nama . ' ('. $item->kdbar .')'?></a><br>
												<span class="label label-warning">Rp<?=$item->hjual?></span></a>
												<span class="product-description"><?=$item->deskripsi?></span>
											</div>
										</li>
										<!-- /.item -->
										<?php 
											$index++;
											if ($index == 5) break;
											} ?>
									</ul>
									<?php } // tidak ada item promo
									elseif( count($related) > 0) { ?>
									<h3 class="box-title">Related Products</h3>
									<ul class="products-list product-list-in-box">
										<?php 
											$index = 0;
											foreach ( $related as $item) { ?>
										<li class="item">
											<div class="product-img">
												<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar)?>" alt="Image">
											</div>
											<div class="product-info">
												<a class="product-title promo" href="<?= site_url('detail/'.$item->kdurl); ?>"><?=$item->nama . ' ('. $item->kdbar .')'?></a><br>
												<span class="label label-warning">Rp<?=$item->hjual?></span></a>
												<span class="product-description"><?=$item->deskripsi?></span>
											</div>
										</li>
										<!-- /.item -->
										<?php 
											$index++;
											if ($index == 5) break;
											} ?>
									</ul>
									<?php } ?>
									</div>
									<!-- /.box-body -->
									<!-- <div class="box-footer text-center">
									<a href="javascript:void(0)" class="uppercase">View All Products</a>
									</div> -->
									<!-- /.box-footer -->
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
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
});
</script>
						<div class="tab-wl3">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
									<li role="presentation" class=""><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Fitur</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"><div class="descr">
										<!--<h4>Suspendisse laoreet, augue vel mattis </h4>-->
										<p> <?= $this->data['product']->deskripsi ?></p>
									</div></div>
									
									<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
										<ul>
											<p> <?= $this->data['product']->fitur ?></p>
											<!-- <li> Twin button front fastening</li>
											<li> Length:65cm</li>
											<li> Regular fit</li>
											<li> Notched lapels</li>
											<li> Internal pockets</li>
											<li> Centre-back vent </li>
											<li> Material : Outer: 40% Linen &amp; 40% Polyamide; Body Lining: 100% Cotton; Lining: 100% Acetate</li> -->
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab"></div>
								</div>
							</div>
						</div>
						<div clas="single-top">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!--single-->
			<?php
				if (count($this->data['related']) > 0) :
			?>
			<!--related-products-->
			<div class="related-w3agile">
				<div class="container">
					<h3 class="tittle1">Related Products</h3>
					<div class="related-grids">
						<div id="owl-demo" class="owl-carousel owl-theme owl-loaded owl-drag">

							<?php
								$index = 0;
								foreach ($this->data['related'] as $item) {
							?>
							<!-- <div class="col-md-3 related-grid simpleCart_shelfItem"> -->
							<div class="item related">
								<div class="grid-rel">
									<div class="grid-related">
										<figure>		
											<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="new-gri">
												<div class="grid-img">
													<img src="<?=site_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar?>">
												</div>
											</a>		
										</figure>	
									</div>
									<div class="women">
										<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
										<span class="size"><?= $item->nama; ?></span>
										<span class="detail"><a href="<?= current_url().'?action=add&code='.$item->kdurl ?>" class="my-cart-d item_add"><img src="<?= site_url('images/bag.png'); ?>" alt="Cart" /></a>&nbsp;<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="my-cart-d item_add">Detail</a></span>
									</div>
								</div>
							</div>
							<?php 
								$index++;
								// if ($index == 6) break;
								} ?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<!--related-products-->
			<?php
				endif;
			?>
			<!--reviews-->
			<div class="reviews">
				<div class="container">
					<h3 class="tittle1">Reviews</h3>
					<div class="col-md-7">
						<div class="related-grids">
							<div class="reviews-top">
								<?php
									foreach ($this->data['reviews'] as $item) {
								?>
								<div class="comment">
									<div class="reviews-left">
										<img src="<?=site_url('images/user.jpg');?>" alt=" " class="img-responsive">
									</div>
									<div class="reviews-right">
										<ul>
											<li><a href="#"><?=$item->name?></a> <!--<?=date_format($item->timestamp, "j D Y")?>--></li>
											<!-- <li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li> -->
										</ul>
										<p><?=$item->comment?></p>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php }
									if(isset($this->data['showbutton'])) {
									// if($this->data['totreviews'] > 3): ?>
									<a class="all-reviews" href="<?=current_url().'?action=getall';?>">Read All Reviews</a>
								<?php } ?>
							</div>
							<div class="reviews-bottom">
								<h4>Add Reviews</h4>
								<p>Your email address will not be published. Required fields are marked *</p>
								Your Rating
								<form id="formReview" action="<?=current_url().'?action=comment';?>" method="post">
								<div class="block">
									<div class="starbox small ghosting" data-start-value="<?=isset($this->data['rating']) ? $this->data['rating'] : '0';?>"><div class="positioner" style=""><div class="stars"><div class="ghost" style="width: 0px; display: none;"></div><div class="colorbar" style="width: 42.5px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
								</div>
									<input type="hidden" name="kdbar" value="<?= $this->data['product']->kdbar ?>">
									<input type="hidden" name="url" value="<?= current_url() ?>">
									<input type="hidden" id="rating" name="rating" value="<?=isset($this->data['rating']) ? $this->data['rating'] : '0';?>">
									<label>Your Review </label>
									<textarea type="text" name="comment" placeholder="Message..." required><?=isset($this->data['comment']) ? $this->data['comment'] : '';?></textarea>
									<div class="row">
										<div class="col-md-6 row-grid">
											<label>Name</label>
											<input type="text" name="name" placeholder="Name" value="<?=isset($this->data['name']) ? $this->data['name'] : '';?>" required>
										</div>
										<div class="col-md-6 row-grid">
											<label>Email</label>
											<input type="email" name="email" placeholder="Email" value="<?=isset($this->data['email']) ? $this->data['email'] : '';?>" required>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-md-6 row-grid">
											<div class="form-group">
                                        		<div class="g-recaptcha" data-sitekey="6Le1AowUAAAAAF_pBHB401tykRs1buhibhqTC0uy" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                        		<input class="form-control hidden" data-recaptcha="true" required data-error="Please complete the Captcha">
                                        	<div class="help-block with-errors"></div>
                                    	</div>
										</div>
									<div class="row">
										<div class="col-md-3 col-xs-4 row-grid">
											<input id="btnSend" type="submit" value="Send">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--reviews-->
		</div>
    <!--content-->
	<script>
	$(function () {

// init the validator
// validator files are included in the download package
// otherwise download from http://1000hz.github.io/bootstrap-validator

    window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change')
    }

    window.expiredRecaptchaCallback = function () {
        $('input[data-recaptcha]').val("").trigger('change')
    }
</script>
