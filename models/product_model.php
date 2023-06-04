<?php
class Product_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_category($id){
        $query = $this->db->query("SELECT * FROM tbl_category WHERE id = $id");
        return $query->fetchAll();
    }

    function get_list_data_product($cate_id, $sort, $order, $start, $end){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_product WHERE cate_id = $cate_id AND active = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, price FROM tbl_product WHERE cate_id = $cate_id AND active = 1
                                    ORDER BY $sort $order LIMIT $start, $end");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info_product($id){
        $query = $this->db->query("SELECT id, code, cate_id, title, stock, description, price, tags, longs,
                                    wide, hight, weight, (SELECT tbl_category.title FROM tbl_category
                                    WHERE tbl_category.id = cate_id) AS category FROM tbl_product WHERE id = $id");
        return $query->fetchAll();
    }
}
?>