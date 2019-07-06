<?php

class Index extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index($ntf=''){
        $sliderTop = $this->model->getSliderTop();
        $news = $this->model->getNews();
        $mainChat = $this->model->getMainChat();
        $newestPoems = $this->model->getNewestPoems();
        $newestUsers = $this->model->getNewestUsers();
        $bestFromUsers = $this->model->getBestFromUsers();
        $wordChallenge = $this->model->getWordChallenge();
        $data = ['sliderTop'=>$sliderTop , 'news'=>$news , 'mainChat'=>$mainChat , 'newestPoems'=>$newestPoems , 'newestUsers'=>$newestUsers , 'bestFromUsers'=>$bestFromUsers , 'wordChallenge'=>$wordChallenge , 'ntf'=>$ntf];
        $this->view('index/index' , $data);
    }

    function checkLogin(){

        if (isset($_POST['email'])){
            Model::sessionInit();
            $captcha_code = Model::sessionGet('cap_code');
            $user_code = $_POST['cap'];
            if(isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['loginForm']) {
                if ($captcha_code == $user_code) {
                    $result = $this->model->checkLogin($_POST);
                    echo $result;

                } else {
                    echo '-1';
                }
            }
        }
    }

    function deleteComment(){
        $this->model->deleteComment($_POST);
    }

    function setLastSeen(){
        $this->model->setLastSeen();
    }

    function sendMessage(){
        $newMessages = $this->model->sendMessage($_POST);

        echo json_encode($newMessages);
    }
    function setPoemView(){
        $this->model->setPoemView($_POST);
    }
    function setLike(){
        $this->model->setLike($_POST);
    }
    function checkLiked(){
        $result = $this->model->checkLiked($_POST);
        echo $result;
    }
    function signOut(){
        $result = $this->model->signOut();
        echo $result;
    }
    function jsCheckLogin(){
        $result = $this->model->jsCheckLogin();
        echo $result;
    }
    function showMoreChats(){
        $result = $this->model->showMoreChats($_POST);
        echo json_encode($result);
    }
    function setRate(){
        $result = $this->model->setRate($_POST);
        echo $result;
    }
    function isJoindedWordChallenge(){
        $result = $this->model->isJoindedWordChallenge();
        echo json_encode($result);
    }
    function setChallengeWord(){
        $this->model->setChallengeWord($_POST);
    }
    function cancelChallengeWord($self=''){
        $this->model->cancelChallengeWord($self);
    }
    function checkWordChallengeJoin(){
        $result = $this->model->checkWordChallengeJoin();
        echo $result;
    }
    function getStoreNoteBook(){
        $result = $this->model->getStoreNoteBook();
        echo json_encode($result);
    }
    function changePassword(){
        Model::sessionInit();
        $captcha_code = Model::sessionGet('cap_code');
        $user_code = $_POST['cap'];
        if(isset($_POST['csrf_token']) && $_POST['csrf_token2'] == $_SESSION['changePass']) {
            if ($captcha_code == $user_code) {
                $result = $this->model->changePassword($_POST);
                echo $result;
            } else {
                echo '-1';
            }
        }
    }


}

?>