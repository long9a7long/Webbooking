<?php
class Hotels_model extends CI_Model
{
    public function getList()
    {
        $query=$this->db->get("hotels");
        return $query->result_array();
    }
    public function getCateHotel(){
        $query=$this->db->get("category_hotel");
        return $query->result_array();
    }
    public function getFacility(){
        $query=$this->db->get("convenient_hotel");
        return $query->result_array();
    }


    public function getListReviewByID($hotel_id){
        $this->db->where('hotel_id',$hotel_id);
        $result = $this->db->get("review_hotel");
        //trả kết quả về dạng mảng
        return $result->result();
    }

    public function getFacilityHotelSingle($hotel_id){
        
        $sql_conv="(select convenient_hotel_id,hotel_id,convenient_hotel.* from list_convenient_hotel,convenient_hotel where list_convenient_hotel.convenient_hotel_id=convenient_hotel.conv_id) as tbl_conv";
        $this->db->join($sql_conv,'tbl_conv.hotel_id=hotels.hotel_id');

        $this->db->where('hotels.hotel_id',$hotel_id);
        $result = $this->db->get("hotels");
        //trả kết quả về dạng mảng
        return $result->result();
    }


    public function get_hotel_info_by_slug($hotel_slug){

        
        
        //join cột điểm trung bình review của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id union select hotels.hotel_price=0 as avg_rev,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug= '$hotel_slug' ) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.hotel_id=hotels.hotel_id');

        //join cột điểm trung bình review quality của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_quality),0) as avg_quality,hotel_id from review_hotel GROUP BY review_hotel.hotel_id  union select hotels.hotel_price=0 as avg_quality,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug= '$hotel_slug' ) as rev_tbl1";
        $this->db->join($sql_avg_star,'rev_tbl1.hotel_id=hotels.hotel_id');
        
        //join cột điểm trung bình review price của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_price),0) as avg_price,hotel_id from review_hotel GROUP BY review_hotel.hotel_id  union select hotels.hotel_price=0 as avg_price,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug= '$hotel_slug' ) as rev_tbl2";
        $this->db->join($sql_avg_star,'rev_tbl2.hotel_id=hotels.hotel_id');
        
        //join cột điểm trung bình review comfort của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_comfort),0) as avg_comfort,hotel_id from review_hotel GROUP BY review_hotel.hotel_id  union select hotels.hotel_price=0 as avg_comfort,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug='$hotel_slug' ) as rev_tbl3";
        $this->db->join($sql_avg_star,'rev_tbl3.hotel_id=hotels.hotel_id');
        
        //join cột điểm trung bình review position của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_position),0) as avg_position,hotel_id from review_hotel GROUP BY review_hotel.hotel_id  union select hotels.hotel_price=0 as rev_position,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug= '$hotel_slug' ) as rev_tbl4";
        $this->db->join($sql_avg_star,'rev_tbl4.hotel_id=hotels.hotel_id');
        //join cột tổng số lượng review của hotel
        $sql_num_rev="(Select count(review_hotel.hotel_id) as num_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id  union select hotels.hotel_price=0 as num_rev,hotel_id from hotels where hotel_id not in ( Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) and hotels.hotel_slug= '$hotel_slug' ) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.hotel_id=hotels.hotel_id');

        // //join cột convenient vào hotels
        // $sql_avg_star="(Select convenient_hotel_id as conv,hotel_id from list_convenient_hotel) as rev_tbl5";
        // $this->db->join($sql_avg_star,'rev_tbl5.hotel_id=hotels.hotel_id');


        $this->db->where('hotel_slug',$hotel_slug);
        $result = $this->db->get("hotels");
		return $result->row();
    }


