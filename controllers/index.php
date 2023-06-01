<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/home/header.php');
        $this->view->render('index/index');
        require('layouts/footer.php');
    }
}
?>
