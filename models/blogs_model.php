<?php
class Blogs_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_blogs($id){
        $query = $this->db->query("SELECT * FROM tbl_content WHERE id = $id");
        return $query->fetchAll();
    }
}
?>