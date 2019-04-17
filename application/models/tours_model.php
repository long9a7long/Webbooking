<?php
class Tours_model extends CI_Model
{
    public function get_tour_info($tour_id){
        $result = $this->db->get_where("tours", array('tour_id' => $tour_id));
		return $result->row();
    }

    public function get_tour_info_by_slug($tour_slug){
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.tour_id=tours.tour_id');

        //join cột điểm trung bình review quality của tour
        $sql_avg_star="(Select ROUND(AVG(rev_quality),0) as avg_quality,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl1";
        $this->db->join($sql_avg_star,'rev_tbl1.tour_id=tours.tour_id');

        //join cột điểm trung bình review price của tour
        $sql_avg_star="(Select ROUND(AVG(rev_price),0) as avg_price,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl2";
        $this->db->join($sql_avg_star,'rev_tbl2.tour_id=tours.tour_id');

        //join cột điểm trung bình review guide của tour
        $sql_avg_star="(Select ROUND(AVG(rev_guide),0) as avg_guide,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl3";
        $this->db->join($sql_avg_star,'rev_tbl3.tour_id=tours.tour_id');

        //join cột điểm trung bình review position của tour
        $sql_avg_star="(Select ROUND(AVG(rev_position),0) as avg_position,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl4";
        $this->db->join($sql_avg_star,'rev_tbl4.tour_id=tours.tour_id');
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_tour.tour_id) as num_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.tour_id=tours.tour_id');
        $this->db->where('tour_slug',$tour_slug);
        $result = $this->db->get("tours");
		return $result->row();
    }
    
    public function getListReviewByID($tour_id){
        $this->db->where('tour_id',$tour_id);
        $result = $this->db->get("review_tour");
        //trả kết quả về dạng mảng
        return $result->result();
    }

    public function getListHaveFilter($category,$rating,$minprice,$maxprice,$orderby,$page,$page_size)
    {
        //lọc bài viết theo category 
        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where("$item in (SELECT `list_category_tour`.`category_tour_id` FROM `list_category_tour` WHERE `list_category_tour`.`tour_id`=tours.tour_id)");
            }
        }
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.tour_id=tours.tour_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $arr_rating=explode(',', $rating);
            foreach($arr_rating as $item ){
                $this->db->or_where('avg_rev=',$item);
            }
        }
        //lọc bài viết theo giá tour
        if($minprice!=NULL){
            $this->db->where('tour_saving_price >=',$minprice);
            $this->db->or_where('tour_price >=',$minprice);
        }
            
        if($maxprice!=NULL){
            $this->db->where('tour_saving_price <=',$maxprice);
            $this->db->or_where('tour_price >=',$maxprice);
        }
        
        if($orderby!=NULL){
            switch ($orderby){
                case "pricelower":
                    $this->db->order_by("tour_saving_price", "asc"); 
                    break;
                case "pricehigher":
                    $this->db->order_by("tour_saving_price", "desc"); 
                    break;
            }
        }else{
            $this->db->order_by("tours.tour_id", "desc");
        }

        $this->db->limit($page_size,($page-1)*$page_size);
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_tour.tour_id) as num_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.tour_id=tours.tour_id');
        
        $query=$this->db->get("tours");
        //trả kết quả về dạng mảng
        return $query->result_array();
    }


    public function tours_count($category,$rating,$minprice,$maxprice)
    {
        //lọc bài viết theo category 
        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where("$item in (SELECT `list_category_tour`.`category_tour_id` FROM `list_category_tour` WHERE `list_category_tour`.`tour_id`=tours.tour_id)");
            }
        }
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.tour_id=tours.tour_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $this->db->where('avg_rev',$rating);
        }
        //lọc bài viết theo giá tour
        if($minprice!=NULL){
            $this->db->where('tour_saving_price >=',$minprice);
            $this->db->or_where('tour_price >=',$minprice);
        }
            
        if($maxprice!=NULL){
            $this->db->where('tour_saving_price <=',$maxprice);
            $this->db->or_where('tour_price >=',$maxprice);
        }
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_tour.tour_id) as num_rev,tour_id from review_tour GROUP BY review_tour.tour_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.tour_id=tours.tour_id');
        $query=$this->db->get("tours");
        //đếm số lượng records
        return count($query->result_array());
    }

    public function getList($category,$rating,$minprice,$maxprice,$page,$page_size)
    {
        $query=$this->db->get("tours");
        //trả kết quả về dạng mảng
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