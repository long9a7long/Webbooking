<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách hotel</h3>
        <a href="<?php echo base_url(); ?>admin/hotel/add"><button type="button"
                style="width: 10%;display:inline-block; margin-left:10px;" class="btn btn-block btn-primary">Thêm
                mới</button></a>
    </div>
    <div id="noti_respon"></div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="hotel_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <table id="hotel_table" class="table table-bordered table-striped dataTable" role="grid"
                        aria-describedby="hotel_table_info">
                        <thead>
                            <tr role="row">
                                <th>Thứ tự</th>
                                <th>Thumnail</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            foreach ($list_hotel as $key => $value) {
                                $i++;
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img src="<?php echo base_url()."uploads/images/thumb_".$value["hotel_thumnail"]; ?>" alt="<?php echo $value["hotel_name"]; ?>"></td>
                                <td><?php echo $value["hotel_name"]; ?></td>
                                <td><?php if($value["hotel_status"]) echo "Hiển thị"; else echo "Tạm ẩn"; ?></td>
                                <td>
                                    <a title="Sửa" href="<?php echo base_url()."admin/hotel/edit/".$value["hotel_id"]; ?>" alt="<?php echo $value["hotel_name"]; ?>"><i class="fa fa-fw fa-edit"></i></a>
                                    <a title="Xóa" onclick="submit_del_hotel(<?php echo $value['hotel_id']; ?>)"><i class="fa fa-fw fa-ban"></i></a>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Thumnail</th>
                                <th>Tiêu đề</th>
                                <th>Trạng thái</th>
                                <th>Công cụ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- /.box-body -->
</div>
<script>
$(document).ready(function() {
    $('#hotel_table').DataTable();
});
function submit_del_hotel(hotelid) {
    var respon=$("#noti_respon");
    respon.html("");
    if(confirm("Bạn thực sự muốn xóa hotel này?")){
        var data = {
            hotel_id:hotelid,
        };
        var url = "../admin/hotel/check_del_hotel";
        var success = function(result) {
            var json_data = $.parseJSON(result);
            if (json_data.status) {
                window.location.replace("../admin/hotel/");
            }else
            respon.html('<div class="callout callout-info" style="background-color: #ef0000 !important;"><h4>Failed!</h4>'+json_data.status_value+'</div>');
        };
        $.post(url, data, success);
    }  
}
</script>