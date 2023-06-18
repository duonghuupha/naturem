<?php
class Orders extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/global/header.php');

        $rows = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($_SESSION['data'][0]['id'], $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;

        $this->view->render('orders/index');
        require('layouts/footer.php');
    }

    function detail(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $info = $this->model->get_info_order($id);
        $this->view->info = $info;

        $detail = $this->model->get_detail_order($info[0]['code']);
        $this->view->detail = $detail;

        $address = $this->model->get_address_of_order($info[0]['address_id']);
        $this->view->add = $address;

        $this->view->render('orders/detail');
        require('layouts/footer.php');
    }
}
?>