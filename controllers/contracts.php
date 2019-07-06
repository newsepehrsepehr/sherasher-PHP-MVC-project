<?php

class Contracts extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view('contracts/index');
    }

}

?>