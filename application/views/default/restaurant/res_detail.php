<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="<?php echo base_url();?>restaurant">Restaurant</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8" id="single_tour_desc">

					<div id="single_tour_feat">
						<ul>
							<?php
							$luotxem="";
							if($info_restaurant->res_hits==null||$info_restaurant->res_hits==0)
							{
								$luotxem="Không có lượt xem nào";
							}
							else $luotxem=$info_restaurant->res_hits;
							?>
							<?php if($info_restaurant->res_address!=NULL){ ?>
							<li><i class="icon-eye"></i>Lượt xem: <?php echo $luotxem;?></li><?php } ?>
							<?php if($info_restaurant->res_phone!=NULL){ ?>
							<li><i class="icon-phone"></i>SĐT: <?php echo $info_restaurant->res_phone;?></li><?php } ?>
						</ul>
					</div>

					<p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p>
					<!-- Map button for tablets/mobiles -->
					<?php 
					if($info_restaurant->album_res!=NULL){ ?>
					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">
							<?php
							
							$album_res=explode("|",$info_restaurant->album_res);
							foreach($album_res as $item){
							?>
								<div class="sp-slide">
									<img title="<?php echo $info_restaurant->res_name; ?>" class="sp-image" src="<?php base_url(); ?>assets/default/css/images/blank.gif" 
									data-src="<?php echo $item; ?>" 
									data-small="<?php echo $item; ?>" 
									data-medium="<?php echo $item; ?>" 
									data-large="<?php echo $item; ?>" 
									data-retina="<?php echo $item; ?>">
								</div>
							<?php } ?>
							
						</div>
						<div class="sp-thumbnails">
							<?php
							foreach($album_res as $item){  ?>
								<img alt="<?php echo $info_restaurant->res_name; ?>" class="sp-thumbnail" src="<?php echo $item; ?>">
							<?php } ?>
						</div>
					</div>	
					<?php }
					?>
					
					<hr>

					<div class="row">
						<div class="col-lg-3">
							<h3>Chi tiết nhà hàng</h3>
						</div>
						<div class="col-lg-9">
							<h4>Sơ lược về nhà hàng</h4>
							<div class="col-lg-9">
								<?php echo $info_restaurant->res_description;?>
							</div>
							<hr>
							<h4>Mô tả chi tiết</h4>
							<p>
							<?php echo $info_restaurant->res_except;?>
							</p>
							<!--<div class="row">
								<div class="col-md-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>Ut est saepe munere ceteros</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>No scripta electram necessitatibus sit</li>
									</ul>
								</div>
							</div>-->
							<!-- End row  -->
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-3">
							<h3>Đánh giá </h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Đánh giá nhà hàng</a>
						</div>
						<div class="col-lg-9">
							<div id="general_rating"><?php echo $info_restaurant->num_rev;?> Đánh giá
								<div class="rating">
								<?php
								for($j=0;$j<5;$j++){
									if(($info_restaurant->avg_rev)>$j){
										echo '<i class="icon-smile voted"></i>';
									}	
									else
										echo'<i class="icon-smile"></i>';
								}
								?>
								</div>
							</div>
							<!-- End general_rating -->
							<div class="row" id="rating_summary">
								<div class="col-md-6">
									<ul>
										<li>Cảnh
											<div class="rating">
											
											<?php
											for($j=0;$j<5;$j++){
												if(($info_restaurant->avg_view)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												
											</div>
										</li>
										<li>Phục vụ
											<div class="rating">
												<?php
												for($j=0;$j<5;$j++){
													if(($info_restaurant->avg_waiter)>$j){
														echo '<i class="icon-smile voted"></i>';
													}	
													else
														echo'<i class="icon-smile"></i>';
												}
												?>
												
											</div>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>Chất lượng đồ ăn
											<div class="rating">
											<?php
												for($j=0;$j<5;$j++){
													if(($info_restaurant->avg_quality)>$j){
														echo '<i class="icon-smile voted"></i>';
													}	
													else
														echo'<i class="icon-smile"></i>';
												}
												?>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- End row -->
							<hr>

							<?php
							foreach($reviews_restaurant as $review){ ?>

								<div class="review_strip_single">
									<img src="<?php echo base_url(); ?>assets/default/img/avatar3.jpg" alt="<?php echo $review->rev_name; ?>" class="rounded-circle">
									<small> - <?php 
									$time_rev= new DateTime($review->rev_time);
									echo $time_rev->format('d-m-Y') ?> -</small>
									<h4><?php echo $review->rev_name; ?></h4>
									<p>
										"<?php echo $review->rev_content; ?>"
									</p>
									<div class="rating">
										<?php
										for($j=0;$j<5;$j++){
											if(($review->rev_star)>$j){
												echo '<i class="icon-smile voted"></i>';
											}	
											else
												echo'<i class="icon-smile"></i>';
										} ?>
										
									</div>
								</div>
								<!-- End review strip -->

								<?php } ?>
						</div>
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-lg-4">
					<p class="d-none d-xl-block d-lg-block d-xl-none">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<div class="box_style_1 expose">
						<h3 class="inner">- Danh sách tour liên quan -</h3>
						<hr>
						<?php
						if(count($info_tour)==0){
							echo "Không có tour nào ở đây!";
						}
							foreach($info_tour as $tour){
						?>
								<div class="row">
									<div class="col-lg-4 col-md-4" style="padding-left: 5px;">
										<div>
										<?php
											$image=$tour->tour_thumnail;
											if($image==null){
												$image='http://localhost:8080/tour/assets/default/img/restaurant_top.jpg';
											}
										?>
											<a href="<?php echo base_url();?>tour/detail/<?php echo $tour->tour_slug;?>"><img style="height:80px; width:85px;"data-src="<?php echo $image;?>" alt="<?php echo $tour->tour_name;?>" class="lazyload"></a>
										</div>
									</div>
									<div class="col-lg-6 col-md-6" style="padding-left: 5px;">
										<div>
											<p style="font-size:15px;"><?php echo $tour->tour_name;?></p>
										</div>
									</div>
									<div class="col-lg-2 col-md-2" style="padding-left: 0px; padding-right:5px;">
										<div>
											<p style="margin-top:15px;"><a href="<?php echo base_url();?>tour/detail/<?php echo $tour->tour_slug;?>" class="btn_1" style="font-size:10px;">Xem</a></p>
										</div>
									</div>
								</div>
								<hr>
							<?php }?>
						<!--<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Adults</label>
									<div class="numbers-row">
										<input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Children</label>
									<div class="numbers-row">
										<input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
									</div>
								</div>
							</div>
						</div>-->
					</div>
					<!--/box_style_1 -->

					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Liên lạc</span> qua số điện thoại</h4>
						<a href="tel://<?php echo $info_restaurant->res_phone;?>" class="phone"><?php echo $info_restaurant->res_phone;?></a>
						<small>Chúc quý khách ngon miệng và hài lòng với chúng tôi</small>
					</div>

				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
    
	</main>