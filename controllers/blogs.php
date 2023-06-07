<?php
class Blogs extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');

        $rows = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 6;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_list_data_blogs($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;

        $this->view->render('blogs/index');
        require('layouts/footer.php');
    }

    function detail(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $this->view->jsonObj = $this->model->get_info_blogs($id);

        $this->view->render('blogs/detail');
        require('layouts/footer.php');
    }
}
?>
