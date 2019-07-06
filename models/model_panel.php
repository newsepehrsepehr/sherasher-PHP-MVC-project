<?php

class model_panel extends Model{

    private $id_user;

    function __construct()
    {
        parent::__construct();
        self::sessionInit();
        $this->id_user = self::sessionGet('userId');
    }

    function getUserPoems(){

        $id_user = $this->id_user;

        $sql = 'select * from tbl_poem where id_user=? order by id desc';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);

        $sql2 = 'select tbl_comment.* , tbl_user.family
        from tbl_comment
        Left JOIN tbl_user ON tbl_comment.id_user = tbl_user.id
        ';
        $all_comments = $this->doSelect($sql2);

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




        foreach ($result as $key=>$row){
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
            $result[$key]['poems_comments'] = $poems_comment_info;
            $result[$key]['commentsNumber'] = $comments_number;
        }

        return $result;
    }

    function deleteComment($data){
        $id_comment = $data['id_comments'];

        $sql = "delete from tbl_comment where id IN (" . $id_comment . ")";
        $param = [$id_comment];
        $this->doQuery($sql , $param);
    }

    function addAnswer($data){

        $date = jdate('Y/m/d-G:i');

        $id_user = $this->id_user;
        $id_poem = $data['id_poem'];
        $answer_parent = $data['answer_parent'];
        $txt = $data['txt_answer'];
        $sql = 'insert into tbl_comment (id_user , id_poem , txt , parent , date , viewed) values (?,?,?,?,?,1)';
        $params = [$id_user , $id_poem , $txt , $answer_parent , $date];
        $this->doQuery($sql , $params);
    }

    function changePoemTitle($data){
        $id_poem = $data['id_poem'];
        $title_poem = $data['title_poem'];
        $sql = 'update tbl_poem set title=? where id=?';
        $params = [$title_poem , $id_poem];
        $this->doQuery($sql , $params);
    }

    function editPoem($data){
        $txt = $data['txt_poem'];
        $id_poem = $data['id_poem'];
        $description = $data['description'];
        echo $txt;

        $sql = 'update tbl_poem set txt=? , description=? where id=?';
        $params = [$txt , $description , $id_poem];
        $this->doQuery($sql , $params);
    }

    function getUsersByLastSeen(){
        $sql2 = 'select * from tbl_user';
        $users = $this->doSelect($sql2);

        foreach ($users as $key=>$user){
            $last_seen_db = $user['lastseen'];
            $time_since = time() - $last_seen_db;
            $timeAgo = $this->timeAgo($time_since);

            if ($time_since < 25){
                $timeAgo = 'آنلاین';
            }
            $users[$key]['lastseen2'] = $timeAgo;
        }

        return $users;
    }

    function getMessage(){
        $users = $this->getUsersByLastSeen();

        $id_user = $this->id_user;

        $sql = 'select * from tbl_message where id_sender=? or id_receiver=? order by id desc';
        $param = [$id_user , $id_user];
        $result = $this->doSelect($sql , $param);


        $all_sent_messages = [];
        foreach ($result as $row){
            $id_sender = $row['id_sender'];
            if ($id_sender == $id_user){
                array_push($all_sent_messages , $row);
            }
        }

        foreach ($all_sent_messages as $key=>$sent_message){
            $id_receiver2 = $sent_message['id_receiver'];
            foreach ($users as $user){
                $family = $user['family'];
                $id_user2 = $user['id'];
                if ($id_user2 == $id_receiver2){
                    $all_sent_messages[$key]['user_info'] = $user;
                }
            }
        }


        $all_received_messages = [];
        foreach ($result as $row){
            $id_receiver = $row['id_receiver'];
            if ($id_receiver == $id_user){
                array_push($all_received_messages , $row);
            }
        }

        foreach ($all_received_messages as $key2=>$received_message){
            $id_sender2 = $received_message['id_sender'];
            foreach ($users as $user){
                $family = $user['family'];
                $id_user2 = $user['id'];
                if ($id_user2 == $id_sender2){
                    $all_received_messages[$key2]['user_info'] = $user;
                }
            }
        }

        $all_messages = array_merge($all_received_messages , $all_sent_messages);


        return $all_messages;
    }

    function setViewedComment($data){
        $id_poem = $data['id_poem'];

        $sql = 'update tbl_comment set viewed=1 where id_poem=?';
        $param = [$id_poem];
        $this->doQuery($sql , $param);
    }

    function addPoem($data){

        if (!isset($data['poem_music'])){
            $data['poem_music'] = 0;
        }

        $id_user = $this->id_user;
        $date = jdate('Y/m/d-G:i');

        $sql = 'insert into tbl_poem (title , txt , date , id_user , description , id_category , music) values (?,?,?,?,?,?,?)';
        $params = [$data['title'] , $data['txt'] , $date , $id_user , $data['description'] , $data['id_category'] , $data['poem_music']];
        $this->doQuery($sql , $params);
    }

    function getPoemCategory(){
        $sql = 'select * from tbl_category_poem';
        $result = $this->doSelect($sql);
        return $result;
    }
    function deletePoem($data){
        $id_poem = $data['id_poem'];
        $sql = 'delete from tbl_poem where id=?';
        $param = [$id_poem];
        $this->doQuery($sql , $param);
    }
    function setMessageViewed($data){
        $id_receiver = $this->id_user;
        $id_sender = $data['id_sender'];
        $sql = 'update tbl_message set viewed=1 where id_sender=? and id_receiver=?';
        $params = [$id_sender , $id_receiver];
        $this->doQuery($sql , $params);
    }
    function sendMessage($data){
        $id_sender = $this->id_user;
        $id_receiver = $data['id_receiver'];
        $txt = $data['txt'];
        $is_work_msg = $data['is_work_msg'];
        $date = jdate('Y/m/d-G:i');
        $sql = 'insert into tbl_message (id_sender , id_receiver , txt , date , work_type) values (?,?,?,?,?)';
        $params = [$id_sender , $id_receiver , $txt , $date , $is_work_msg];
        $this->doQuery($sql , $params);
        return 1;
    }

    function getUserPoemsTitle($id_user){
        $sql = 'select * from tbl_poem where id_user=?';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);
        return $result;
    }

    function setWorkMessage($data){
        $type = $data['type'];
        $id_sender = $this->id_user;
        $work_type = $type;
        $date = jdate('Y/m/d-G:i');
        $txt = $data['txt'];
        $price = $data['price'];
        $id_receiver = $data['id_receiver'];
        if (isset($data['poems'])) {
            $poems = $data['poems'];
            $poems = join(',', $poems);
        } else {
            $poems = '';
        }

        $sql = 'insert into tbl_message (id_sender , id_receiver , txt , date , work_type , price , poems) values (?,?,?,?,?,?,?)';
        $params = [$id_sender , $id_receiver , $txt , $date , $work_type , $price , $poems];
        $this->doQuery($sql , $params);
        return 1;
    }

    function selectedPoemsTitle($data){

        $poems_id_array = $data['poems_array'];

        $sql = 'select * from tbl_poem';
        $result = $this->doSelect($sql);

        $selected_poems_info = [];

        foreach ($poems_id_array as $row){
            foreach ($result as $row2){
                $title = $row2['title'];
                $id_poem = $row2['id'];
                if ($id_poem == $row){
                    $selected_poems_info[$row]['title'] = $title;
                    $selected_poems_info[$row]['id'] = $id_poem;
                }
            }
        }

        return $selected_poems_info;

    }

    function getLastId(){
        $sql2 = 'select id from tbl_message order by id desc';
        $last_id = $this->doSelect($sql2 , [] , 1);
        return $last_id;
    }

    function refuseRequest($id_message , $user_front , $txt){
        $last_id = $this->getLastId();
        $current_id = $last_id['id'] + 1;

        $id_user = $this->id_user;
        $date = jdate('Y/m/d-G:i');



        $sql = 'update tbl_message set status=-1 , id=? where id=?';
        $params = [$current_id , $id_message];
        $this->doQuery($sql , $params);

        $id = $current_id+1;
        $sql3 = 'insert into tbl_message (id , id_sender , id_receiver , txt , date , work_type) values (?,?,?,?,?,4)';
        $params3 = [$id , $id_user , $user_front , $txt , $date];
        $this->doQuery($sql3 , $params3);

        return 1;
    }

    function newPrice($data){
        $last_id = $this->getLastId();
        $current_id = $last_id['id'] + 1;

        $id_user = $this->id_user;
        $date = jdate('Y/m/d-G:i');
        $price = $data['price'];
        $id_message = $data['id_message'];
        $user_front = $data['user_front'];


        $sql = 'update tbl_message set status=8 , id=? where id=?';
        $params = [$current_id , $id_message];
        $this->doQuery($sql , $params);

        $sql4 = 'select poems,id_sender,first_sender from tbl_message where id=?';
        $param4 = [$current_id];
        $poems_array = $this->doSelect($sql4 , $param4 , 1);
        $poems = $poems_array['poems'];
        $sender = $poems_array['id_sender'];
        $parent = $poems_array['parent'];

        if ($parent == 0){
            $id_sender = $sender;
        } else {
            $id_sender = $parent;
        }


        $id = $current_id+1;
        $sql3 = 'insert into tbl_message (id , id_sender , id_receiver , date , work_type , price , poems , first_sender) values (?,?,?,?,5,?,?,?)';
        $params3 = [$id , $id_user , $user_front , $date , $price , $poems , $id_sender];
        $this->doQuery($sql3 , $params3);

        return 1;
    }

    function acceptRequest($id_message , $user_front , $txt){
        $last_id = $this->getLastId();
        $current_id = $last_id['id'] + 1;

        $id_user = $this->id_user;
        $date = jdate('Y/m/d-G:i');

        $sql = 'update tbl_message set status=1 , id=? where id=?';
        $params = [$current_id , $id_message];
        $this->doQuery($sql , $params);

        $id = $current_id+1;
        $sql3 = 'insert into tbl_message (id , id_sender , id_receiver , txt , date , work_type) values (?,?,?,?,?,6)';
        $params3 = [$id , $id_user , $user_front , $txt , $date];
        $this->doQuery($sql3 , $params3);

        return 1;
    }

    function getUserDashboardInfo(){

        $id_user = $this->id_user;

        $sql2 = 'select tbl_comment.* , tbl_user.family
        from tbl_comment
        LEFT JOIN tbl_user ON tbl_comment.id_user = tbl_user.id
        ';
        $all_comments = $this->doSelect($sql2);

        $sql = 'select tbl_poem.* , tbl_category_poem.title as title_category
        from tbl_poem
        LEFT JOIN tbl_category_poem ON tbl_category_poem.id = tbl_poem.id_category
        where id_user=?
        order by id desc ';
        $param = [$id_user];
        $poems = $this->doSelect($sql , $param);

        /*//*/


        foreach ($all_comments as $key=>$comment){
            $id_poem = $comment['id_poem'];
            foreach ($poems as $poem){
                $id_receiver_comment = $poem['id_user'];
                $id_poem2 = $poem['id'];
                if ($id_poem == $id_poem2){
                    $all_comments[$key]['id_receiver'] = $id_receiver_comment;
                }
            }
        }

        $all_comments_number = 0;
        $all_sent_comments = 0;
        foreach ($all_comments as $comment){
            if (@$comment['id_receiver'] == $id_user){
                $all_comments_number++;
            }
            if ($comment['id_user'] == $id_user){
                $all_sent_comments++;
            }
        }


        /*//*/

        $max_like = $poems[0]['likes'];
        $max_view = $poems[0]['view'];

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


        $confirmed_poems = 0;
        $unconfirmed_poems = 0;
        $waiting_poems = 0;
        $all_likes = 0;
        $all_viewes = 0;
        foreach ($poems as $key=>$poem){
            $likes = $poem['likes'];
            $view = $poem['view'];
            $confirmed = $poem['confrim'];
            $all_likes += $likes;
            $all_viewes += $view;

            if ($confirmed == 1){
                $confirmed_poems++;
            }
            if ($confirmed == 0){
                $waiting_poems++;
            }
            if ($confirmed == -1){
                $unconfirmed_poems++;
            }
            if ($likes >= $max_like){
                $max_like = $likes;
            }
            if ($view >= $max_view){
                $max_view = $view;
            }
        }


        $max_like_poems = [];
        $max_view_poems = [];
        foreach ($poems as $key=>$poem){
            $likes2 = $poem['likes'];
            $view2 = $poem['view'];

            if ($likes2 == $max_like and $max_like>0){
                array_push($max_like_poems , $poem['title']);
            }

            if ($view2 == $max_view and $max_view>0) {
                array_push($max_view_poems, $poem['title']);
            }


        }

        $last_poem = $poems[0];
        $comments_number = 0;
        $id_poem = $last_poem['id'];
        foreach ($all_comments as $comment){
            $id_poem2 = $comment['id_poem'];
            if ($id_poem == $id_poem2){
                $comments_number = $comments_number + 1;
            }
        }
        $last_poem['commentsNumber'] = $comments_number;




        $poems_number = sizeof($poems);

        $userInfo['poems_number'] = $poems_number;
        $userInfo['max_likes'] = $max_like_poems;
        $userInfo['max_view'] = $max_view_poems;
        $userInfo['all_comments_number'] = $all_comments_number;
        $userInfo['all_sent_comments'] = $all_sent_comments;
        $userInfo['all_likes'] = $all_likes;
        $userInfo['all_viewes'] = $all_viewes;
        $userInfo['last_poem'] = $last_poem;
        $userInfo['confirmed'] = $confirmed_poems;
        $userInfo['unconfirmed'] = $unconfirmed_poems;
        $userInfo['waiting'] = $waiting_poems;

        return $userInfo;
    }

    function addArt($data  /*$file*/){

        $id_user = $this->id_user;
        $type = $data['type'];
        @$title = $data['title'];
        if (!isset($data['title'])){
            $title = '';
        }
        @$author = $data['author'];
        if (!isset($data['author'])){
            $author = '';
        }
        @$publisher = $data['publisher'];
        if (!isset($data['publisher'])){
            $publisher = '';
        }
        @$pages = $data['pages'];
        if (!isset($data['pages'])){
            $pages = '';
        }
        @$isbn = $data['isbn'];
        if (!isset($data['isbn'])){
            $isbn = '';
        }
        @$publish_number = $data['publish-number'];
        if (!isset($data['publish-number'])){
            $publish_number = '';
        }
        @$year = $data['year'];
        @$singer = $data['singer'];
        if (!isset($data['singer'])){
            $singer = '';
        }
        @$poet = $data['poet'];
        if (!isset($data['poet'])){
            $poet = '';
        }
        @$composer = $data['composer'];
        if (!isset($data['composer'])){
            $composer = '';
        }
        @$corrector = $data['corrector'];
        if (!isset($data['corrector'])){
            $corrector = '';
        }
        @$description = $data['description'];
        @$description = nl2br($description);
        if (!isset($data['description'])){
            $description = '';
        }
        @$subject = $data['subject'];
        if (!isset($data['subject'])){
            $subject = '';
        }
        @$rank = $data['rank'];
        if (!isset($data['rank'])){
            $rank = '';
        }
        @$area = $data['area'];
        if (!isset($data['area'])){
            $area = '';
        }
        @$link = $data['link'];
        if (!isset($data['link'])){
            $link = '';
        }
        @$file = $data['image'];
        if (!isset($data['image'])){
            $file = '';
        }

        $image_array_1 = explode(';' , $file);

        $image_array_2 = explode(',' , $image_array_1[1]);

        $file = base64_decode($image_array_2[1]);

        $isUploadOK = 1;

        $info = getimagesizefromstring($file);

        $imgType = $info['mime'];

        $imgTypeArray = explode('/' , $imgType);

        $ext = $imgTypeArray[1];

        if ($imgType != 'image/png' and $imgType != 'image/jpg' and $imgType != 'image/gif' and $imgType != 'image/jpeg'){
            $isUploadOK = 0;
            $msg = 'type-error';
        }

        /*//*/

        if ($isUploadOK == 1) {

            $imageName = time() . '.' . $ext;

            $imagePath = 'public/images/users/' . $id_user . '/art/' . $imageName;

            if (!file_exists('public/images/users/'.$id_user.'/art')) {
                mkdir('public/images/users/' . $id_user . '/art');
            }

            file_put_contents($imagePath, $file);

            $this->create_thumbnail($imagePath , $imagePath , 140 , 180 );



            $sql = 'insert into tbl_art (id_user , type , title , author , publisher , pages , isbn , publish_number , year , img , singer , poet , composer , corrector , description , subject , rank , area , link) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $params = [$id_user, $type, $title, $author, $publisher, $pages, $isbn, $publish_number, $year, $imageName, $singer, $poet, $composer, $corrector, $description, $subject, $rank, $area , $link];

            $this->doQuery($sql , $params);
            $msg = 1;

        }

        return $msg;

        /*//*/
    }

    function getArt(){
        $id_user = $this->id_user;
        $sql = 'select * from tbl_art where id_user=? order by id desc';
        $param = [$id_user];
        $result = $this->doSelect($sql , $param);
        return $result;
    }

    function updateAvatar($data){

        $id_user = $this->id_user;
        @$file = $data['img'];


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

            $imagePath = 'public/images/users/' . $id_user . '/user_update.jpg';

            file_put_contents($imagePath, $file);

            $this->create_thumbnail($imagePath , $imagePath , 150 , 150 );

            $msg = 1;

        }

        return $msg;

    }

    function deleteAvatar($type_image){

        $id_user = $this->id_user;

        if ($type_image == 1){
            $FileName = 'public/images/users/'.$id_user.'/user_64.jpg';
        } elseif ($type_image == 2){
            $FileName = 'public/images/users/'.$id_user.'/user_update.jpg';
        }

        $FileHandle = fopen($FileName, 'w') or die("can't open file");
        fclose($FileHandle);

        unlink($FileName);
        return 1;

    }

    function editUserInfo($data){

        $id_user = $this->id_user;
        $field = $data['field'];

        if ($field == 'mobile'){
            $mobile = $data['mobile'];
            $sql = "update tbl_user set mobile=? where id=?";
            $params = [$mobile , $id_user];

        }
        if ($field == 'city'){
            $city = $data['city'];
            $state = $data['state'];
            $sql = "update tbl_user set state=? , city=? where id=?";
            $params = [$state , $city , $id_user];
        }
        if ($field == 'gender'){
            $gender = $data['gender'];
            $sql = "update tbl_user set gender=? where id=?";
            $params = [$gender , $id_user];
        }
        if ($field == 'birthday'){
            $birthday = $data['year1'].'/'.$data['month1'].'/'.$data['day1'];
            $sql = "update tbl_user set birthday=? where id=?";
            $params = [$birthday , $id_user];
        }
        $this->doQuery($sql , $params);

        return 1;

    }

    function editUserInfoConfirm($data){

        $tbl = 'tbl_user';


        $field = $data['field'];

        $id_user = $this->id_user;

        if ($field == 'family'){
            $str = 'value_varchar';
            $value = $data['family'];
        }
        if ($field == 'user_type'){
            $str = 'value_int';
            $value = $data['type'];
            $field = 'type';
        }
        if ($field == 'job'){
            $str = 'value_varchar';
            $value = $data['job'];
        }
        if ($field == 'edu'){
            $str = 'value_varchar';
            $value = $data['edu'];
        }
        if ($field == 'description'){
            $str = 'value_text';
            $value = $data['description'];
        }



        $sql = "insert into tbl_edit (tbl , field , ". $str ." , id_user) values (?,?,?,?)";
        $params = [$tbl , $field , $value , $id_user];
        $this->doQuery($sql , $params);

        return 1;

    }

    function getNotConfirmEdits(){

        $id_user = $this->id_user;
        $tbl = 'tbl_user';

        $sql = 'select * from tbl_edit where tbl=? and id_user=? order by id desc';
        $params = [$tbl , $id_user];
        $result = $this->doSelect($sql , $params);

        // family field

        $family = '';
        $type = '';
        $job = '';
        $edu = '';
        $description = '';

        foreach ($result as $row){
            $field = $row['field'];
            $confirm = $row['confirm'];
            if ($field == 'family' and $family == '' and $confirm == 0){
                $family = $row['value_varchar'];
            }
            if ($field == 'type' and $type == '' and $confirm == 0){
                $type = $row['value_int'];
            }
            if ($field == 'job' and $job == '' and $confirm == 0){
                $job = $row['value_varchar'];
            }
            if ($field == 'edu' and $edu == '' and $confirm == 0){
                $edu = $row['value_varchar'];
            }
            if ($field == 'description' and $description == '' and $confirm == 0){
                $description = $row['value_text'];
            }
        }

        $total_result = ['family'=>$family , 'type'=>$type , 'job'=>$job , 'edu'=>$edu , 'description'=>$description];

        return $total_result;
    }

}

?>