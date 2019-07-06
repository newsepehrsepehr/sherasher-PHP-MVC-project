<?php

class Poem extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index($id_user , $id_poem=''){
        $poems = $this->model->getPoems($id_user);
        $data = ['poems'=>$poems , 'id_poem'=>$id_poem];

        $this->view('poem/index' , $data);
    }

    function addAnswer(){
        $result = $this->model->addAnswer($_POST);
        echo $result;
    }

    function addComment(){
        $result = $this->model->addAnswer($_POST);
        echo $result;
    }

    function setViewedComments($id_poem){
        $this->model->setViewedComments();
    }

}

?>