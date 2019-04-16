$(function() {
    get_list_tours();

    //Su kien click vao category tour
    $('.filter_by_category').on('click',function(e){
    	e.preventDefault();
    	let id= $(this).data('id'); //id category
    	let content= $(this).data('content');

    	add_filter_items('category',id,content);
    	//thêm query string vào input hidden filter
    	add_query_string_filter('category',id);
    	//lấy danh sách tours theo query string
    	get_list_tours(get_list_query());
    });

    //Su kien thay doi gia tri filter gia
    $("#range").on('change',function(){
    	let slider = $("#range").data("ionRangeSlider");
    	let from = slider.result.from;
    	let to = slider.result.to;
    	let content= 'gia tu '+from+' den '+to;
    	add_filter_items('price',0,content);
    	//thêm query string vào input hidden filter
    	add_query_string_filter('maxprice',to);
    	add_query_string_filter('minprice',from);
    	//lấy danh sách tours theo query string
    	get_list_tours(get_list_query());

    });

    //Su kien xoa filter items
    $(document).on('click','.remove-filter',function(e){
    	e.preventDefault();
    	let type= $(this).data('type');
    	let id= $(this).data('id');
        $('span.filter-item').has('a[data-type='+type+'][data-id='+id+']').remove();

        if(type=='rating'){
        	$('input.filter-rating[data-id='+id+']').iCheck('uncheck');
        }

        remove_query_string_filter(type,id);
    });


   	//Su kien check vao checkbox filter rating
    $(document).on('ifChecked','.filter-rating',function(e){
    	let id= $(this).data('id');
	    let content="";
    	
	    switch(id){
	    		case 1:
	    			content="Đánh giá: 1";
	    			break;
	    		case 2:
	    			content="Đánh giá: 2";
	    			break;
	    		case 3:
	    			content="Đánh giá: 3";
	    			break;
	    		case 4:
	    			content="Đánh giá: 4";
	    			break;
	    		case 5:
	    			content="Đánh giá: 5";
	    			break;
	    }
	    add_filter_items('rating',id,content);
    	//thêm query string vào input hidden filter
    	add_query_string_filter('rating',id);
    	//lấy danh sách tours theo query string
    	get_list_tours(get_list_query());
    	
    	
    });
    //Su kien uncheck checkbox rating
    $(document).on('ifUnchecked','.filter-rating',function(e){
    	e.preventDefault();
    	let id= $(this).data('id');
        $('span.filter-item').has('a[data-type=rating][data-id='+id+']').remove();
        remove_query_string_filter('rating', id);
    });


    
});


$('#cat_nav').mobileMenu();
$('input').iCheck({
		   checkboxClass: 'icheckbox_square-grey',
		   radioClass: 'iradio_square-grey'
		 });


function add_filter_items(type,id, content){
	let filter=$('#row-filter');
	//add filter category
	if(type=='category'){
		let filter_item=$('.filter-item a[data-id='+id+'][data-type=category]');
		if(!filter_item.length)
			filter.append('<span class="filter-item">'+
				'<a  href="#" class="remove-filter" data-type="category" data-id="'+id+'" data-content="'+content+'">X</a>'+
				content+'</span>');

	}

	//add filter price
	if(type=='price'){
		let filter_item=$('.filter-item a[data-id='+id+'][data-type=price]');
		if(!filter_item.length){
			filter.append('<span class="filter-item">'+
				'<a  href="#" class="remove-filter" data-type="price" data-id="0" data-content="'+content+'">X</a>'+
				content+'</span>');
		}
		else{
			$('span.filter-item').has('a[data-type=price]').remove();
			filter.append('<span class="filter-item">'+
				'<a  href="#" class="remove-filter" data-type="price" data-id="0" data-content="'+content+'">X</a>'+
				content+'</span>');
		}
	}

	//add filter rating
	if(type=='rating'){
		let filter_item=$('.filter-item a[data-id='+id+'][data-type=rating]');
		if(!filter_item.length){
			filter.append('<span class="filter-item">'+
				'<a  href="#" class="remove-filter" data-type="rating" data-id="'+id+'" data-content="'+content+'">X</a>'+
				content+'</span>');
		}
		
	}
	
}
async function get_list_tours(data) {
	let result;
    var url = base_url+"/tour/get_list_tour";
    var success = function(result) {
        var json_data = $.parseJSON(result);
        show_list_tours(json_data);
    };
    try {
		result = await $.get(url, data, success);
	}
	catch (error) {
        console.error(error);
    }
}

