<?php
class Shopping_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function check_pro_cus($cusid, $proid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_cart WHERE cus_id = $cusid
                                    AND pro_id = $proid");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info_pro_cus($cusid, $proid){
        $query = $this->db->query("SELECT * FROM tbl_cart WHERE cus_id = $cusid AND pro_id = $proid");
        return $query->fetchAll();
    }

    function update_pro_cus($cusid, $proid, $data){
        $query = $this->update("tbl_cart", $data, "cus_id = $cusid AND pro_id = $proid");
        return $query;
    }

    function addObj_cart($data){
        $query = $this->insert("tbl_cart", $data);
        return $query;
    }

    function updateObj_cart($id, $data){
        $query = $this->update("tbl_cart", $data, "id = $id");
        return $query;
    }

    function delObj_cart($id){
        $query = $this->delete("tbl_cart", "id = $id");
        return $query;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_cart($cusid){
        $query = $this->db->query("SELECT id, code, cus_id, pro_id, qty, (SELECT title FROM tbl_product
                                    WHERE tbl_product.id = pro_id) AS title, (SELECT price FROM tbl_product
                                    WHERE tbl_product.id = pro_id) AS price, (SELECT image FROM tbl_image_product
                                    WHERE tbl_image_product.code = (SELECT tbl_product.code FROM tbl_product
                                    WHERE tbl_product.id = pro_id) ORDER BY tbl_image_product.id ASC LIMIT 0, 1)
                                    AS image, (SELECT tbl_product.code FROM tbl_product WHERE tbl_product.id = pro_id) AS code_sp,
                                    (SELECT tbl_product.stock FROM tbl_product WHERE tbl_product.id = pro_id) AS stock 
                                    FROM tbl_cart WHERE cus_id = $cusid");
        return $query->fetchAll();
    }
}
?>