<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {
    var $data = array();
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{
        $this -> data['title'] = "Booking Tour";
        $this -> data['temp'] = "default/tour/tour";
        
        $this -> data['after_header'] = "default/tour/slide"; 

        $this -> data['custom_js'] = array(
            "assets/default/js/cat_nav_mobile.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/tour.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");
        
        $this->load->view("default/template",$this ->data);
        
    }

    public function detail()
    {
        $this -> data['title'] = "Booking Tour";
        $this -> data['temp'] = "default/tour/tour-detail";
        
        $this->load->view("default/template",$this ->data);
    }

    public function get_list_tour_from(){
        $this->load->model("tours_model");
        echo json_encode($this->tours_model->get_list_tour_from());
    }
    public function get_list_tour_destination(){
        $this->load->model("tours_model");
        echo json_encode($this->tours_model->get_list_tour_destination());
    }

}
