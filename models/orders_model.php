<?php
class Orders_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($cusid, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_orders WHERE cus_id = $cusid");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, create_at, coupon, address_id, comment, status, ship_price,
                                    auth_code, transid, (SELECT SUM(price_new*qty) FROM tbl_orders_detail
                                    WHERE tbl_orders_detail.code = tbl_orders.code) AS total_cart, service_ship
                                    FROM tbl_orders WHERE cus_id = $cusid ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_info_order($id){
        $query = $this->db->query("SELECT * FROM tbl_orders WHERE id = $id");
        return $query->fetchAll();
    }

    function get_detail_order($code){
        $query = $this->db->query("SELECT id, code, product_id, price_old, price_new, combo_code, qty,
                                    (SELECT title FROM tbl_product WHERE tbl_product.id = product_id) AS title,
                                    (SELECT tbl_product.code FROM tbl_product WHERE tbl_product.id = product_id) AS code_sp,
                                    (SELECT image FROM tbl_image_product WHERE tbl_image_product.code = (SELECT tbl_product.code
                                    FROM tbl_product WHERE tbl_product.id = product_id) ORDER BY id ASC LIMIT 0, 1) AS image
                                    FROM tbl_orders_detail WHERE code = $code");
        return $query->fetchAll();
    }

    function get_address_of_order($id){
        $query = $this->db->query("SELECT * FROM tbl_address WHERE id = $id");
        return $query->fetchAll();
    }
}
?>