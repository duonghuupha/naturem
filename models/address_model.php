<?php
class Address_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj(){
        $query = $this->db->query("SELECT * FROM tbl_address ORDER BY id DESC");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbl_address", $data);
        return $query;
    }
}
?>