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

    function check_dupliObj_phone($phone){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_customer WHERE phone = '$phone'");
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

    function updateObj_acount_pass_code($code, $data){
        $query = $this->update("tbl_customer", $data, "code = $code");
        return $query;
    }

    function delObj_acount_via_code($code){
        $query = $this->delete("tbl_customer", "code = $code");
        return $query;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////
    function check_exits_code_before_active($code){
        $query = $this->db->query("SELECT active FROM tbl_customer WHERE code = $code");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_info_profile($id){
        $query = $this->db->query("SELECT id, code, email, firstname, lastname, phone FROM tbl_customer
                                    WHERE id = $id");
        return $query->fetchAll();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function check_current_pass($pass, $cusid){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_customer WHERE id = $cusid
                                    AND password = '$pass'");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>