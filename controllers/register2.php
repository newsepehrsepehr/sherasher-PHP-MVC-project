<?php

class Register2 extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view('register2/index');
    }

    function emailVerify(){
        $result = $this->model->emailVerify($_POST);
        echo $result;
    }
    function setUserInfo(){
        $this->model->setUserInfo($_POST);
    }

}

?>