function show_list_tours(data) {
    let list = $('#list_tour_list');
    list.empty();
    for (let i = 0; i < data.length; i++) {
        let tr = $('<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;"></div>');
        let r=$('<div class="row"></div>');
        let col4=$('<div class="col-lg-4 col-md-4"></div>');
        let col6=$('<div class="col-lg-6 col-md-6"></div>');
        let col2=$('<div class="col-lg-2 col-md-2"></div>');


        col4.append('<div class="ribbon_3 popular"><span>'+data[i].tour_label+'</span></div>');

        col4.append('<div class="wishlist">'+
        	'<a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip">'+
        	'<span class="tooltip-back">Add to wishlist</span>'+
        	+'</span></a></div>');
        col4.append('<div class="img_list">'+
						'<a href="tour/detail/'+data[i].tour_slug+'"><img data-src="'+data[i].tour_thumnail+'" alt="'+data[i].tour_name+'" class="lazyload">'+
						'</a>'+
					'</div>');


		let tour_list_desc=$('<div class="tour_list_desc"></div>');
		let vote="";
		for(let j=0;j<5;j++){
			if(data[i].avg_rev>j)
				vote+='<i class="icon-smile voted"></i>';
			else
				vote+='<i class="icon-smile"></i>';
		}
        tour_list_desc.append('<div class="rating">'+vote+
						'<small>('+data[i].num_rev+')</small>'+
					'</div>');
		tour_list_desc.append('<h3>'+data[i].tour_name+'</h3>');
		let except="";
		if(data[i].tour_except==null){
			except=getWords(data[i].tour_description,30)+'...';
		}else{
			except=data[i].tour_except;
		}
        tour_list_desc.append('<p>'+except+'</p>');
        let add_info=$('<ul class="add_info"></ul>');
        add_info.append('<li>'+
							'<div class="tooltip_styled tooltip-effect-4">'+
								'<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>'+
								'<div class="tooltip-content">'+
									'<h4>Schedule</h4>'+
									'<strong>Monday to Friday</strong> 09.00 AM - 5.30 PM'+
									'<br>'+
									'<strong>Saturday</strong> 09.00 AM - 5.30 PM'+
									'<br>'+
									'<strong>Sunday</strong> <span class="label label-danger">Closed</span>'+
								'</div>'+
							'</div>'+
						'</li>');
        add_info.append('<li>'+
							'<div class="tooltip_styled tooltip-effect-4">'+
								'<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>'+
								'<div class="tooltip-content">'+
									'<h4>Address</h4> Musée du Louvre, 75058 Paris - France'+
									'<br>'+
								'</div>'+
							'</div>'+
						'</li>');
		add_info.append('<li>'+
							'<div class="tooltip_styled tooltip-effect-4">'+
								'<span class="tooltip-item"><i class="icon_set_1_icon-97"></i></span>'+
								'<div class="tooltip-content">'+
									'<h4>Languages</h4> English - French - Chinese - Russian - Italian'+
								'</div>'+
							'</div>'+
						'</li>');
		add_info.append('<li>'+
							'<div class="tooltip_styled tooltip-effect-4">'+
								'<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>'+
								'<div class="tooltip-content">'+
									'<h4>Parking</h4> 1-3 Rue Elisée Reclus'+
									'<br> 76 Rue du Général Leclerc'+
									'<br> 8 Rue Caillaux 94923'+
									'<br>'+
								'</div>'+
							'</div>'+
						'</li>');
		add_info.append('<li>'+
							'<div class="tooltip_styled tooltip-effect-4">'+
								'<span class="tooltip-item"><i class="icon_set_1_icon-25"></i></span>'+
								'<div class="tooltip-content">'+
									'<h4>Transport</h4>'+
									'<strong>Metro: </strong>Musée du Louvre station (line 1)'+
									'<br>'+
									'<strong>Bus:</strong> 21, 24, 27, 39, 48, 68, 69, 72, 81, 95'+
									'<br>'+
								'</div>'+
							'</div>'+
						'</li>');
		tour_list_desc.append(add_info);

		col6.append(tour_list_desc);

		col2.append('<div class="price_list">'+
						'<div><sup>$</sup>39*<span class="normal_price_list">$99</span><small>*Per person</small>'+
							'<p><a href="tour/detail/abc" class="btn_1">Details</a>'+
							'</p>'+
						'</div>'+
					'</div>');
        r.append(col4);
        r.append(col6);
        r.append(col2);

        tr.append(r);
        list.append(tr);
    }
}

