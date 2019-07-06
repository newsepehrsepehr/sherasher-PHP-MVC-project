<?php

class Panel extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index($tab='' , $subTab=''){
        $data = ['tab'=>$tab , 'subTab'=>$subTab];
        $this->view('panel/index' , $data);
    }

    function tab(){
        $index = $_POST['index'];


        /*tab1*/
        if ($index == 1){
            $userDashboardInfo = $this->model->getUserDashboardInfo();
            $data = ['dashboard_info'=>$userDashboardInfo];
            $this->view('panel/tab1' , $data , 1 , 1);
        }

        /*tab2*/
        if ($index == 2){
            $userPoems = $this->model->getUserPoems();
            $poemCategory = $this->model->getPoemCategory();
            $data = ['userPoems'=>$userPoems , 'poemCategory'=>$poemCategory];
            $this->view('panel/tab2' , $data , 1 , 1);
        }

        /*tab3*/
        if ($index == 3){
            $messages = $this->model->getMessage();
            $data = ['messages'=>$messages];
            $this->view('panel/tab3' , $data , 1 , 1);
        }

        /*tab4*/
        if ($index == 4){
            $data = [];
            $this->view('panel/tab4' , $data , 1 , 1);
        }

        /*tab5*/
        if ($index == 5){
            $arts = $this->model->getArt();
            $data = ['arts'=>$arts];
            $this->view('panel/tab5' , $data , 1 , 1);
        }

        /*tab6*/
        if ($index == 6){
            $waitingEdits = $this->model->getNotConfirmEdits();
            $data = ['waitingEdits'=>$waitingEdits];
            $this->view('panel/tab6' , $data , 1 , 1);
        }

        /*tab7*/
        if ($index == 7){
            $data = [];
            $this->view('panel/tab7' , $data , 1 , 1);
        }

        /*tab8*/
        if ($index == 8){
            $data = [];
            $this->view('panel/tab8' , $data , 1 , 1);
        }
    }

    function deleteComment(){
        $this->model->deleteComment($_POST);
    }

    function addAnswer(){
        $this->model->addAnswer($_POST);
    }

    function changePoemTitle(){
        $poem_titles = $this->model->changePoemTitle($_POST);
        echo json_encode($poem_titles);
    }

    function editPoem(){
        $this->model->editPoem($_POST);
    }

    function setViewedComment(){
        $this->model->setViewedComment($_POST);
    }

    function addPoem(){
        $this->model->addPoem($_POST);
    }
    function deletePoem(){
        $this->model->deletePoem($_POST);
    }
    function setMessageViewed(){
        $this->model->setMessageViewed($_POST);
    }
    function sendMessage(){
        $result = $this->model->sendMessage($_POST);
        echo $result;
    }
    function getUserPoemsTitle($id_user){
        $poemsTitle = $this->model->getUserPoemsTitle($id_user);
        echo json_encode($poemsTitle);
    }
    function setWorkMessage(){
        $result = $this->model->setWorkMessage($_POST);
        echo $result;
    }
    function selectedPoemsTitle(){
        $result = $this->model->selectedPoemsTitle($_POST);
        echo json_encode($result);
    }
    function refuseRequest($id_message , $user_front , $txt){
        $result = $this->model->refuseRequest($id_message , $user_front , $txt);
        echo $result;
    }
    function newPrice(){
        $result = $this->model->newPrice($_POST);
        echo $result;
    }
    function acceptRequest($id_message , $user_front , $txt){
        $result = $this->model->acceptRequest($id_message , $user_front , $txt);
        echo $result;
    }
    function addArt(){
        $result = $this->model->addArt($_POST);
        echo $result;
    }
    function updateAvatar(){
        $result = $this->model->updateAvatar($_POST);
        echo $result;
    }
    function deleteAvatar($type_image){
        $result = $this->model->deleteAvatar($type_image);
        echo $result;
    }
    function editUserInfo(){
        $result = $this->model->editUserInfo($_POST);
        echo $result;
    }
    function editUserInfoConfirm(){
        $result = $this->model->editUserInfoConfirm($_POST);
        echo $result;
    }
}

?>