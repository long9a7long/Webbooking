<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

	public function __construct(){
        parent::__construct();         
    }
    public function index()
    {
        $data["temp"]="admin/hotel/hotel";
        $data["title"]="Quản lý khách sạn";
        $this->load->model("hotels_model");
        $data["list_hotel"]=$this->hotels_model->get_list_hotel();
        $this->load->view("admin/template",$data);
    } 
    function add()
    {
            $data['temp'] = "admin/hotel/add_hotel";
            $data['title'] = "Thêm mới hotel";
            $this->load->view("admin/template",$data);
            
    }
    function edit(){
        if ($this->uri->segment(3) === FALSE)
        {
                redirect(base_url()."admin/hotel");
        }
        else
        {
                $hotel_id = $this->uri->segment(4);
        }    
        $data['temp'] = "admin/hotel/edit_hotel";
        $data['title'] = "Chỉnh sửa thông tin hotel";
        $this->load->model('hotels_model');
        $hotel=$this->hotels_model->get_hotel_info($hotel_id);
        if(empty($hotel)){
            redirect(base_url()."admin/hotel");
        }
        else {
            $data['hotel_info']=$hotel;
            $data['list_cate']=$this->hotels_model->getListCate();
            $this->load->view("admin/template",$data);
        }
        
        
   }
    function submit_add_hotel()
    {
            $result = array();
            $hotel_name=$this->input->post('hotel_name');
            $hotel_address=$this->input->post('hotel_address');
            $hotel_price=$this->input->post('hotel_price');
            $hotel_description=$this->input->post('hotel_description');
            $more_details=$this->input->post('more_details');
            $hotel_info_contact=$this->input->post('hotel_info_contact');
            $hotel_thumnail=$this->upload_single_image('hotel_thumnail');
            $album_hotel=$this->upload_multi_image('album_hotel');
            $category_hotel_id=$this->input->post('category_hotel_id');
            $category_hotel_id = implode(',', $category_hotel_id);
            $convenient=$this->input->post('convenient');
            $convenient = implode(',', $convenient);
            $hotel_status=$this->input->post('hotel_status');
            $hotel_keywords=$this->input->post('hotel_keywords');
            if (empty($hotel_name)) {
                $result['status_value'] = "Không được bỏ trống các trường nhập!";
                $result['status'] = 0;
            } else {
                $this->load->model('hotels_model');
                $this->load->helper(array('string', "text"));
                $hotel_slug=convert_accented_characters(url_title($hotel_name, 'underscore', TRUE));
                if($this->hotels_model->check_hotel_slug($hotel_slug)){
                    $hotel_slug=$hotel_slug.random_string('alnum', 8);
                }
                
                $add=$this->hotels_model->add_hotel($hotel_name,$hotel_address,$hotel_price,$hotel_description,$more_details,$hotel_info_contact,$hotel_thumnail,$album_hotel,$category_hotel_id,$hotel_keywords,$hotel_slug);
                
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
        function check_space($str){
            if(!strpos($str, " " )){
                return FALSE;
            }
            return TRUE;
        }
        function check_del_hotel()
        {
            $result = array();
            $hotel_id = $this->input->post('hotel_id');
            $this->load->model('hotels_model');
            $del = $this->hotels_model->del_hotel($hotel_id);
            if ($del) {
                $result['status_value'] = "Xóa thành công!";
                $result['status'] = 1;
            } else {
                $result['status_value'] = "Lỗi! Vui lòng thử lại sau!";
                $return['status'] = 0;
            }
            echo json_encode($result);
        }
        
    function category()
    {
            $data['temp'] = "admin/hotel/cate_hotel";
            $data['title'] = "Danh mục hotel";
            $this->load->view("admin/template",$data);
            
    }
    function get_list_cate_hotel()
    {
            $this->load->model('hotels_model');
            echo json_encode($this->hotels_model->getListCate());
    }
    
    function check_del_category()
    {
            $result = array();
            $cate_id = $this->input->post('cate_id');
            $this->load->model('hotels_model');
            $del = $this->hotels_model->del_category($cate_id);
            if ($del) {
                $result['status_value'] = "Xóa thành công!";
                $result['status'] = 1;
            } else {
                $result['status_value'] = "Lỗi! Vui lòng thử lại sau!";
                $return['status'] = 0;
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
                $this->load->model('hotels_model');
                $add = $this->hotels_model->add_category($cate_name,$cate_slug);
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
                $this->load->model('hotels_model');
                $add = $this->hotels_model->edit_category($cate_id,$cate_name,$cate_slug);
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
    //trả về true nếu có khoảng trắng
   
    
    public function upload_multi_image($img_post_name){
        $image = "";
        if(!empty($_FILES[$img_post_name]['name'])){
            $filesCount = count($_FILES[$img_post_name]['name']);
            $hinh=array();
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES[$img_post_name]['name'][$i];
                $_FILES['file']['type']     = $_FILES[$img_post_name]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$img_post_name]['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES[$img_post_name]['error'][$i];
                $_FILES['file']['size']     = $_FILES[$img_post_name]['size'][$i];
                
                // File upload configuration
                $uploadPath = './uploads/images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '30000';
                $config['remove_spaces'] = true;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $uploadData=array();
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $uploadData = $this->upload->data();
                    
                }
                if(!empty($uploadData)){
                    $resize_conf = array(
                        // it's something like "/full/path/to/the/image.jpg" maybe
                        'source_image'  => $uploadData['full_path'],
                        // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                        // or you can use 'create_thumbs' => true option instead
                        'new_image'     => $uploadData['file_path'].'thumb_'.$uploadData['file_name'],
                        'width'         => 200,
                        'height'        => 160
                        );
    
                    // initializing
                    $this->load->library('image_lib',$resize_conf);
    
                    // do it!
                    if ( ! $this->image_lib->resize())
                    {
                        // if got fail.
                        $error['resize'][] = $this->image_lib->display_errors();
                    }
                    else
                    {
                        // otherwise, put each upload data to an array.
                        array_push($hinh,$uploadData['file_name']);
                    }
    
                }
            }
            $image = implode(',',$hinh);
        }
        
        return $image;
    }

    //Phuong thuc upload 1 anh: ket qua tra ve la ten anh trong host
    public function upload_single_image($img_post_name){
        $image = "";
        if(!empty($_FILES[$img_post_name]['name'])){
            $uploadPath = './uploads/images/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '30000';
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($img_post_name))
            {
                $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                $uploadData =  $this->upload->data();
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $uploadData['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $uploadData['file_path'].'thumb_'.$uploadData['file_name'],
                    'width'         => 200,
                    'height'        => 160
                    );

                // initializing
                $this->load->library('image_lib',$resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $image=$uploadData['file_name'];
                }
                
            }
        }
        return $image;
    }
}