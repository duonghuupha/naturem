<?php
class Acount extends Controller{
    function __construct(){
        parent::__construct();
    }

    function login(){
        require('layouts/global/header.php');
        $this->view->render('acount/login');
        require('layouts/footer.php');
    }

    function register(){
        require('layouts/global/header.php');
        $this->view->render('acount/register');
        require('layouts/footer.php');
    }
}
?>
