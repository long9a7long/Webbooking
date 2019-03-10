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
        <h3 class="box-title">Thêm mới hotel</h3>
    </div>
    <div id="noti_respon"></div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="hotel_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <form role="form" enctype="multipart/form-data" id="form_add_hotel" >
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label>Tên hotel</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_name"
                                name="hotel_name">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_address"
                                name="hotel_address">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_price"
                                name="hotel_price">
                        </div>
                    
                        
                        <div class="form-group">
                            <label>Danh mục hotel</label>
                            <select class="form-control select2" name="category_hotel_id[]" id="category_hotel_id"
                                multiple="multiple" data-placeholder="Chọn danh mục" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Convenient</label>
                            <select class="form-control select2" name="convenient[]" id="convenient"
                                multiple="multiple" data-placeholder="Chọn tiện nghi" style="width: 100%;">
                                <option value="1">WiFi</option>
                                <option value="2">Điều hòa nhiệt độ</option>
                                <option value="3">Dịch vụ đưa đón sân bay</option>
                            </select> 
                        </div>
     
                        
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                            <label for="hotel_thumnail">Thumnail</label>
                            <input type="file" id="hotel_thumnail" name="hotel_thumnail">
                            <p class="help-block">Nhập tên file không dấu và không khoảng trắng.</p>
                        </div>
                        <div class="form-group">
                            <label for="album_hotel">Album_hotel</label>
                            <input type="file" id="album_hotel" name="album_hotel[]" multiple="multiple">
                            <p class="help-block">Nhập tên file không dấu và không khoảng trắng.</p>
                        </div>
                        <div class="form-group">
                            <label>Liên hệ</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_info_contact"
                                name="hotel_info_contact">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_status"
                                name="hotel_status">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Từ khóa</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_keywords"
                                name="hotel_keywords">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" style="width: 100%;" class="form-control" id="hotel_description"
                                name="hotel_description">
                        </div>

                        <div class="form-group">
                            <label>Chi tiết</label>
                            <input type="text" style="width: 100%;" class="form-control" id="more_details"
                                name="more_details">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" id="submitadd" class="custom-btn btn btn-block btn-success">Thêm</button>
                    <a href="<?php echo base_url(); ?>admin/hotel"><button type="button"
                            class="custom-btn btn btn-block btn-danger">Hủy</button></a>
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
var editor2 = CKEDITOR.replace('more_details', {
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
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/hotel.js"></script>