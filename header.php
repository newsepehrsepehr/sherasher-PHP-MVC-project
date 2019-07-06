<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <base href="<?= URL ?>">
    <!--import-->
    <link rel="stylesheet" type="text/css" href="public/css1/styles.css">
    <link rel="stylesheet" type="text/css" href="public/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/scrollBar/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="public/css2/flipTimer.css">

    <script src="public/js2/jquery-3.3.1.min.js"></script>
    <script src="public/js2/jquery.hoverIntent.js"></script>
    <script src="public/js1/myJS.js"></script>
    <script src="public/bootstrap/bootstrap.js"></script>
    <script src="public/js2/jquery-ui.min.js"></script>
    <script src="public/bootstrap/popper.js"></script>
    <script src="public/scrollBar/jquery.mCustomScrollbar.js"></script>
    <script src="public/jquery/jquery.flipTimer.js"></script>


</head>
<body class="body" style="overflow-y: scroll; overflow-x: hidden;">

<style>
</style>

<?php
$scrollNews = Model::getScrollNews();

$userInfo = Model::getUserInfo();

$userAlerts = Model::getAlertUser();
$message_nember = $userAlerts[0];
$comment_number = $userAlerts[1];
$comments = $userAlerts[2];
$messages = $userAlerts[3];

$word_challenge = Model::getUserChallengeWord();
$words = $word_challenge[0];
$time_end = $word_challenge[1];
$isCanceled = $word_challenge[2];

?>




