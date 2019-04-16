<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {
    var $data = array();
    var $page_size=6;
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{
        $this -> data['title'] = "Booking Tour";
        //Set style display of list tour
        //1: list tour
        //2: grid tour
        $view_style=1;
        $view=$this->input->get('view');
        if($view !==NULL){
            $view_style=$this->input->get('view');
        }
        if($view_style==1)
            $this -> data['temp'] = "default/tour/tour";
        else{
            $this -> data['temp'] = "default/tour/tour-grid";
        }


        $this -> data['after_header'] = "default/tour/slide"; 

        //import javascript internal
        $this -> data['custom_js'] = array(
            "assets/default/js/cat_nav_mobile.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/lazysizes.min.js",
            "assets/default/js/tour.js");
        //import javascript external
        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");
        
        //load master page
        $this->load->view("default/template",$this ->data);
        
    }

    //Single tour page
    public function detail()
    {
        $this -> data['title'] = "Booking Tour";
        $this -> data['after_header'] = "default/tour/tour-detail-slide"; 

        $this -> data['temp'] = "default/tour/tour-detail";

        $this -> data['after_footer'] = "default/tour/after-footer-tour-detail";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/tour-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        $this->load->view("default/template",$this ->data);
    }

    //Function cart for booking tour
    public function cart(){
        $this -> data['title'] = "Place Your Order";
        $this -> data['after_header'] = "default/tour/tour-cart-slide"; 

        $this -> data['temp'] = "default/tour/cart";


        $this->load->view("default/template",$this ->data);
    }

    //Function checkout for booking tour
    public function payment(){
        $this -> data['title'] = "Place Your Order";
        $this -> data['after_header'] = "default/tour/tour-payment-slide"; 

        $this -> data['temp'] = "default/tour/payment";

        $this -> data['custom_js'] = array(
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/tour-detail.js");

        $this->load->view("default/template",$this ->data);
    }

    //Function confirmation for booking tour
    public function confirmation(){
        $this -> data['title'] = "Confirmation";
        $this -> data['after_header'] = "default/tour/tour-confirm-slide"; 

        $this -> data['temp'] = "default/tour/confirm";

        $this->load->view("default/template",$this ->data);
    }



    public function get_list_tour(){
        $this->load->model("tours_model");
        $category=$this->input->get('category');
        $rating=$this->input->get('rating');
        $minprice=$this->input->get('minprice');
        $maxprice=$this->input->get('maxprice');
        $page=$this->input->get('page');
        if($page==NULL) $page=1;
        echo json_encode($this->tours_model->getListHaveFilter($category,$rating,$minprice,$maxprice,$page,$this->page_size));
    }

    public function get_page_size(){
        echo $this->page_size;
    }
    public function get_list_tour_destination(){
        $this->load->model("tours_model");
        echo json_encode($this->tours_model->get_list_tour_destination());
    }

}
