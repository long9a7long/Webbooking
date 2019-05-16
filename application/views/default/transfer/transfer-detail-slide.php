<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $info_car->car_thumnail; ?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1><?php echo $info_car->car_name; ?></h1>
							<span><?php echo $info_car->car_address ?></span>
							<span class="rating">
								<?php
								for($j=0;$j<5;$j++){
									if(($info_car->avg_rev)>$j){
										echo '<i class="icon-smile voted"></i>';
									}	
									else
										echo'<i class="icon-smile"></i>';
								}
								?>
								<small>(<?php echo $info_car->num_rev; ?>)</small>
							</span>
						
					</div>
					<div class="col-md-4">
						<div id="price_single_main">
						mỗi người <span><?php echo number_format($info_car->car_saving_price); ?><sup>đ</sup></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	