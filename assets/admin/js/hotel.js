$(function() {
    select_cate_hotel();
    $('.select2').select2();
    $("form").on('submit', function(event) {
        event.preventDefault();
		for(var instanceName in CKEDITOR.instances)
            CKEDITOR.instances[instanceName].updateElement();
        var formData = new FormData(this);
        $("#submitadd").attr("disabled","disabled");
        $("#submitadd").val($("#submitadd").val()+"...");
        submit_add_hotel(formData);
        $("#submitadd").val("Thêm");
        $('#form_add_hotel')[0].reset();
    });
});

function select_cate_hotel(){
    var url = "../hotel/get_list_cate_hotel";
    var success = function(result) {
        var json_data = $.parseJSON(result);
        var sl = $('select[id=category_hotel_id]');
        sl.empty();
        $.each(json_data, function(key, value) {
            sl.append('<option value="' + value.cate_id + '">' + value.cate_name + '</option>');
        });
    };
    $.get(url, success);

}
function submit_add_hotel(data) {
    var respon=$("#noti_respon");
    respon.html("");

    // var url = "../hotel/submit_add_hotel";
    // var success = function(result) {
    //     var json_data = $.parseJSON(result);
    //     if (json_data.status) {
    //         window.location.replace("/admin/hotel/");
    //     }else{
    //         respon.html('<div class="callout callout-info" style="background-color: #ef0000 !important;"><h4>Failed!</h4>'+json_data.status_value+'</div>');
    //     }
    // };
    // $.post(url, data, success);
    $.ajax({
        url: '../hotel/submit_add_hotel',
        type: 'POST',
        data: data,
        success: function (result) {
            var json_data = $.parseJSON(result);
            if (json_data.status) {
                window.location.replace("../hotel/");
            }else{
                respon.html('<div class="callout callout-info" style="background-color: #ef0000 !important;"><h4>Failed!</h4>'+json_data.status_value+'</div>');
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

}

