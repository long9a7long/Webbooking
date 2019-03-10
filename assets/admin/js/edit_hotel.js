$(function() {
    $('.select2').select2();
    $("form").on('submit', function(event) {
        event.preventDefault();
		for(var instanceName in CKEDITOR.instances)
            CKEDITOR.instances[instanceName].updateElement();
        var formData = new FormData(this);
        $("#submitupdate").attr("disabled","disabled");
        
        $("#submithuy").attr("disabled","disabled");
        submit_edit_hotel(formData);
        $('#form_edit_hotel')[0].reset();
    });
});

function submit_edit_hotel(data) {
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
        url: '../submit_edit_hotel',
        type: 'POST',
        data: data,
        success: function (result) {
            var json_data = $.parseJSON(result);
            if (json_data.status) {
                window.location.replace("../");
            }else{
                respon.html('<div class="callout callout-info" style="background-color: #ef0000 !important;"><h4>Failed!</h4>'+json_data.status_value+'</div>');
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

}

