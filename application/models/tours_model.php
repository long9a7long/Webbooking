<?php
class Tours_model extends CI_Model
{
    public function get_tour_info($tour_id){
        $result = $this->db->get_where("tours", array('tour_id' => $tour_id));

		return $result->row();
    }

    public function getList()
    {
        $query=$this->db->get("tours");
        return $query->result_array();
    }

    public function getListCate()
    {
        $query=$this->db->get("category_tour");
        return $query->result_array();
    }

    //trả về true nếu có tồn tại
    public function check_tour_slug($tour_slug)
    {
        $this->db->select("tour_slug");
        $this->db->where("tour_slug", $tour_slug);
        $query=$this->db->get("tours");
        if($query->num_rows()>0){
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
            $query=$this->db->get("category_tour");
            if($query->num_rows()>0){
                return true;
            }
        }
        else{
            $this->db->select("cate_slug");
            $this->db->where("cate_slug", $cate_slug);
            $this->db->where("cate_id !=", $cate_id);
            $query=$this->db->get("category_tour");
            if($query->num_rows()>0){
                return true;
            }
        }
        return false;
    }
    
    public function add_tour($tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$tour_thumnail,$album_tour,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_slug)
    {
        $data=array(
            "tour_name" => $tour_title,
            "category_tour_id" => $category_tour_id,
            "tour_from" => $tour_from,
            "tour_destination" => $tour_destination,
            "tour_duration" => $tour_duration,
            "tour_price" => $tour_price,
            "tour_saving_price" => $tour_saving_price,
            "tour_thumnail" => $tour_thumnail,
            "album_tour" => $album_tour,
            "tour_except" => $tour_except,
            "tour_info_contact" => $tour_info_contact,
            "tour_keywords" => $tour_keywords,
            "tour_description" => $tour_description,
            "tour_schedule" => $tour_schedule,
            "tour_slug" => $tour_slug,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $this->db->query('ALTER TABLE `tours` AUTO_INCREMENT=1');
        if($this->db->insert("tours", $data))
        {
            //print_r($this->db->last_query());
            return true;
        }
        //print_r($this->db->last_query());
        return false;
    }

    public function update_tour($tour_id,$tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$tour_thumnail,$album_tour,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_status)
    {
        $data=array(
            "tour_name" => $tour_title,
            "category_tour_id" => $category_tour_id,
            "tour_from" => $tour_from,
            "tour_destination" => $tour_destination,
            "tour_duration" => $tour_duration,
            "tour_price" => $tour_price,
            "tour_saving_price" => $tour_saving_price,
            "tour_thumnail" => $tour_thumnail,
            "album_tour" => $album_tour,
            "tour_except" => $tour_except,
            "tour_info_contact" => $tour_info_contact,
            "tour_keywords" => $tour_keywords,
            "tour_description" => $tour_description,
            "tour_schedule" => $tour_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "tour_status" => $tour_status,
        );
        $this->db->where('tour_id', $tour_id);
        if($this->db->update("tours", $data))
        {
            return true;
        }
        return false;
    }

    public function update_tour_no_images($tour_id,$tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_status)
    {
        $data=array(
            "tour_name" => $tour_title,
            "category_tour_id" => $category_tour_id,
            "tour_from" => $tour_from,
            "tour_destination" => $tour_destination,
            "tour_duration" => $tour_duration,
            "tour_price" => $tour_price,
            "tour_saving_price" => $tour_saving_price,
            "tour_except" => $tour_except,
            "tour_info_contact" => $tour_info_contact,
            "tour_keywords" => $tour_keywords,
            "tour_description" => $tour_description,
            "tour_schedule" => $tour_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "tour_status" => $tour_status,
        );
        $this->db->where('tour_id', $tour_id);
        if($this->db->update("tours", $data))
        {
            return true;
        }
        return false;
    }

    public function update_tour_no_thumnail($tour_id,$tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$album_tour,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_status)
    {
        $data=array(
            "tour_name" => $tour_title,
            "category_tour_id" => $category_tour_id,
            "tour_from" => $tour_from,
            "tour_destination" => $tour_destination,
            "tour_duration" => $tour_duration,
            "tour_price" => $tour_price,
            "album_tour" => $album_tour,
            "tour_saving_price" => $tour_saving_price,
            "tour_except" => $tour_except,
            "tour_info_contact" => $tour_info_contact,
            "tour_keywords" => $tour_keywords,
            "tour_description" => $tour_description,
            "tour_schedule" => $tour_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "tour_status" => $tour_status,
        );
        $this->db->where('tour_id', $tour_id);
        if($this->db->update("tours", $data))
        {
            return true;
        }
        return false;
    }

    public function update_tour_no_album($tour_id,$tour_title,$category_tour_id,$tour_from,$tour_destination,$tour_duration,$tour_price,$tour_saving_price,$tour_thumnail,$tour_except,$tour_info_contact,$tour_keywords,$tour_description,$tour_schedule,$tour_status)
    {
        $data=array(
            "tour_name" => $tour_title,
            "category_tour_id" => $category_tour_id,
            "tour_from" => $tour_from,
            "tour_destination" => $tour_destination,
            "tour_duration" => $tour_duration,
            "tour_price" => $tour_price,
            "tour_thumnail" => $tour_thumnail,
            "tour_saving_price" => $tour_saving_price,
            "tour_except" => $tour_except,
            "tour_info_contact" => $tour_info_contact,
            "tour_keywords" => $tour_keywords,
            "tour_description" => $tour_description,
            "tour_schedule" => $tour_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "tour_status" => $tour_status,
        );
        $this->db->where('tour_id', $tour_id);
        if($this->db->update("tours", $data))
        {
            return true;
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
            $this->db->query('ALTER TABLE `category_tour` AUTO_INCREMENT=1');
            if($this->db->insert("category_tour", $data))
            {
                return true;
            }
        }
		return false;
    }

    public function del_tour($tour_id)
    {
        $data=array(
            "tour_id" => $tour_id,
        );
        if($this->db->delete("tours", $data))
        {
            return true;
        }
        
		return false;
    }

    public function del_category($cate_id)
    {
        $data=array(
            "cate_id" => $cate_id,
        );
        if($this->db->delete("category_tour", $data))
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
            if($this->db->update("category_tour", $data))
            {
                return true;
            }
        }
		return false;
    }
}