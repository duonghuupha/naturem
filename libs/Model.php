<?php
class Model {
    function __construct() {
		$this->db = new Database();
	}

    // them moi du lieu
    function insert($table, $array){
        $cols = array();
        $bind = array();
        foreach($array as $key => $value){
            $cols[] = $key;
            $bind[] = "'".$value."'";
        }
        $query = $this->db->query("INSERT INTO ".$table." (".implode(",", $cols).") VALUES (".implode(",", $bind).")");
        return $query;
    }

    // cap nhat du lieu
    function update($table, $array, $where){
        $set = array();
        foreach($array as $key => $value){
            $set[] = $key." = '".$value."'";
        }
        $query = $this->db->query("UPDATE ".$table." SET ".implode(",", $set)." WHERE ".$where);
        return $query;
    }

    // xoa du lieu
    function delete($table, $where = ''){
        if($where == ''){
            $query = $this->db->query("DELETE FROM ".$table);
        }else{
        $query = $this->db->query("DELETE FROM ".$table." WHERE ".$where);
        }
        return $query;
    }
///////////////////////////// cac ham khac //////////////////////////////////////////////////////////////////////////////////
        /**
     * Display menu top no parent
     */
    function get_menu_parent_top(){
        $query = $this->db->query("SELECT id, title, type_menu, link FROM tbl_menu WHERE parent_id = 0
                                    AND active = 1 AND position = 1 ORDER BY order_menu ASC");
        return $query->fetchAll();
    }

    /**
     * Display menu top parent
     */
    function get_menu_chidren_top($id){
        $query = $this->db->query("SELECT id, title, type_menu, link FROM tbl_menu WHERE parent_id = $id
                                    AND active = 1 AND position = 1 ORDER BY order_menu ASC");
        return $query->fetchAll();
    }

    /**
     * Display setting global website
     */
    function get_setting_global(){
        $query = $this->db->query("SELECT * FROM tbl_setting_global WHERE id = 1");
        return $query->fetchAll();
    }

    /**
     * Display menu bottom
     */
    function get_menu_bottom(){
        $query = $this->db->query("SELECT id, title, type_menu, link FROM tbl_menu WHERE parent_id = 0
                                    AND active = 1 AND position = 2 ORDER BY order_menu ASC");
        return $query->fetchAll();
    }

    /**
     * Display total cart
     */
    function get_total_cart($cusid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_cart WHERE cus_id = $cusid");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    /**
     * Display list category
     */
    function get_all_category(){
        $query = $this->db->query("SELECT id, title, (SELECT COUNT(*) FROM tbl_product
                                    WHERE tbl_product.cate_id = tbl_category.id) AS Total 
                                    FROM tbl_category WHERE active = 1");
        return $query->fetchAll();
    }

    /**
     * Display best seller
     */
    function get_best_seller(){
        $query = $this->db->query("SELECT id, title, code, create_at FROM tbl_product WHERE active = 1
                                    ORDER BY RAND() LIMIT 0, 3");
        return $query->fetchAll();
    }

    /**
     * DIsplay image of product pass code of product
     */
    function get_image_product($code, $start, $end){
        $query = $this->db->query("SELECT id, code, image, title FROM tbl_image_product WHERE code = '$code'
                                    ORDER BY id ASC LIMIT $start, $end");
        return $query->fetchAll();
    }
//////////////////////////////////////////////Cac ham block//////////////////////////////////////////
    /**
     * Get all block
     */
    function get_block(){
        $query = $this->db->query("SELECT * FROM tbl_block WHERE status = 1 AND id != 7
                                    ORDER BY order_block ASC");
        return $query->fetchAll();
    }

    /**
     * 
     */
    function get_category_via_block_one($array){
        $query = $this->db->query("SELECT id, title, description, image FROM tbl_category 
                                    WHERE active = 1 AND FIND_IN_SET(id, '$array')");
        return $query->fetchAll();
    }

    /**
     * Display data block 2
     */
    function get_block_2(){
        $query = $this->db->query("SELECT * FROM tbl_block_2 WHERE id = 1");
        return $query->fetchAll();
    }

    function get_data_product($type, $array){
        if($type == 2){
            $query = $this->db->query("SELECT id, title, code, price FROM tbl_product WHERE active = 1
                                    AND FIND_IN_SET(id, '$array') LIMIT 0, 8");
        }else{
            $query = $this->db->query("SELECT id, title, code, price FROM tbl_product WHERE active = 1
                                    AND FIND_IN_SET(cate_id, '$array') LIMIT 0, 8");
        }
        return $query->fetchAll();
    }

    /**
     * Display data block 3
     */
    function get_block_3(){
        $query = $this->db->query("SELECT * FROM tbl_block_3 WHERE id = 1");
        return $query->fetchAll();
    }

    function get_data_product_3($id){
        $query = $this->db->query("SELECT id, title, code, price FROM tbl_product WHERE id = $id");
        return $query->fetchAll();
    }

    /**
     * Display data block 6
     */
    function get_block_6(){
        $query = $this->db->query("SELECT * FROM tbl_block_6 WHERE id = 1");
        return $query->fetchAll();
    }

    function get_data_blog_via_block($limit){
        $query = $this->db->query("SELECT id, title, description, create_at, image FROM tbl_content
                                    WHERE active = 1 ORDER BY id DESC LIMIT 0, $limit");
        return $query->fetchAll();
    }

    /**
     * Display data block 4
     */
    function get_block_4(){
        $query = $this->db->query("SELECT * FROM tbl_block_4 WHERE id = 1");
        return $query->fetchAll();
    }

    function get_detail_address($id){
        $query = $this->db->query("SELECT * FROM tbl_address WHERE id = $id");
        return $query->fetchAll();
    }

    /**
     * Display block_1
     */
    function get_block_1(){
        $query = $this->db->query("SELECT * FROM tbl_block_1 WHERE status = 1 ORDER BY RAND()
                                    LIMIT 0, 5");
        return $query->fetchAll();
    }

    /**
     * check display block 7
     */
    function check_block_7(){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_block WHERE id = 7 AND status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    /**
     * Display blockk 7
     */
    function get_block_7(){
        $query = $this->db->query("SELECT id, code, image FROM tbl_block_7 WHERE status = 1");
        return $query->fetchAll();
    }
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////
}

?>
