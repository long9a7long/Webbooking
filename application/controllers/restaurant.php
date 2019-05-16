<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {
    var $data = array();
    var $page_size=3;
    var $cache_time_min=5;
    public function __construct(){
        parent::__construct();  
        
    } 

	public function index()
	{
        $this -> data['title'] = "Restaurant";  
        $view_style=1;
        $this->load->model("restaurants_model");
        $this->data['list_cate']=$this->restaurants_model->getListCate();
        $view=$this->input->get('view');
        if($view !==NULL){
            $view_style=$this->input->get('view');
        }
        if($view_style==1){
            $this -> data['temp'] = "default/restaurant/restaurant";
        }
        else{
            $this -> data['temp'] = "default/restaurant/restaurant_grid";
        }


        $this -> data['after_header'] = "default/restaurant/slide"; 

        //import javascript internal
        $this -> data['custom_js'] = array(
            "assets/default/js/cat_nav_mobile.js",
            "assets/default/js/map.js",
            "assets/default/js/infobox.js",
            "assets/default/js/lazysizes.min.js",
            "assets/default/js/res_list.js");
        //import javascript external
        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");
            
        $this->load->view("default/template",$this ->data);
    }

    public function detail()
    {
        $this -> data['title'] = "Detail restaurant";
        $this -> data['after_header'] = "default/restaurant/res_detail_slide"; 

        $this -> data['temp'] = "default/restaurant/res_detail";

        $this -> data['after_footer'] = "default/restaurant/after-footer-res-detail";

        $this -> data['custom_js'] = array(
            "assets/default/js/jquery.sliderPro.min.js",
            "assets/default/assets/validate.js",
            "assets/default/js/map.js",
            "assets/default/js/lazysizes.min.js",
            "assets/default/js/infobox.js",
            "assets/default/js/theia-sticky-sidebar.js",
            "assets/default/js/res_detail.js");

        $this -> data['custom_js_external'] = array(
            "https://maps.googleapis.com/maps/api/js");

        //get slug tour
        $this->load->model("restaurants_model");
        $res_slug=$this->uri->segment(3);
        $info_restaurant=$this->restaurants_model->get_res_info_by_slug($res_slug);
        if($info_restaurant==NULL)
            redirect(base_url().'restaurant');
        else{
            $this ->data['info_restaurant']=$info_restaurant;
            //get list review of tour by tour id
            $this ->data['reviews_restaurant']=$this->restaurants_model->getListReviewByID($info_restaurant->res_id);
            $cate_res=$this->restaurants_model->getListCateByID($info_restaurant->res_id);
            // echo '<pre>';
            // print_r($cate_res);
            // echo '</pre>';

            $this->load->model("tours_model");
            $info_tour=$this->tours_model->get_info_tour_in_res_detail($cate_res);
            //echo $this->db->last_query();
            $this ->data['info_tour']=$info_tour;
            $this->load->view("default/template",$this ->data);
                //get list review of tour by tour id
                // $this ->data['list_convenient']=$this->tours_model->get_list_convenient_tour($info_tour->tour_id);
                // $this ->data['reviews_tour']=$this->tours_model->getListReviewByID($info_tour->tour_id);
                // $this ->data['prices_tour']=$this->tours_model->get_price_tour($info_tour->tour_id);
            }

    }
    
    public function get_list_restaurant(){
        $this->load->model("restaurants_model");
        $category=$this->input->get('category');
        //echo $category;
        $rating=$this->input->get('rating');
        $page=$this->input->get('page');
        if($page==NULL) $page=1;
        //echo $page;
        //lấy ds bài post
        $arr=$this->restaurants_model->getListHaveFilter($category,$rating,$page,$this->page_size);
        //echo $this->db->last_query();
        //đếm số lượng ds bài post lấy đc
        $arr['total_record']=count($arr);
        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';
        $arr['restaurants_count']=$this->restaurants_model->restaurants_count($category,$rating);
        $arr['page_size']=$this->page_size;
        echo json_encode($arr);
    } 

    public function submit_review_restaurant(){
        $result = array();
        $this->load->model("restaurants_model");

        $res_id  = $this->input->post('restaurant_id',TRUE);
        $name_review  = $this->input->post('name_review',TRUE);
        $email_review  = $this->input->post('email_review',TRUE);
        $view_review = $this->input->post('view_review',TRUE);
        $waiter_review = $this->input->post('waiter_review',TRUE);
        $quality_review =$this->input->post('quality_review',TRUE);
        $review_text = $this->input->post('review_text',TRUE);
        //$verify_review  = $this->input->post('verify_review',TRUE);
        
        if(trim($name_review) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Bạn phải nhập tên của bạn.</div>';
        }else if(trim($email_review) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Vui lòng nhập một địa chỉ email hợp lệ.</div>';
            
        } else if(!$this->isEmail($email_review)) {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Địa chỉ email bạn vừa nhập không hợp lệ, vui lòng nhập lại.</div>';
        }else if(trim($view_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Vui lòng đánh giá khung cảnh nhà hàng.</div>';
            
        } else if(trim($waiter_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Vui lòng đánh giá nhân viên phục vụ.</div>';
              
        } else if(trim($quality_review ) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Vui lòng đánh giá chất lượng.</div>';
            
        } else if(trim($review_text) == '') {
            $result['status'] = 0;
            $result['message'] = '<div class="error_message">Vui lòng nhập đánh giá của bạn.</div>';
            
        } //else if(!isset($verify_review) || trim($verify_review) == '') {
        //     $result['status'] = 0;
        //     $result['message'] = '<div class="error_message"> Vui lòng nhập số xác minh.</div>';
            
        // }
        //  else if(trim($verify_review) != '4') {
        //     echo '<div class="error_message">The verification number you entered is incorrect.</div>';
        //     exit();
        // }
        else{
            
            if(!$this->restaurants_model->add_review_restaurant(trim($res_id),
                                                    trim($name_review),
                                                    trim($email_review),
                                                    (int)trim($view_review),
                                                    (int)trim($waiter_review),
                                                    (int)trim($quality_review),
                                                    trim($review_text)))
            {
                $result['status'] = 0;
                $result['message']='<div class="error_message"><span class="icon_dislike" aria-hidden="true"></span> Có lỗi xảy ra, vui lòng thử lại sau!.</div>';
            }else{
                $result['status'] = 1;
                $result['message']="<div id='success_page' style='padding:20px 0'>";
                $result['message'].="Cảm ơn <strong>$name_review</strong>,<br> bản đánh giá của bạn đã được gửi thành công!";
                $result['message'].="</div>";
            }
            
        }

        echo json_encode($result);
    }
    function isEmail($email_review ) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email_review ));
    }

}
