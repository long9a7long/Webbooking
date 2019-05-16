<?php
class transfers_model extends CI_Model
{
    public function get_transfer_info($car_id){
        $result = $this->db->get_where("cars", array('car_id' => $car_id));
		return $result->row();
    }

    public function get_transfer_info_by_slug($car_slug){
        
        //join cột điểm trung bình review của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,car_id from review_car GROUP BY review_car.car_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.car_id=cars.car_id');

        //join cột điểm trung bình review quality của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_punctuality),0) as avg_punctuality,car_id from review_car GROUP BY review_car.car_id) as rev_tbl1";
        $this->db->join($sql_avg_star,'rev_tbl1.car_id=cars.car_id');

        //join cột điểm trung bình review price của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_price),0) as avg_price,car_id from review_car GROUP BY review_car.car_id) as rev_tbl2";
        $this->db->join($sql_avg_star,'rev_tbl2.car_id=cars.car_id');

        //join cột điểm trung bình review guide của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_comfort),0) as avg_comfort,car_id from review_car GROUP BY review_car.car_id) as rev_tbl3";
        $this->db->join($sql_avg_star,'rev_tbl3.car_id=cars.car_id');

        //join cột điểm trung bình review position của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_kindness),0) as avg_kindness,car_id from review_car GROUP BY review_car.car_id) as rev_tbl4";
        $this->db->join($sql_avg_star,'rev_tbl4.car_id=cars.car_id');
        //join cột tổng số lượng review của transfer
        $sql_num_rev="(Select count(review_car.car_id) as num_rev,car_id from review_car GROUP BY review_car.car_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.car_id=cars.car_id');
        $this->db->where('car_slug',$car_slug);
        $result = $this->db->get("cars");
		return $result->row();
    }
    
    public function getListReviewByID($car_id){
        $this->db->where('car_id',$car_id);
        $result = $this->db->get("review_car");
        //trả kết quả về dạng mảng
        return $result->result();
    }

    public function getListHaveFilter($rating,$minprice,$maxprice,$orderby,$page,$page_size)
    {
        
        
        //join cột điểm trung bình review của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,car_id from review_car GROUP BY review_car.car_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.car_id=cars.car_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $arr_rating=explode(',', $rating);
            foreach($arr_rating as $item ){
                $this->db->or_where('avg_rev=',$item);
            }
        }
    
            
    
        //lọc bài viết theo giá transfer
        if($minprice!=NULL){
            $where1="(car_saving_price >=$minprice or car_price >=$minprice)";
            $this->db->where($where1);
        }    
            
        if($maxprice!=NULL){

            $where2="(car_saving_price <=$maxprice or car_price <=$maxprice)";
            $this->db->where($where2);
        }
        
        if($orderby!=NULL){
            switch ($orderby){
                case "pricelower":
                    $this->db->order_by("car_price", "asc"); 
                    break;
                case "pricehigher":
                    $this->db->order_by("car_price", "desc"); 
                    break;
            }
        }else{
            $this->db->order_by("cars.car_id", "desc");
        }

        $this->db->limit($page_size,($page-1)*$page_size);
        //join cột tổng số lượng review của transfer
        $sql_num_rev="(Select count(review_car.car_id) as num_rev,car_id from review_car GROUP BY review_car.car_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.car_id=cars.car_id');
        
