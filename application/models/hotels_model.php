<?php
class Hotels_model extends CI_Model
{
    public function get_list_hotel(){
        $query=$this->db->get('hotels');
        return $query->result_array();
    }
    public function get_hotel_info($hotel_id){
        $result = $this->db->get_where("hotels", array('hotel_id' => $hotel_id));

		return $result->row();
    }
    public function getListCate()
    {
        $query=$this->db->get("category_hotel");
        return $query->result_array();
    }
   
    public function add_hotel($hotel_name,$hotel_address,$hotel_price,$hotel_description,$more_details,$hotel_info_contact,$hotel_thumnail,$album_hotel,$category_hotel_id,$hotel_keywords,$hotel_slug)
    {
        $data=array(
            "hotel_name" => $hotel_name,
            "category_hotel_id" => $category_hotel_id,
            "hotel_address" => $hotel_address,
            "hotel_price"=>$hotel_price,
            "hotel_description" => $hotel_description,
            "more_details" => $more_details,
            "hotel_info_contact" => $hotel_info_contact,
            "hotel_thumnail" => $hotel_thumnail,
            "album_hotel" => $album_hotel,
            "hotel_keywords" => $hotel_keywords,
            "hotel_slug" => $hotel_slug,
            "created_at" => date('Y-m-d H:i:s')
        );
        $this->db->query('ALTER TABLE `hotels` AUTO_INCREMENT=1');
        if($this->db->insert("hotels", $data))
        {
            //print_r($this->db->last_query());
            return true;
        }
        //print_r($this->db->last_query());
        return false;
    }
    public function del_hotel($hotel_id)
    {
        $data=array(
            "hotel_id" => $hotel_id,
        );
        if($this->db->delete("hotels", $data))
        {
            return true;
        }
        
		return false;
    }
    //trả về true nếu có tồn tại
    public function check_hotel_slug($hotel_slug)
    {
        $this->db->select("hotel_slug");
        $this->db->where("hotel_slug", $hotel_slug);
        $query=$this->db->get("hotels");
        if($query->num_rows()>0){
            return true;
        }
        return false;
    }
    public function update_hotel($hotel_id,$hotel_title,$category_hotel_id,$hotel_from,$hotel_destination,$hotel_duration,$hotel_price,$hotel_saving_price,$hotel_thumnail,$album_hotel,$hotel_except,$hotel_info_contact,$hotel_keywords,$hotel_description,$hotel_schedule,$hotel_status)
    {
        $data=array(
            "hotel_name" => $hotel_title,
            "category_hotel_id" => $category_hotel_id,
            "hotel_from" => $hotel_from,
            "hotel_destination" => $hotel_destination,
            "hotel_duration" => $hotel_duration,
            "hotel_price" => $hotel_price,
            "hotel_saving_price" => $hotel_saving_price,
            "hotel_thumnail" => $hotel_thumnail,
            "album_hotel" => $album_hotel,
            "hotel_except" => $hotel_except,
            "hotel_info_contact" => $hotel_info_contact,
            "hotel_keywords" => $hotel_keywords,
            "hotel_description" => $hotel_description,
            "hotel_schedule" => $hotel_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "hotel_status" => $hotel_status,
        );
        $this->db->where('hotel_id', $hotel_id);
        if($this->db->update("hotels", $data))
        {
            return true;
        }
        return false;
    }

    public function update_hotel_no_images($hotel_id,$hotel_title,$category_hotel_id,$hotel_from,$hotel_destination,$hotel_duration,$hotel_price,$hotel_saving_price,$hotel_except,$hotel_info_contact,$hotel_keywords,$hotel_description,$hotel_schedule,$hotel_status)
    {
        $data=array(
            "hotel_name" => $hotel_title,
            "category_hotel_id" => $category_hotel_id,
            "hotel_from" => $hotel_from,
            "hotel_destination" => $hotel_destination,
            "hotel_duration" => $hotel_duration,
            "hotel_price" => $hotel_price,
            "hotel_saving_price" => $hotel_saving_price,
            "hotel_except" => $hotel_except,
            "hotel_info_contact" => $hotel_info_contact,
            "hotel_keywords" => $hotel_keywords,
            "hotel_description" => $hotel_description,
            "hotel_schedule" => $hotel_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "hotel_status" => $hotel_status,
        );
        $this->db->where('hotel_id', $hotel_id);
        if($this->db->update("hotels", $data))
        {
            return true;
        }
        return false;
    }

