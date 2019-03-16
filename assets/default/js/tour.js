(function($) {
    $(".select2").select2();
    $( "#destination_tour" ).autoComplete({
        minChars: 1,
        source: function(term, response){
    try { xhr.abort(); } catch(e){}
    xhr = $.getJSON('index/get_list_tour_destination', { q: term }, function(data){ response(data); });
        }
    });
    // Chinh find price range
    var pricerangenumbermin = document.getElementById("pricerangenumbermin");
    var pricerangenumbermax = document.getElementById("pricerangenumbermax");
    var priceslidenumbermin = document.getElementById("priceslidenumbermin");
    var priceslidenumbermax = document.getElementById("priceslidenumbermax");
    priceslidenumbermin.oninput = function() {
        if(Number(priceslidenumbermax.value)>=Number(this.value))
            pricerangenumbermin.value = this.value;
        else{
            priceslidenumbermin.value = pricerangenumbermax.value;
            pricerangenumbermin.value = pricerangenumbermax.value;
        }
        add_filter_price(priceslidenumbermin.value,priceslidenumbermax.value);
    }
    priceslidenumbermax.oninput = function() {
        if(Number(priceslidenumbermin.value)<=Number(this.value))
            pricerangenumbermax.value = this.value;
        else{
            priceslidenumbermax.value=priceslidenumbermin.value;
            pricerangenumbermax.value = priceslidenumbermin.value;
        }
        add_filter_price(priceslidenumbermin.value,priceslidenumbermax.value);
    }

    pricerangenumbermin.oninput = function() {
        if(Number(pricerangenumbermax.value)>=Number(this.value))
            priceslidenumbermin.value = this.value;
        else{
            pricerangenumbermin.value=pricerangenumbermax.value;
            priceslidenumbermin.value = pricerangenumbermax.value;
        }
        add_filter_price(priceslidenumbermin.value,priceslidenumbermax.value);
    }
    pricerangenumbermax.oninput = function() {
        if(Number(pricerangenumbermin.value)<=Number(this.value))
            priceslidenumbermax.value = this.value;
        else{
            priceslidenumbermax.value=priceslidenumbermin.value;
            pricerangenumbermax.value = priceslidenumbermin.value;
        }
        add_filter_price(priceslidenumbermin.value,priceslidenumbermax.value);
    }

    // Chinh find duration range
    var durationrangenumbermin = document.getElementById("durationrangenumbermin");
    var durationrangenumbermax = document.getElementById("durationrangenumbermax");
    var durationslidenumbermin = document.getElementById("durationslidenumbermin");
    var durationslidenumbermax = document.getElementById("durationslidenumbermax");
    durationslidenumbermin.oninput = function() {
        if(Number(durationslidenumbermax.value)>=Number(this.value))
            durationrangenumbermin.value = this.value;
        else{
            durationslidenumbermin.value=durationrangenumbermax.value;
            durationrangenumbermin.value = durationrangenumbermax.value;
        }
        add_filter_duration(durationslidenumbermin.value,durationslidenumbermax.value);
        
    }
    durationslidenumbermax.oninput = function() {
        if(Number(durationslidenumbermin.value)<=Number(this.value))
            durationrangenumbermax.value = this.value;
        else{
            durationslidenumbermax.value=durationslidenumbermin.value;
            durationrangenumbermax.value = durationslidenumbermin.value;
        }
        add_filter_duration(durationslidenumbermin.value,durationslidenumbermax.value);
    }

    durationrangenumbermin.oninput = function() {
        if(Number(durationrangenumbermax.value)>=Number(this.value))
            durationslidenumbermin.value = this.value;
        else{
            durationrangenumbermin.value=durationrangenumbermax.value;
            durationslidenumbermin.value = durationrangenumbermax.value;
        }
        add_filter_duration(durationslidenumbermin.value,durationslidenumbermax.value);
    }
    durationrangenumbermax.oninput = function() {
        if(Number(durationrangenumbermin.value)<=Number(this.value))
            durationslidenumbermax.value = this.value;
        else{
            durationslidenumbermax.value=durationslidenumbermin.value;
            durationrangenumbermax.value = durationslidenumbermin.value;
        }
        add_filter_duration(durationslidenumbermin.value,durationslidenumbermax.value);
    }
    //remove filter search tour
    $(document).on('click','.btn_remove_filter',function(e){
        e.preventDefault();
        var filter_row=$(this).data('filterrow');
        $("#filter_"+filter_row).remove();

    });

    //change value of category tour
    $('#category_tour').on('change', function() {
        add_filter_category_tour($("#category_tour :selected").text());
    });

    //change value of destination tour
    $('#destination_tour').on('change', function() {
        var obj=$("#destination_tour :selected");
        add_filter_destination_tour(obj);
    });

    //change value of checkin_date
    $("#checkin_date").datepicker({
        onSelect: function(dateText) {
          $(this).change();
        }
      }).on("change", function() {
        add_filter_checkin_date_tour(this.value);
    });

    //change value of checkout_date
    $("#checkout_date").datepicker({
        onSelect: function(dateText) {
          $(this).change();
        }
      }).on("change", function() {
        add_filter_checkout_date_tour(this.value);
    });

    //slide images tour
    
})(jQuery);

