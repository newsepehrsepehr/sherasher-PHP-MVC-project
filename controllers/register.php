<?php

class Register extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view('register/index');
    }

    function emailVerify(){
        $result = $this->model->emailVerify($_POST);
        echo $result;
    }

    function setPass(){
            $result = $this->model->setPass($_POST);
            echo $result;
    }

    function checkToken($email , $token){
        $checkToken = $this->model->checkToken($email , $token);

        if ($checkToken == 1){
            echo 1;
        } else {
            header('location:'.URL.'register');
        }
    }
    function setUserInfo(){
        $this->model->setUserInfo($_POST);
    }

}

?>