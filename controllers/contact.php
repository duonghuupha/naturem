<?php
class Contact extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('contact/index');
        require('layouts/footer.php');
    }
}
?>
