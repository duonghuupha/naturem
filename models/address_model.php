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

    function updateObj($id, $data){
        $query = $this->update("tbl_address", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_address", "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_address WHERE id = $id");
        return $query->fetchAll();
    }

    function updateObj_all(){
        $query = $this->db->query("UPDATE tbl_address SET default_add = 0");
        return $query;
    }
}
?>