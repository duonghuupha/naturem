<?php
class Shopping extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('shopping/index');
        require('layouts/footer.php');
    }
}
?>
