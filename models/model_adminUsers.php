<?php

class model_adminUsers extends Model {

    function __construct()
    {
        parent::__construct();
    }

    function getUsers($type='' , $confirm='' , $gender='' , $status=''){

        $string = 'where 1=1';

        if ($type == 1){
            $string = $string.' and type = 1';
        }
        if ($type == 2){
            $string = $string.' and type = 2';
        }

        if ($confirm == 1){
            $string = $string.' and confirm = 1';
        }
        if ($confirm == 0){
            $string = $string.' and confirm = 0';
        }

        if ($gender == 1){
            $string = $string.' and gender = 1';
        }
        if ($gender == 0){
            $string = $string.' and gender = 0';
        }

        $sql = 'select * from tbl_user ' . $string . ' order by id desc';

        $result = $this->doSelect($sql);

        $online_users = [];
        foreach ($result as $key=>$row){
            $lastseen_time = $row['lastseen'];

            $time_since = time() - $lastseen_time;
            $timeAgo = $this->timeAgo($time_since);

            if ($time_since < 25){
                $timeAgo = 'آنلاین';
                array_push($online_users , $row);
                if ($status == 0) {
                    unset($result[$key]);
                }
            }

            $result[$key]['lastseen2'] = $timeAgo;
        }

        if ($status == 1){
            $result = $online_users;
        }


        return $result;
    }

    function doFilter($data){

        if ($data['btn_confirm'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'update tbl_user set confirm=1 where id IN ('.$ids.')';
            $this->doQuery($sql);
        }
        if ($data['btn_unconfirm'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'update tbl_user set confirm=0 where id IN ('.$ids.')';
            $this->doQuery($sql);
        }
        if ($data['btn_delete'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'delete from tbl_user where id IN ('.$ids.')';
            $this->doQuery($sql);
        }


        $type = $data['type'];
        $confirm = $data['confirm'];
        $gender = $data['gender'];
        $status = $data['status'];

        $users = $this->getUsers($type , $confirm , $gender , $status);

        if (isset($data['filter_date'])){
        if ($data['filter_date'] == 1) {

            $date1 = $data['year1'].'/'.$data['month1'].'/'.$data['day1'];
            $date2 = $data['year2'].'/'.$data['month2'].'/'.$data['day2'];
            try {
                $date1 = new DateTime($date1);
                $date2 = new DateTime($date2);
            } catch (Exception $e) {
            }

            $date1 = $date1->format('Y-m-d');
            $date2 = $date2->format('Y-m-d');

            $users_filter_date = [];
            foreach ($users as $user) {
                $full_date2 = $user['register_date'];
                $full_date = explode('-', $full_date2);
                $date = $full_date[0];
                try {
                    $date = new DateTime($date);
                } catch (Exception $e) {
                }
                $date = $date->format('Y-m-d');

                if ($date <= $date2 and $date>=$date1) {
                    array_push($users_filter_date, $user);
                }
            }
            if ($users_filter_date == []){}
            $users = $users_filter_date;
        }
        }

        $limit = $data['limit'];
        $current_page = $data['current_page'];
        $offset = ($current_page-1)*$limit;

        $users2 = array_slice($users , $offset , $limit);

        $result_number = sizeof($users);


        return [$users2 , $result_number];
    }

    function getUsersInfo2($data){
        $id_user = $data['id_user'];
        $sql = 'select * from tbl_user where id=?';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param , 1);


        $lastseen_time = $result['lastseen'];

        $time_since = time() - $lastseen_time;
        $timeAgo = $this->timeAgo($time_since);

        if ($time_since < 25){
            $timeAgo = 'آنلاین';
        }

        $result['lastseen2'] = $timeAgo;


        return $result;
    }

}

?>