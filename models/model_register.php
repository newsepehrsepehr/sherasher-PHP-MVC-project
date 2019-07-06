<?php

use PHPMailer\PHPMailer\PHPMailer;

class model_register extends Model{

    function __construct()
    {
        parent::__construct();
        require  ("public/phpEmailer/PHPMailer.php");
        require  ("public/phpEmailer/Exception.php");
        require  ("public/phpEmailer/SMTP.php");
        require  ("public/phpEmailer/POP3.php");
        require  ("public/phpEmailer/OAuth.php");
    }

    function emailVerify($data){

        $email = $data['email'];
        $type = $data['type'];
        $sql = 'select id from tbl_user where email=?';
        $param = [$email];
        $result = $this->doSelect($sql , $param);

        if (sizeof($result)>0){
            $msg = 2;
        } else {
            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#A%&*()=';
            $token = str_shuffle($token);
            $token = substr($token , 0 , 10);

            $sql2 = 'insert into tbl_user (email, type , token , token_confirm) values (?,?,?,0)';
            $param2 = [$email, $type , $token];
            $this->doQuery($sql2 , $param2);

            $name = 'new user';

            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->CharSet = 'utf-8';

            $mail->Host = 'smtp.gmail.com';
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS
            $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "smarezaie@gmail.com";

//Password to use for SMTP authentication
            $mail->Password = "13942015";

            $mail->setFrom('smarezaie@gmail.com');
            $mail->addAddress($email , $name);
            $mail->Subject = 'لطفا ایمیل را تایید کنید';
            $mail->isHTML(true);
            $mail->Body = "
            لطفا روی لینک زیر کلیک کنید
            <br><br>
            <a href='http://127.0.0.1/behtarane3/register/checktoken/$email/$token'>email verify</a>
            ";

            if ($mail->send()){
                $msg = 1;
            } else {
                $msg = 0;
            }
        }
        return $msg;
    }

    function setPass($data){

        $password = $data['password'];
        $email = $data['email'];

        $hash = password_hash($password , PASSWORD_BCRYPT);

        $sql = 'update tbl_user set password=? where email=?';
        $params = [$hash , $email];
        $this->doQuery($sql , $params);
        return 1;
    }

    function checkToken($email , $token){
        $sql = 'select * from tbl_user where email=? and token=? and token_confirm=0';
        $params = [$email , $token];
        $result = $this->doSelect($sql , $params);

        if (sizeof($result) > 0){
            $msg = 0;
        } else {
            $sql2 = 'update tbl_user set token=0 , token_confirm=1 where email=?';
            $param = [$email];
            $this->doQuery($sql2 , $param);

            $msg = 1;
        }

        return $msg;
    }

    function setUserInfo($data){
        $family = $data['family'];
        $mobile = $data['mobile'];
        $state = $data['state2'];
        $city = $data['city2'];
        $email = $data['email'];
        $gender = $data['gender'];

        $sql = 'update tbl_user set family=? , mobile=? , state=? , city=? , gender=? where email=?';
        $params = [$family , $mobile , $state , $city , $gender , $email];

        $this->doQuery($sql , $params);
    }

}

?>