        $query=$this->db->get("cars");
        //trả kết quả về dạng mảng
        return $query->result_array();
    }


    public function transfers_count($rating,$minprice,$maxprice)
    {
       
        
        //join cột điểm trung bình review của transfer
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,car_id from review_car GROUP BY review_car.car_id) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.car_id=cars.car_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $this->db->where('avg_rev',$rating);
        }
        //lọc bài viết theo giá transfer
        if($minprice!=NULL){
            $this->db->where('car_price >=',$minprice);
           
        }
            
        if($maxprice!=NULL){
            $this->db->where('car_price <=',$maxprice);
        }
        //join cột tổng số lượng review của transfer
        $sql_num_rev="(Select count(review_car.car_id) as num_rev,car_id from review_car GROUP BY review_car.car_id) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.car_id=cars.car_id');
        $query=$this->db->get("cars");
        //đếm số lượng records
        return count($query->result_array());
    }

    // public function getList($category,$rating,$minprice,$maxprice,$page,$page_size)
    // {
    //     $query=$this->db->get("cars");
    //     //trả kết quả về dạng mảng
    //     return $query->result_array();
    // }

    // public function getListCate()
    // {
    //     $query=$this->db->get("category_transfer");
    //     return $query->result_array();
    // }

    // //trả về true nếu có tồn tại
    // public function check_transfer_slug($transfer_slug)
    // {
    //     $this->db->select("transfer_slug");
    //     $this->db->where("transfer_slug", $transfer_slug);
    //     $query=$this->db->get("transfers");
    //     if($query->num_rows()>0){
    //         return true;
    //     }
    //     return false;
    // }

    // //trả về true nếu có tồn tại
    // public function check_cate_slug($cate_slug,$cate_id=null)
    // {
    //     if($cate_id==null){
    //         $this->db->select("cate_slug");
    //         $this->db->where("cate_slug", $cate_slug);
    //         $query=$this->db->get("category_transfer");
    //         if($query->num_rows()>0){
    //             return true;
    //         }
    //     }
    //     else{
    //         $this->db->select("cate_slug");
    //         $this->db->where("cate_slug", $cate_slug);
    //         $this->db->where("cate_id !=", $cate_id);
    //         $query=$this->db->get("category_transfer");
    //         if($query->num_rows()>0){
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    
    // public function add_transfer($transfer_title,$category_transfer_id,$transfer_from,$transfer_destination,$transfer_duration,$transfer_price,$transfer_saving_price,$transfer_thumnail,$album_transfer,$transfer_except,$transfer_info_contact,$transfer_keywords,$transfer_description,$transfer_schedule,$transfer_slug)
    // {
    //     $data=array(
    //         "transfer_name" => $transfer_title,
    //         "category_transfer_id" => $category_transfer_id,
    //         "transfer_from" => $transfer_from,
    //         "transfer_destination" => $transfer_destination,
    //         "transfer_duration" => $transfer_duration,
    //         "transfer_price" => $transfer_price,
    //         "transfer_saving_price" => $transfer_saving_price,
    //         "transfer_thumnail" => $transfer_thumnail,
    //         "album_transfer" => $album_transfer,
    //         "transfer_except" => $transfer_except,
    //         "transfer_info_contact" => $transfer_info_contact,
    //         "transfer_keywords" => $transfer_keywords,
    //         "transfer_description" => $transfer_description,
    //         "transfer_schedule" => $transfer_schedule,
    //         "transfer_slug" => $transfer_slug,
    //         "created_at" => date('Y-m-d H:i:s'),
    //     );
    //     $this->db->query('ALTER TABLE `transfers` AUTO_INCREMENT=1');
    //     if($this->db->insert("transfers", $data))
    //     {
    //         //print_r($this->db->last_query());
    //         return true;
    //     }
    //     //print_r($this->db->last_query());
    //     return false;
    // }

    // public function update_transfer($transfer_id,$transfer_title,$category_transfer_id,$transfer_from,$transfer_destination,$transfer_duration,$transfer_price,$transfer_saving_price,$transfer_thumnail,$album_transfer,$transfer_except,$transfer_info_contact,$transfer_keywords,$transfer_description,$transfer_schedule,$transfer_status)
    // {
    //     $data=array(
    //         "transfer_name" => $transfer_title,
    //         "category_transfer_id" => $category_transfer_id,
    //         "transfer_from" => $transfer_from,
    //         "transfer_destination" => $transfer_destination,
    //         "transfer_duration" => $transfer_duration,
    //         "transfer_price" => $transfer_price,
    //         "transfer_saving_price" => $transfer_saving_price,
    //         "transfer_thumnail" => $transfer_thumnail,
    //         "album_transfer" => $album_transfer,
    //         "transfer_except" => $transfer_except,
    //         "transfer_info_contact" => $transfer_info_contact,
    //         "transfer_keywords" => $transfer_keywords,
    //         "transfer_description" => $transfer_description,
    //         "transfer_schedule" => $transfer_schedule,
    //         "updated_at" => date('Y-m-d H:i:s'),
    //         "transfer_status" => $transfer_status,
    //     );
    //     $this->db->where('transfer_id', $transfer_id);
    //     if($this->db->update("transfers", $data))
    //     {
    //         return true;
    //     }
    //     return false;
    // }

    // public function update_transfer_no_images($transfer_id,$transfer_title,$category_transfer_id,$transfer_from,$transfer_destination,$transfer_duration,$transfer_price,$transfer_saving_price,$transfer_except,$transfer_info_contact,$transfer_keywords,$transfer_description,$transfer_schedule,$transfer_status)
    // {
    //     $data=array(
    //         "transfer_name" => $transfer_title,
    //         "category_transfer_id" => $category_transfer_id,
    //         "transfer_from" => $transfer_from,
    //         "transfer_destination" => $transfer_destination,
    //         "transfer_duration" => $transfer_duration,
    //         "transfer_price" => $transfer_price,
    //         "transfer_saving_price" => $transfer_saving_price,
    //         "transfer_except" => $transfer_except,
    //         "transfer_info_contact" => $transfer_info_contact,
    //         "transfer_keywords" => $transfer_keywords,
    //         "transfer_description" => $transfer_description,
    //         "transfer_schedule" => $transfer_schedule,
    //         "updated_at" => date('Y-m-d H:i:s'),
    //         "transfer_status" => $transfer_status,
    //     );
    //     $this->db->where('transfer_id', $transfer_id);
    //     if($this->db->update("transfers", $data))
    //     {
    //         return true;
    //     }
    //     return false;
    // }

    // public function update_transfer_no_thumnail($transfer_id,$transfer_title,$category_transfer_id,$transfer_from,$transfer_destination,$transfer_duration,$transfer_price,$transfer_saving_price,$album_transfer,$transfer_except,$transfer_info_contact,$transfer_keywords,$transfer_description,$transfer_schedule,$transfer_status)
    // {
    //     $data=array(
    //         "transfer_name" => $transfer_title,
    //         "category_transfer_id" => $category_transfer_id,
    //         "transfer_from" => $transfer_from,
    //         "transfer_destination" => $transfer_destination,
    //         "transfer_duration" => $transfer_duration,
    //         "transfer_price" => $transfer_price,
    //         "album_transfer" => $album_transfer,
    //         "transfer_saving_price" => $transfer_saving_price,
    //         "transfer_except" => $transfer_except,
    //         "transfer_info_contact" => $transfer_info_contact,
    //         "transfer_keywords" => $transfer_keywords,
    //         "transfer_description" => $transfer_description,
    //         "transfer_schedule" => $transfer_schedule,
    //         "updated_at" => date('Y-m-d H:i:s'),
    //         "transfer_status" => $transfer_status,
    //     );
    //     $this->db->where('transfer_id', $transfer_id);
    //     if($this->db->update("transfers", $data))
    //     {
    //         return true;
    //     }
    //     return false;
    // }

    // public function update_transfer_no_album($transfer_id,$transfer_title,$category_transfer_id,$transfer_from,$transfer_destination,$transfer_duration,$transfer_price,$transfer_saving_price,$transfer_thumnail,$transfer_except,$transfer_info_contact,$transfer_keywords,$transfer_description,$transfer_schedule,$transfer_status)
    // {
    //     $data=array(
    //         "transfer_name" => $transfer_title,
    //         "category_transfer_id" => $category_transfer_id,
    //         "transfer_from" => $transfer_from,
    //         "transfer_destination" => $transfer_destination,
    //         "transfer_duration" => $transfer_duration,
    //         "transfer_price" => $transfer_price,
    //         "transfer_thumnail" => $transfer_thumnail,
    //         "transfer_saving_price" => $transfer_saving_price,
    //         "transfer_except" => $transfer_except,
    //         "transfer_info_contact" => $transfer_info_contact,
    //         "transfer_keywords" => $transfer_keywords,
    //         "transfer_description" => $transfer_description,
    //         "transfer_schedule" => $transfer_schedule,
    //         "updated_at" => date('Y-m-d H:i:s'),
    //         "transfer_status" => $transfer_status,
    //     );
    //     $this->db->where('transfer_id', $transfer_id);
    //     if($this->db->update("transfers", $data))
    //     {
    //         return true;
    //     }
    //     return false;
    // }

    // public function add_category($cate_name,$cate_slug)
    // {
    //     $data=array(
    //         "cate_name" => $cate_name,
    //         "cate_slug" => $cate_slug,
    //         "created_at" => date('Y-m-d H:i:s'),
    //     );
    //     if(!$this->check_cate_slug($cate_slug)){
    //         $this->db->query('ALTER TABLE `category_transfer` AUTO_INCREMENT=1');
    //         if($this->db->insert("category_transfer", $data))
    //         {
    //             return true;
    //         }
    //     }
	// 	return false;
    // }

    // public function del_transfer($transfer_id)
    // {
    //     $data=array(
    //         "transfer_id" => $transfer_id,
    //     );
    //     if($this->db->delete("transfers", $data))
    //     {
    //         return true;
    //     }
        
	// 	return false;
    // }

    // public function del_category($cate_id)
    // {
    //     $data=array(
    //         "cate_id" => $cate_id,
    //     );
    //     if($this->db->delete("category_transfer", $data))
    //     {
    //         return true;
    //     }
        
	// 	return false;
    // }

    // public function edit_category($cate_id,$cate_name,$cate_slug)
    // {
    //     $data=array(
    //         "cate_name" => $cate_name,
    //         "cate_slug" => $cate_slug,
    //         "updated_at" => date('Y-m-d H:i:s'),
    //     );
    //     if(!$this->check_cate_slug($cate_slug,$cate_id)){
    //         $this->db->where('cate_id', $cate_id);
    //         if($this->db->update("category_transfer", $data))
    //         {
    //             return true;
    //         }
    //     }
	// 	return false;
    // }
}