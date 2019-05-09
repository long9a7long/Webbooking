<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
    var $data = array();
    var $page_size=6;
    var $cache_time_min=5;//minutes
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{

        $this -> data['title'] = "Booking Hotel";  

        //lấy dữ liệu list
        $this->load->model('hotels_model');
        $this -> data['list_hotel']=$this->hotels_model->getList();
        $this -> data['list_cate']=$this->hotels_model->getCateHotel();
        $this -> data['list_facility']=$this->hotels_model->getFacility();
        //$this -> data['count_star']=$this->hotels_model->count_rating();

        $view_style=1;
        $view=$this->input->get('view');
        if($view !==NULL){
            $view_style=$this->input->get('view');
        }
        if($view_style==1)
            $this -> data['temp'] = "default/hotel/hotel";
        else{
            $this -> data['temp'] = "default/hotel/hotel-grid";
        }
        $this -> data['after_header'] = "default/hotel/slide"; 
        $this -> data['custom_js'] = array(
            "assets/default/js/lazysizes.min.js",
            "assets/default/js/map_hotels.js","assets/default/js/functions.js",
            "assets/default/js/hotel.js");
            $this -> data['custom_js_external'] = array(
                "http://maps.googleapis.com/maps/api/js");
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this->load->model("hotels_model");
        $this -> data['title'] = "Single Hotel";
        $this -> data['after_header']="default/hotel/hotel-detail-slide";
        $this -> data['temp'] = "default/hotel/hotel-detail";
        
        $this -> data['custom_js'] = array(
            "assets/default/js/switcher.js",
           "assets/default/js/jquery.sliderPro.min.js",
           "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/assets/validate.js",
            "assets/default/js/hotel-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");    
        

        $hotel_slug=$this->uri->segment(3);
        $info_hotel=$this->hotels_model->get_hotel_info_by_slug($hotel_slug);
       
        if($info_hotel==NULL)
            redirect(base_url().'hotel');
        else{
            $this ->data['info_hotel']=$info_hotel;
            //get list review of hotel by hotel id
            $this ->data['reviews_hotel']=$this->hotels_model->getListReviewByID($info_hotel->hotel_id);
            $this ->data['conv_single']=$this->hotels_model->getFacilityHotelSingle($info_hotel->hotel_id);
            $this->load->view("default/template",$this ->data);
        }
    }

   
    
    public function get_list_hotel(){
        $this->load->model("hotels_model");
        $category=$this->input->get('category');
        //echo $category;
        $facility=$this->input->get('facility');
        $rating=$this->input->get('rating');
        $minprice=((int)$this->input->get('minprice'))*1000;
        $maxprice=((int)$this->input->get('maxprice'))*1000;
        $page=$this->input->get('page');
        $orderby=$this->input->get('orderby');
        if($page==NULL) $page=1;
        
        //lấy ds bài post
        $arr=$this->hotels_model->getListHaveFilter($category,$facility,$rating,$minprice,$maxprice,$orderby,$page,$this->page_size);
        //echo $this->db->last_query();
        //đếm số lượng ds bài post lấy đc
        $arr['total_record']=count($arr);
        $arr['hotels_count']=$this->hotels_model->hotels_count($category,$facility,$rating,$minprice,$maxprice);
        $arr['page_size']=$this->page_size;
        echo json_encode($arr); 
    }

    public function count(){
        $this->load->model('hotels_model');
        //$this -> data['list_hotel']=$this->hotels_model->getList();
        //$this -> data['list_type']=$this->hotels_model->getType();
        //echo "<pre>";
        echo json_encode($this->hotels_model->count_rating());
        //print_r($this->hotels_model->count_rating());
        //echo "</pre>";
    }

}
