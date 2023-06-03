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
/////////////////////////////////////end cac ham khac ///////////////////////////////////////////////////////////////////////
}

?>