function get_list_query()
{
    let query_string= $('#querystring_filter').val();
    let data={};
    let list_query_string=query_string.split('&');
    for (var i = list_query_string.length - 1; i >= 0; i--) {
    		let key=list_query_string[i].split('=')[0];
    		let value=list_query_string[i].split('=')[1];
    		switch (key){
    			case "category":
    				data.category=value;
    				break;
    			case "maxprice":
    				data.maxprice=value;
    				break;
    			case "minprice":
    				data.minprice=value;
    				break;
    			case "rating":
    				data.rating=value;
    				break;
    			
    		}
    			
    }
    return data;
}

function add_query_string_filter(key_query,value_query){
	let query_string= $('#querystring_filter').val();
	let list_query_string=query_string.split('&');
	if(query_string.indexOf(key_query)===-1){
		if(query_string===''){
			$('#querystring_filter').val(key_query+'='+value_query);
		}else{
			$('#querystring_filter').val(query_string+'&'+key_query+'='+value_query);
		}

			
	}
	else{
		let arr_query=[];
		for (var i = list_query_string.length - 1; i >= 0; i--) {

			let key=list_query_string[i].split('=')[0];
	    	let value=list_query_string[i].split('=')[1];
			arr_query[key]=value;
		}

		if(arr_query[key_query]===undefined){
			arr_query[key_query]=value_query;
		}
		else{
			let value=arr_query[key_query];
			if(value.indexOf(value_query)===-1){
				if(key_query!=="minprice"&&key_query!=="maxprice"){
		     		value=value+','+value_query;
				}else{
					value=value_query;
				}
		     }
		     arr_query[key_query]=value;
		}
		var query_string_new="";
		for (x in arr_query) {
		  	if(query_string_new===""){
				query_string_new=x+"="+arr_query[x];
			}else
				query_string_new=query_string_new+"&"+x+"="+arr_query[x];
		}
		
		$('#querystring_filter').val(query_string_new);
	}
	
}

function remove_query_string_filter(key_query,value_query){
	let query_string= $('#querystring_filter').val();
	let list_query_string=query_string.split('&');
	if(query_string.indexOf(key_query)===-1){
		return;
	}
	let arr_query=[];
	let list__value=[];
	for (var i = list_query_string.length - 1; i >= 0; i--) {
		let key=list_query_string[i].split('=')[0];
	    let value=list_query_string[i].split('=')[1];
	    if(key_query==key){
	    	list__value=value.split(',');
	    }
	    
		arr_query[key]=value;
	}

	if(key_query==="price"){
		delete arr_query["minprice"];
		delete arr_query["maxprice"];
	}
	else{
		
		for (var i = list__value.length - 1; i >= 0; i--) {
			if(list__value[i]==value_query){
				list__value.splice(i,1);
				break;
			}	
		}
		if(list__value.length==0){
			delete arr_query[key_query];
		}else{
			arr_query[key_query]=list__value.toString();
		}
	}

	var query_string_new="";
	for (x in arr_query) {
		if(query_string_new===""){
			query_string_new=x+"="+arr_query[x];
		}else
			query_string_new=query_string_new+"&"+x+"="+arr_query[x];
		}
		
	$('#querystring_filter').val(query_string_new);
}

function get_page_size(){
	let url = base_url+"/tour/get_page_size";
    let success = function(result) {
		//let json_data = $.parseJSON(result);
		return result;
    };
    $.get(url, data, success);
}