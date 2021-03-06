<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
    var $data = array();
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{

        $this -> data['title'] = "Booking Hotel";  

        //lấy dữ liệu list
        $this->load->model('hotels_model');
        $this -> data['list_hotel']=$this->hotels_model->getList();

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
            "assets/default/js/map_hotels.js","assets/default/js/functions.js");
            $this -> data['custom_js_external'] = array(
                "http://maps.googleapis.com/maps/api/js");
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this -> data['title'] = "Single Hotel";
        $this -> data['after_header']="default/hotel/hotel-detail-slide";
        $this -> data['temp'] = "default/hotel/hotel-detail";
        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");
        $this -> data['custom_js'] = array(
            "assets/default/js/switcher.js",
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/assets/validate.js");
        
        $this->load->view("default/template",$this ->data);
    }

   
    
    public function get_list_hotel_destination(){
        $this->load->model("hotels_model");
        echo json_encode($this->hotels_model->get_list_hotel_destination());
    }

}
