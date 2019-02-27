<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends CI_Controller {

	public function __construct(){
        parent::__construct();         
    } 

   function index()
   {
        $data['temp'] = "admin/tour";
        $data['title'] = "Quản lý tour";
        $this->load->model('tours_model');
        $data['list_tour']=$this->tours_model->getList();
        $this->load->view("admin/template",$data);
   }
   function test(){
    $this->load->model('tours_model');
    $tour_title="Tour Du Lịch Trải Nghiệm Cù Lao Xanh";
    $tour_slug=url_title($tour_title, 'underscore', TRUE);
    $this->load->helper(array('string', "text"));
    if($this->tours_model->check_tour_slug($tour_slug)){
        
        $tour_slug=convert_accented_characters($tour_slug.random_string('alnum', 8));
    }
    echo convert_accented_characters($tour_slug);
   }
   function add()
   {
       $this->load->library('common');
        $data['temp'] = "admin/add_tour";
        $data['title'] = "Thêm mới tour";
        $this->load->view("admin/template",$data);
        
   }
   function category()
   {
        $data['temp'] = "admin/cate_tour";
        $data['title'] = "Danh mục tour";
        $this->load->view("admin/template",$data);
        
   }
   function get_list_cate_tour()
   {
        $this->load->model('tours_model');
        echo json_encode($this->tours_model->getListCate());
   }
   function submit_add_tour()
   {
        $result = array();
        $tour_title=$this->input->post('tour_title');
        $category_tour_id=$this->input->post('category_tour_id');
        $category_tour_id = implode(',', $category_tour_id);
        $tour_from=$this->input->post('tour_from');
        $tour_destination=$this->input->post('tour_destination');
        $tour_duration=$this->input->post('tour_duration');
        $tour_price=$this->input->post('tour_price');
        $tour_saving_price=$this->input->post('tour_saving_price');
        $tour_thumnail=$this->common->insert_single_image('tour_thumnail');
        $album_tour=$this->common->insert_single_image('album_tour');
        $tour_except=$this->input->post('tour_except');
        $tour_info_contact=$this->input->post('tour_info_contact');
        $tour_keywords=$this->input->post('tour_keywords');
        $tour_description=$this->input->post('tour_description');
        $tour_schedule=$this->input->post('tour_schedule');
        if (empty($tour_title)) {
            $result['status_value'] = "Không được bỏ trống các trường nhập!";
            $result['status'] = 0;
        } else {
            $this->load->model('tours_model');
            $this->load->helper(array('string', "text"));
            $tour_slug=convert_accented_characters(url_title($tour_title, 'underscore', TRUE));
            if($this->tours_model->check_tour_slug($tour_slug)){
                $tour_slug=$tour_slug.random_string('alnum', 8);
            }
            $add=$this->tours_model->add_tour($tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$tour_thumnail,$album_tour,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_slug);
            if ($add) {
                $result['status_value'] = "Thêm thành công!";
                $result['status'] = 1;
            } else {
                $result['status_value'] = "Lỗi! Vui lòng thử lại!";
                $return['status'] = 0;
            }
        }
        echo json_encode($result);
   }
   function submit_add_category()
   {
        $result = array();
        $cate_name = $this->input->post('cate_name');
        $cate_slug = $this->input->post('cate_slug');
        if (empty($cate_name)||empty($cate_slug)) {
            $result['status_value'] = "Không được bỏ trống các trường nhập!";
            $result['status'] = 0;
        }elseif ($this->check_space($cate_slug)) {
            $result['status_value'] = "Slug không được có khoảng trắng!";
            $result['status'] = 0;
        } else {
            $this->load->model('tours_model');
            $add = $this->tours_model->add_category($cate_name,$cate_slug);
            if ($add) {
                $result['status_value'] = "Thêm thành công!";
                $result['status'] = 1;
            } else {
                $result['status_value'] = "Lỗi! Category slug đã tồn tại!";
                $return['status'] = 0;
            }
        }
        echo json_encode($result);
   }
   //trả về true nếu có khoảng trắng
   function check_space($str){
       if(!strpos($str, " " )){
           return FALSE;
       }
       return TRUE;
   }
   
   function check_del_category()
   {
        $result = array();
        $cate_id = $this->input->post('cate_id');
        $this->load->model('tours_model');
        $del = $this->tours_model->del_category($cate_id);
        if ($del) {
            $result['status_value'] = "Xóa thành công!";
            $result['status'] = 1;
        } else {
            $result['status_value'] = "Lỗi! Vui lòng thử lại sau!";
            $return['status'] = 0;
        }
        echo json_encode($result);
   }

   function check_edit_category()
   {
        $result = array();
        $cate_id = $this->input->post('cate_id');
        $cate_name = $this->input->post('cate_name');
        $cate_slug = $this->input->post('cate_slug');
        if (empty($cate_name)||empty($cate_slug)) {
            $result['status_value'] = "Không được bỏ trống các trường nhập!";
            $result['status'] = 0;
        }elseif ($this->check_space($cate_slug)) {
            $result['status_value'] = "Slug không được có khoảng trắng!";
            $result['status'] = 0;
        } else {
            $this->load->model('tours_model');
            $add = $this->tours_model->edit_category($cate_id,$cate_name,$cate_slug);
            if ($add) {
                $result['status_value'] = "Sửa thành công!";
                $result['status'] = 1;
            } else {
                $result['status_value'] = "Lỗi! Category slug đã tồn tại!";
                $return['status'] = 0;
            }
        }
        echo json_encode($result);
   }
   
}