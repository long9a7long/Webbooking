<?php
	$image=$info_restaurant->res_thumnail;
	if($image==null){
		$image='http://localhost:8080/fantour/assets/default/img/restaurant_top.jpg';
	}
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $image;?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1><?php echo $info_restaurant->res_name; ?></h1>
						<span><?php echo $info_restaurant->res_address; ?></span>
						<span class="rating">
							<?php
							for($j=0;$j<5;$j++){
								if(($info_restaurant->avg_rev)>$j){
									echo '<i class="icon-smile voted"></i>';
								}	
								else
									echo'<i class="icon-smile"></i>';
							}
							?>
							<small>(<?php echo $info_restaurant->num_rev; ?>)</small>
						</span>
					</div>
					<div class="col-md-4">
						<div id="price_single_main">
							<!--from/per person <span><sup>$</sup>52</span>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>