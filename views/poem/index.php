<?php
$poems = $data['poems'][0];
$userInfo = $data['poems'][1];
$arts = $data['poems'][2];
$id_poem = $data['id_poem'];
if ($id_poem != ''){
    $target_poem = $id_poem;
}

$type = $userInfo['type'];
if ($type == 1){
    $user_type = 'شاعر';
} else if ($type == 2){
    $user_type = 'خواننده';
} else if ($type == 3){
    $user_type = 'شاعر و خواننده';
}
?>

<div class="poem flex-row-stretch-6">
    <div class="sidebar-right-poem">
        <div class="user-info-preview flex-col-stretch-8">

            <table class="table rounded text-dark mb-0 mt-3">
                <tbody>


                <tr>
                    <td>تعداد اشعار دفتر شعر</td>
                    <td><?=$userInfo['poems_number']?> شعر</td>
                </tr>
                    <tr>
                        <td>جدیدترین شعر</td>
                        <td>«<?=$poems[0]['title']?>»</td>
                    </tr>
                    <tr>
                        <td>محبوب ترین شعر</td>
                    </tr>
                <?php foreach ($userInfo['max_likes'] as $poem){ ?>
                    <tr>
                        <td>«<?=$poem?>»</td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>پربازدیدترین شعر</td>
                </tr>
                <?php foreach ($userInfo['max_view'] as $poem){ ?>
                    <tr>
                        <td>«<?=$poem?>»</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>

        <div class="user-info-preview flex-col-stretch-8 poems-title-container">

            <div class="poems-title flex-row-5 bg-secondary">
                <span>دفتر شعر</span>
                <span style="margin-right: 4px">«<?=$userInfo['family']?>»</span>
            </div>
            <ul class="ul-poems-title">
                <?php
                $i = $userInfo['poems_number'];
                foreach ($poems as $row) { ?>
                <li class="d-flex align-items-center text-dark li-poem" id="p<?=$row['id'];?>" data-id="<?=$row['id'];?>" data-id-user="<?=$userInfo['id_user']?>"><span style="margin-left: 8px"><?=$i;?>)</span><h6 class="mb-0"><?=$row['title']?></h6></li>
                <?php $i--; } ?>
            </ul>

        </div>


            </div>

    <div class="main-poem-container text-dark" style="width: 100%; height: 100%; position: relative">

        <div class="loader-container">
        <div class="loader2 book">
            <figure class="page2"></figure>
            <figure class="page2"></figure>
            <figure class="page2"></figure>
        </div>

        <h1 class="txt-loader fs1">شعر</h1>
        </div>

    <?php foreach ($poems as $row){
        $full_date = $row['date'];
        $full_date = explode('-' , $full_date);
        $date = $full_date[0];
        $time = $full_date[1];
        ?>
<div class="content-container">
    <div class="content-poem flex-col-stretch-8" data-id="<?=$row['id']?>" data-id-user="<?=$row['id_user']?>">
        <div class="title-poem-user flex-col-8">

            <div style="background: #021815;" class="title2-poem-preview flex-row used-title-poem text-dark">
                <div class="flex-row" style="align-items: center">
                    <span>بازدیدها</span>
                    <span class="circle-counter"><?=$row['view']?></span>
                    <span>نظرات</span>
                    <span style="background: rgba(180,78,81,0.68)" class="circle-counter"><?=$row['commentsNumber']?></span>
                    <span>پسند ها</span>
                    <span style="background: rgba(41,83,41,0.81)" class="circle-counter"><?=$row['likes']?></span>
                </div>
                <div class="flex-row" style="align-items: center; justify-content: flex-end">
                            <span style="margin-left: 15px">تاریخ انتشار:
                                <?=$date?>
                            </span>
                    <span>ساعت <?=$time?></span>
                </div>
            </div>

            <div class="title-poem2 flex-col-6">
                <h5><?=$row['title']?></h5>
            </div>

            <div class="poem-content">
                <p>
                    <?=$row['txt']?>
                </p>

                <hr>
                <span class="text-secondary fs0-85">توضیحات اضافه:</span>

                <span class="txt-description-poem text-secondary"><?=$row['description']?></span>
            </div>

            <span class="comments-title-bar">
                <span>
                نظرات کاربران
                    </span>
            </span>

            <?php $comments = $row['poems_comments'];
            foreach ($comments as $comment){
                $full_date2 = $comment['date'];
                $full_date2 = explode('-' , $full_date2);
                $date2 = $full_date2[0];
                $time2 = $full_date2[1];
            ?>

            <div id="<?=$comment['id']?>" class="comments-poem flex-col-5" data-id-user="<?=$comment['id_user']?>" data-id-parent="<?=$comment['parent']?>" data-id-poem="<?=$comment['id_poem']?>">
                <span class="comment-item flex-col-stretch-8">
                    <span class="top-comment flex-row-space-between-64 text-white">
                        <span class="right flex-row-6">
                            <img src="public/images/users/<?=$comment['id_user']?>/user_64.jpg">
                            <h6><?=$comment['family']?></h6>
                        </span>
                        <span class="left flex-row-4">
                            <span>ساعت <?=$time2?></span>
                            <span style="margin-left: 15px"><?=$date2?></span>
                        </span>
                    </span>
                    <span class="bottom-comment flex-col-6">
                        <p><?=$comment['txt']?></p>
                    </span>

                    <span class="rectangle-answer-comment">پاسخ به این نظر</span>
                </span>

                <div class="answer-slide-down">
                <span class="answer-comment-container flex-col-stretch-8">
                    <textarea class="txt-answer-comment autosize"></textarea>
                    <span class="btn-send-comment-answer">ارسال پاسخ</span>
                </span>
                </div>

                <?php if ($comment['parent'] != 0){ ?>
                <a class="is-answer flex-col-8" href="#<?=$comment['parent']?>">
                    <span class="flex-row-4">
                    <i class="fas fa-reply"></i>
                <span style="margin-left: 4px">در پاسخ</span>
                        </span>
                <span class="txt-family-parent" style="margin-top: 6px"><?=$comment['parent_family']?></span>
                </a>
                <?php } ?>


            </div>

            <?php } ?>

            <div class="insert-comment">
                <span class="btn btn-success btn-sm btn-add-comment mb-4">ارسال نظر</span>
                <textarea class="form-control txt-send-message p-4 h-100 txt-comment autosize" rows="5" id="comment" name="text" placeholder="نوشتن نظر"></textarea>
            </div>

        </div>
    </div>
</div>
    <?php } ?>
    </div>

    <div class="sidebar-left-poem">
        <div class="user-info-preview flex-col-stretch-8">
                <span class="user-type-label"><?=$user_type?></span>
                <div class="row1-user-info flex-row-6">
                    <img class="img-user-info" src="public/images/users/<?=$userInfo['id']?>/user_64.jpg">
                    <span class="flex-col-8">
                    <span class="family-user-info text-dark"><?=$userInfo['family']?></span>
                </span>
                </div>
            <table class="table rounded text-dark mb-0 mt-3">
                <tbody>
                <tr>
                    <td>آخرین بازدید</td>
                    <td style="color: <?php if ($userInfo['lastseen2'] == 'آنلاین'){echo 'green';}?>"><?=$userInfo['lastseen2']?></td>
                </tr>
                <tr>
                    <td>استان</td>
                    <td><?=$userInfo['state']?></td>
                </tr>
                <tr>
                    <td>شهر</td>
                    <td><?=$userInfo['city']?></td>
                </tr>
                <?php if ($userInfo['gender'] != ''){ ?>
                <tr>
                    <td>جنسیت</td>
                    <td><?php if($userInfo['gender'] == 1){echo 'مرد';} elseif ($userInfo['gender'] == 0){echo 'زن';}?></td>
                </tr>
                <?php } ?>
                <?php if ($userInfo['job'] != ''){ ?>
                <tr>
                    <td>شغل</td>
                    <td><?=$userInfo['job']?></td>
                </tr>
                <?php } ?>
                <?php if ($userInfo['edu'] != ''){ ?>
                <tr>
                    <td>تحصیلات</td>
                    <td><?=$userInfo['edu']?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>تاریخ ثبت نام</td>
                    <td><?=$userInfo['register_date']?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="user-info-preview flex-col-stretch-8 mt-2">
            <div class="row1-user-info flex-row-6 mb-4 text-white mt-1 bg-secondary p-2">
                <span>سوابق هنری</span>
                <i class="fas fa-award fs1-2 mr-2"></i>
            </div>
            <table class="table rounded text-dark mb-0">
                <tbody>
                <?php $i=sizeof($arts);
                foreach ($arts as $art){ ?>
                <tr class="cursor-pointer">
                    <td><?=$i?></td>
                    <td class="d-flex"><span class="ml-2"><?php if ($art['type'] == 1){echo 'کتاب';} elseif($art['type'] == 2){echo 'موسیقی';} elseif ($art['type'] == 3){echo 'مقام '.$art['rank'];} ?></span><?=$art['title']?></td>
                </tr>
                <?php $i--; } ?>
                </tbody>
            </table>
        </div>

    </div>

        </div>



<script>




    /*sessionStorage.removeItem('scroll');*/

    $(document).ready(function () {

        $('#<?=$id_poem?>').trigger('click');

        /*setTimeout(function(){ $('#'+sessionStorage.getItem('poem10')).click()}, 100);*/





    $('.ul-poems-title li').click(function () {

        var poemId = $(this).attr('data-id');
        var poemTitle = $(this).find('h6').text();
        var userId = $(this).attr('data-id-user');

        $('.ul-poems-title li').removeClass('active');
        $(this).addClass('active');

        var url = 'poem/setViewedComments'+poemId;
        var data = {};
        $.post(url , data , function (msg) {

        })

        window.history.pushState({}, "", 'poem/index/'+userId+'/p'+poemId);



        if (sessionStorage.getItem('scroll') == 1) {
            setTimeout(function () {
                $('html, body').animate({
                    scrollTop: $('.comments-poem:last').offset().top
                }, 1000);

                $('.comments-poem:last').find('.comment-item').addClass('new');
                setTimeout(function () {
                    $('.comments-poem:last').find('.comment-item').removeClass('new' , 1500);
                },3000)

            }, 4000);

            sessionStorage.setItem('scroll' , 0)
        }


        sessionStorage.setItem('poem10' , $(this).prop('id'));


        $('.content-container').fadeOut(600);
        $('html').animate({scrollTop : '120'} , 'slow' );
        $('.content-poem').each(function () {
            var poemId2 = $(this).attr('data-id');

            if (poemId2 == poemId){
                $('.loader-container').fadeIn(200);
                $('.txt-loader').text('شعر«'+poemTitle+'»');
                    $(this).parent().delay(2500).fadeIn(1000);
                    $('.loader-container').delay(2500).fadeOut(200);


            }

        })
    })

    $('.rectangle-answer-comment').click(function () {
        var parentId = $(this).parents('.comments-poem').attr('id');
        var answer = $(this).parents('.comments-poem').find('.answer-slide-down');
        var poemId = $(this).parents('.comments-poem').attr('data-id-poem');
        var frontUserId = $(this).parents('.comments-poem').attr('data-id-user');

        if ($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.rectangle-answer-comment').text('پاسخ به این نظر')
            $('.answer-slide-down').slideUp(600)
        } else {
            $(this).addClass('active');
            $('.rectangle-answer-comment').text('پاسخ به این نظر')
            $(this).text('لغو پاسخ');
            $('.answer-slide-down').slideUp(260);
            answer.slideDown(800);
        }

        $('.btn-send-comment-answer').click(function () {
            var txtMsg = $(this).parents('.answer-comment-container').find('.txt-answer-comment').val().replace(/\n/g, "<br />");

            var url = 'poem/addAnswer';
            var data = {'parent':parentId , 'txt':txtMsg , 'id_poem':poemId , 'front_user':frontUserId};
            console.log(txtMsg)
            $.post(url , data , function (msg) {
                console.log(msg)
                if (msg == 1){
                    alertShowLogin('پاسخ شما با موفقیت ثبت شد');
                    sessionStorage.setItem('scroll' , 1);

                    setTimeout(function () {
                        window.location.reload();
                    },6000)
                }
            })
        })



    })

    $('.btn-add-comment').click(function () {
        var txtMsg = $(this).parents('.insert-comment').find('.txt-comment').val().replace(/\n/g, "<br />");
        var poemId = $(this).parents('.content-poem').attr('data-id');
        var parentId = 0;
        var frontUserId = $(this).parents('.content-poem').attr('data-id-user');
        console.log(txtMsg);
        console.log(poemId);
        var url = 'poem/addComment';
        var data = {'parent':parentId , 'txt':txtMsg , 'id_poem':poemId , 'front_user':frontUserId};
        $.post(url , data , function (msg) {
            console.log(msg);
            if (msg == 1){
                showNotification('نظر شما با موفقیت ثبت شد')
                sessionStorage.setItem('scroll' , 1);

                setTimeout(function () {
                    window.location.reload();
                },3500)
            }
        })
    })

    /*textarea autosize*/

    $('.autosize').gTextAreaAutoSize();

    /*//*/

    })



</script>
