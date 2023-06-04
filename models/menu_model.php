<?php
class Menu_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_menu($id){
        $query = $this->db->query("SELECT * FROM tbl_menu WHERE id = $id");
        return $query->fetchAll();
    }

    function get_list_data_product($array, $sort, $order, $start, $end){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_product WHERE FIND_IN_SET(cate_id, '$array')
                                    AND active = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, code, price FROM tbl_product WHERE FIND_IN_SET(cate_id, '$array')
                                    AND active = 1 ORDER BY $sort $order LIMIT $start, $end");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }
}
?>