<?php

class Model
{
    public static $conn='';

    public static $logged_in;

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'behtarane';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        self::$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname , $username , $password , $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        require ('public/jdf/jdf.php');

        self::sessionInit();
        $id_user = Model::sessionGet('userId');

        if ($id_user != false)
        {
            self::$logged_in = 1;
        } elseif (isset($_COOKIE['user']) && $_COOKIE['user'] != ''){
            $user_token = $_COOKIE['user'];

            $sql = 'select id from tbl_user where token_login=?';
            $param = [$user_token];
            $result_id = $this->doSelect($sql , $param , 1);

            self::sessionInit();
            self::session_set('userId' , $result_id['id']);
            self::$logged_in = 1;
        } else {
            self::$logged_in = 0;
        }
    }

    /*main                    start  */
    public static function getOption(){
        $sql = 'select * from option';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $short_result = [];
        foreach ($results as $result){
            $setting = $result['setting'];
            $value = $result['value'];
            $short_result[$setting] = $value;
        }
        return $short_result;
    }

    function doSelect($sql , $values=[] , $fetch='' , $fetch_style = PDO::FETCH_ASSOC){
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value){
            $stmt->bindValue($key+1 , $value);
        }
        $stmt->execute();
        if ($fetch == ''){
            $result = $stmt->fetchAll($fetch_style);
        } else {
            $result = $stmt->fetch($fetch_style);
        }
        return $result;
    }

    function doQuery($sql , $values=[]){
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value){
            $stmt->bindValue($key+1 , $value);
        }
        $stmt->execute();
    }

    public static function sessionInit(){
        @session_start();
    }

    public static function session_set($name , $value){
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name){
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function jalaliDate($format='Y/n/j'){
        /*required in construct*/
        $data = jdate($format);
        return $data;
    }

    public static function jalaliToGregorian($jalali_date , $format='/'){
        $jalali_date = explode('/' , $jalali_date);
        $year = $jalali_date[0];
        $month = $jalali_date[1];
        $day = $jalali_date[2];
        $date = jalali_to_gregorian($year , $month , $day);
        $date = implode($format , $date);
        $date = new DateTime($date);
        $date = $date->format('Y/m/d');
        return $date;
    }
    public static function gregorianToJalali($gregorian_date , $format='/'){
        $gregorian_date = explode('/' , $gregorian_date);
        $year = $gregorian_date[0];
        $month = $gregorian_date[1];
        $day = $gregorian_date[2];
        $date = gregorian_to_jalali($year , $month , $day);
        $date = implode($format , $date);
        return $date;
    }

    public static function compareDate($date1 , $date2){
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);

        $date1 = $date1->format('Y-m-d');
        $date2 = $date2->format('Y-m-d');

        if ($date1 > $date2){
            return 1;
        }
        if ($date1 == $date2){
            return 0;
        }
        if ($date2 > $date1){
            return 2;
        }
    }

    /*main                    end  */

    /*project                    start  */
    function compute_discount($price , $discount){
        $discount_amount = ($discount * $price)/100;
        $price_total = $price - $discount_amount;
        return ['discount_amount'=>$discount_amount , 'price_total'=>$price_total];
    }

    function compute_end_time($inserted_time){
        $option = self::getOption();
        $duration = $option['special_time'];
        $end_time = $inserted_time + $duration;
        date_default_timezone_set('Asia/Tehran');
        $end_time = date('F d, Y H:i:s' , $end_time);
        return $end_time;
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;
    }
    /*project                    end  */

    public static function getBasketCookie(){
        if (isset($_COOKIE['basket'])){
            $cookie = $_COOKIE['basket'];
        } else {
            $expireTime = time() + 4*24*3600;
            $value = time() * rand(1 , 100);
            setcookie('basket' , $value , $expireTime  , '/');
            $cookie = $value;
        }
        return $cookie;
    }

    public static function getUserInfo(){
        self::sessionInit();
        $id = self::sessionGet('userId');

        $sql = 'select * from tbl_user where id=?';
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }


    function updateLastSeen($id_user){ //check $id_user and not work seseion get it in the method
        $currentTimeStamp = time();
        $sql = 'update tbl_user set lastseen=? where id=?';
        $params = [$currentTimeStamp , $id_user];
        $this->doQuery($sql , $params); //check $this or self is ok
    }

    function getUserLastSeen($id_user){
        $sql = 'select lastseen from tbl_user where id=?';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param , 1);
        $time_since = time() - $result[0]; //check
        $timeAgo = $this->timeAgo($time_since);

        if ($time_since < 25){
            $timeAgo = 'آنلاین';
        }

        return $timeAgo;
    }


    function timeAgo($timeStamp){
        if ($timeStamp == 0){
            $timeAgo = 'یک ثانیه پیش';
        } else if ($timeStamp == 1){
            $timeAgo = "$timeStamp ثانیه پیش ";
        } else if ($timeStamp < 60){
            $timeAgo = "$timeStamp ثانیه پیش ";
        } else if ($timeStamp >= 60 && $timeStamp < 3600){
            $time = $timeStamp/60;
            if (round($time) < 2) {
                $timeAgo = " یک دقیقه پیش ";
            } else {
                $timeAgo = round($time)." دقیقه پیش ";
            }
        } else if ($timeStamp >= 3600 && $timeStamp < 86400){
            $time = $timeStamp / 3600;
            if (round($time) < 2){
                $timeAgo = ' یک ساعت پیش ';
            } else {
                $timeAgo = round($time).' ساعت پیش ';
            }
        } else if ($timeStamp >= 86400 && $timeStamp < 2419200){
            $time = $timeStamp / 86400;
            if (round($time) < 2){
                $timeAgo = ' دیروز ';
            } else {
                $timeAgo = round($time).' چند روز گذشته ';
            }
        } else if ($timeStamp >= 2419200 && $timeStamp < 31536000){
            $time = $timeStamp / 2419200;
            if (round($time) < 2){
                $timeAgo = ' یک ماه پیش ';
            } else {
                $timeAgo = round($time).' ماه پیش ';
            }
        } else {
            $time = $timeStamp / 31536000;
            if (round($time) == 1){
                $timeAgo = ' یک سال پیش ';
            } else {
                $timeAgo = ' سال ها پیش ';
            }
        }

        return $timeAgo;
    }

    public static function getScrollNews(){
        $sql = 'select * from tbl_scroll_news';

        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function getAlertUser(){

        self::sessionInit();
        $id_user = self::sessionGet('userId');


        $sql = 'select tbl_message.* , tbl_user.family
        from tbl_message
        JOIN tbl_user ON tbl_message.id_sender = tbl_user.id
        where id_receiver=? and viewed=0';
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(1 , $id_user);
        $stmt->execute();
        $messages = $stmt->fetchAll();


        $message_number = sizeof($messages);

        $sql2 = 'select tbl_poem.title , tbl_comment.viewed , tbl_comment.id_poem
        from tbl_poem
        JOIN tbl_comment ON tbl_poem.id = tbl_comment.id_poem
        ';
        $stmt2 = self::$conn->prepare($sql2);
        $stmt2->bindParam(1 , $id_user);
        $stmt2->execute();
        $all_comments = $stmt2->fetchAll();

        $comments = [];
        foreach ($all_comments as $comment){
            $viewed = $comment['viewed'];
            if ($viewed == 0){
                array_push($comments , $comment);
            }
        }

        $comment_number = sizeof($comments);


        return [$message_number , $comment_number , $comments , $messages];

    }

    function getRange($date_start , $date_end){
        $start = strtotime($date_start);
        $end = strtotime($date_end);

        $dates = [];
        while ($start <= $end){
            $dates[] = date('Y/m/d' , $start);
            $start = strtotime('+1 day' , $start);
        }
        return $dates;
    }

    public static function getUserChallengeWord(){

        self::sessionInit();
        $id_user = self::sessionGet('userId');

        $sql = 'select * from tbl_challenge_word where id_user=? and number=1';
        $stmt2 = self::$conn->prepare($sql);
        $stmt2->bindParam(1 , $id_user);
        $stmt2->execute();
        $result = $stmt2->fetch();


            $time_start = $result['time_start'];
            $ten_minutes = 10 * 60;
            $time_end_sec = $time_start + $ten_minutes;
            date_default_timezone_set('Asia/Tehran');
            $time_end = date('F d, Y H:i:s', $time_end_sec);

            $sql2 = 'select * from tbl_words';
            $stmt = self::$conn->prepare($sql2);
            $stmt->execute();
            $all_words = $stmt->fetchAll();


            $id_words = $result['words'];
            $id_words_array = explode(',', $id_words);

            $words_array = [];
            foreach ($id_words_array as $id_word) {
                foreach ($all_words as $word) {
                    $id = $word['id'];
                    $word_value = $word['title'];
                    if ($id_word == $id) {
                        array_push($words_array, $word_value);
                    }
                }
            }

            if ($result['status'] == 9 or $result['status'] == 1 or $result['status'] == 7) {
                $is_canceled = 1;
            } else {
                $is_canceled = 0;
            }


            return [$words_array, $time_end, $is_canceled];
        }

    public static function csrf_token($scrfName){
        if(session_status() == PHP_SESSION_NONE){
            return 'session_start() has not declared yet !';
        }else{
            $token= md5(uniqid(rand()));
            $_SESSION[$scrfName] = $token ;
            return $_SESSION[$scrfName] ;
        }
    }

    public static function login_token(){
        if(session_status() == PHP_SESSION_NONE){
            return 'session_start() has not declared yet !';
        }else{
            $token= md5(uniqid(rand()));
            $_SESSION['login_token'] = $token ;
            return $_SESSION['login_token'] ;
        }
    }






}

?>