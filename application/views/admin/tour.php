<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách tour</h3>
        <a href="<?php echo base_url(); ?>admin/tour/add"><button type="button" style="width: 10%;display:inline-block; margin-left:10px;" class="btn btn-block btn-primary">Thêm mới</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="tour_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tour_table" class="table table-bordered table-striped dataTable" role="grid"
                        aria-describedby="tour_table_info">
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
                            foreach ($list_tour as $key => $value) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo base_url()."uploads/tours/".$value["tour_thumnail"]; ?></td>
                                    <td><?php echo $value["tour_title"]; ?></td>
                                    <td><?php if($value["tour_status"]) echo "Hiển thị"; else echo "Tạm ẩn"; ?></td>
                                    <td>
                                        <a title="Sửa" href=""><i class="fa fa-fw fa-edit"></i></a>
                                        <a title="Xóa" href=""><i class="fa fa-fw fa-ban"></i></a>
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
        $('#tour_table').DataTable();
    } );
</script>