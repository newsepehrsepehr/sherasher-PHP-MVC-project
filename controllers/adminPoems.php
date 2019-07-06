<?php

class AdminPoems extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $poemTypeStat = $this->model->poemTypeStat();
        $data = [$poemTypeStat];
        $this->view('admin2/poems/index' , $data , 1 , 1);
    }

    function doFilterPoem(){
        $poems = $this->model->doFilterPoem($_POST);
        echo json_encode($poems);
    }

    function getPoemInfo(){
        $poemInfo = $this->model->getPoemInfo($_POST);
        echo json_encode($poemInfo);
    }

    function poemTypeStat(){
        /*$poemTypeStat = $this->model->poemTypeStat();
        echo json_encode($poemTypeStat);*/
    }

}

?>