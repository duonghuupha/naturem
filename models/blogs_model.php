<?php
class Blogs_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info_blogs($id){
        $query = $this->db->query("SELECT * FROM tbl_content WHERE id = $id");
        return $query->fetchAll();
    }

    function get_list_data_blogs($start, $end){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_content WHERE active = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, image, create_at FROM tbl_content WHERE active = 1
                                    ORDER BY id DESC LIMIT $start, $end");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_latest_post($id){
        $query = $this->db->query("SELECT id, title, image, create_at FROM tbl_content WHERE active = 1
                                    AND id != $id ORDER BY id DESC LIMIT 0, 3");
        return $query->fetchAll();
    }

    function get_random_post($id){
        $query = $this->db->query("SELECT id, title, image, create_at FROM tbl_content WHERE active = 1
                                    AND id != $id ORDER BY RAND() LIMIT 0, 3");
        return $query->fetchAll();
    }
}
?>