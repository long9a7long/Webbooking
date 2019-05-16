<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="<?php echo base_url(); ?>transfer">Transfer</a>
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
							<li><i class="icon_set_1_icon-29"></i>Số ghế :<?php echo $info_car->num_sits;?></li>
							
						</ul>
					</div>

					<p class="d-none d-md-block d-block d-lg-none"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a></p>
					<!-- Map button for tablets/mobiles -->
					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">
							<?php
							$album_car=explode("|",$info_car->album_car);
							foreach($album_car as $item){
							?>
								<div class="sp-slide">
									<img alt="<?php echo $info_car->car_name; ?>" class="sp-image" src="<?php base_url(); ?>assets/default/css/images/blank.gif" 
									data-src="<?php echo $item; ?>" 
									data-small="<?php echo $item; ?>" 
									data-medium="<?php echo $item; ?>" 
									data-large="<?php echo $item; ?>" 
									data-retina="<?php echo $item; ?>">
								</div>';
							<?php } ?>
							
						</div>
						<div class="sp-thumbnails">
							<?php
							foreach($album_car as $item){  ?>
								<img alt="<?php echo $info_car->car_name; ?>" class="sp-thumbnail" src="<?php echo $item; ?>">
							<?php } ?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-3">
							<h3>Chi tiết </h3>
						</div>
						<div class="col-lg-9">
						<?php echo $info_car->car_description;?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-3">
							<h3>Đánh giá </h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Đánh giá Xe</a>
						</div>
						<div class="col-lg-9">
							<div id="general_rating"><?php echo $info_car->num_rev;?> Đánh giá
								<div class="rating">
								<?php
								for($j=0;$j<5;$j++){
									if(($info_car->avg_rev)>$j){
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
										<li>Đúng giờ
											<div class="rating">
											
											<?php
											for($j=0;$j<5;$j++){
												if(($info_car->avg_punctuality)>$j){
													echo '<i class="icon-smile voted"></i>';
												}	
												else
													echo'<i class="icon-smile"></i>';
											}
											?>
												
											</div>
										</li>
										<li>Tiện nghi
											<div class="rating">
												<?php
												for($j=0;$j<5;$j++){
													if(($info_car->avg_comfort)>$j){
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
										<li>Giá cả
											<div class="rating">

												<?php
												for($j=0;$j<5;$j++){
													if(($info_car->avg_price)>$j){
														echo '<i class="icon-smile voted"></i>';
													}	
													else
														echo'<i class="icon-smile"></i>';
												}
												?>
											</div>
										</li>
										<li>Chất lượng phục vụ
											<div class="rating">
											<?php
												for($j=0;$j<5;$j++){
													if(($info_car->avg_kindness)>$j){
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

							foreach($reviews_car as $review){ ?>

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
						<h3 class="inner">- Booking -</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label><i class="icon-calendar-7"></i> Select a date</label>
									<input class="date-pick form-control" data-date-format="M d, D" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><i class=" icon-clock"></i> Time</label>
									<input class="time-pick form-control" value="12:00 AM" type="text">
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
						<div class="form-group">
							<label>Pick up address</label>
							<select id="address" class="form-control" name="address">
								<option value="Orly Airport" selected>Orly Airport</option>
							</select>
						</div>
						<div class="form-group">
							<label>Drop off address</label>
							<select id="address_2" class="form-control" name="addres_2">
								<option value="Gar du Nord Station">Gar du Nord Station</option>
								<option value="Place Concorde">Place Concorde</option>
								<option value="Hotel Rivoli">Hotel Rivoli</option>
							</select>
						</div>
						<a class="btn_collapse" data-toggle="collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
							<i class="icon-plus-circled"></i>Return
						</a> <small>(Optionally)</small>
						<div class="collapse" id="collapseForm">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label><i class="icon-calendar-7"></i> Select a date</label>
										<input class="date-pick form-control" data-date-format="M d, D" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label><i class=" icon-clock"></i> Time</label>
										<input class="time-pick form-control" value="12:00 AM" type="text">
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
							<div class="form-group">
								<label>Pick up address</label>
								<select id="address_return" class="form-control" name="address_return">
									<option value="Gar du Nord Station" selected>Gar du Nord Station</option>
									<option value="Place Concorde">Place Concorde</option>
									<option value="Hotel Rivoli">Hotel Rivoli</option>
								</select>
							</div>
							<div class="form-group">
								<label>Drop off address</label>
								<select id="address_return_2" class="form-control" name="address_return_2">
									<option value="Orly Airport" selected>Orly Airport</option>
									<option value="Paris Central Station">Paris Central Station</option>
								</select>
							</div>
						</div>
						<!-- End collapse form -->
						<br>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Adults
									</td>
									<td class="text-right">
										2
									</td>
								</tr>
								<tr>
									<td>
										Children
									</td>
									<td class="text-right">
										0
									</td>
								</tr>
								<tr>
									<td>
										Total amount
									</td>
									<td class="text-right">
										3x $52
									</td>
								</tr>
								<tr class="total">
									<td>
										Total cost
									</td>
									<td class="text-right">
										$154
									</td>
								</tr>
							</tbody>
						</table>
						<a class="btn_full" href="<?php echo base_url(); ?>transfer/cart/">Book now</a>
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