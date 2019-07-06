<?php

class AdminDashboard extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

        $data = [];
        $this->view('admin2/dashboard/index' , $data , 1 , 1);
    }

}

?>