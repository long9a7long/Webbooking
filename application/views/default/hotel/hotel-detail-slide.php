<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $info_hotel->hotel_thumnail; ?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<span class="rating">
						<?php
							for($j=0;$j<5;$j++){
								if(($info_hotel->avg_rev)>$j){
									echo '<i class="icon-smile voted"></i>';
								}	
								else
									echo'<i class="icon-smile"></i>';
							}
							?>
							<small>(<?php echo $info_hotel->num_rev; ?>)</small>
						</span>
						<h1><?php echo $info_hotel->hotel_name; ?></h1>
						<span><?php echo $info_hotel->hotel_address; ?></span>
					</div>
					<div class="col-md-4">
						<div id="price_single_main" class="hotel">
							from/per night <span><sup>$</sup><?php echo $info_hotel->hotel_price; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>