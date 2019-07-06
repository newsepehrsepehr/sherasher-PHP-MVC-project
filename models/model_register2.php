<?php

use PHPMailer\PHPMailer\PHPMailer;

class model_register2 extends  Model{

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
        $password = $data['pass'];
        $family = $data['family'];

        $hash = password_hash($password , PASSWORD_DEFAULT);

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

            $sql2 = 'insert into tbl_user (family , email, password , type , token , token_confirm) values (?,?,?,?,?,0)';
            $param2 = [$family , $email, $hash , $type , $token];
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

    function setUserInfo($data){
        @$mobile = $data['mobile'];
        @$state = $data['state'];
        @$city = $data['city'];
        @$email = $data['email'];
        @$gender = $data['gender'];
        @$edu = $data['edu'];
        @$job = $data['job'];
        @$birthday = $data['year1'].'/'.$data['month1'].'/'.$data['day1'];
        @$description = $data['description'];
        @$description = nl2br($description);

        $sql2 = 'select id from tbl_user where email=?';
        $param2 = [$email];
        $current_id = $this->doSelect($sql2 , $param2 , 1);

        $id_user = $current_id['id'];

        @$file = $data['avatar'];


        $image_array_1 = explode(';' , $file);

        $image_array_2 = explode(',' , $image_array_1[1]);

        $file = base64_decode($image_array_2[1]);

        $isUploadOK = 1;

        $info = getimagesizefromstring($file);

        $imgType = $info['mime'];

        if ($imgType != 'image/png' and $imgType != 'image/jpg' and $imgType != 'image/gif' and $imgType != 'image/jpeg'){
            $isUploadOK = 0;
            $msg = 'type-error';
        }

        /*//*/

        if ($isUploadOK == 1) {

            $imagePath = 'public/images/users/' . $id_user . '/user_64.jpg';

            if (!file_exists('public/images/users/' . $id_user)) {
                mkdir('public/images/users/' . $id_user);
            }

            file_put_contents($imagePath, $file);

             $this->create_thumbnail($imagePath , $imagePath , 150 , 150 );

             $msg = 1;

        }



            $sql = 'update tbl_user set mobile=? , state=? , city=? , gender=? , description=? , job=? , edu=? , birthday=? where email=?';
        $params = [$mobile , $state , $city , $gender , $description , $job , $edu , $birthday , $email];

        $this->doQuery($sql , $params);

        return[$msg , 1];
    }

}

?>