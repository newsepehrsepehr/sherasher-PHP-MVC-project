<?php

class model_poem extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function getPoems($id_user){

        $sql4 = 'select * from tbl_user';
        $all_users = $this->doSelect($sql4);

        $sql2 = 'select tbl_comment.* , tbl_user.family
        from tbl_comment
        LEFT JOIN tbl_user ON tbl_comment.id_user = tbl_user.id
        ';
        $all_comments = $this->doSelect($sql2);

        $sql = 'select * from tbl_poem where id_user=? order by id desc';
        $param = [$id_user];
        $poems = $this->doSelect($sql , $param);

        @$max_like = $poems[0]['likes'];
        @$max_view = $poems[0]['view'];

        foreach ($all_comments as $key_comment=>$comment2){
            $parent = $comment2['parent'];
            if ($parent != 0){
                foreach ($all_comments as $comment3){
                    $id_comment = $comment3['id'];
                    if ($parent == $id_comment){
                        $all_comments[$key_comment]['parent_family'] = $comment3['family'];
                    }
                }

            }

        }

        /*//*/

        foreach ($poems as $key=>$row){
            $poems_comment_info = [];
            $comments_number = 0;
            $id_poem = $row['id'];
            foreach ($all_comments as $comment){

                $id_poem2 = $comment['id_poem'];
                $parent = $comment['parent'];

                if ($id_poem == $id_poem2){
                    $comments_number++;
                    array_push($poems_comment_info , $comment);
                }

            }
            $poems[$key]['poems_comments'] = $poems_comment_info;
        }

        /*//*/

        foreach ($poems as $key=>$poem){
            $likes = $poem['likes'];
            $view = $poem['view'];
            if ($likes >= $max_like){
                $max_like = $likes;
            }
            if ($view >= $max_view){
                $max_view = $view;
            }

            $comments_number = 0;
            $id_poem = $poem['id'];
            foreach ($all_comments as $comment){
                $id_poem2 = $comment['id_poem'];
                if ($id_poem == $id_poem2){
                    $comments_number = $comments_number + 1;
                }
            }
            $poems[$key]['commentsNumber'] = $comments_number;

        }


        $max_like_poems = [];
        $max_view_poems = [];
        foreach ($poems as $poem){
            $likes2 = $poem['likes'];
            $view2 = $poem['view'];

            if ($likes2 == $max_like and $max_like>0){
                array_push($max_like_poems , $poem['title']);
            }

            if ($view2 == $max_view and $max_view>0) {
                array_push($max_view_poems, $poem['title']);
            }
        }


        $poems_number = sizeof($poems);

        $sql2 = 'select * from tbl_user where id=?';
        $userInfo = $this->doSelect($sql2 , $param , 1);

        $lastseen_time = $userInfo['lastseen'];

        $time_since = time() - $lastseen_time;
        $timeAgo = $this->timeAgo($time_since);

        if ($time_since < 25){
            $timeAgo = 'آنلاین';
        }

        $userInfo['lastseen2'] = $timeAgo;
        $userInfo['poems_number'] = $poems_number;
        $userInfo['max_likes'] = $max_like_poems;
        $userInfo['max_view'] = $max_view_poems;
        $userInfo['id_user'] = $id_user;

        /*get arts*/
        $sql = 'select * from tbl_art where id_user=? order by id desc';
        $param = [$id_user];
        $arts = $this->doSelect($sql , $param);

        return [$poems , $userInfo , $arts];
    }

    function addAnswer($data){

        self::sessionInit();
        $id_user = self::sessionGet('userId');

        $id_front = $data['front_user'];
        $id_poem = $data['id_poem'];
        $txt = $data['txt'];
        $parent = $data['parent'];
        $date = jdate('Y/m/d-G:i');

        if ($id_front == $id_user){
            $str = '1';
        } else {
            $str = '0';
        }


        $sql = "insert into tbl_comment (id_user , id_poem , txt , parent , date , viewed) VALUES (?,?,?,?,? , '.$str.')";
        $params = [$id_user , $id_poem , $txt , $parent , $date];
        $this->doQuery($sql , $params);
        return 1;
    }

    function addComment($data){
        self::sessionInit();
        $id_user = self::sessionGet('userId');

        $id_front = $data['front_user'];
        $id_poem = $data['id_poem'];
        $txt = $data['txt'];
        $parent = $data['parent'];
        $date = jdate('Y/m/d-G:i');

        if ($id_front == $id_user){
            $str = '1';
        } else {
            $str = '0';
        }


        $sql = "insert into tbl_comment (id_user , id_poem , txt , parent , date , viewed) VALUES (?,?,?,?,? , '.$str.')";
        $params = [$id_user , $id_poem , $txt , $parent , $date];
        $this->doQuery($sql , $params);
    }
    function setViewedComments($id_poem){
        $sql = 'update tbl_comment set viewed=1 where id_poem=?';
        $param = [$id_poem];
        $this->doQuery($sql , $param);
    }

    function getArt(){

    }

}

?>