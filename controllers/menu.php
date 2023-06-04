<?php
class Menu extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $info_menu = $this->model->get_info_menu($id);
        $this->view->info_menu = $info_menu;
        /********************************************************************** */
        $array = $info_menu[0]['link'];
        $rows = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 6;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'id';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_list_data_product($array, $sort, $order, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;

        $this->view->render('menu/index');
        require('layouts/footer.php');
    }
}
?>
