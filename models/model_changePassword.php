<?php

class model_changePassword extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function changePass($data){

        $newPass = $data['new-pass'];
        $hash = password_hash($newPass , PASSWORD_DEFAULT);

        if ($data['hasToken'] == ''){

            self::sessionInit();
            $id_user = self::sessionGet('userId');
            $oldPass = $data['old-pass'];

            $sql = 'select password from tbl_user where id=?';
            $param = [$id_user];
            $result = $this->doSelect($sql , $param , 1);

            if (isset($result) && password_verify($oldPass , $result['password'])){

                $sql2 = 'update tbl_user set password=? where id=?';
                $param2 = [$hash , $id_user];
                $this->doQuery($sql2 , $param2);

                $msg = 1;

            } else {
                $msg = 'passWrong';
            }

        } else {
            $token = $data['hasToken'];
            $email = $data['email'];
            $sql3 = 'select * from tbl_user where email=?';
            $param3 = [$email];
            $result3 = $this->doSelect($sql3 , $param3 , 1);


            if (isset($result3) && $result3['token'] == $token){

                if (time() < $result3['token_time']) {

                    $sql4 = 'update tbl_user set password=? , token_confirm=1 where email=?';
                    $params = [$hash, $email];
                    $this->doQuery($sql4, $params);
                    $msg = 2;
                } else{
                    $msg = 'expired';
                }
            } else {
                $msg = 'notChanged';
            }
        }
        return $msg;
    }

}

?>