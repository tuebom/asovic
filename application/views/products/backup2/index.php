    <!--content-->
        <div class="content">
				<div class="products-agileinfo">
                    <h4 class="tittle1"><?php echo $this->data['title']; ?></h4>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<label class="search">Show results for</label>
								<div class="categories">

									<ul>
										<li><input type="checkbox" id="item-001" /><label class="search" for="item-001"><span></span><b>Categories</b></label>
											<ul class="tree-list-pad">
												<?php
													$index = 0;
													foreach ($this->data['golongan'] as $item) {
												?>
												<li><input type="checkbox" id="item-<?=$index?>" /><label class="title" for="item-<?=$index?>"><span></span><?= $item->nama ?></label>
													<ul>
														<?php foreach ($this->data['item_'.$item->kdgol] as $detail) { ?>
														<li><input type="checkbox" id="item-<?=$index?>-0" /><a href="<?php echo site_url('products/'.$detail->kdgol2); ?>"><?= $detail->nama?></a></li>
														<?php } ?>
													</ul>
												</li>
												<?php $index++; } ?>
											</ul>
										</li>
									</ul>
								</div>
								<div class="price">
									<label class="title">Price</label>

									<ul>
										<li><a href="<?php echo site_url('search?p1=0&p2=999999'); ?>">Under Rp1.000.000</a></li>
										<li><a href="<?php echo site_url('search?p1=1000000&p2=5000000'); ?>">Rp1.000.000 to Rp5.000.000</a><li>
										<li><a href="<?php echo site_url('search?p1=5000000&p2=10000000'); ?>">Rp5.000.000 to Rp10.000.000</a><li>
										<li><a href="<?php echo site_url('search?p1=10000000'); ?>">Rp10.000.000 Above</a></li>
									</ul>
									 
								</div>
								<div class="brand-w3l">
									<label class="title">Brand</label>
									<ul>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GEA'); ?>">GEA</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/GETRA'); ?>">GETRA</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/SANDEN'); ?>">SANDEN</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/MADIN'); ?>">MADIN</a></li>
										<li><a href="<?php echo site_url('products/'.$this->data['kode'].'/OTHER'); ?>">OTHER</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<!--<div class="product-agileinfon-top">
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="<?=base_url('images/img1.jpg');?>" alt="">
									</div>
									<div class="col-md-6 product-agileinfon-top-left">
										<img class="img-responsive " src="<?=base_url('images/img2.jpg');?>" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="mens-toolbar">
									<p >Showing 1–9 of 21 results</p>
									 <p class="showing">Sorting By
										<select>
											  <option value=""> Name</option>
											  <option value="">  Rate</option>
												<option value=""> Color </option>
												<option value=""> Price </option>
										</select>
									  </p> 
									  <p>Show
										<select>
											  <option value=""> 9</option>
											  <option value="">  10</option>
												<option value=""> 11 </option>
												<option value=""> 12 </option>
										</select>
									  </p>
									<div class="clearfix"></div>		
								</div>-->
								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
										<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="<?=base_url('images/menu1.png');?>"></a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="<?=base_url('images/menu.png');?>"></a></li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
											<?php
												
												echo '<!-- rec. count: '. count($this->data['products']) . ' -->'; 

												$index = 0;
												$icount = 0;
												$iloop = 1;

												foreach ($this->data['products'] as $item) {

													if ($index == 4) $index = 0;

													if ($index == 0) { // buat tab product baru

											?>
											<div class="product-tab">
											<?php echo '<!-- prod-tab-'.$iloop. ' -->'; ?>
											<?php
													}

													if ($index < 4) {
											?>
												<div class="col-md-3 product-tab-grid simpleCart_shelfItem">
													<div class="grid-arr">
														<div class="grid-arrival">
															<figure>		
																<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="new-gri">
																	<div class="grid-img">
																		<img src="<?=base_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar; ?>">
																	</div>
																</a>		
															</figure>	
														</div>
														<div class="block">
															<div class="starbox small ghosting"> </div>
														</div>
														<div class="women">
															<p ><em class="item_price">Rp<?= $item->hjual; ?></em></p>
															<span class="size"><?= $item->kdbar; ?></span>
															<span class="detail"><a href="<?php echo site_url('detail/'.$item->kdurl); ?>" data-text="See Details" class="my-cart-d item_add">See Details</a></span>
														</div>
													</div>
												</div>
											<?php 
													$index++;
													$icount++;
												}
												
												if ($index == 4 || $icount == count($this->data['products'])) :
													$iloop++;
											?>
												<div class="clearfix"></div>
											</div>
											<?php
												endif;
											}
											?>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
											<?php
												foreach ($this->data['products'] as $item) {
											?>
											<div class="product-tab1">
												<div class="col-md-3 product-tab1-grid">
													<div class="grid-arr">
														<div class="grid-arrival">
															<figure>		
																<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" class="new-gri">
																	<div class="grid-img">
																		<img src="<?=base_url($this->data['products_dir'].'/'.$item->gambar);?>" class="img-responsive" alt="<?= $item->kdbar; ?>">
																	</div>
																</a>		
															</figure>	
														</div>
													</div>
												</div>
												<div class="col-md-9 product-tab1-grid1 simpleCart_shelfItem">
													<div class="block">
														<div class="starbox small ghosting"> </div>
													</div>
													<div class="women">
														<h6><a href="<?php echo site_url('detail/'.$item->kdurl); ?>"><?= $item->kdbar; ?></a></h6>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
														<p><!--<del>$100.00</del>--><em class="item_price">Rp<?= $item->hjual; ?></em></p>
														<a href="<?php echo site_url('detail/'.$item->kdurl); ?>" data-text="See Details" class="my-cart-d item_add">See Details</a>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<?php } ?>
											
										</div>
									</div>
								</div>
								<div class="box-footer" align="center">
									<?php echo $this->pagination->create_links(); ?>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		<!--content-->
