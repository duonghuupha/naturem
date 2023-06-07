<?php
class Acount_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_acount($email, $pass){
        $query = $this->db->query("SELECT id, firstname, lastname, email, phone FROM tbl_customer
                                    WHERE active = 1 AND email = '$email' AND password = '$pass'");
        return $query->fetchAll();
    }

    function check_dupliObj_email($email){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_customer WHERE email = '$email'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function addObj_acount($data){
        $query = $this->insert("tbl_customer", $data);
        return $query;
    }

    function updateObj_acount($id, $data){
        $query = $this->update("tbl_customer", $data, "id = $id");
        return $query;
    }
}
?>