    public function update_hotel_no_thumnail($hotel_id,$hotel_title,$category_hotel_id,$hotel_from,$hotel_destination,$hotel_duration,$hotel_price,$hotel_saving_price,$album_hotel,$hotel_except,$hotel_info_contact,$hotel_keywords,$hotel_description,$hotel_schedule,$hotel_status)
    {
        $data=array(
            "hotel_name" => $hotel_title,
            "category_hotel_id" => $category_hotel_id,
            "hotel_from" => $hotel_from,
            "hotel_destination" => $hotel_destination,
            "hotel_duration" => $hotel_duration,
            "hotel_price" => $hotel_price,
            "album_hotel" => $album_hotel,
            "hotel_saving_price" => $hotel_saving_price,
            "hotel_except" => $hotel_except,
            "hotel_info_contact" => $hotel_info_contact,
            "hotel_keywords" => $hotel_keywords,
            "hotel_description" => $hotel_description,
            "hotel_schedule" => $hotel_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "hotel_status" => $hotel_status,
        );
        $this->db->where('hotel_id', $hotel_id);
        if($this->db->update("hotels", $data))
        {
            return true;
        }
        return false;
    }

    public function update_hotel_no_album($hotel_id,$hotel_title,$category_hotel_id,$hotel_from,$hotel_destination,$hotel_duration,$hotel_price,$hotel_saving_price,$hotel_thumnail,$hotel_except,$hotel_info_contact,$hotel_keywords,$hotel_description,$hotel_schedule,$hotel_status)
    {
        $data=array(
            "hotel_name" => $hotel_title,
            "category_hotel_id" => $category_hotel_id,
            "hotel_from" => $hotel_from,
            "hotel_destination" => $hotel_destination,
            "hotel_duration" => $hotel_duration,
            "hotel_price" => $hotel_price,
            "hotel_thumnail" => $hotel_thumnail,
            "hotel_saving_price" => $hotel_saving_price,
            "hotel_except" => $hotel_except,
            "hotel_info_contact" => $hotel_info_contact,
            "hotel_keywords" => $hotel_keywords,
            "hotel_description" => $hotel_description,
            "hotel_schedule" => $hotel_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "hotel_status" => $hotel_status,
        );
        $this->db->where('hotel_id', $hotel_id);
        if($this->db->update("hotels", $data))
        {
            return true;
        }
        return false;
    }

    //trả về true nếu có tồn tại
    public function check_cate_slug($cate_slug,$cate_id=null)
    {
        if($cate_id==null){
            $this->db->select("cate_slug");
            $this->db->where("cate_slug", $cate_slug);
            $query=$this->db->get("category_hotel");
            if($query->num_rows()>0){
                return true;
            }
        }
        else{
            $this->db->select("cate_slug");
            $this->db->where("cate_slug", $cate_slug);
            $this->db->where("cate_id !=", $cate_id);
            $query=$this->db->get("category_hotel");
            if($query->num_rows()>0){
                return true;
            }
        }
        return false;
    }
    public function add_category($cate_name,$cate_slug)
    {
        $data=array(
            "cate_name" => $cate_name,
            "cate_slug" => $cate_slug,
            "created_at" => date('Y-m-d H:i:s'),
        );
        if(!$this->check_cate_slug($cate_slug)){
            $this->db->query('ALTER TABLE `category_hotel` AUTO_INCREMENT=1');
            if($this->db->insert("category_hotel", $data))
            {
                return true;
            }
        }
		return false;
    }
   

    public function del_category($cate_id)
    {
        $data=array(
            "cate_id" => $cate_id,
        );
        if($this->db->delete("category_hotel", $data))
        {
            return true;
        }
        
		return false;
    }
    public function edit_category($cate_id,$cate_name,$cate_slug)
    {
        $data=array(
            "cate_name" => $cate_name,
            "cate_slug" => $cate_slug,
            "updated_at" => date('Y-m-d H:i:s'),
        );
        if(!$this->check_cate_slug($cate_slug,$cate_id)){
            $this->db->where('cate_id', $cate_id);
            if($this->db->update("category_hotel", $data))
            {
                return true;
            }
        }
		return false;
    }


}