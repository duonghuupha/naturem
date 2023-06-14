<?php
class Checkout_Model extends Model{
    function __construct(){
        parent::__construct();
    }

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

    function get_data_address($cusid){
        $query = $this->db->query("SELECT id, code, firstname, lastname, phone, address, city, postcode,
                                    code_state, state, default_add FROM tbl_address WHERE cus_id = $cusid
                                    AND status = 1");
        return $query->fetchAll();
    }

    function addObj_order($data){
        $query = $this->insert("tbl_orders", $data);
        return $query;
    }

    function addObj_order_detail($data){
        $query = $this->insert("tbl_orders_detail", $data);
        return $query;
    }

    function updateObj_order($code, $data){
        $query = $this->update("tbl_orders", $data, "code = $code");
        return $query;
    }

    function delObj_pro_of_cart($proid, $cusid){
        $query = $this->delete("tbl_cart", "pro_id = $proid AND cus_id = $cusid");
        return $query;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_detail_address($id){
        $query = $this->db->query("SELECT * FROM tbl_address WHERE id = $id");
        return $query->fetchAll();
    }
}
?>