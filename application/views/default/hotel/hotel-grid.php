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
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<aside class="col-lg-3">
					<p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>

					<div id="filters_col">
						<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
								<h6>Price</h6>
								<input type="text" id="range" name="range" value="">
							</div>
							<div class="filter_type">
								<h6>Star Category</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
											</span>(15)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
											</span>(45)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
											</span>(35)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
											</span>(25)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox"><span class="rating">
											<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
											</span>(15)
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Review Score</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox">Superb: 9+ (77)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Very good: 8+ (552)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Good: 7+ (909)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Pleasant: 6+ (1196)
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">No rating (198)
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Facility</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox">Pet allowed
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Wifi
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Spa
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Restaurant
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Pool
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Parking
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Fitness center
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
								<h6>District</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox">Paris Centre
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">La Defance
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">La Marais
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox">Latin Quarter
										</label>
									</li>
								</ul>
							</div>
						</div>
						<!--End collapse -->
					</div>
					<!--End filters col-->
					<div class="box_style_2">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
				</aside>
				<!--End aside -->

				<div class="col-lg-9">

					<div id="tools">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_price" id="sort_price">
										<option value="" selected>Sort by price</option>
										<option value="lower">Lowest price</option>
										<option value="higher">Highest price</option>
									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-4 col-6">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>Sort by ranking</option>
										<option value="lower">Lowest ranking</option>
										<option value="higher">Highest ranking</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-4 d-none d-sm-block text-right">
								<a href="<?php echo base_url(); ?>hotel/?view=2" class="bt_filters"><i class="icon-th"></i></a> <a href="<?php echo base_url(); ?>hotel/?view=1" class="bt_filters"><i class=" icon-list"></i></a>
							</div>
						</div>
					</div>
					<!--End tools -->

					<div id="grid_hotel_grid">
					</div>

					

					<hr>
					
					<nav aria-label="Page navigation">
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
					<!-- end pagination-->

				</div>
				<!-- End col lg 9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>