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
        $this -> data['slide'] = "default/hotel/slide"; 
        $this -> data['temp'] = "default/hotel/hotel";
        
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this -> data['title'] = "Booking Hotel";
        $this -> data['temp'] = "default/hotel/hotel-detail";
        
        $this->load->view("default/template",$this ->data);
    }

   
    
    public function get_list_hotel_destination(){
        $this->load->model("hotels_model");
        echo json_encode($this->hotels_model->get_list_hotel_destination());
    }

}
