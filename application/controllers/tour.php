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
        $this -> data['slide'] = "default/tour/slide"; 
        $this -> data['temp'] = "default/tour/tour";
        
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this -> data['title'] = "Booking Tour";  
        //$this -> data['slide'] = "default/tour/slide"; 
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
