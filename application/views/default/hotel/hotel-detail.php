<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
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
								foreach ($conv_single as $item){
							?>
							<li><i class="<?php echo $item->conv_pic;?>"></i><?php echo $item->conv_name;?></li>
							<?php }
							?>
							<!-- <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
							<li><i class="icon_set_2_icon-110"></i>Poll</li>
							<li><i class="icon_set_1_icon-59"></i>Breakfast</li>
							<li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
							<li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
							<li><i class="icon_set_1_icon-27"></i>Parking</li> -->
						</ul>
					</div>
					<p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->
					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">
						<?php
							
							$album_hotel=explode("|",$info_hotel->album_hotel);
							foreach($album_hotel as $item){
							?>
								<div class="sp-slide">
									<img alt="<?php echo $info_hotel->hotel_name; ?>" class="sp-image" src="<?php base_url(); ?>assets/default/css/images/blank.gif" 
									data-src="<?php echo $item; ?>" 
									data-small="<?php echo $item; ?>" 
									data-medium="<?php echo $item; ?>" 
									data-large="<?php echo $item; ?>" 
									data-retina="<?php echo $item; ?>">
								</div>';
							<?php } ?>

							
							<div class="sp-slide">
								<img alt="Image" class="sp-image lazyload" src="<?php echo base_url(); ?>assets/default/css/images/blank.gif" data-src="<?php echo base_url(); ?>assets/default/img/slider_single_tour/9_medium.jpg" data-small="<?php echo base_url(); ?>assets/default/img/slider_single_tour/9_small.jpg" data-medium="<?php echo base_url(); ?>assets/default/img/slider_single_tour/9_medium.jpg" data-large="<?php echo base_url(); ?>assets/default/img/slider_single_tour/9_large.jpg" data-retina="<?php echo base_url(); ?>assets/default/img/slider_single_tour/9_large.jpg">
							</div>
						</div>
						<div class="sp-thumbnails">
						<?php
							foreach($album_hotel as $item){  ?>
								<img alt="<?php echo $info_hotel->hotel_name; ?>" class="sp-thumbnail" src="<?php echo $item; ?>">
							<?php } ?>
							
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-3">
							<h3>Chi tiết hotel</h3>
						</div>
						<div class="col-lg-9">
						<?php echo $info_hotel->hotel_description;?>
							
							
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>

					<div class="row">
						<div class="col-lg-3">
							<h3>Loại Phòng</h3>
						</div>
						<div class="col-lg-9">
						<div class="row">
							
							
							<!-- End row  -->
								
							<div class="col-lg-6">
									
								<h4>Phòng đơn</h4>
								<p><?php echo $info_hotel->infor_singleroom;?></p>
								<p>Giá: <?php echo $info_hotel->price_singleroom;?></p>
							</div>
							<div class="col-lg-6">
								<h4>Phòng đôi</h4>
								<p><?php echo $info_hotel->infor_doubleroom;?></p>
								<p>Giá: <?php echo $info_hotel->price_doubleroom;?></p>

							</div>
						</div>	
							<!-- End photo carousel  -->

							

							
							
							
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>

					<div class="row">
						<div class="col-lg-3">
							<h3>Đánh giá</h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Đánh giá hotel</a>
						</div>
						<div class="col-lg-9">
							<div id="general_rating"><?php echo $info_hotel->num_rev;?> Đánh giá
								<div class="rating">
								<?php
								for($j=0;$j<5;$j++){
									if(($info_hotel->avg_rev)>$j){
										echo '<i class="icon-smile voted"></i>';
									}	
									else
										echo'<i class="icon-smile"></i>';
								}
								?>
								</div>
							</div>
							<!-- <div id="score_detail"><span>7.5</span>Good <small>(Based on 34 reviews)</small>
							</div> -->
							<!-- End general_rating -->
							<div class="row" id="rating_summary">
								<div class="col-md-6">
										
									<ul>
										<li>Position
											<div class="rating">
											<?php
											for($j=0;$j<5;$j++){
												if(($info_hotel->avg_position)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												
											
												<!-- <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i> -->
											</div>
										</li>
										<li>Comfort
											<div class="rating">
											<?php
											for($j=0;$j<5;$j++){
												if(($info_hotel->avg_comfort)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												<!-- <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i> -->
											</div>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>Price
											<div class="rating">
											<?php
											for($j=0;$j<5;$j++){
												if(($info_hotel->avg_price)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												<!-- <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i> -->
											</div>
										</li>
										<li>Quality
											<div class="rating">
											<?php
											for($j=0;$j<5;$j++){
												if(($info_hotel->avg_quality)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												<!-- <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i> -->
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- End row -->
							<hr>
							<?php

							foreach($reviews_hotel as $review){ ?>

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
							<!-- End review strip -->

							
						</div>
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-lg-4">
					<p class="d-none d-xl-block d-lg-block d-xl-none">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<div class="box_style_1 expose">
						<h3 class="inner">Check Availability</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><i class="icon-calendar-7"></i> Check in</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><i class="icon-calendar-7"></i> Check out</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text">
								</div>
							</div>
						</div>
						<div class="row">
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
						</div>
						<br>

						<a class="btn_full" href="cart_hotel.html">Check now</a>
						<a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
					</div>
					<!--/box_style_1 -->

					<div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Book</span> by phone</h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>

				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
    
	</main>