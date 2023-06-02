<?php
class Blogs extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('blogs/index');
        require('layouts/footer.php');
    }

    function detail(){
        require('layouts/global/header.php');
        $this->view->render('blogs/detail');
        require('layouts/footer.php');
    }
}
?>
