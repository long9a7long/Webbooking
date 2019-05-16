<!-- Modal Review -->
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myReviewLabel">Bạn thấy nhà hàng này thế nào?</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
					<form method="post" name="review_restaurant" id="review_restaurant">
						<input name="restaurant_id" id="restaurant_id" type="hidden" value="<?php echo $info_restaurant->res_id; ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="name_review" id="name_review" type="text" placeholder="Tên của bạn" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input name="email_review" id="email_review" type="email" placeholder="Địa chỉ email" class="form-control">
								</div>
							</div>
						</div>
						<!-- End row -->
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Cảnh</label>
									<select class="form-control" name="view_review" id="view_review">
										<option value="">Chọn đánh giá</option>
										<option value="1">Tệ</option>
										<option value="2">Hơi tệ</option>
										<option value="3">Chấp nhận được</option>
										<option value="4">Tuyệt vời</option>
										<option value="5">Rất tuyệt vời</option>
										<option value="0">Tôi không biết</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nhân viên phục vụ</label>
									<select class="form-control" name="waiter_review" id="waiter_review">
										<option value="">Chọn đánh giá</option>
										<option value="1">Tệ</option>
										<option value="2">Hơi tệ</option>
										<option value="3">Chấp nhận được</option>
										<option value="4">Tuyệt vời</option>
										<option value="5">Rất tuyệt vời</option>
										<option value="0">Tôi không biết</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Chất lượng đồ ăn</label>
									<select class="form-control" name="quality_review" id="quality_review">
										<option value="">Chọn đánh giá</option>
										<option value="1">Tệ</option>
										<option value="2">Hơi tệ</option>
										<option value="3">Chấp nhận được</option>
										<option value="4">Tuyệt vời</option>
										<option value="5">Rất tuyệt vời</option>
										<option value="0">Tôi không biết</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="form-group">
							<textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="Hãy viết cảm nhận của bạn tại đây nhé!"></textarea>
						</div>
						<input type="submit" value="Gửi đánh giá" class="btn_1" id="submit-review">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal review -->