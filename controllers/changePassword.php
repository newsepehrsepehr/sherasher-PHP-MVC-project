<?php

class ChangePassword extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index($email='' , $token=''){
        $data = ['email'=>$email , 'token'=>$token];
        $this->view('changePassword/index' , $data);
    }

    function changeVerify(){
        if (isset($_POST['new-pass'])){
            if(isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['changePass']){
                $result = $this->model->changePass($_POST);
                echo $result;
            }
        }
    }
}

?>