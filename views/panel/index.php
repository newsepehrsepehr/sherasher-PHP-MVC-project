<link rel="stylesheet" type="text/css" href="public/Croppie/croppie.css">
<script src="public/Croppie/croppie.min.js"></script>

<?php $userInfo = Model::getUserInfo(); ?>


<div class="title-panel-main">
    <div class="title-panel flex-row-4">
        <div class="user-avatar-title d-flex align-items-center">
            <img src="public/images/users/<?=$userInfo['id']?>/user_64.jpg">
            <h6 class="mr-2 align-self-end"><?=$userInfo['family']?></h6>
            <span class="badge badge-light align-self-end mb-2 mr-1"><?php if ($userInfo['type'] == 1){echo 'شاعر';} else if ($userInfo['type'] == 2){echo 'خواننده';} else if ($userInfo['type'] == 3){echo 'شاعر و خواننده';} ?></span>
        </div>

        <div class="btn-bar-profile min-tabs">
            <ul class="ul-panel-items" style="height: 45px">
                <li style="min-width: unset; width: 60px; border-right: 2px solid rgba(0,0,0,.2)" id="tab1" class="li-tabs h-100"><i class="fas fa-home"></i></li>
                <li style="min-width: unset; width: 60px;" id="tab2" class="li-tabs h-100"><i class="fas fa-book-open"></i></li>
                <li style="min-width: unset; width: 60px;" id="tab3" class="li-tabs h-100"><i class="fas fa-envelope"></i></li>
                <li style="display: none" id="tab4" class="li-tabs h-100"></li>
                <li style="min-width: unset; width: 60px" id="tab5" class="li-tabs h-100"><i class="fas fa-award"></i></li>
                <li style="min-width: unset; width: 60px" id="tab6" class="li-tabs h-100"><i class="fas fa-user"></i></li>
                <li style="display: none" id="tab7" class="li-tabs h-100"></li>
                <li style="display: none" id="tab8" class="li-tabs h-100"></li>
            </ul>
        </div>

        <div class="btn-bar-profile d-flex align-self-start">
            <i class="fas fa-sign-out-alt icon-profile-header2 fs1 mx-2"></i>
            <a href="changepassword" class="icon-profile-header2 fas fa-key fs1 mx-2"></a>
        </div>
    </div>
</div>

<!--content-->
<div id="content" class="flex-row" style="position: relative">
   <?php require ('tabs.php')?>
</div>

<div class="dark-window"></div>
<div class="light-window"></div>



<script>

    $('.main-title-bar').css('display' , 'none');
    $('.logged-in-header').css('display' , 'none');

    $(window).scroll(function() {
        if ($(this).scrollTop() > 180){
            $('.main-title-bar').css('display' , 'block');
            $('.messages-titlebar').addClass('scroll');
            $('.fixed-poems-title').addClass('scroll');
            $('.title-panel-main').addClass('scroll');
            $('.min-tabs').addClass('scroll');
        }
        else{
            $('.main-title-bar').css('display' , 'none');
            $('.messages-titlebar').removeClass('scroll');
            $('.fixed-poems-title').removeClass('scroll');
            $('.title-panel-main').removeClass('scroll');
            $('.min-tabs').removeClass('scroll');
        }
    });

</script>