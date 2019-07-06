<?php

class model_adminPoems extends Model {

    function __construct()
    {
        parent::__construct();
    }

    function getPoems($type='' , $confirm='' , $music=''){

        $string = 'where 1=1';

        if ($type != '' and $type!=10){
            $string = $string.' and id_category = ?';
        }
        if ($confirm == 1){
            $string = $string.' and confrim = 1';
        }
        if ($confirm == 0){
            $string = $string.' and confrim = 0';
        }
        if ($music == 1) {
                $string = $string . ' and music = 1';
        }


        $sql = 'select tbl_poem.* , tbl_user.family , tbl_user.lastseen , tbl_category_poem.title as category
        from tbl_poem
        LEFT JOIN tbl_user ON tbl_poem.id_user = tbl_user.id
        LEFT JOIN tbl_category_poem ON tbl_poem.id_category = tbl_category_poem.id
        ' . $string . '
        order by id desc';

        if ($type != 10) {
            $param = [$type];
        } else {
            $param = [];
        }
        $result = $this->doSelect($sql , $param);

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

    function doFilterPoem($data){

        if ($data['btn_confirm'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'update tbl_poem set confrim=1 where id IN ('.$ids.')';
            $this->doQuery($sql);
        }
        if ($data['btn_unconfirm'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'update tbl_poem set confrim=0 where id IN ('.$ids.')';
            $this->doQuery($sql);
        }
        if ($data['btn_delete'] == 1){

            $ids = $data['id'];
            $ids = join(',' , $ids);

            $sql = 'delete from tbl_poem where id IN ('.$ids.')';
            $this->doQuery($sql);
        }

        $type = $data['type'];
        $confirm = $data['confirm'];
        if (isset($data['music'])) {
            $music = $data['music'];
        } else {
            $music = '';
        }

        $poems = $this->getPoems($type , $confirm , $music);

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
                foreach ($poems as $poem) {
                    $full_date2 = $poem['date'];
                    $full_date = explode('-', $full_date2);
                    $date = $full_date[0];
                    try {
                        $date = new DateTime($date);
                    } catch (Exception $e) {
                    }
                    $date = $date->format('Y-m-d');

                    if ($date <= $date2 and $date>=$date1) {
                        array_push($users_filter_date, $poem);
                    }
                }
                if ($users_filter_date == []){}
                $poems = $users_filter_date;
            }
        }

        $limit = $data['limit'];
        $current_page = $data['current_page'];
        $offset = ($current_page-1)*$limit;

        $poems2 = array_slice($poems , $offset , $limit);

        $poems_number = sizeof($poems);

        return [$poems2 , $poems_number];

    }

    function getPoemInfo($data){
        $id_poem = $data['id_poem'];
        $sql = 'select * from tbl_poem where id=?';
        $param = [$id_poem];
        $result = $this->doSelect($sql , $param , 1);
        return $result;
    }

    function poemTypeStat(){
        $sql = 'select id_category from tbl_poem';
        $result = $this->doSelect($sql);

        $sql2 = 'select * from tbl_category_poem';
        $all_categories = $this->doSelect($sql2);

        foreach ($all_categories as $key=>$category){
            $all_categories[$key]['number'] = 0;
            $id_category_all = $category['id'];
               foreach ($result as $row){
                     $id_category = $row['id_category'];
                if ($id_category == $id_category_all){
                    $all_categories[$key]['number']++;
                }
            }

        }

        return $all_categories;
    }
}

?>