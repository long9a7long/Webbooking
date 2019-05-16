<?php
class restaurants_model extends CI_Model
{
    public function get_restaurant_info($restaurant_id){
        $result = $this->db->get_where("restaurants", array('res_id' => $restaurant_id));

		return $result->row();
    }

    public function getList()
    {
        $query=$this->db->get("restaurants");
        return $query->result_array();
    }

    public function getListCate()
    {
        $query=$this->db->get("category_restaurant");
        return $query->result_array();
    }

    //trả về true nếu có tồn tại
    public function check_restaurant_slug($restaurant_slug)
    {
        $this->db->select("res_slug");
        $this->db->where("res_slug", $restaurant_slug);
        $query=$this->db->get("restaurants");
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
            $query=$this->db->get("category_restaurant");
            if($query->num_rows()>0){
                return true;
            }
        }
        else{
            $this->db->select("cate_slug");
            $this->db->where("cate_slug", $cate_slug);
            $this->db->where("cate_id !=", $cate_id);
            $query=$this->db->get("category_restaurant");
            if($query->num_rows()>0){
                return true;
            }
        }
        return false;
    }
    
    public function add_restaurant($restaurant_title,$category_restaurant_id,$restaurant_from,$restaurant_destination,$restaurant_duration,$restaurant_price,$restaurant_saving_price,$restaurant_thumnail,$album_restaurant,$restaurant_except,$restaurant_info_contact,$restaurant_keywords,$restaurant_description,$restaurant_schedule,$restaurant_slug)
    {
        $data=array(
            "restaurant_name" => $restaurant_title,
            "category_restaurant_id" => $category_restaurant_id,
            "restaurant_from" => $restaurant_from,
            "restaurant_destination" => $restaurant_destination,
            "restaurant_duration" => $restaurant_duration,
            "restaurant_price" => $restaurant_price,
            "restaurant_saving_price" => $restaurant_saving_price,
            "restaurant_thumnail" => $restaurant_thumnail,
            "album_restaurant" => $album_restaurant,
            "restaurant_except" => $restaurant_except,
            "restaurant_info_contact" => $restaurant_info_contact,
            "restaurant_keywords" => $restaurant_keywords,
            "restaurant_description" => $restaurant_description,
            "restaurant_schedule" => $restaurant_schedule,
            "restaurant_slug" => $restaurant_slug,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $this->db->query('ALTER TABLE `restaurants` AUTO_INCREMENT=1');
        if($this->db->insert("restaurants", $data))
        {
            //print_r($this->db->last_query());
            return true;
        }
        //print_r($this->db->last_query());
        return false;
    }

    public function update_restaurant($restaurant_id,$restaurant_title,$category_restaurant_id,$restaurant_from,$restaurant_destination,$restaurant_duration,$restaurant_price,$restaurant_saving_price,$restaurant_thumnail,$album_restaurant,$restaurant_except,$restaurant_info_contact,$restaurant_keywords,$restaurant_description,$restaurant_schedule,$restaurant_status)
    {
        $data=array(
            "restaurant_name" => $restaurant_title,
            "category_restaurant_id" => $category_restaurant_id,
            "restaurant_from" => $restaurant_from,
            "restaurant_destination" => $restaurant_destination,
            "restaurant_duration" => $restaurant_duration,
            "restaurant_price" => $restaurant_price,
            "restaurant_saving_price" => $restaurant_saving_price,
            "restaurant_thumnail" => $restaurant_thumnail,
            "album_restaurant" => $album_restaurant,
            "restaurant_except" => $restaurant_except,
            "restaurant_info_contact" => $restaurant_info_contact,
            "restaurant_keywords" => $restaurant_keywords,
            "restaurant_description" => $restaurant_description,
            "restaurant_schedule" => $restaurant_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "restaurant_status" => $restaurant_status,
        );
        $this->db->where('restaurant_id', $restaurant_id);
        if($this->db->update("restaurants", $data))
        {
            return true;
        }
        return false;
    }

    public function update_restaurant_no_images($restaurant_id,$restaurant_title,$category_restaurant_id,$restaurant_from,$restaurant_destination,$restaurant_duration,$restaurant_price,$restaurant_saving_price,$restaurant_except,$restaurant_info_contact,$restaurant_keywords,$restaurant_description,$restaurant_schedule,$restaurant_status)
    {
        $data=array(
            "restaurant_name" => $restaurant_title,
            "category_restaurant_id" => $category_restaurant_id,
            "restaurant_from" => $restaurant_from,
            "restaurant_destination" => $restaurant_destination,
            "restaurant_duration" => $restaurant_duration,
            "restaurant_price" => $restaurant_price,
            "restaurant_saving_price" => $restaurant_saving_price,
            "restaurant_except" => $restaurant_except,
            "restaurant_info_contact" => $restaurant_info_contact,
            "restaurant_keywords" => $restaurant_keywords,
            "restaurant_description" => $restaurant_description,
            "restaurant_schedule" => $restaurant_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "restaurant_status" => $restaurant_status,
        );
        $this->db->where('restaurant_id', $restaurant_id);
        if($this->db->update("restaurants", $data))
        {
            return true;
        }
        return false;
    }

    public function update_restaurant_no_thumnail($restaurant_id,$restaurant_title,$category_restaurant_id,$restaurant_from,$restaurant_destination,$restaurant_duration,$restaurant_price,$restaurant_saving_price,$album_restaurant,$restaurant_except,$restaurant_info_contact,$restaurant_keywords,$restaurant_description,$restaurant_schedule,$restaurant_status)
    {
        $data=array(
            "restaurant_name" => $restaurant_title,
            "category_restaurant_id" => $category_restaurant_id,
            "restaurant_from" => $restaurant_from,
            "restaurant_destination" => $restaurant_destination,
            "restaurant_duration" => $restaurant_duration,
            "restaurant_price" => $restaurant_price,
            "album_restaurant" => $album_restaurant,
            "restaurant_saving_price" => $restaurant_saving_price,
            "restaurant_except" => $restaurant_except,
            "restaurant_info_contact" => $restaurant_info_contact,
            "restaurant_keywords" => $restaurant_keywords,
            "restaurant_description" => $restaurant_description,
            "restaurant_schedule" => $restaurant_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "restaurant_status" => $restaurant_status,
        );
        $this->db->where('restaurant_id', $restaurant_id);
        if($this->db->update("restaurants", $data))
        {
            return true;
        }
        return false;
    }

    public function update_restaurant_no_album($restaurant_id,$restaurant_title,$category_restaurant_id,$restaurant_from,$restaurant_destination,$restaurant_duration,$restaurant_price,$restaurant_saving_price,$restaurant_thumnail,$restaurant_except,$restaurant_info_contact,$restaurant_keywords,$restaurant_description,$restaurant_schedule,$restaurant_status)
    {
        $data=array(
            "restaurant_name" => $restaurant_title,
            "category_restaurant_id" => $category_restaurant_id,
            "restaurant_from" => $restaurant_from,
            "restaurant_destination" => $restaurant_destination,
            "restaurant_duration" => $restaurant_duration,
            "restaurant_price" => $restaurant_price,
            "restaurant_thumnail" => $restaurant_thumnail,
            "restaurant_saving_price" => $restaurant_saving_price,
            "restaurant_except" => $restaurant_except,
            "restaurant_info_contact" => $restaurant_info_contact,
            "restaurant_keywords" => $restaurant_keywords,
            "restaurant_description" => $restaurant_description,
            "restaurant_schedule" => $restaurant_schedule,
            "updated_at" => date('Y-m-d H:i:s'),
            "restaurant_status" => $restaurant_status,
        );
        $this->db->where('restaurant_id', $restaurant_id);
        if($this->db->update("restaurants", $data))
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
            $this->db->query('ALTER TABLE `category_restaurant` AUTO_INCREMENT=1');
            if($this->db->insert("category_restaurant", $data))
            {
                return true;
            }
        }
		return false;
    }

    public function del_restaurant($restaurant_id)
    {
        $data=array(
            "restaurant_id" => $restaurant_id,
        );
        if($this->db->delete("restaurants", $data))
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
        if($this->db->delete("category_restaurant", $data))
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
            if($this->db->update("category_restaurant", $data))
            {
                return true;
            }
        }
		return false;
    }

    public function getListHaveFilter($category,$rating,$page,$page_size)
    {
        //$this->db->start_cache();
        
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,res_id from review_res GROUP BY review_res.res_id UNION SELECT restaurants.res_id=0 as avg_rev,res_id FROM restaurants
                         where restaurants.res_id not in (select res_id from (Select res_id from review_res GROUP BY review_res.res_id) as temp)) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.res_id=restaurants.res_id');

        //lọc bài viết theo category 
        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where("$item in (SELECT `list_category_restaurant`.`category_res_id` FROM `list_category_restaurant` WHERE `list_category_restaurant`.`restaurant_id`=`restaurants`.`res_id`)");
            }
        }

        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $arr_rating=explode(',', $rating);
            foreach($arr_rating as $item ){
                $this->db->or_where('avg_rev=',$item);
            }
        }
        

        $this->db->limit($page_size,((int)$page-1)*$page_size);
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_res.res_id) as num_rev,res_id from review_res GROUP BY review_res.res_id UNION SELECT restaurants.res_id=0 
        as avg_rev,res_id FROM restaurants where restaurants.res_id not in (select res_id from (Select res_id from review_res GROUP BY review_res.res_id) as temp)) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.res_id=restaurants.res_id');
        
        $query=$this->db->get("restaurants");
        
        //trả kết quả về dạng mảng
        return $query->result_array();
    }

    public function restaurants_count($category,$rating)
    {
        //lọc bài viết theo category 
        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where("$item in (SELECT `list_category_restaurant`.`category_res_id` FROM `list_category_restaurant` WHERE `list_category_restaurant`.`restaurant_id`=`restaurants`.`res_id`)");
            }
        }
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,res_id from review_res GROUP BY review_res.res_id UNION SELECT restaurants.res_id=0 as avg_rev,res_id FROM restaurants
                     where restaurants.res_id not in (select res_id from (Select res_id from review_res GROUP BY review_res.res_id) as temp)) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.res_id=restaurants.res_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $this->db->where('avg_rev',$rating);
        }
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_res.res_id) as num_rev,res_id from review_res GROUP BY review_res.res_id UNION SELECT restaurants.res_id=0 as avg_rev,res_id FROM restaurants
                     where restaurants.res_id not in (select res_id from (Select res_id from review_res GROUP BY review_res.res_id) as temp)) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.res_id=restaurants.res_id');
        $query=$this->db->get("restaurants");
        //đếm số lượng records
        return count($query->result_array());
    }

    public function get_res_info_by_slug($res_slug){
        
        //join cột điểm trung bình review của tour
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,res_id from review_res GROUP BY review_res.res_id union select restaurants.res_id=0 as avg_rev,res_id from restaurants
         where res_id not in ( Select res_id from review_res GROUP BY review_res.res_id) and restaurants.res_slug= '$res_slug' ) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.res_id=restaurants.res_id');

        //join cột điểm trung bình review quality của tour
        $sql_avg_star="(Select ROUND(AVG(rev_quality),0) as avg_quality,res_id from review_res GROUP BY review_res.res_id  union select restaurants.res_id=0 as avg_quality,res_id from restaurants
         where res_id not in ( Select res_id from review_res GROUP BY review_res.res_id) and restaurants.res_slug= '$res_slug' ) as rev_tbl1";
        $this->db->join($sql_avg_star,'rev_tbl1.res_id=restaurants.res_id');
        
        //join cột điểm trung bình review price của tour
        // $sql_avg_star="(Select ROUND(AVG(rev_price),0) as avg_price,tour_id from review_tour GROUP BY review_tour.tour_id  union select tours.tour_price=0 as avg_price,tour_id from tours
        //  where tour_id not in ( Select tour_id from review_tour GROUP BY review_tour.tour_id) and tours.tour_slug= '$tour_slug' ) as rev_tbl2";
        // $this->db->join($sql_avg_star,'rev_tbl2.tour_id=tours.tour_id');
        
        //join cột điểm trung bình review waiter của tour
        $sql_avg_star="(Select ROUND(AVG(rev_waiter),0) as avg_waiter,res_id from review_res GROUP BY review_res.res_id  union select restaurants.res_id=0 as avg_waiter,res_id from restaurants
         where res_id not in ( Select res_id from review_res GROUP BY review_res.res_id) and restaurants.res_slug='$res_slug' ) as rev_tbl3";
        $this->db->join($sql_avg_star,'rev_tbl3.res_id=restaurants.res_id');
        
        //join cột điểm trung bình review view của tour
        $sql_avg_star="(Select ROUND(AVG(rev_view),0) as avg_view,res_id from review_res GROUP BY review_res.res_id  union select restaurants.res_id=0 as rev_view,res_id from restaurants
         where res_id not in ( Select res_id from review_res GROUP BY review_res.res_id) and restaurants.res_slug= '$res_slug' ) as rev_tbl4";
        $this->db->join($sql_avg_star,'rev_tbl4.res_id=restaurants.res_id');
        //join cột tổng số lượng review của tour
        $sql_num_rev="(Select count(review_res.res_id) as num_rev,res_id from review_res GROUP BY review_res.res_id  union select restaurants.res_id=0 as num_rev,res_id from restaurants 
        where res_id not in ( Select res_id from review_res GROUP BY review_res.res_id) and restaurants.res_slug= '$res_slug' ) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.res_id=restaurants.res_id');

        $this->db->where('res_slug',$res_slug);
        $result = $this->db->get("restaurants");
		return $result->row();
    }

    public function getListReviewByID($res_id){
        $this->db->where('res_id',$res_id);
        $result = $this->db->get("review_res");
        //trả kết quả về dạng mảng
        return $result->result();
    }
    public function getListCateByID($res_id){
        $this->db->where('restaurant_id',$res_id);
        $result=$this->db->get("list_category_restaurant");
        return $result->result();
    }

    public function add_review_restaurant($res_id,$name_review,$email_review,$view_review,$waiter_review,$quality_review,$review_text){
        $rev_star=0;
        $i=0;
        if($view_review!=0){
            $rev_star+=$view_review;
            $i++;
        }
        if($waiter_review!=0){
            $rev_star+=$waiter_review;
            $i++;
        }
        if($quality_review!=0){
            $rev_star+=$quality_review;
            $i++;
        }

        //số điểm đánh giá trung bình
        $rev_star=round($rev_star/$i);

        //dữ liệu để insert
        $data = array(
            'res_id' => $res_id ,
            'rev_name' => $name_review,
            'rev_email' => $email_review,
            'rev_content' => $review_text,
            'rev_quality' => $quality_review,
            'rev_waiter' => $waiter_review,
            'rev_view' => $view_review,
            'rev_star' => $rev_star
        );
        $this->db->query('ALTER TABLE `review_res` AUTO_INCREMENT=1');
        //câu truy vấn insert
        $this->db->insert('review_res', $data);
        
        return TRUE;
    }
}