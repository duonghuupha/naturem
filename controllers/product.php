<?php
class Product extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $info_cate = $this->model->get_info_category($id);
        $this->view->info_cate = $info_cate;
        /********************************************************************** */
        $rows = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 6;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 'id';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_list_data_product($id, $sort, $order, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;

        $this->view->render('product/index');
        require('layouts/footer.php');
    }

    function detail(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $jsonObj = $this->model->get_info_product($id);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('product/detail');
        require('layouts/footer.php');
    }
}
?>
