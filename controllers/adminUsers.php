<?php

class AdminUsers extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

        $data = [];
        $this->view('admin2/users/index' , $data , 1 , 1);
    }

    function doFilter(){

        $filteredUsers = $this->model->doFilter($_POST);
        echo json_encode($filteredUsers);

    }

    function getUsersInfo2(){
        $user_info = $this->model->getUsersInfo2($_POST);
        echo json_encode($user_info);
    }

}

?>