<!--header-->
<header id="main-header">

    <div class="main-title-bar">


        <div class="main-title-bar-limiter">

            <?php
            if (Model::$logged_in == 1){
            ?>
<script>

    /*set last seen*/

    function realTime() {
        var time = 0;
        function keepChecking() {
            setTimeout(keepChecking , 8000);
            if (time == 1){
                var url = 'index/setlastseen'
                var data = {};
                $.post(url , data , function (msg) {
                    time = 0;
                })
            }
            if (time == 10){
                time = 0;
            }
            time++;
        }
        keepChecking();
    }
    realTime();

    /*//*/


</script>
            <div class="logged-in-header scroll flex-row">

                <span class="alert alert-login">
    <span class="alert-txt alert-txt-login"></span>
</span>

                <div class="user-notebook">
                    <span onclick="filterNotebook(10)" class="select-type-notebook click" style="top: 20px">همه</span>
                    <span onclick="filterNotebook(1)" class="select-type-notebook">اشعار</span>
                    <span onclick="filterNotebook(2)" class="select-type-notebook" style="top: 100px">نوشته ها</span>
                    <div class="title-notebook">
                        یادداشت ها
                    </div>
                    <br>
                    <ul class="list-group notebook-limiter" id="list-notebook">

                    </ul>
                </div>

                <div class="user-header flex-row-space-between-46">



                    <div class="user-header-left">
                    <span class="user-info flex-row-4">
                        <img src="public/images/users/<?=$userInfo['id']?>/user_64.jpg">
                        <h6><?=$userInfo['family']?></h6>
                            <a href="panel" class="icon-profile-header" style="background: url(public/images/icon/icon32.png) 0 -296px"></a>
                            <a href="panel/index/messages" class="icon-profile-header" style="background: url(public/images/icon/icon32.png) 0 -329px"></a>
                            <i class="fas fa-sticky-note fs1 mx-2 icon-profile-header2 icon-notebook"></i>
                            <a class="icon-profile-header btn-signout" style="background: url(public/images/icon/icon32.png) 0 -359px"></a>
                    </span>
                    </div>

                    <?php if ($isCanceled == 0){ ?>

                    <div class="flipTimer flipTimer-challenge position-relative" style="direction: ltr; display: block!important;">
                        <div class="minutes"></div>
                        <div class="seconds"></div>
                        <p class="txt-fliptimer position-absolute">زمان باقی مانده شما در چالش بداهه با کلمات</p>
                    </div>

                    <?php }
            ?>


                    <div class="user-header-right">
                        <div class="header-poem-wrapper" style="width: 0%; height: 120%; overflow: hidden; position: absolute; top: 0; right: 0;">
                            <img src="public/images/image/poem.svg" style="height: 100%; opacity: .11; margin-right: 25px">
                        </div>
                    <span class="alert-user flex-row-6">

                        <span class="circle-alert <?php if ($message_nember > 0 or $comment_number > 0){echo 'active';} ?>"></span>
                        <?php if ($message_nember > 0 or $comment_number >0){ ?>

                            <h5 style="margin-right: 6px" class="flex-row-6">شما </h5>
                            <?php if ($message_nember > 0){ ?>
                            <h5 class="flex-row-6">
                            <p><?=$message_nember?></p>
                            پیام خصوصی
                            </h5>
                                <?php } ?>
                                <?php if ($comment_number > 0 and $message_nember > 0){ ?>
                        <h5 class="flex-row-6">
                            و
                        </h5>
                        <?php } ?>
                        <?php if ($comment_number > 0){ ?>
                        <h5 class="flex-row-6">
                            <p><?=$comment_number?></p>
                            نظر
                            </h5>
                            <?php } ?>
                            <h5 class="flex-row-6">
                                تازه
                            </h5>
                        <h5 class="flex-row-6">
                            دارید
                            </h5>
                        <span class="btn-show-alert-user"></span>

                        <?php } ?>

                        <span class="preview-alert-show-container">
                        <span class="preview-alert-show">
                            <ul class="ul-preview-alert flex-col-stretch-8">
                                <?php foreach ($messages as $row){ ?>
                                <li data-id-sender="<?=$row['id_sender']?>" class="li-message-alert flex-row-6"><a><a style="margin: 0 2px 0 6px" class="message-counter-2">1</a> پیام خصوصی جدید از
                                    <?=$row['family']?>
                                    </a>
                                <a href="panel/index/messages/<?=$row['id_sender']?>" class="alert-link"></a>
                                </li>
                                <?php } ?>
                                <?php foreach ($comments as $comment){ ?>
                                <li data-id-poem="<?=$comment['id_poem']?>" class="li-comment-alert flex-row-6"><a><a style="margin: 0 2px 0 6px" class="message-counter-2">1</a> نظر تازه برای شعر «<?=$comment['title']?>»</a>
                                <a href="panel/index/poems/<?=$comment['id_poem']?>" class="alert-link"></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </span>
                            </span>

                    </span>
                    </div>
                </div>

                <?php
                    if ($isCanceled == 0) { ?>

                        <form class="challenge-row-header position-absolute" action="index/setChallengeWord" method="post" style="display: block">
                            <div class="container p-4">
                                <span>لطفا قبل از تموم شدن زمان، یک یا دو بیت شعر بگین که شامل کلمات زیر باشه و اون رو همینجا ثبت کنید</span>
                                <div class="d-flex mt-4 mb-4 words-for-challenge">
                                    <?php foreach ($words as $word) { ?>
                                        <span class="badge badge-dark fs0-9 mr-2"><?= $word ?></span>
                                    <?php } ?>
                                </div>
                                <textarea class="form-control" rows="3" name="txt"></textarea>
                                <button class="btn btn-sm btn-success mt-2">ثبت شعر</button>
                                <span class="btn btn-sm btn-danger mt-2 btn-cancel-challenge">انصراف از چالش</span>
                                <div class="confirm-cancel-challenge">
                                    <span class="mt-2 fs1">در صورت انصراف، دیگر نمی توانید در این چالش شرکت کنید</span>
                                    <span class="btn btn-sm btn-warning fs0-9 cursor-pointer mt-3">مهم نیست، انصراف میدم</span>
                                    <span class="btn btn-sm btn-warning fs0-9 cursor-pointer mt-3">انصراف میدم، در مورد کلمات به من جفا شده</span>
                                </div>
                            </div>
                            <i class="fas fa-minus-square btn-expand"></i>
                        </form>

                    <?php }
                ?>
            </div>


            <?php } else { ?>

                <div class="logged-in-header flex-row">

                <span class="alert alert-login">
    <span class="alert-txt alert-txt-login"></span>
</span>

                    <div class="user-header flex-row-space-between-46">

                        <div class="header-poem-wrapper" style="width: 0%; height: 120%; overflow: hidden; position: absolute; top: 0; right: 0;">
                        <img src="public/images/image/poem.svg" style="height: 100%; opacity: .11">
                        </div>

                        <div class="user-header-left">
                    <span class="user-info flex-row-4">
                        <span class="img-guest" style="background: url(public/images/icon/icon54.png) 0 -325px"></span>
                        <h6>کاربر مهمان</h6>

                        <a href="register2" class="register-btn" style="margin-left: 20px; cursor: pointer">ثبت نام کنید</a>
                        <span class="login-btn" style="margin-left: 8px; cursor: pointer" data-toggle="modal" data-target="#myModal">وارد شوید،</span>
                    </span>
                        </div>
                        <div class="user-header-right">
                        </div>
                    </div>

                </div>


            <?php } ?>
        </div>
    </div>

    <div class="nav-wrapper">
        <div class="main-nav-limiter">
            <nav class="main-nav">

                <ul class="ul-nav-menu flex-row">
                    <li class="li-menu flex-center">
                        <a href="index">صفحه اصلی</a>
                    </li >
                    <li class="li-menu flex-center">
                        <a>چالش های ادبی</a>
                        <div class="menu-drop-down2">
                            <div class="d-flex menu-limiter">
                                <ul>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-row-6 justify-content-between px-2 menu2-item">
                                            چالش های در حال برگزاری
                                        </a>
                                    </li>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-row-6 justify-content-between px-2 menu2-item">
                                            چالش های پایان یافته
                                        </a>
                                    </li>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-row-6 justify-content-between px-2 menu2-item">
                                            برگزیدگان چالش ها
                                        </a>
                                    </li>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-row-6 justify-content-between px-2 menu2-item">
                                            پیشنهاد چالش جدید
                                        </a>
                                    </li>
                                </ul>
                                <div class="submenu-container">
                                <ul class="ul-submenu">
                                    <li>
                                        <a class="h-100 flex-col-6 px-2">
                                            چالش بداهه با کلمات
                                        </a>
                                    </li>
                                </ul>
                                    <ul class="ul-submenu">
                                        <li>
                                            <a class="h-100 flex-col-6 px-2">
                                                چالش دعوتی
                                            </a>
                                        </li>
                                        <li>
                                            <a class="h-100 flex-col-6 px-2">
                                                چالش شعر خوانی
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li >
                    <li class="li-menu flex-center">
                        <a href="">قراردادها</a>
                    </li >
                    <li class="li-menu flex-center">
                        <a>راهنمای سایت</a>
                        <div class="menu-drop-down2">
                            <div class="d-flex menu-limiter">
                                <ul>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-row-6 justify-content-between px-2 menu2-item">
                                            راهنمای شاعران
                                            <i class="fas fa-angle-left mr-2"></i>
                                        </a>
                                    </li>
                                    <li class="li-menu2">
                                        <a class="h-100 flex-col-6 px-2 menu2-item">
                                            رهنمای خوانندگان
                                        </a>
                                    </li>
                                </ul>
                                <div class="submenu-container">
                                    <ul class="ul-submenu">
                                        <li>
                                            <a class="h-100 flex-col-6 px-2">
                                                ثبت نام و عضویت
                                            </a>
                                        </li>
                                        <li>
                                            <a class="h-100 flex-col-6 px-2">
                                                ارسال شعر
                                            </a>
                                        </li>
                                        <li>
                                            <a class="h-100 flex-col-6 px-2">
                                                چالش شعر خوانی
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li >
                    <li class="li-menu flex-center">
                        <a>درباره ما</a>
                    </li>
                    <li class="li-menu flex-center">
                        <a>ارتباط با ما</a>
                    </li>
                </ul>
                <i class="fas fa-bars btn-expand-menu fs1-4"></i>
            </nav>
        </div>
        <div class="rotating-rectangle-container flex-center">
            <span class="rotating-rectangle"></span>
        </div>
        <div class="scroll-text-container">
            <ul class="ul-text-scroll flex-row">
                <?php foreach ($scrollNews as $row){ ?>
                <li class="li-scroll-text"><a style="color: #FFFFFF; text-decoration: none;" href="<?=$row['href']?>"><?=$row['title']?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

</header>

<div class="modal fade" id="login-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <form class="login-modal container" action="index/checklogin" method="post">
                    <i data-dismiss="modal" class="fas fa-times text-dark fs1"></i>

                    <div class="row h-100">
                        <div class="col-md-7 px-5 py-3 text-center text-secondary">

                            <h5>ورود به حساب کاربری</h5>
                            <br><hr><br>

                            <label class="float-right">ایمیل</label>
                            <input type="text" name="email" class="form-control" style="">
                            <br><br>
                            <label class="float-right">رمز عبور</label>
                            <input type="password" name="password" class="form-control" style="">

                            <br><br>

                            <div class="d-flex mb-4 justify-content-center align-items-center">
                                <img class="img-captcha" src="captcha.php">
                                <span class="btn-refresh-captcha mr-2"></span>
                            </div>

                            <label class="float-right">کد امنیتی</label>
                            <input name="cap" class="form-control mb-2" style="">

                            <label class="">مرا به خاطر بسپار</label>
                            <input value="true" name="remember" type="checkbox" class="form-control mr-1 mt-2" style="display: inline-block; width: unset; height: unset">
                            <br>
                            <span data-toggle="modal" data-target="#pass-modal" class="pass-remember cursor-pointer" data-dismiss="modal">فراموشی رمز عبور</span>
                            <br><br><br><br>
                            <span onclick="submitLoginForm();" class="btn btn-success w-100">ورود</span>

                            <input type="hidden" value="<?php echo Model::csrf_token('loginForm'); ?>" name="csrf_token" />

                        </div>
                        <div class="col-md-5">

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal text-dark" id="pass-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">فراموشی رمز عبور</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin: -1rem -1rem 0 0!important;">&times;</button>
            </div>

            <!-- Modal body -->
            <form class="modal-body form-pass-remember" method="post">
                <div class="form-group">
                    <label>ایمیل خود را وارد کنید</label>
                    <input name="email" class="form-control">
                </div>
                <div class="d-flex mb-2 mt-3 justify-content-center align-items-center">
                    <img class="img-captcha2" src="captcha.php">
                    <span class="btn-refresh-captcha2 mr-2"></span>
                </div>
                <label class="float-right">کد امنیتی</label>
                <input name="cap" class="form-control mb-2" style="">

                <input type="hidden" value="<?php echo Model::csrf_token('changePass'); ?>" name="csrf_token2" />
                <div class="form-group">
                    <p class="line-height-1-2">بعد از تایید، ایمیلی براتون ارسال میشه که با کلیک کردن روی لینک داخلش به صفحه ی تغییر رمز عبور هدایت میشید و از اونجا می تونید رمز عبور جدیدتونو تعیین کنید.</p>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-remember-pass2">تایید</button>
            </div>

        </div>
    </div>
</div>




<span class="alert-login">
    <span class="alert-txt-login">پیام شما با موفقیت ارسال شد</span>
</span>

<div class="confirm-alert">
    <span class="btn-close-confirm"></span>
    <div class="confirm-top">
        <span class="txt-confirm"></span>
    </div>
    <div class="confirm-bottom">
        <span class="btn-ok-confirm">بله</span>
        <span class="btn-cancel-confirm">خیر</span>
    </div>
</div>

<form class="login-form" action="" method="post">

</form>

<span class="btn-scroll">بالا</span>



<div style="z-index: 45" id="toast"><div id="img"></div><div style="font-size: 1rem" id="desc">A notification message..</div></div>

<div class="main-ntf">
    <div class="ntf-limiter">
        <div class="icon-ntf"><i></i></div>
        <div class="txt-ntf"><p></p></div>
        <a></a>
        <div class="btn-ntf"><i class="fas fa-times"></i></div>
    </div>
</div>

<div class="confirm-alert-c">
    <span class="btn-close-confirm btn-close-confirm-c"></span>
    <div class="confirm-top confirm-top-c">
        <span class="txt-confirm txt-confirm-c"></span>
    </div>
    <div class="text-agreement px-5">
        <p>1- این چالش از تاریخ 1397/4/4 آغاز شده و تا تاریخ 1397/4/14 ادامه داره</p>
        <p>2- هر کاربر فقط یک بار میتونه در این چالش شرکت کنه</p>
        <p>3- بعد از فشردن دکمه «بله» مسابقه شروع میشه و شما تنها 10 دقیقه فرصت دارید تا شعرتون رو آماده کنید</p>
        <p>4- چنانچه هر اتفاقی که باعث گذشتن زمانتون بشه در حین مسابقه بیفته(مثلا قطع شدن اینترنت و...) به هر حال این زمان برای شما محاسبه میشه و فرصت از دست میره پس سعی کنید که وقتی شرایط مهیاست اقدام به شرکت در چالش کنید</p>
        <p>5- بعد از این که در مسابقه شرکت کردید شعر شما به همراه زمانی که طول کشیده تا اونو ثبت کنید در صفحه اصلی سایت قرار میگیره و به رای کاربران گذاشته میشه و در نهایت اشعار به ترتیب امتیاز دریافتی از کاربران رده بندی میشن</p>
    </div>
    <p class="text-center text-warning fs1 mt-5">چالش رو شروع کنیم؟</p>
    <div class="confirm-bottom confirm-bottom-c">

        <div class="challenge-running">

        </div>

        <span class="btn-ok-confirm btn-ok-confirm-c">بله</span>
        <span class="btn-cancel-confirm btn-cancel-confirm-c">خیر</span>
    </div>
</div>

<div class="progress-refresh-page">
    <span class="progress-line">
            </span>
</div>


<script>


    function doProgress(hasBack=1 , reload2=0 , time=4000){

        var clearTime = 350;

        $('.progress-line').animate({width:'100%'} , time , function () {

            if (hasBack != 0) {
                $(this).css('float', 'right').delay().animate({width: '0%'}, clearTime, function () {
                    $(this).css('float', 'left');
                });
            }  else if (reload2 == 1){
                window.location.reload();
            } else if (hasBack == 1) {
                setTimeout(function () {
                    $('.progress-line').css('float', 'left');
                    $('.progress-line').animate({width:'0%'} , 0)
                },1500)
            } else {

            }
        })
    }

    $(document).ready(function () {

        $('.btn-remember-pass2').click(function () {

            var data = $('.form-pass-remember').serializeArray();
            var url = 'index/changepassword';
            var emailInput = $('#pass-modal').find('input[name=email]');

            $('.btn-refresh-captcha2').click(function () {
                $(this).toggleClass('active');
                $('.img-captcha2').attr("src","captcha.php?timestamp=" + new Date().getTime());
            })

            if (emailInput.val().trim() == '') {
                emailInput.val('');
                emailInput.attr("placeholder", "ایمیل را وارد کنید");
            } else {
                $.post(url, data, function (msg) {
                    console.log(msg);
                    if (msg == -1){
                        $('.img-captcha2').addClass('active');
                        $('.img-captcha2').addClass('shake');
                        setTimeout(function () {
                            $('.img-captcha2').removeClass('shake');
                            $('.img-captcha2').removeClass('active' , 2500);
                        },3500)
                    } else if (msg == 1){
                        $('#pass-modal').fadeOut(400);
                        mainNtf('ایمیل بازیابی رمز عبور برای شما ارسال شد');
                    }
                })
            }
        })

        $('.btn-expand-menu').click(function () {
            $('.nav-wrapper').toggleClass('mresponsive' , 200);
            $('.menu-limiter > ul').each(function () {
                if ($(this).is(':visible')){
                    $(this).hide()
                }
            })

        })

        var url = 'index/checkWordChallengeJoin';
        var data = {};
        $.post(url , data , function (msg) {
            var isJoinedChallenge = msg;

            if (isJoinedChallenge == 1) {

                $('.flipTimer-challenge').flipTimer({
                    direction: 'down',
                    date: '<?=$time_end?>',
                    callback: function () {
                        var url = 'index/cancelChallengeWord';
                        $.post(url, data, function (msg) {
                            $('.challenge-row-header').addClass('end');
                            $('.challenge-row-header').delay(4000).fadeOut(2500);
                            setTimeout(function () {
                                $('.challenge-row-header').remove();
                            }, 9000)
                        })
                    }
                });
            } else {
                $('.challenge-row-header').hide()
            }
        })






        $('.btn-expand').click(function () {
            $('.challenge-row-header').animate({height:'26' , width:'26'})
        })

        $('.btn-cancel-challenge').click(function () {
            $('.confirm-cancel-challenge').slideDown();
            $('.confirm-cancel-challenge .btn').click(function () {
                $('.challenge-row-header').slideUp();
                var url = 'index/cancelChallengeWord/self';
                var data = {};
                $.post(url , data , function (msg) {
                    $('.flipTimer-challenge').remove();

                })
            })
        })





        /*timer*/



        /*//*/

        /*menu*/

        $('.li-menu > a').hoverIntent({
            over: function () {
                if ($(this).parent().find('.menu-drop-down2').is(':hidden')){
                    $(this).parent().find('i').addClass('show');
                }
            }, out: function () {
                $(this).parent().find('i').removeClass('show');
            }
        })

        $('.li-menu2').each(function () {
            var liIndex = $(this).index();
            var subUl = $(this).parents('.menu-limiter').find('.submenu-container > ul').eq(liIndex);
            var appendItem = '<i class="fas fa-angle-left mr-2"></i>';
            if (subUl.length > 0){
                $(this).find('a').append(appendItem);
            }
        })

        $('.li-menu').each(function () {
            var subUl = $(this).find('ul');
            var appendItem = '<i style="z-index: 1;" class="arrow-expand-menu fas fa-sort-down text-white fs1-2"></i>';
            if (subUl.length > 0){
                $(this).append(appendItem);
            }
        })



        $('.li-menu > a').click(function () {
            $('.li-menu').removeClass('active');
            $('.li-menu').find('.menu-drop-down2').slideUp(0);
            if ($(this).parent().find('.menu-drop-down2').is(':visible')){
                $(this).parent().find('i').addClass('show');
                $(this).parent().addClass('active');
                $(this).parent().find('.menu-drop-down2').slideDown(0);
            } else {
                $(this).parent().find('i').removeClass('show');
            }

            $('.submenu-container > ul').fadeOut();
            $('.menu2-item').parent().animate({right:'0'} , 100)
            $(this).parent().find('.menu-drop-down2').slideToggle(200);
            $(this).parent().toggleClass('active');
        })

        $('.menu2-item').click(function () {
            var liIndex = $(this).parent('li').index();
            if($(this).parents('.menu-limiter').find('.submenu-container > ul').eq(liIndex).is(':visible')){

            } else{
                $('.submenu-container > ul').fadeOut(0);
                $(this).parents('.menu-limiter').find('.submenu-container > ul').eq(liIndex).fadeIn(600);
                $('.menu2-item').parent().animate({right:'0'} , 100)
                $(this).parent().animate({right:'4px'} , 100)
            }

        })

        /*//*/

        $('.btn-signout').click(function () {
            var url = 'index/signOut';
            var data = {};

            showConfirmAlert('تصمیمتون جدیه؟ واقعا می خواین خارج بشین؟');
            setTimeout(function () {
                $('.btn-ok-confirm').click(function () {
                    $.post(url , data , function (msg) {
                        if (msg == 1){
                            window.location = 'index';
                        }
                    })
                })
            },1000)



        })

        /*smooth scroll*/

        $(window).scroll(function () {
            if ($(this).scrollTop() > 650){
                $('.btn-scroll').addClass('active' , 400);
            } else {
                $('.btn-scroll').removeClass('active' , 400)
            }

            var scroll = $(this).scrollTop();

            $('.header-poem-wrapper').css('width', scroll/40+'%')

        })

        $('.btn-scroll').click(function () {
            $('html').animate({scrollTop : '0'} , 'slow' )
        })


        /*//*/


        $(window).scroll(function () {
            var scroll = $(window).scrollTop();


            if ($(this).scrollTop() > 180) {
                $('.slider-top').css({
                    filter: 'blur(' + scroll / 180 + 'px)'
                });
            } else {
                $('.slider-top').css({
                    filter: 'blur(0)'
                });
            }

        })

        /*merge repeated messages*/
        $('.ul-preview-alert > .li-message-alert').each(function () {
            var senderId2 = $(this).attr('data-id-sender');
            var messagesNumber2 = parseFloat($(this).find('.message-counter-2').text());

            var $rowsToGroup2 = $(this).nextAll('.li-message-alert').filter(function () {
                return $(this).attr('data-id-sender') === senderId2;
            });

            $rowsToGroup2.each(function () {
                messagesNumber2 += parseFloat($(this).find('.message-counter-2').text());
                $(this).remove();
            });

            $(this).find('.message-counter-2').text(messagesNumber2);
        })

        /*//*/

        /*merge repeated comments*/
        $('.ul-preview-alert > .li-comment-alert').each(function () {
            var poemId = $(this).attr('data-id-poem');
            var commentsNumber = parseFloat($(this).find('.message-counter-2').text());

            var $rowsToGroup = $(this).nextAll('.li-comment-alert').filter(function () {
                return $(this).attr('data-id-poem') === poemId;
            });

            $rowsToGroup.each(function () {
                commentsNumber += parseFloat($(this).find('.message-counter-2').text());
                $(this).remove();
            });
            $(this).find('.message-counter-2').text(commentsNumber);
        })

        /*//*/



        /*scroll news speed*/

        var ulTextScrollWidth = parseFloat($('.ul-text-scroll').css('width'));
        var speed = 25; //px/s
        var time = (ulTextScrollWidth/speed);

        var animation = 'text-scroll '+time+'s linear infinite';

        $('.ul-text-scroll').css({
            '-webkit-animation': animation,
            '-moz-animation': animation,
            '-o-animation': animation,
            'animation': animation,
        });

        /*//*/

    })



    function mainNtf(txt='' , type=1 , closeable=1 , txtLink='' , link='') {
        var ntf = $('.main-ntf');
        ntf.find('p').text(txt);
        ntf.addClass('active');
        ntf.find('a').text(txtLink).attr('href', link);

        if (type == 1) {
            ntf.find('.icon-ntf i').removeClass().addClass('fas fa-check-circle');
        }
        if (type == 0) {
            ntf.find('.icon-ntf i').removeClass().addClass('fas fa-bell')
        }
        if (type == -1) {
            ntf.find('.icon-ntf i').removeClass().addClass('fas fa-exclamation-triangle')

        }

        if (closeable != 0) {
            setTimeout(function () {
                ntf.fadeOut();
                ntf.removeClass('active');
            } , 8000)
        }

        $('.btn-ntf').click(function () {
            ntf.fadeOut();
            ntf.removeClass('active');
        })
    }



    /*notification*/

    function showNotification(msg='' , type='1') {

        if (type == 1){
            $('#img').append('<i style="color: white; font-size: 1rem;" class="fas fa-check-circle"></i>');
        }
        if (type == -1){
            $('#img').append('<i style="color: white; font-size: 1rem;" class="fas fa-exclamation-circle"></i>');
        }

        $('#desc').text(msg);
        var x = document.getElementById("toast")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }

    /*//*/







    /*confirm-alert*/

    function showConfirmAlert(txt='' , show='') {
        var userHeaderHeight = parseFloat($('.user-header').css('height'))+1;
        var userHeaderBackground = $('.logged-in-header').css('background-color');
        $('.confirm-alert').css({'top':userHeaderHeight , 'background-color':userHeaderBackground});
        $('.txt-confirm').html(txt);

        if (show == 'fade'){
            $('.confirm-alert').fadeIn(800);
            $('.dark-background').fadeIn(280);
            $('.btn-cancel-confirm').click(function () {
                $('.confirm-alert').fadeOut(800);
                $('.dark-background').fadeOut(280);
            })
            $('.btn-close-confirm').click(function () {
                $('.confirm-alert').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
            $('.btn-ok-confirm').click(function () {
                $('.confirm-alert').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
            $('.dark-background').click(function () {
                $('.confirm-alert').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
        }

        $('.confirm-alert').slideDown(800);
        $('.btn-cancel-confirm').click(function () {
            $('.confirm-alert').slideUp(800);
        })
        $('.btn-close-confirm').click(function () {
            $('.confirm-alert').fadeOut(400);
        })
        $('.btn-ok-confirm').click(function () {
            $('.confirm-alert').slideUp(400);
        })
    }

    function showConfirmAlertC(txt='' , show='') {
        var userHeaderHeight = parseFloat($('.user-header').css('height'))+1;
        var userHeaderBackground = $('.logged-in-header').css('background-color');
        $('.confirm-alert-c').css({'top':userHeaderHeight , 'background-color':userHeaderBackground});
        $('.txt-confirm-c').text(txt);

        if (show == 'fade'){
            $('.confirm-alert-c').fadeIn(800);
            $('.dark-background-c').fadeIn(280);
            $('.btn-cancel-confirm-c').click(function () {
                $('.confirm-alert-c').fadeOut(800);
                $('.dark-background').fadeOut(280);
            })
            $('.btn-close-confirm-c').click(function () {
                $('.confirm-alert-c').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
            $('.btn-ok-confirm-c').click(function () {
                $('.confirm-alert-c').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
            $('.dark-background').click(function () {
                $('.confirm-alert-c').fadeOut(400);
                $('.dark-background').fadeOut(280);
            })
        }

        $('.confirm-alert-c').slideDown(800);
        $('.btn-cancel-confirm-c').click(function () {
            $('.confirm-alert-c').slideUp(800);
        })
        $('.btn-close-confirm-c').click(function () {
            $('.confirm-alert-c').fadeOut(400);
        })
        $('.btn-ok-confirm-c').click(function () {
            $('.confirm-alert-c').slideUp(400);
        })
    }




    /*//*/



    /*alert show*/


    function alertShowLogin(txt='' , duration=8000 , type=1){

        if (type == 1) {
            $('.alert-login').addClass('anim-bounce');
        }

        if (type == 0){
            $('.alert-login').addClass('anim-danger');
        }

        var timeOut = duration+1;

        $('.alert-txt-login').text(txt);
        $('.alert-login').show().delay(duration).slideUp(400);
        setTimeout(function () {
            $('.alert-login').removeClass('anim-danger');
            $('.alert-login').removeClass('anim-bounce');
        },timeOut)


    }

    /*//*/



    $('.btn-refresh-captcha').click(function () {
        $(this).toggleClass('active');
        $('.img-captcha').attr("src","captcha.php?timestamp=" + new Date().getTime());
    })

    /*submit login form*/

    function submitLoginForm() {
        var url = 'index/checkLogin';
        var data = $('.login-modal').serializeArray();
        var passInput = $('.login-modal').find('input[name=password]');
        var emailInput =  $('.login-modal').find('input[name=email]');



        if (emailInput.val().trim() == '') {
            emailInput.val('');
            emailInput.attr("placeholder", "ایمیل را وارد کنید");
        } else if (passInput.val().trim() == '') {
            passInput.val('');
            passInput.attr("placeholder", "رمز عبور را وارد کنید");
        } else {


            $.post(url, data, function (msg) {
                console.log(msg);
                var family = msg['family'];

                if (msg == -1){
                    $('.img-captcha').addClass('active');
                    $('.img-captcha').addClass('shake');
                    setTimeout(function () {
                        $('.img-captcha').removeClass('shake');
                        $('.img-captcha').removeClass('active' , 2500);
                    },3500)
                } else if (msg == 0) {
                    mainNtf('ایمیل یا رمز عبور اشتباه است')
                    passInput.val('');
                    passInput.attr("placeholder", "ایمیل یا رمز عبور اشتباه است");
                    $('.btn-refresh-captcha').toggleClass('active');
                    $('.img-captcha').attr("src","captcha.php?timestamp=" + new Date().getTime());
                } else {
                    $('.login-ok').fadeIn(300);
                    $('.login-modal').css({'background': '#e9ffe5'});
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 2000);
                }
            } , 'json');
        }
    }

    /*//*/

    $(document).ready(function () {


        /*alert user*/

        $('.btn-show-alert-user').click(function () {
            $(this).toggleClass('active');
            $('.preview-alert-show-container').toggle(600)
        })

        /*//*/


        /*login window*/

        $('.login-btn').click(function () {
            $('#login-modal').modal('show');
        });

        $('.dark-background').click(function () {

            $('.login-window').fadeOut(240);
            $(this).fadeOut(280);
            $('.html').enableScroll();

        });

        $('.btn-close-login').click(function () {
            $('.login-window').fadeOut(240);
            $('.dark-background').fadeOut(280);
            $('.html').enableScroll();
        });

        $.fn.disableScroll = function() {
            window.oldScrollPos = $(window).scrollTop();

            $(window).on('scroll.scrolldisabler',function ( event ) {
                $(window).scrollTop( window.oldScrollPos );
                event.preventDefault();
            });
        };

        $.fn.enableScroll = function() {
            $(window).off('scroll.scrolldisabler');
        };

        /*//*/


    /*header profile*/

    var loggedInBox = $('.logged-in-rectangle');

    $('.btn-show-more2').click(function () {
        if (loggedInBox.hasClass('active')) {
            loggedInBox.removeClass('active', 0);

            $(this).animate({'right': '2px'}, 0 , function() {
                $(this).css({'position':'unset'})
                $(this).removeClass('active' , 0);
            })
        } else {
            loggedInBox.addClass('active', 800, 'easeInQuint');
            loggedInBox.css('position', 'relative');
            $(this).css({'position': 'absolute', 'right': '2px'}).animate({'right': '2px'}, 800 , function () {
                $(this).addClass('active' , 0);
            });
        }
    })

    /*rotating rectangle hover stop*/

    $('.ul-text-scroll').hover(function () {
        $('.rotating-rectangle').css({'animation-play-state': 'paused'});
    }, function () {
        $('.rotating-rectangle').css({'animation-play-state': 'running'});

    });
    /*//*/

        $('.notebook-limiter').mCustomScrollbar({
            setWidth: false,
            setHeight: false,
            setTop: 0,
            setLeft: 0,
            axis: "y",
            scrollbarPosition: "inside",
            scrollInertia: 250,
            autoDraggerLength: true,
            autoHideScrollbar: true,
            autoExpandScrollbar: false,
            alwaysShowScrollbar: 0,
            snapAmount: null,
            snapOffset: 0,
            mouseWheel: {
                enable: true,
                scrollAmount: "auto",
                axis: "y",
                preventDefault: false,
                deltaFactor: "auto",
                normalizeDelta: false,
                invert: false,
                disableOver: ["select", "option", "keygen", "datalist", "textarea"]
            },
            scrollButtons: {
                enable: true,
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            keyboard: {
                enable: true,
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            contentTouchScroll: 25,
            advanced: {
                autoExpandHorizontalScroll: false,
                autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
                updateOnContentResize: true,
                updateOnImageLoad: true,
                updateOnSelectorChange: false,
                releaseDraggableSelectors: false
            },
            theme: "light-thin",

            callbacks: {
                onInit: false,
                onScrollStart: false,
                onScroll: false,
                onTotalScroll: false,
                onTotalScrollBack: false,
                whileScrolling: false,
                onTotalScrollOffset: 0,
                onTotalScrollBackOffset: 0,
                alwaysTriggerOffsets: true,
                onOverflowY: false,
                onOverflowX: false,
                onOverflowYNone: false,
                onOverflowXNone: false
            },
            live: false,
            liveSelector: null
        });

        /*notebook*/

        $('.icon-notebook').click(function () {

            if ($('.user-notebook').is(':hidden')){

                setTimeout(function () {
                    $('.select-type-notebook.click').click();
                } , 100)

                var url = 'index/getStoreNoteBook';
                var data = {};
                var i = 1;
                $.post(url , data , function (msg) {

                    $('.notebook-limiter').html('');
                    $.each(msg , function (index , value) {
                        var appendItem = '<li data-type="'+value['type']+'" class="notebook-item cursor-pointer"><div class="notebook-item-container"><div class="d-flex"><span class="mb-0 ml-3">'+i+'</span>'+value['title']+'<a href="'+value['href']+'" class="badge badge-secondary mr-2">مشاهده</a> </div><i class="fas fa-times-circle btn-delete-item-notebook"></i></div></li>';
                        $('.notebook-limiter').append(appendItem);

                        i++;
                    })

                } , 'json')



            }

            $('.user-notebook').slideToggle();



        })



        $('.select-type-notebook').click(function () {
            $('.select-type-notebook').removeClass('click')
            $(this).addClass('click')
        })

        $('[data-toggle="tooltip"]').tooltip();


    })

    function filterNotebook(type) {
        if (type == 10){
            $('.notebook-item').fadeIn(0)
        } else {
            $('.notebook-item').fadeOut(0)
            $('.notebook-item').each(function () {
                var typeId = $(this).attr('data-type');
                if (typeId == type) {
                    $(this).fadeIn(0);
                }
            })
        }
    }



</script>