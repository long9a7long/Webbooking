<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
				<div class="sidebar-wrap bg-light ftco-animate">
					<h3 class="heading mb-4">Tiêu chí tìm kiếm:</h3>
					<div class="list_filter"></div>
					
				</div>
				<div class="sidebar-wrap bg-light ftco-animate">
					<h3 class="heading mb-4">Thời hạn</h3>
					<div class="range-slider">
		              	<span>
							<input id="durationrangenumbermin" type="number" value="1" min="0" max="18"/>ngày -
							<input id="durationrangenumbermax" type="number" value="3" min="0" max="18"/>ngày
						</span>
						<input id="durationslidenumbermin" value="1" min="0" max="18" step="1" type="range"/>
						<input id="durationslidenumbermax" value="3" min="0" max="18" step="1" type="range"/>
										 
					</div>
				</div>
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">Tìm địa điểm</h3>
        			<div class="fields">
		              <div class="form-group">
					  <div class="select-wrap one-third">
					  	<label for="destination_tour">Điểm đến</label>
	                    <select name="destination_tour[]" id="destination_tour" multiple="multiple" class="form-control select2" placeholder="Điểm đến" >
	                      <option value="1">Cù Lao Xanh</option>
	                      <option value="2">Eo Gió</option>
	                      <option value="3">Kỳ Co</option>
	                      <option value="4">Nhơn Lý</option>
	                    </select>
		              </div></div>
		              <div class="form-group">
					  	<label for="category_tour">Khu vực</label>
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="category_tour" id="category_tour" class="form-control" placeholder="Khu vực" >
	                      <option value="0">Chọn khu vực</option>
	                      <option value="1">San Francisco USA</option>
	                      <option value="2">Berlin Germany</option>
	                      <option value="3">Lodon United Kingdom</option>
	                      <option value="4">Paris Italy</option>
	                    </select>
	                  </div>
		              </div>
		              <div class="form-group">
		                <input type="text" id="checkin_date" class="form-control" placeholder="Ngày đi">
		              </div>
		              <div class="form-group">
		                <input type="text" id="checkout_date" class="form-control" placeholder="Ngày về">
		              </div>
		              <div class="form-group">
					  	<label>Mức giá</label>
		              	<div class="range-slider">
		              		<span>
								<input id="pricerangenumbermin" type="number" value="500" min="0" max="15000"/>k đ -
								<input id="pricerangenumbermax" type="number" value="5000" min="0" max="15000"/>k đ
							</span>
							<input id="priceslidenumbermin" value="500" min="0" max="15000" step="100" type="range"/>
							<input id="priceslidenumbermax" value="5000" min="0" max="15000" step="100" type="range"/>
										 
						</div>
		              </div>
		              <!-- <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
		              </div> -->
		            </div>
        		</div>
          </div>
          <div class="col-lg-9">
		  	<div class="label-search row">
				<span class="num-result-search"><strong>Có 30 tours được tìm thấy</strong></span>
				<span class="sort-by-span">
					<div class="form-group">
						<select name="category_tour" id="category_tour" class="form-control" placeholder="Khu vực" >
							<option value="0">Sắp xếp theo</option>
							<option value="1">Tên tour</option>
							<option value="2">Tour mới đăng</option>
							<option value="3">Tour phổ biến</option>
							<option value="4">Tour nổi bật</option>
						</select>
					</div>
				</span>
			</div>
          	<div class="row">
          		<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-1.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-2.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-3.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-4.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-5.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/default/images/destination-6.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="#">Paris, Italy</a></h3>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
			    						</div>
			    						<div class="two">
			    							<span class="price">$200</span>
		    							</div>
		    						</div>
		    						<p>Far far away, behind the word mountains, far from the countries</p>
		    						<p class="days"><span>2 days 3 nights</span></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
		    							<span class="ml-auto"><a href="#">Discover</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->