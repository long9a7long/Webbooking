<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url(); ?>assets/default/images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <div class="form-search">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tour">Các Tour</a></li>
                    <li><a data-toggle="tab" href="#hotel">Khách sạn</a></li>
                    <li><a data-toggle="tab" href="#car">Xe du lịch</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tour" class="tab-pane fade in active show">
                    <h2 style="color:#fff" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tìm kiếm tour du lịch</h2>
                        <form id="form_search_tour" class="form_search form-inline" style="width:100%">
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label for="tour_from">Từ:</label>
                                <input  type="text" style="width:100%" class="form-control" id="tour_from" name="tour_from" placeholder="Nơi xuất phát">
                                
                            </div>
                            <div class="col-lg-3 col-xs-12 form-group">
                                <label for="tour_to">Đến:</label>
                                <input type="text" style="width:100%" class="form-control" id="tour_to" name="tour_to" placeholder="Địa điểm du lịch">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="tour_startdate">Khởi hành:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker"  data-date-format="mm/dd/yyyy" id="tour_startdate" name="tour_startdate">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="tour_enddate">Về:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker" data-date-format="mm/dd/yyyy" id="tour_enddate" name="tour_enddate">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="tour_numperson">Số người:</label>
                                <input type="number" class="form-control" id="tour_numperson" name="tour_numperson" value="1">
                            </div>
                            
                            <div><button type="submit" class="btn btn-success">Tìm kiếm tour</button></div>
                        </form>
                    </div>
                    <!-- form search hotel -->
                    <div id="hotel" class="tab-pane fade">
                        <h2 style="color:#fff" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Đặt phòng khách sạn, resort và chỗ nghỉ</h2>
                        <form id="form_search_hotel" class="form_search form-inline" style="width:100%">
                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="hotel_address">Tìm khách sạn:</label>
                                <input  type="text" style="width:100%" class="form-control" id="hotel_address" name="hotel_address" placeholder="Đích đến hoặc tên khách sạn">
                                
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="hotel_checkindate">Nhận phòng:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker" data-date-format="mm/dd/yyyy" id="hotel_checkindate" name="hotel_checkindate">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="hotel_checkoutdate">Trả phòng:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker"  data-date-format="mm/dd/yyyy" id="hotel_checkoutdate" name="hotel_checkoutdate">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="hotel_numperson">Khách:</label>
                                <input type="number" class="form-control" id="hotel_numperson" name="hotel_numperson" value="1">
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="tour_numroom">Phòng:</label>
                                <input type="number" class="form-control" id="tour_numroom" name="tour_numroom" value="1">
                            </div>
                            
                            <div><button type="submit" class="btn btn-success">Tìm kiếm Khách sạn</button></div>
                        </form>
                    </div>

                    <div id="car" class="tab-pane fade">
                    <h2 style="color:#fff" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Thuê xe du lịch</h2>
                        <form id="form_search_car" class="form_search form-inline" style="width:100%">
                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="car_from">Địa điểm nhận xe:</label>
                                <input  type="text" style="width:100%" class="form-control" id="car_from" name="car_from" placeholder="Đích đến hoặc tên khách sạn">
                                
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="car_startdate">Ngày nhận xe:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker" data-date-format="mm/dd/yyyy" id="car_startdate" name="car_startdate">
                            </div>
                            <div class="col-lg-1 col-xs-12 form-group">
                                <label for="car_starttime">Thời gian:</label>
                                <select id="car_starttime" name="car_starttime" class="form-control">
                                    <?php 
                                    for($i=0;$i<=23;$i++){
                                        echo "<option value='".(2*$i+1)."' >"."$i".":00</option>";
                                        echo "<option value='".(2*$i+2)."' >".$i.":30</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="car_enddate">Ngày trả xe:</label>
                                <input type="text" class="form-control datepicker" data-provide="datepicker" data-date-format="mm/dd/yyyy" id="car_enddate" name="car_enddate">
                            </div>
                            <div class="col-lg-1 col-xs-12 form-group">
                                <label for="car_endtime">Thời gian:</label>
                                <select id="car_endtime" name="car_endtime" class="form-control">
                                    <?php 
                                    for($i=0;$i<=23;$i++){
                                        echo "<option value='".(2*$i+1)."' >"."$i".":00</option>";
                                        echo "<option value='".(2*$i+2)."' >".$i.":30</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2 col-xs-12 form-group">
                                <label for="car_numperson">Hành Khách:</label>
                                <input type="number" class="form-control" id="car_numperson" name="car_numperson" value="1">
                            </div>
                            <div><button type="submit" class="btn btn-success">Tìm kiếm</button></div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  