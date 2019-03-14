<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    var $data = array();
    public function __construct(){
        parent::__construct();  
        $this -> data['title'] = "Booking Tour";
        $this -> data['slide'] = "default/slide"; 
        $this -> data['temp'] = "default/home"; 
    } 

	public function index()
	{
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