function add_filter_duration(min,max){
    var temp=$('#filter_duration');
    if (temp.length){
            temp.empty();
            temp.append('<span class="remove_filter" ><a data-filterrow="duration" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> thời hạn '+min+'-'+max+' ngày</div>');
    }
    else{
            $(".list_filter").append('<div class="items-filter" id="filter_duration">'
            +'<span class="remove_filter" ><a data-filterrow="duration" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> thời hạn '+min+'-'+max+' ngày</div>'
            +'</div>');
    }
}

function add_filter_price(min,max){
    var temp=$('#filter_price');
    if (temp.length){
            temp.empty();
            temp.append('<span class="remove_filter" ><a data-filterrow="price" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> giá '+min+'-'+max+' nghìn đồng</div>');
    }
    else{
            $(".list_filter").append('<div class="items-filter" id="filter_price">'
            +'<span class="remove_filter" ><a data-filterrow="price" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> giá '+min+'-'+max+' nghìn đồng</div>'
            +'</div>');
    }
}

function add_filter_category_tour(value){
    var temp=$('#filter_category');
    if (temp.length){
            temp.empty();
            temp.append('<span class="remove_filter" ><a data-filterrow="category" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> khu vực '+value+'</div>');
    }
    else{
            $(".list_filter").append('<div class="items-filter" id="filter_category">'
            +'<span class="remove_filter" ><a data-filterrow="category" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> khu vực '+value+'</div>'
            +'</div>');
    }
}

function add_filter_destination_tour(obj){
    let temp=$('#filter_destination');
    let value="";
    
    for(var i=0;i<obj.length;i++){
        if(value==="")
            value=obj[i].label;
        else{
            value=value+"-"+obj[i].label;
        }
    }
        
    
    if (temp.length){
        
            temp.empty();
            temp.append('<span class="remove_filter" ><a data-filterrow="destination" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> điểm đến '+value+'</div>');
    }
    else{
            $(".list_filter").append('<div class="items-filter" id="filter_destination">'
            +'<span class="remove_filter" ><a data-filterrow="destination" class="btn_remove_filter" href="#">X</a></span>'
            +'<div class="item_filter"> điểm đến '+value+'</div>'
            +'</div>');
    }
    if(obj.length==0) temp.empty();
}

function add_filter_checkin_date_tour(value){
    if(value!=null&&value!=""){
        let temp=$('#filter_checkin_date');
        if (temp.length){
                temp.empty();
                temp.append('<span class="remove_filter" ><a data-filterrow="checkin_date" class="btn_remove_filter" href="#">X</a></span>'
                +'<div class="item_filter"> ngày đi '+value+'</div>');
        }
        else{
                $(".list_filter").append('<div class="items-filter" id="filter_checkin_date">'
                +'<span class="remove_filter" ><a data-filterrow="checkin_date" class="btn_remove_filter" href="#">X</a></span>'
                +'<div class="item_filter"> ngày đi '+value+'</div>'
                +'</div>');
        }
    }
}

function add_filter_checkout_date_tour(value){
    if(value!=null&&value!=""){
        let temp=$('#filter_checkout_date');
        if (temp.length){
                temp.empty();
                temp.append('<span class="remove_filter" ><a data-filterrow="checkout_date" class="btn_remove_filter" href="#">X</a></span>'
                +'<div class="item_filter"> ngày về '+value+'</div>');
        }
        else{
                $(".list_filter").append('<div class="items-filter" id="filter_checkout_date">'
                +'<span class="remove_filter" ><a data-filterrow="checkout_date" class="btn_remove_filter" href="#">X</a></span>'
                +'<div class="item_filter"> ngày về '+value+'</div>'
                +'</div>');
        }
    }
    
}
