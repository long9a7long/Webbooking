<style>
.form-group {
    width: 100%;
}

.custom-btn {
    margin: 20px;
    width: 20%;
    display: inline-block;
}
</style>
<div class="box" style="margin-bottom:0">
    <div class="box-header">
        <h3 class="box-title">Chỉnh sửa thông tin hotel</h3>
    </div>
    <div id="noti_respon"></div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="hotel_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form role="form" enctype="multipart/form-data" id="form_edit_hotel" method ="post" action="<?php echo base_url(); ?>admin/hotel/submit_edit_hotel">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <input type="hidden" name="hotel_id" value="<?php echo $hotel_info->hotel_id; ?>">
                        <div class="form-group">
                            <label>Tên hotel</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_name"
                                name="hotel_name" value="<?php echo $hotel_info->hotel_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Danh mục hotel</label>
                            <select class="form-control select2" name="category_hotel_id[]" id="category_hotel_id"
                                multiple="multiple" data-placeholder="Chọn danh mục" style="width: 100%;">
                                <?php
                                $cate_id=explode(",",$hotel_info->category_hotel_id);
                                foreach($list_cate as $cate){ ?>
                                <option value="<?php echo $cate['cate_id'] ?>" <?php if(in_array($cate['cate_id'],$cate_id)) echo "selected";  ?> ><?php echo $cate['cate_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Xuất phát từ</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_from"
                                name="hotel_from" value="<?php echo $hotel_info->hotel_from; ?>">
                        </div>
                        <div class="form-group">
                            <label>Điểm đến</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_destination"
                                name="hotel_destination" value="<?php echo $hotel_info->hotel_destination; ?>">
                        </div>
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_duration"
                                name="hotel_duration"  value="<?php echo $hotel_info->hotel_duration ?>">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_price"
                                name="hotel_price" value="<?php echo $hotel_info->hotel_price ?>">
                        </div>
                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_saving_price"
                                name="hotel_saving_price" value="<?php echo $hotel_info->hotel_saving_price ?>">
                        </div>
                        <div class="form-group">
                            <label for="hotel_thumnail">Thumnail</label><br/>
                            <img src="<?php echo base_url().'uploads/images/thumb_'.$hotel_info->hotel_thumnail ?>" width="200" height="160" alt="<?php echo $hotel_info->hotel_name ?>">
                            <input type="file" id="hotel_thumnail" name="hotel_thumnail">

                            <p class="help-block">Nhập tên file không dấu và không khoảng trắng.</p>
                        </div>
                        <div class="form-group">
                            <label for="album_hotel">Album hotel</label><br/>
                            <?php
                                $images=explode(",",$hotel_info->album_hotel);
                                foreach($images as $image){ ?>
                                <img src="<?php echo base_url().'uploads/images/'.$image ?>" width="200" height="160" alt="<?php echo $hotel_info->hotel_name ?>">
                                <?php }
                            ?>
                            <input type="file" id="album_hotel" name="album_hotel[]" multiple="multiple">
                            <p class="help-block"></p>Nhấn CTR để chọn nhiều hình.</p>
                            <p class="help-block">Nhập tên file không dấu và không khoảng trắng.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label>hotel Except</label>
                            <textarea style="width: 100%;" class="form-control" name="hotel_except"
                                id="hotel_except"><?php echo $hotel_info->hotel_except ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Thông tin liên hệ đặt hotel</label>
                            <textarea style="width: 100%;" class="form-control" name="hotel_info_contact"
                                id="hotel_info_contact"><?php echo $hotel_info->hotel_info_contact ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Keywords</label>
                            <textarea style="width: 100%;" class="form-control" name="hotel_keywords"
                                id="hotel_keywords"><?php echo $hotel_info->hotel_keywords ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label><br/>
                            <label class="radio-inline"><input type="radio" name="hotel_status" value="1" <?php if($hotel_info->hotel_status) echo "checked"; ?>>Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="hotel_status" value="0" <?php if(!$hotel_info->hotel_status) echo "checked"; ?>>Tạm ẩn</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea style="width: 100%;" class="form-control" name="hotel_description"
                                id="hotel_description"><?php echo $hotel_info->hotel_description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Lịch trình</label>
                            <textarea style="width: 100%;" class="form-control" name="hotel_schedule"
                                id="hotel_schedule"><?php echo $hotel_info->hotel_schedule ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" id="submitupdate" class="custom-btn btn btn-block btn-success">Cập nhật</button>
                    <a href="<?php echo base_url(); ?>admin/hotel"><button type="button"
                            class="custom-btn btn btn-block btn-danger" id="submithuy">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript"
    src="<?php echo base_url(); ?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/plugins/ckfinder/ckfinder.js"></script>
<script>
var editor1 = CKEDITOR.replace('hotel_description', {
    filebrowserBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html"; ?>',
    filebrowserImageBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html?Type=Images";?>',
    filebrowserFlashBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html?Type=Flash" ?>',
    filebrowserUploadUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
    filebrowserImageUploadUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
    filebrowserFlashUploadUrl: '<?php echo base_url()."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
    filebrowserWindowWidth: '800',
    filebrowserWindowHeight: '480'
});
var editor2 = CKEDITOR.replace('hotel_schedule', {
    filebrowserBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html"; ?>',
    filebrowserImageBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html?Type=Images";?>',
    filebrowserFlashBrowseUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/ckfinder.html?Type=Flash" ?>',
    filebrowserUploadUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
    filebrowserImageUploadUrl: '<?php echo base_url()."assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
    filebrowserFlashUploadUrl: '<?php echo base_url()."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
    filebrowserWindowWidth: '800',
    filebrowserWindowHeight: '480'
});
CKFinder.setupCKEditor(editor1, "<?php echo base_url().'assets/admin/plugins/ckfinder/'?>");
CKFinder.setupCKEditor(editor2, "<?php echo base_url().'assets/admin/plugins/ckfinder/'?>");
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/edit_hotel.js"></script>