    public function getListHaveFilter($category,$facility,$rating,$minprice,$maxprice,$orderby,$page,$page_size)
    {
        //$this->db->start_cache();
        //lọc bài viết theo category 
        

        //lọc theo facility
        if ($facility!=NULL){
            $arr_facility=explode(',', $facility);
            foreach($arr_facility as $item ){
                $this->db->or_where("$item in (Select `list_convenient_hotel`.`convenient_hotel_id` From `list_convenient_hotel` Where `list_convenient_hotel`.`hotel_id`=`hotels`.`hotel_id`)");
            }
        }

        //join category vao table hotel
        $sql_cate="(select hotel_id,category_hotel_id From list_category_hotel) as cate_tbl";
        $this->db->join($sql_cate,'cate_tbl.hotel_id=hotels.hotel_id');

        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where('category_hotel_id=',$item);
            }
        }
        
        
        //join cột điểm trung bình review của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id UNION SELECT hotels.hotel_price=0 as avg_rev,hotel_id FROM hotels where hotels.hotel_id not in (select hotel_id from (Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) as temp)) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.hotel_id=hotels.hotel_id');


        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $arr_rating=explode(',', $rating);
            foreach($arr_rating as $item ){
                $this->db->or_where('avg_rev=',$item);
            }
        }
        

        


        //lọc bài viết theo giá hotel
        if($minprice!=NULL){
            $where="(hotel_price >=$minprice)";
            //$this->db->where('hotel_saving_price >=',$minprice);
            //$this->db->or_where('hotel_price >=',$minprice);
            $this->db->where($where);
        }
            
        if($maxprice!=NULL){
            $where="(hotel_price <=$maxprice)";
            //$this->db->where('hotel_saving_price <=',$maxprice);
            //$this->db->or_where('hotel_price <=',$maxprice);
            $this->db->where($where);
        }
        
        if($orderby!=NULL){
            switch ($orderby){
                case "pricelower":
                    $this->db->order_by("hotel_price", "asc"); 
                    break;
                case "pricehigher":
                    $this->db->order_by("hotel_price", "desc"); 
                    break;
            }
        }else{
            $this->db->order_by("hotels.hotel_id", "desc");
        }

        $this->db->limit($page_size,((int)$page-1)*$page_size);
        //join cột tổng số lượng review của hotel
        $sql_num_rev="(Select count(review_hotel.hotel_id) as num_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id UNION SELECT hotels.hotel_price=0 as avg_rev,hotel_id FROM hotels where hotels.hotel_id not in (select hotel_id from (Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) as temp)) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.hotel_id=hotels.hotel_id');
        
        $query=$this->db->get("hotels");
        
        //trả kết quả về dạng mảng
        return $query->result_array();
    }

    

    public function hotels_count($category,$rating,$minprice,$maxprice)
    {
        //lọc bài viết theo category 
        if($category!=NULL){
            $arr_category=explode(',', $category);
            foreach($arr_category as $item ){
                $this->db->or_where("$item in (SELECT `list_category_hotel`.`category_hotel_id` FROM `list_category_hotel` WHERE `list_category_hotel`.`hotel_id`=hotels.hotel_id)");
            }
        }
        
        //join cột điểm trung bình review của hotel
        $sql_avg_star="(Select ROUND(AVG(rev_star),0) as avg_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id UNION SELECT hotels.hotel_price=0 as avg_rev,hotel_id FROM hotels where hotels.hotel_id not in (select hotel_id from (Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) as temp)) as rev_tbl";
        $this->db->join($sql_avg_star,'rev_tbl.hotel_id=hotels.hotel_id');
        //lọc bài viết theo tiêu chí đánh giá
        if($rating!=NULL){
            $this->db->where('avg_rev',$rating);
        }
        //lọc bài viết theo giá hotel
        if($minprice!=NULL){
            //$this->db->where('hotel_saving_price >=',$minprice);
            $this->db->or_where('hotel_price >=',$minprice);
        }
            
        if($maxprice!=NULL){
            //$this->db->where('hotel_saving_price <=',$maxprice);
            $this->db->or_where('hotel_price <=',$maxprice);
        }
        //join cột tổng số lượng review của hotel
        $sql_num_rev="(Select count(review_hotel.hotel_id) as num_rev,hotel_id from review_hotel GROUP BY review_hotel.hotel_id UNION SELECT hotels.hotel_price=0 as avg_rev,hotel_id FROM hotels where hotels.hotel_id not in (select hotel_id from (Select hotel_id from review_hotel GROUP BY review_hotel.hotel_id) as temp)) as revs_num";
        $this->db->join($sql_num_rev,'revs_num.hotel_id=hotels.hotel_id');
        $query=$this->db->get("hotels");
        //đếm số lượng records
        return count($query->result_array());
    }

    public function count_rating(){
        $sql_num_star="Select count(review_hotel.rev_star) as num_star,rev_star from review_hotel GROUP BY review_hotel.rev_star";
        $query=$this->db->query($sql_num_star);
        return $query->result_array();
    }

}
