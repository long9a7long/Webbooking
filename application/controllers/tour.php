<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {
    var $data = array();
    var $page_size=6;
    var $cache_time_min=5;//minutes
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
        $this->load->model("tours_model");
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
        
        //get slug tour
        $tour_slug=$this->uri->segment(3);
        $info_tour=$this->tours_model->get_tour_info_by_slug($tour_slug);
        if($info_tour==NULL)
            redirect(base_url().'tour');
        else{
            $this ->data['info_tour']=$info_tour;
            //get list review of tour by tour id
            $this ->data['reviews_tour']=$this->tours_model->getListReviewByID($info_tour->tour_id);
            $this->load->view("default/template",$this ->data);
        }
            
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
        //echo $category;
        $rating=$this->input->get('rating');
        $minprice=((int)$this->input->get('minprice'))*1000;
        $maxprice=((int)$this->input->get('maxprice'))*1000;
        $page=$this->input->get('page');
        $orderby=$this->input->get('orderby');
        if($page==NULL) $page=1;
        
        //lấy ds bài post
        $arr=$this->tours_model->getListHaveFilter($category,$rating,$minprice,$maxprice,$orderby,$page,$this->page_size);
        //echo $this->db->last_query();
        //đếm số lượng ds bài post lấy đc
        $arr['total_record']=count($arr);
        $arr['tours_count']=$this->tours_model->tours_count($category,$rating,$minprice,$maxprice);
        $arr['page_size']=$this->page_size;
        echo json_encode($arr);
    }

    
    public function submit_review_tour(){
        $result = array();

        $this->load->model("tours_model");
        $tour_name  = $this->input->post('tour_name',TRUE);
        $name_review  = $this->input->post('name_review',TRUE);
        $lastname_review  = $this->input->post('lastname_review',TRUE);
        $email_review  = $this->input->post('email_review',TRUE);
        $position_review = $this->input->post('position_review',TRUE);
        $guide_review = $this->input->post('guide_review',TRUE);
        $price_review = $this->input->post('price_review',TRUE);
        $quality_review =$this->input->post('quality_review',TRUE);
        $review_text = $this->input->post('review_text',TRUE);
        //$verify_review  = $this->input->post('verify_review',TRUE);

        if(trim($name_review) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">You must enter your Name.</div>';
        } else if(trim($lastname_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">You must enter your Last name.</div>';
            
        } else if(trim($email_review) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please enter a valid email address.</div>';
            
        } else if(!isEmail($email_review)) {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
            
        } else if(trim($position_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please rate Position.</div>';
            
        } else if(trim($guide_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please rate Tourist Guide.</div>';
            
        } else if(trim($price_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please rate Tour price.</div>';
            
        } else if(trim($quality_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please rate Quality.</div>';
            
        } else if(trim($review_text) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Please enter your review.</div>';
            
        } else if(!isset($verify_review) || trim($verify_review) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message"> Please enter the verification number.</div>';
            
        }
        //  else if(trim($verify_review) != '4') {
        //     echo '<div class="error_message">The verification number you entered is incorrect.</div>';
        //     exit();
        // }
        else{
            if(get_magic_quotes_gpc()) {
                $review_text = stripslashes($review_text);
            }
            $result['status'] = 1;
            $result['message'] = '<div class="error_message">Your review aready sent! Tks for review!!</div>';
        }
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        echo json_encode($result);
    }

}
