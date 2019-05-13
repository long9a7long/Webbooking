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
		<!-- End position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-8">
					<table class="table table-striped cart-list add_bottom_30">
						<thead>
							<tr>
								<th>
									Item
								</th>
								<th>
									Quantity
								</th>
								<th>
									Discount
								</th>
								<th>
									Total
								</th>
								<th>
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="thumb_cart">
										<img data-src="<?php echo base_url(); ?>assets/default/img/thumb_cart_1.jpg" alt="Image" class="lazyload">
									</div>
									<span class="item_cart">Orly Airport Private transfer</span>
								</td>
								<td>
									<div class="numbers-row">
										<input type="text" value="0" id="quantity_1" class="qty2 form-control" name="quantity_1">
									</div>
								</td>
								<td>
									0%
								</td>
								<td>
									<strong>€24,71</strong>
								</td>
								<td class="options">
									<a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-ccw-2"></i></a>
								</td>
							</tr>
							<tr>
								<td>
									<div class="thumb_cart">
										<img data-src="<?php echo base_url(); ?>assets/default/img/thumb_cart_1.jpg" alt="Image" class="lazyload">
									</div>
									<span class="item_cart"> Paris Disneyland Transfer</span>
								</td>
								<td>
									<div class="numbers-row">
										<input type="text" value="0" id="quantity_2" class="qty2 form-control" name="quantity_2">
									</div>
								</td>
								<td>
									0%
								</td>
								<td>
									<strong>€0,0</strong>
								</td>
								<td class="options">
									<a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-ccw-2"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-striped options_cart">
						<thead>
							<tr>
								<th colspan="3">
									Add options / Services
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:10%">
									<i class="icon_set_1_icon-16"></i>
								</td>
								<td style="width:60%">
									Dedicated Tour guide <strong>+$34</strong>
								</td>
								<td style="width:35%">
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_1" id="option_1" checked value="">
										<span>
                    					<span>No</span>
										<span>Yes</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-71"></i>
								</td>
								<td>
									Insurance <strong>+$24*</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_2" id="option_2" value="" checked>
										<span>
                    					<span>No</span>
										<span>Yes</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_2_icon-102"></i>
								</td>
								<td>
									Extra large baggage <strong>+$12*</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_3" id="option_3" value="">
										<span>
                    					<span>No</span>
										<span>Yes</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-59"></i>
								</td>
								<td>
									Coffe break <strong>+$12*</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_4" id="option_4" value="">
										<span>
                    					<span>No</span>
										<span>Yes</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<i class="icon_set_1_icon-58"></i>
								</td>
								<td>
									Dinner <strong>+$26*</strong>
								</td>
								<td>
									<label class="switch-light switch-ios float-right">
										<input type="checkbox" name="option_5" id="option_5" value="">
										<span>
                    					<span>No</span>
										<span>Yes</span>
										</span>
										<a></a>
									</label>
								</td>
							</tr>

						</tbody>
					</table>
					<div class="add_bottom_15"><small>* Prices for person.</small>
					</div>
				</div>
				<!-- End col-lg -->

				<aside class="col-lg-4">
					<div class="box_style_1">
						<h3 class="inner">- Summary -</h3>
						<table class="table table_summary">
							<tbody>
								<tr>
									<td>
										Date
									</td>
									<td class="text-right">
										10 April 2015
									</td>
								</tr>
								<tr>
									<td>
										Time
									</td>
									<td class="text-right">
										12.00 AM
									</td>
								</tr>
								<tr>
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
											Pick up
										</td>
										<td class="text-right">
											Orly airport
										</td>
									</tr>
									<tr>
										<td>
											Drop off
										</td>
										<td class="text-right">
											Hotel Rivoli
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
						<a class="btn_full" href="<?php echo base_url(); ?>transfer/payment">Check out</a>
						<a class="btn_full_outline" href="<?php echo base_url(); ?>transfer/"><i class="icon-right"></i> Continue shopping</a>
					</div>
					<div class="box_style_4">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
						<a href="tel://004542344599" class="phone">+45 423 445 99</a>
						<small>Monday to Friday 9.00am - 7.30pm</small>
					</div>
				</aside>
				<!-- End aside -->

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>