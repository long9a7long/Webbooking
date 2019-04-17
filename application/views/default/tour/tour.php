<main style="margin-bottom: 355px;">

	<div id="position">
		<div class="container">
			<ul>
				<li><a href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li><a href="<?php echo base_url(); ?>tour">Tour</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- Position -->

	<div class="collapse" id="collapseMap">
		<div id="map" class="map"></div>
	</div>
	<!-- End Map -->


	<div class="container margin_60">
		<input type="hidden" name="querystring_filter" id="querystring_filter" value="">
		<div class="row-filter" id="row-filter">
			<span style="margin-right: 20px;">Your filter:</span>
			<!-- Filter items here -->
		</div>
		<div class="row">
			<aside class="col-lg-3">
					<p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>

					<div class="box_style_cat">
						<ul id="cat_nav">
							<li><a href="#" id="active" class="filter_by_category" data-id="0"><i class="icon_set_1_icon-51"></i>All tours <span>(141)</span></a>
							</li>
							<li><a href="#" class="filter_by_category" data-id="1" data-content="Quy Nhon"><i class="icon_set_1_icon-37"></i>Quy Nhon <span>(20)</span></a>
							</li>
							<li><a href="#" class="filter_by_category" data-id="2" data-content="Phu Yen"><i class="icon_set_1_icon-37"></i>Phu Yen <span>(16)</span></a>
							</li>
							<li><a href="#" class="filter_by_category" data-id="3" data-content="Cu Lao Xanh"><i class="icon_set_1_icon-37"></i>Cu Lao Xanh <span>(12)</span></a>
							</li>
							<li><a href="#" class="filter_by_category" data-id="4" data-content="Eo Gio"><i class="icon_set_1_icon-37"></i>Eo Gio <span>(11)</span></a>
							</li>
							
						</ul>
					</div>

					<div id="filters_col">
						<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters</a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
								<h6>Price</h6>
								<input type="text" id="range" name="range" value="">
							</div>
							<div class="filter_type">
								<h6>Rating</h6>
								<ul>
									<li>
										<label>
											<input type="checkbox" class="filter-rating" data-id="5"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox" class="filter-rating" data-id="4"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox" class="filter-rating" data-id="3"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox" class="filter-rating" data-id="2"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
										</label>
									</li>
									<li>
										<label>
											<input type="checkbox" class="filter-rating" data-id="1"><span class="rating">
											<i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</span>
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
						<div class="col-md-6 col-sm-6 col-6">
							<div class="styled-select-filters">
								<select name="sort_price" id="sort_price">
									<option value="" selected="">Sort by price</option>
									<option value="pricelower">Lowest price</option>
									<option value="pricehigher">Highest price</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 d-none d-sm-block text-right">
							<a href="?view=2" class="bt_filters"><i class="icon-th"></i></a> <a href="?view=1" class="bt_filters"><i class=" icon-list"></i></a>
						</div>

					</div>
				</div>
				<!--/tools -->
				<div id="list_tour_list">
				
				</div>
				<hr>

				<nav id="pagination-list__post" aria-label="Page navigation">
				</nav>
				<!-- end pagination-->

			</div>
			<!-- End col lg-9 -->
		</div>
		<!-- End row -->
	</div>
	<!-- End container -->
</main>