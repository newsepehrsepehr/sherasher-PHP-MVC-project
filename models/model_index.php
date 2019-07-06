<?php

use PHPMailer\PHPMailer\PHPMailer;

class model_index extends Model{

    private $id_user;

    function __construct()
    {
        parent::__construct();
        self::sessionInit();
        $this->id_user = self::sessionGet('userId');
    }

    function getSliderTop(){
        $sql = 'select * from tbl_slider_top';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getNews(){
        $sql = 'select * from tbl_news';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getMainChat(){
        $sql = 'select tbl_main_chat.* , tbl_user.family , tbl_user.lastseen
         from tbl_main_chat
         LEFT JOIN tbl_user ON tbl_main_chat.id_user = tbl_user.id
         order by id DESC limit 10';
        $result = $this->doSelect($sql);

        foreach ($result as $key=>$row) {
            $last_seen_db = $row['lastseen'];
            $time_since = time() - $last_seen_db;
            $timeAgo = $this->timeAgo($time_since);

            if ($time_since < 25) {
                $timeAgo = 'آنلاین';
            }

            $result[$key]['lastseen2'] = $timeAgo;

        }

        return $result;
    }

    function getNewestPoems(){
        $sql = 'select tbl_poem.* , tbl_user.family , tbl_user.lastseen
        from tbl_poem
        LEFT JOIN tbl_user ON tbl_poem.id_user = tbl_user.id
        where confrim=1
        order by id desc
        limit 30';
        $result = $this->doSelect($sql);

        $sql2 = 'select * from tbl_comment';
        $all_comments = $this->doSelect($sql2);

        foreach ($result as $key=>$row){
            $last_seen_db = $row['lastseen'];
            $time_since = time() - $last_seen_db;
            $timeAgo = $this->timeAgo($time_since);

            if ($time_since < 25){
                $timeAgo = 'آنلاین';
            }



            $comments_number = 0;
            $id_poem = $row['id'];
            foreach ($all_comments as $comment){
                $id_poem2 = $comment['id_poem'];
                if ($id_poem == $id_poem2){
                    $comments_number = $comments_number + 1;
                }
            }
            $result[$key]['commentsNumber'] = $comments_number;
            $result[$key]['lastseen2'] = $timeAgo;

        }
        return $result;
    }

    function getNewestUsers(){
        $sql = 'select * from tbl_user where confirm=1 order by id desc limit 10';
        $result = $this->doSelect($sql);
        return $result;
    }

    function checkLogin($data){
        $email = $data['email'];
        $password = $data['password'];
        $remember = $data['remember'];

        $sql = 'select * from tbl_user where email=?';
        $params = [$email];
        $result = $this->doSelect($sql , $params , 1);

        if (isset($result) and password_verify($password , $result['password'])){


                $id_user = $result['id'];
                self::sessionInit();
                self::session_set('userId', $id_user);

                if ($remember == 'true'){
                    $cookie_name = "user";
                    $cookie_value = self::login_token();
                    $expiry = time() + (86400 * 30);
                    setcookie($cookie_name, $cookie_value, $expiry);

                    $sql = 'update tbl_user set token_login=? where id=?';
                    $params = [$_SESSION['login_token'] , $id_user];
                    $this->doQuery($sql , $params);

                }

                self::updateLastSeen($id_user);

                return 1;




        } else {
             return 0;
        }
    }

    function setLastSeen(){
        $id_user = $this->id_user;

        self::updateLastSeen($id_user);
    }

    function sendMessage($data){


        if (isset($data['txt'])) {

            $txt = $data['txt'];
            $id_user = $this->id_user;
            $date = jdate('Y/m/d-G:i');

            if (isset($id_user)) {

                $sql = 'insert into tbl_main_chat (txt , id_user , date) values (?,?,?)';
                $params = [$txt, $id_user, $date];
                $this->doQuery($sql, $params);

            }

        }

        return self::getMainChat();

    }

    function setPoemView($data){
        $id_poem = $data['id_poem'];
        require ('public/viewInfo/viewinfo.php');
        $viewinfo=new \viewinfo\viewinfo();
        $result = $viewinfo->set_view_ByID($id_poem);
        if ($result == 1){
            $sql = 'update tbl_poem set view=view+1 where id=?';
            $param = [$id_poem];
            $this->doQuery($sql , $param);
        }
    }
    function setLike($data){

        $id_poem = $data['id_poem'];
        $id_user = $this->id_user;

        require ('public/viewInfo/viewinfo.php');
        $viewinfo=new \viewinfo\viewinfo();
        $result = $viewinfo->set_like_ByID($id_poem , $id_user);

        if ($result == 1) {
            $str = 1;
        } else if($result == 0){
            $str = -1;
            $viewinfo->removeLike($id_poem , $id_user);
        }
        $sql = 'update tbl_poem set likes=likes+' . $str . ' where id=?';
        $param = [$id_poem];
        $this->doQuery($sql, $param);
    }

    function checkLiked($data){
        $id_poem = $data['id_poem'];
        $id_user = $this->id_user;
        require ('public/viewInfo/viewinfo.php');
        $viewinfo=new \viewinfo\viewinfo();
        if($viewinfo->get_like_ByIDandUserId($id_poem , $id_user)){
            return 0;
        } else {
            return 1;
        }

    }

    function signOut(){
        self::sessionInit();
        unset($_SESSION['userId']);
        setcookie('user', '', time() - 3600);
        session_destroy();
        return 1;
    }

    function jsCheckLogin(){
        $isLogin = self::$logged_in;
        if ($isLogin == 1){
            return 1;
        } else {
            return 0;
        }
    }

    function getMainChatAll(){
        $sql = 'select tbl_main_chat.* , tbl_user.family , tbl_user.lastseen
         from tbl_main_chat
         LEFT JOIN tbl_user ON tbl_main_chat.id_user = tbl_user.id
         order by id DESC';

        $result = $this->doSelect($sql);

        foreach ($result as $key=>$row) {
            $last_seen_db = $row['lastseen'];
            $time_since = time() - $last_seen_db;
            $timeAgo = $this->timeAgo($time_since);

            if ($time_since < 25) {
                $timeAgo = 'آنلاین';
            }

            $result[$key]['lastseen2'] = $timeAgo;

        }

        return $result;
    }

    function showMoreChats($data){
        $chats = self::getMainChatAll();

        $keyword = $data['keyword'];

        if ($keyword != '') {

            $search = [];
            foreach ($chats as $chat) {
                $family = $chat['family'];
                $txt = $chat['txt'];
                if (strpos($family, $keyword) !== false or strpos($txt, $keyword) !== false) {
                    array_push($search, $chat);
                }

            }

            $chats = $search;

        }


        $chats_number = sizeof($chats);

        $limit = 10;
        $current_page = $data['current_page'];
        $offset = ($current_page-1)*$limit;

        $more_chats = array_slice($chats , $offset , $limit);
        return [$more_chats , $chats_number , $current_page];
    }

    function getBestFromUsers(){
        $sql = 'select tbl_poem.* , tbl_user.family
        from tbl_poem
        LEFT JOIN tbl_user ON tbl_poem.id_user = tbl_user.id
        where confrim=1
        order by id desc';
        $result = $this->doSelect($sql);

        $sql2 = 'select * from tbl_comment';
        $all_comments = $this->doSelect($sql2);

        foreach ($result as $key=>$row) {

            $comments_number = 0;
            $id_poem = $row['id'];
            foreach ($all_comments as $comment) {
                $id_poem2 = $comment['id_poem'];
                if ($id_poem == $id_poem2) {
                    $comments_number = $comments_number + 1;
                }
            }
            $result[$key]['commentsNumber'] = $comments_number;
        }


        $today_date = date('Y/m/d');
        $time = time();
        $last_week_time = $time - (7*24*3600);
        $last_week_date = date('Y/m/d' , $last_week_time);

        $dates = $this->getRange($last_week_date , $today_date);

        $poems_stat = [];

        foreach ($dates as $date){
            $jalali_date = self::gregorianToJalali($date);
            $poems_stat[$jalali_date] = [];
        }

        $max_rate_user = [];
        $max_likes_classic = 0; $max_likes_lyrics = 0; $max_likes_new = 0; $max_likes_white = 0; $max_likes_children = 0; $max_likes_fun = 0;
        $max_views_classic = 0; $max_views_lyrics = 0; $max_views_new = 0; $max_views_white = 0; $max_views_children = 0; $max_views_fun = 0;

        foreach ($result as $row){
            $full_date = $row['date'];
            $full_date = explode('-' , $full_date);
            $date2 = $full_date[0];
            $time = $full_date[1];
            $jalali_db_date = $date2;
            $gregorian_db_date = self::jalaliToGregorian($jalali_db_date);
            if (in_array($gregorian_db_date , $dates)){

                $category = $row['id_category'];
                $likes = $row['likes'];
                $view = $row['view'];
                if ($likes > $max_likes_classic and $category == 2) {
                    $max_rate_user['like_classic'] = $row;
                }
                if ($likes > $max_likes_lyrics and $category == 1) {
                    $max_rate_user['like_lyrics'] = $row;
                }
                if ($likes > $max_likes_new and $category == 3) {
                    $max_rate_user['like_new'] = $row;
                }
                if ($likes > $max_likes_white and $category == 4) {
                    $max_rate_user['like_white'] = $row;
                }
                if ($likes > $max_likes_children and $category == 5) {
                    $max_rate_user['like_children'] = $row;
                }
                if ($likes > $max_likes_fun and $category == 6) {
                    $max_rate_user['like_fun'] = $row;
                }

                if ($view > $max_views_classic and $category == 2) {
                    $max_rate_user['view_classic'] = $row;
                }
                if ($view > $max_views_lyrics and $category == 1) {
                    $max_rate_user['view_lyrics'] = $row;
                }
                if ($view > $max_views_new and $category == 3) {
                    $max_rate_user['view_new'] = $row;
                }
                if ($view > $max_views_white and $category == 4) {
                    $max_rate_user['view_white'] = $row;
                }
                if ($view > $max_views_children and $category == 5) {
                    $max_rate_user['view_children'] = $row;
                }
                if ($view > $max_views_fun and $category == 6) {
                    $max_rate_user['view_fun'] = $row;
                }


            }
        }

        return $max_rate_user;


    }

    function getWordChallenge(){
        $sql = 'select tbl_challenge_word.* , tbl_user.family
        from tbl_challenge_word
        LEFT JOIN tbl_user ON tbl_challenge_word.id_user = tbl_user.id
        where number=1 and confrim=1
        order by id desc';
        $result = $this->doSelect($sql);

        $sql2 = 'select * from tbl_words';
        $all_words = $this->doSelect($sql2);

        foreach ($result as $key=>$row){

            $time_end = $row['time_end'];
            $time_start = $row['time_start'];
            $time = $time_end - $time_start;
            $hour = (int)($time / 3600);
            $min = (int)(($time % 3600) / 60);
            $sec = (int)(($time % 3600) % 60);

            $total_time = $min.' دقیقه و '.$sec.' ثانیه ';
            if ($sec == 0){
                $total_time = $min.' دقیقه ';
            }
            if ($min == 0){
                $total_time = $sec.' ثانیه ';
            }

            $id_words = $row['words'];
            $id_words_array = explode(',' , $id_words);

            $words_array = [];
            foreach ($id_words_array as $id_word){
                foreach ($all_words as $word){
                    $id = $word['id'];
                    $word_value = $word['title'];
                    if ($id_word == $id){
                        array_push($words_array , $word_value);
                    }
                }
            }

            $result[$key]['total_time'] = $total_time;
            $result[$key]['word_array'] = $words_array;

        }

        /*print_r($result);*/

        return $result;
    }

    function setRate($data){

        $rate = $data['rate'];
        $id = $data['id'];

        $id_user = $this->id_user;
        $id_challenge = $data['id'];

        require ('public/viewInfo/viewinfo.php');
        $viewinfo=new \viewinfo\viewinfo();
        $result = $viewinfo->set_rate_ByID($id_challenge , $id_user);

        if ($result == 1){
            $sql = 'update tbl_challenge_word set rate=? , count=count+1 where id=?';
            $params = [$rate , $id];
            $this->doQuery($sql , $params);
            $msg = 1;
        }
        elseif ($result == 0){
            $msg = 0;
        } else {
            $msg = 10;
        }

        return $msg;
    }

    function isJoindedWordChallenge(){

        $id_user = $this->id_user;

        $sql = 'select * from tbl_challenge_word where id_user=? and number=1';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);

        if (sizeof($result) > 0){
            
            if ($result[0]['status'] == 9){
                $msg = 2;
            } elseif ($result[0]['status'] == 7){
                $msg = 1;
            } else{
                $msg = 0;
            }

            return $msg;
        } else {
            $sql3 = 'select * from tbl_words ORDER BY RAND() limit 3';
            $rand_words = $this->doSelect($sql3);
            $word_ids = [];
            $words = [];
            foreach ($rand_words as $word){
                $id_word = $word['id'];
                $word_title = $word['title'];
                array_push($word_ids , $id_word);
                array_push($words , $word_title);
            }
            $time_start = time();

            $word_ids_join = join(',' , $word_ids);

            $sql2 = 'insert into tbl_challenge_word (id_user , time_start , number , words) values (?,?,1,?)';
            $params2 = [$id_user , $time_start , $word_ids_join];
            $this->doQuery($sql2 , $params2);

            $ten_minutes = 10*60;
            $time_end_sec = $time_start + $ten_minutes;
            date_default_timezone_set('Asia/Tehran');
            $time_end = date('F d, Y H:i:s' , $time_end_sec);

            $result = [$words , $time_end];
            return $result;
        }


    }

    function setChallengeWord($data){

        $id_user = $this->id_user;

        $time_end = time();

        $txt = nl2br($data['txt']);

        $sql = 'update tbl_challenge_word set txt=? , time_end=? , status=1 where id_user=? and number=1 and status !=9';
        $params = [$txt , $time_end , $id_user];
        $this->doQuery($sql , $params);
        header('location:'.URL.'index/index/okChallenge');
    }

    function cancelChallengeWord($self){

        if ($self == 'self'){
            $status = 7;
        } else {
            $status = 9;
        }

        $id_user = $this->id_user;

        $sql = 'update tbl_challenge_word set status=? where id_user=? and number=1';
        $param = [$status , $id_user];
        $this->doQuery($sql , $param);
    }

    function checkWordChallengeJoin(){
        $id_user = $this->id_user;

        $sql = 'select * from tbl_challenge_word where id_user=? and number=1';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);

        if (sizeof($result) == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    function getStoreNoteBook(){

        $id_user = $this->id_user;

        $sql = 'select * from tbl_store where id_user=?';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);
        return $result;
    }

    function changePassword($data){

        require  ("public/phpEmailer/PHPMailer.php");
        require  ("public/phpEmailer/Exception.php");
        require  ("public/phpEmailer/SMTP.php");
        require  ("public/phpEmailer/POP3.php");
        require  ("public/phpEmailer/OAuth.php");

        $email = $data['email'];

        $sql = 'select * from tbl_user where email=?';
        $params = [$email];
        $result = $this->doSelect($sql , $params , 1);

        if (isset($result)){
            $id_user = $result['id'];

            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#A&*()=';
            $token = str_shuffle($token);
            $token = substr($token , 0 , 10);
            $expire = time() + (24*3600);

            $sql2 = 'update tbl_user set token=? , token_time=? where id=?';
            $param2 = [$token , $expire , $id_user];
            $this->doQuery($sql2 , $param2);

            $name = 'new user';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "smarezaie@gmail.com";
            $mail->Password = "13942015";
            $mail->setFrom('smarezaie@gmail.com');
            $mail->addAddress($email , $name);
            $mail->Subject = 'تغییر رمز عبور';
            $mail->isHTML(true);
            $mail->Body = "
            لطفا روی لینک زیر کلیک کنید
            <br><br>
            <a href='http://127.0.0.1/behtarane3/changePassword/index/$email/$token'>change password</a>
            ";

            if ($mail->send()){
                $msg = 1;
            } else {
                $msg = 9;
            }

        } else {
            $msg = 0;
        }

        return $msg;
    }





}

?>