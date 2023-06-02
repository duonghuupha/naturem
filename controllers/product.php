<?php
class Product extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('product/index');
        require('layouts/footer.php');
    }

    function detail(){
        require('layouts/global/header.php');
        $this->view->render('product/detail');
        require('layouts/footer.php');
    }
}
?>
