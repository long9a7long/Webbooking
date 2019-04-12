<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
    var $data = array();
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{
        $this -> data['title'] = "Transfer";  
        $view_style=1;
        $view=$this->input->get('view');
        if($view !==NULL){
            $view_style=$this->input->get('view');
        }
        if($view_style==1)
            $this -> data['temp'] = "default/transfer/transfer";
        else{
            $this -> data['temp'] = "default/transfer/transfer-grid";
        }


        $this -> data['after_header'] = "default/transfer/slide"; 

        //import javascript internal
        $this -> data['custom_js'] = array(
            "assets/default/js/cat_nav_mobile.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/transfer.js");
        //import javascript external
        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");
        
        //load master page
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this -> data['title'] = "Booking transfer";
        $this -> data['after_header'] = "default/transfer/transfer-detail-slide"; 

        $this -> data['temp'] = "default/transfer/transfer-detail";

        $this -> data['after_footer'] = "default/transfer/after-footer-transfer-detail";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/transfer-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        $this->load->view("default/template",$this ->data);
    }
    public function cart()
    {
        $this -> data['title'] = "Booking cart";
        $this -> data['after_header'] = "default/transfer/cart-transfer-slide"; 

        $this -> data['temp'] = "default/transfer/cart-transfer";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/transfer-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        $this->load->view("default/template",$this ->data);
    }
    public function payment()
    {
        $this -> data['title'] = "Booking payment";
        $this -> data['after_header'] = "default/transfer/payment-transfer-slide"; 

        $this -> data['temp'] = "default/transfer/payment-transfer";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/transfer-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        $this->load->view("default/template",$this ->data);
    }
    public function confirm()
    {
        $this -> data['title'] = "Booking payment";
        $this -> data['after_header'] = "default/transfer/confirmation-slide"; 

        $this -> data['temp'] = "default/transfer/confirmation";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/transfer-detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        $this->load->view("default/template",$this ->data);
    }
    public function get_list_transfer_from(){
        $this->load->model("transfers_model");
        echo json_encode($this->transfers_model->get_list_transfer_from());
    }
    public function get_list_transfer_destination(){
        $this->load->model("transfers_model");
        echo json_encode($this->transfers_model->get_list_transfer_destination());
    }

}
