<?php $news = $data['news'];
$mainChat = $data['mainChat'];
$wordChallenge = $data['wordChallenge'];
?>

<div class="sidebar-right flex-column">

    <div class="title-side-bar-right">
        <span class="title-bar-news flex-center flex-row justify-content-between px-2">
            <h6 class="mb-0">چالش بداهه با کلمات</h6>
            <span class="text-warning cursor-pointer fs0-8 btn-join-challenge">
                شرکت در این چالش
            </span>
        </span>
    </div>
    <div class="news-content-container">

        <div class="news-content">
            <div class="d-flex w-100 position-relative">
            <?php foreach ($wordChallenge as $row2){ ?>
                <div class="word-item" data-id="<?=$row2['id']?>">
            <div class="challenge-word-show">
                <h6 class="text-warning"><?=$row2['family']?></h6>
                <span class="mt-2">با کلمات:</span>
                <div class="d-flex mt-2 text-warning">
                    <?php foreach ($row2['word_array'] as $word){ ?>
                <span><?=$word?></span><span class="dash-words mx-1">-</span>
                    <?php } ?>
                </div>
                <span class="mt-4">در زمان:</span>
                <span class="mt-2"><?=$row2['total_time']?></span>
                <span class="mt-4">شعر:</span>
                <p class="mt-4 txt-poem-word fs0-9 w-100">
                    <?=$row2['txt']?>
                </p>
            </div>

                    <div onclick="rateWord(<?=$row2['id']?> , '<?=$row2['family']?>')" class="rate-word cursor-pointer btn btn-sm btn-success">
                        <span>امتیاز شما به</span>
                        <span><?=$row2['family']?></span>
                    </div>

                </div>

            <?php } ?>

                <div class="get-rate d-flex flex-column align-items-center py-4">
                    <span>لطفا از 1 تا 5 یک امتیاز را انتخاب کنید</span>
                    <div class="btn-group mt-5 btn-rate-container" style="direction: ltr">
                        <span class="btn btn-success">5</span>
                        <span class="btn btn-info">4</span>
                        <span class="btn btn-primary">3</span>
                        <span class="btn btn-secondary">2</span>
                        <span class="btn btn-danger">1</span>
                    </div>
                    <div class="d-flex mt-5">
                        <h6>امتیاز شما به</h6>
                        <span class="family-user"></span>
                    </div>
                    <span class="mt-2 fs1 rate-number">0</span>
                    <div class="d-flex mt-4">
                        <span class="btn btn-danger ml-2 btn-cancel-rate">لغو</span>
                        <span class="btn btn-success mr-2 btn-ok-rate">ثبت امتیاز</span>
                    </div>

                </div>

            </div>

            <div class="slider-words owl-carousel owl1">
                <?php foreach ($wordChallenge as $row){ ?>
                <img class="img-user-challenge" data-id="<?=$row['id']?>" src="public/images/users/<?=$row['id_user']?>/user_64.jpg">
                <?php } ?>
            </div>
        </div>

    </div>

    <div class="title-side-bar-right">
        <span class="title-bar-news flex-center">خبرها</span>
    </div>
    <div class="news-content-container news-container">

        <div class="news-content">
            <ul class="ul-side-bar-right-news">
                <?php foreach ($news as $row){ ?>
                <li class="flex-column"><a style="padding: 4px 0">
                        <i class="fab fa-gg-circle ml-1 fs0-7"></i>
                        <?=$row['title']?>
                    </a></li>
                <?php } ?>

            </ul>
        </div>

    </div>
    <div class="title-side-bar-right used-chat-title-bar">
            <span class="box-add-message">
                <span class="chars">400</span>
                    <textarea id="txt-chat-main" class="txt-add-message" maxlength="400"></textarea>

                <span class="prevent-typing-text">ارتفای متن خیلی زیاد شده، از enter کمتر استفاده کنید</span>
                </span>
        <i style="right: 26px; top: 32px; font-size: 14pt; cursor: pointer; z-index: 17" class="fas fa-search position-absolute btn-show-search-box"></i>
        <span class="title-bar-news flex-center title-bar-chat-main" style="position: relative">سرای گفتگو

            </span>

        <span class="btn-add-message btn-add-message-main">
                <span class="hover-btn-add-message">نوشتن پیام جدید</span>
            </span>
        <span style="background: url(public/images/icon/icon32.png) 0 -672px;" class="btn-add-message used-btn-send-message">
                <span class="hover-btn-add-message">ارسال پیام</span>
            </span>
        <span style="background: url(public/images/icon/icon32.png) 0 -257px;" class="btn-add-message used-btn-cancel-message">
                <span class="hover-btn-add-message">انصراف</span>
            </span>
    </div>
    <div class="chat-main-content-container">
        <span class="search-box-chats">
            <span class="d-flex justify-content-between h-100 align-items-center">
            <input class="keyword-search">
            <span class="d-flex">
            <i class="fas fa-times-circle text-dark fs1-8 ml-1 cursor-pointer cancel-search"></i>
            <i onclick="showMore(2)" class="fas fa-check-circle text-dark fs1-8 cursor-pointer"></i>
                </span>
                </span>
        </span>

        <div class="news-content used-chat-main">
            <ul class="ul-side-bar-right-news ul-chat-used">
                <?php foreach ($mainChat as $row){
                    $full_date = $row['date'];
                    $full_date = explode('-' , $full_date);
                    $date = $full_date[0];
                    $time = $full_date[1];
                    ?>
                <li class="flex-center li-chat"><a class="chat-item">

                        <div class="row-chat-main" style="position: relative">
                            <span style="background: <?php if ($row['lastseen2'] == 'آنلاین'){echo 'lime';} ?>" class="online-ofline-circle"></span>
                            <span class="hover-last-seen-main-chat"><?=$row['lastseen2']?></span>

                            <span class="avatar-chat" style="background: url(public/images/users/<?=$row['id_user']?>/user_64.jpg) center center"></span>
                            <h5><?=$row['family']?>

                            </h5>
                        </div>
                        <div class="row-chat-main2 flex-column">
                            <p class="txt-chat"><?=$row['txt']?></p>
                        </div>
                        <div class="row-show-date-time">
                            <span>
                                <span><?=$date;?></span>
                                <span style="margin-right: 10px">ساعت <?=$time;?></span>
                            </span>
                            <span style="justify-content: flex-end">
                                <span class="btn-show-more1" style="font-size: 8pt; color: white">مشاهده متن کامل</span>
                            </span>
                        </div>
                    </a></li>
                <?php } ?>

            </ul>
            <span onclick="showMore(1)" class="mt-3 mb-2 text-warning cursor-pointer btn-show-more10">
                    مشاهده ده پیام بعد
                </span>
        </div>

    </div>
</div>





<script>

    /*join challenge*/

    $('.btn-join-challenge').click(function () {
        showConfirmAlertC('برای شرکت در این چالش باید موارد زیر رو در نظر داشته باشید:');
        $('.btn-ok-confirm-c').click(function () {
            var data = {};
            var url = 'index/isJoindedWordChallenge';

                $.post(url, data, function (msg) {

                    console.log(msg)

                    if (msg == 0){
                        mainNtf('شما قبلا در این چالش شرکت کرده اید' , -1 , 0);
                    } else if (msg == 1){
                        mainNtf('شما قبلا در این چالش شرکت کرده اید و در میانه کار از آن انصراف داده اید', -1 , 0);
                    } else if (msg == 2){
                        mainNtf('شما قبلا در این چالش شرکت کرده اید و با اتمام زمان مواجه شده اید' , -1 , 0);
                    } else {

                        $('.challenge-row-header').slideDown()

                        $('.flipTimer-challenge').fadeIn()
                        $('.txt-fliptimer').fadeIn();
                        $('.flipTimer-challenge').flipTimer({
                            direction: 'down',
                            date: msg[1],
                            callback: function () {

                            }
                        });

                        $('.words-for-challenge').html('');
                        $.each(msg[0] , function (index , value) {
                            var appendItem = '<span class="badge badge-dark fs0-9 mr-2">'+value+'</span>';
                            $('.words-for-challenge').append(appendItem);
                        })

                    }

                }, 'json')



        })

    })

    /*//*/

    $('.btn-rate-container .btn').click(function () {
        var selectedRate = $(this).text();
        $('.rate-number').text(selectedRate);
    })





    $(".owl1").owlCarousel({
        rtl: true,
        loop:true,
        margin:1,
        items:5,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:5,
            },
            480:{
                items:11,
            },
            768:{
                items:15,
            },
            979:{
                items:5
            }
        }

    });

    $(".owl1").on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            $(".owl1").trigger('next.owl');
        } else {
            $(".owl1").trigger('prev.owl');
        }
        e.preventDefault();
    });

    $('.owl1').on('changed.owl.carousel' , function () {
        var itemId = $('.owl-item.active:first').find('img').attr('data-id');
        $('.owl-item').find('img').removeClass('active')
        $('.owl-item.active:eq(1)').find('img').addClass('active');
        $('.word-item').hide()
        $('.word-item').each(function () {
            if ($(this).attr('data-id') == itemId){
                $(this).fadeIn()
            }
        })
    })

    /*$('.owl-item > ').on('dragged.owl.carousel' , function () {
        var itemId = $('.owl-item.active:first').find('img').attr('data-id');
        $('.owl-item').find('img').removeClass('active')
        $('.owl-item.active:eq(1)').find('img').addClass('active');
        $('.word-item').hide()
        $('.word-item').each(function () {
            if ($(this).attr('data-id') == itemId){
                $(this).fadeIn()
            }
        })
    })*/

    $('.owl1 img').click(function () {
        var itemId = $(this).attr('data-id');
        $('.owl-item').find('img').removeClass('active')
        $(this).addClass('active');
        $('.word-item').hide()
        $('.word-item').each(function () {
            if ($(this).attr('data-id') == itemId){
                $(this).fadeIn()
            }
        })
    })

    $('.word-item').hover(function () {
        $('.owl1').trigger('stop.owl.autoplay')
    } , function () {
        $('.owl1').trigger('play.owl.autoplay',[6000])
    })

    /*rate word*/

    function rateWord(challengeId , userFamily){
        $('.get-rate').css("visibility", "visible");

        $('.family-user').text(userFamily);

        $('.btn-ok-rate').click(function () {
            var rate = $('.rate-number').text();
            if (rate == 0){
                mainNtf('لطفا امتیاز را مشخص کنید')
            } else {

                var data = {'id': challengeId, 'rate': rate};
                var url = 'index/setRate';
                $.post(url, data, function (msg) {
                    if (msg == 1) {
                        $('.get-rate').css("visibility", "hidden");
                        mainNtf('امتیاز شما با موفقیت ثبت شد');
                        $('.rate-number').text(0);
                    } else if (msg == 0) {
                        $('.get-rate').css("visibility", "hidden");
                        mainNtf('شما قبلا به این کاربر امتیاز داده اید');
                        $('.rate-number').text(0);
                    } else {
                        mainNtf('در حال حاضر مشکلی در ثبت امتیاز پیش آمده. لطفا لحظاتی دیگر مجددا اقدام کنید')
                        $('.get-rate').css("visibility", "hidden");
                        $('.rate-number').text(0);
                    }
                })
            }
            })






        $('.btn-cancel-rate').click(function () {

            $('.get-rate').css("visibility", "hidden");
        })
    }


    /*//*/




    $('.btn-show-search-box').click(function () {
        $('.search-box-chats').slideDown(800);
    })

    $('.cancel-search').click(function () {
        $('.search-box-chats').slideUp(800);
    })

    var currentPage = 1;

    function showMore(type) {

        var keyWord = $('.keyword-search').val();

        if (type == 1){

        }
        if (type == 2){
            currentPage = 0;
            if ($('.keyword-search').val().trim() == ''){
                return false;
            }
        }



        currentPage++;
        var data = {'current_page': currentPage , 'keyword':keyWord};
        var url = 'index/showMoreChats';
        $.post(url, data, function (msg) {
            console.log(msg[0])

            if (msg[2] == 1){
                $('.ul-chat-used .mCSB_container').html('');
            }

            $.each(msg[0], function (index, value) {

                var fullDate = value['date'];

                var explodDate = fullDate.split('-');

                var date = explodDate[0];
                var time = explodDate[1];

                var userId = value['id_user'];

                var txt = value['txt'];
                var family = value['family'];
                var lastSeen = value['lastseen2'];
                var circleColor = '#eeeeee';

                if (lastSeen == 'آنلاین') {
                    circleColor = 'lime';
                }

                var appendItem = '<li class="flex-center li-chat"><a class="chat-item"><div class="row-chat-main" style="position: relative"><span style="background: ' + circleColor + '" class="online-ofline-circle"></span><span class="hover-last-seen-main-chat">' + lastSeen + '</span><span class="avatar-chat" style="background: url(public/images/users/' + userId + '/user_64.jpg) center center"></span><h5>' + family + '</h5></div><div class="row-chat-main2 flex-column"><p class="txt-chat">' + txt + '</p></div><div class="row-show-date-time"><span><span>' + date + '</span><span style="margin-right: 10px">' + time + '</span></span><span style="justify-content: flex-end"><span class="btn-show-more1" style="font-size: 8pt; color: white">مشاهده متن کامل</span></span></div></a></li>';


                $('.ul-chat-used .mCSB_container').append(appendItem);

                $('.online-ofline-circle').hoverIntent({
                    over: function () {
                        $(this).next().fadeIn();
                    },
                    out: function () {
                        $(this).next().fadeOut();
                    }
                });
            })



            var parentHeight = $('.row-chat-main2').css('height');
            var parentHeight2 = parseFloat(parentHeight);

            $.each($('.btn-show-more1'), function (index, value) {
                var txtHeight = $(this).parents('.li-chat').find('.txt-chat').css('height');
                txtHeight2 = parseFloat(txtHeight);
                if (txtHeight2 < parentHeight2) {
                    $(this).css('display', 'none');
                } else {
                    $(this).css('display', 'block');
                }
            });

            $('.btn-show-more1').click(function () {
                var txtChatParent = $(this).parents('.li-chat').find('.row-chat-main2');

                if (txtChatParent.hasClass('show-more')) {
                    txtChatParent.removeClass('show-more', 600);
                    $(this).text('مشاهده متن کامل');
                } else {
                    txtChatParent.addClass('show-more', 600);
                    $(this).text('نمایش کمتر');
                }
            });
        }, 'json')
    }




    var isLoggedIn = 0;

        var url = 'index/jsCheckLogin';
        var data = {};
        $.post(url , data , function (msg) {
            isLoggedIn = msg;
        })



    var maxLength = 400;
    $('.txt-add-message').keyup(function(e) {
        $('.chars').delay(2000).fadeIn(800);
        var length = $(this).val().length;
        var length = maxLength-length;
        $('.chars').text(length);

        var scrollHeight = document.getElementById("txt-chat-main").scrollHeight;
        var scrollHeight2 = parseFloat(scrollHeight);
        if (scrollHeight2 > 350){
            $('.prevent-typing-text').fadeIn(600);
            e.preventDefault();
        } else {
            $('.prevent-typing-text').fadeOut(600);
        }
    });

    $(document).ready(function () {


        /*circle online ofline*/

        $('.online-ofline-circle').hoverIntent({
            over: function () {
                $(this).next().fadeIn();
            },
            out: function () {
                $(this).next().fadeOut();
            }
        });

        /*//*/



        /*box add message*/

        $('.btn-add-message').click(function () {

            if (isLoggedIn == 1){

            $('.dark-window').fadeIn(100);
                $('.btn-show-search-box').fadeOut(200);
            $('.title-bar-chat-main').addClass('change-title-bar');
            $('.btn-add-message-main').animate({'left': '225'}, 300, function () {
                $(this).css('display', 'none');
                $('.used-btn-cancel-message').css('display', 'block');
                $('.used-btn-send-message').css('display', 'block');

            });
            $('.title-bar-chat-main').text('نوشتن پیام جدید');
            $('.box-add-message').slideDown(400);

            } else {
                mainNtf('برای ارسال پیام باید ثبت نام کنید یا وارد حساب کاربری خود شوید' , -1 , 1 , 'ثبت نام' , 'register2')
            }
        })


        $('.used-btn-cancel-message').click(function () {
            $('.btn-show-search-box').fadeIn(200);
            closeMessegeBox();
        });

        $('.used-btn-send-message').click(function () {

            var message = $(this).parents('.used-chat-title-bar').find('.txt-add-message').val().replace(/\n/g, "<br />");

            var url = 'index/sendmessage';
            var data = {'txt': message};
            if (message.trim() != '') {
                $.post(url, data, function (msg) {
                    $('.btn-show-search-box').fadeIn(200);
                    closeMessegeBox();
                    showNotification('پیام شما با موفقیت ثبت شد');
                    console.log(msg);

                    $('.ul-chat-used .mCSB_container').html('');

                    $.each(msg, function (index, value) {

                        var fullDate = value['date'];

                        var explodDate = fullDate.split('-');

                        var date = explodDate[0];
                        var time = explodDate[1];

                        var userId = value['id_user'];

                        var txt = value['txt'];
                        var family = value['family'];
                        var lastSeen = value['lastseen2'];
                        var circleColor = '#eeeeee';

                        if (lastSeen == 'آنلاین') {
                            circleColor = 'lime';
                        }

                        var appendItem = '<li class="flex-center li-chat"><a class="chat-item"><div class="row-chat-main" style="position: relative"><span style="background: ' + circleColor + '" class="online-ofline-circle"></span><span class="hover-last-seen-main-chat">' + lastSeen + '</span><span class="avatar-chat" style="background: url(public/images/users/' + userId + '/user_64.jpg) center center"></span><h5>' + family + '</h5></div><div class="row-chat-main2 flex-column"><p class="txt-chat">' + txt + '</p></div><div class="row-show-date-time"><span><span>' + date + '</span><span style="margin-right: 10px">' + time + '</span></span><span style="justify-content: flex-end"><span class="btn-show-more1" style="font-size: 8pt; color: white">مشاهده متن کامل</span></span></div></a></li>';


                        $('.ul-chat-used .mCSB_container').append(appendItem);

                        $('.online-ofline-circle').hoverIntent({
                            over: function () {
                                $(this).next().fadeIn();
                            },
                            out: function () {
                                $(this).next().fadeOut();
                            }
                        });
                    })

                    var parentHeight = $('.row-chat-main2').css('height');
                    var parentHeight2 = parseFloat(parentHeight);

                    $.each($('.btn-show-more1'), function (index, value) {
                        var txtHeight = $(this).parents('.li-chat').find('.txt-chat').css('height');
                        txtHeight2 = parseFloat(txtHeight);
                        if (txtHeight2 < parentHeight2) {
                            $(this).css('display', 'none');
                        } else {
                            $(this).css('display', 'block');
                        }
                    });

                    $('.btn-show-more1').click(function () {
                        var txtChatParent = $(this).parents('.li-chat').find('.row-chat-main2');
                        txtChatParent.toggleClass('show-more', 600);
                        if (txtChatParent.hasClass('show-more')) {
                            $(this).text('مشاهده متن کامل');
                        } else {
                            $(this).text('نمایش کمتر');
                        }
                    });

                    $('.txt-add-message').val('');

                }, 'json')
            }
        })



        $('.dark-window').click(function () {
            closeMessegeBox();
        })

        function closeMessegeBox() {
            $('.dark-window').fadeOut(100);
            $('.title-bar-chat-main').removeClass('change-title-bar');


            $('.btn-add-message-main').animate({'left': '4'}, 0, function () {
                $('.btn-add-message-main').css('display', 'block');
                $('.used-btn-cancel-message').css('display', 'none');
                $('.used-btn-send-message').css('display', 'none');
                $('.title-bar-chat-main').text('سرای گفتگو');
                $('.box-add-message').slideUp(400);
            });
        }

        /*//*/

        /*refresh main chat*/

        function refreshMainChat() {
            var time = 0;
            function keeprefreshing() {
                setTimeout(keeprefreshing , 6000);
                if (time == 1){


                    var emptyData =[];

                    var data = {'empty' : emptyData};
                    var url = 'index/sendmessage';
                        $.post(url, data, function (msg) {

                            $('.ul-chat-used').html('');

                            $.each(msg , function (index , value) {

                                var fullDate = value['date'];
                                var explodDate = fullDate.split('-');
                                var date = explodDate[0];
                                var time = explodDate[1];

                                var userId = value['id_user'];

                                var txt = value['txt'];
                                var family = value['family'];
                                var lastSeen = value['lastseen2'];
                                var circleColor = '#eeeeee';

                                if (lastSeen == 'آنلاین'){
                                    circleColor = 'lime';
                                }

                                var appendItem = '<li class="flex-center li-chat"><a class="chat-item"><div class="row-chat-main" style="position: relative"><span style="background: '+circleColor+'" class="online-ofline-circle"></span><span class="hover-last-seen-main-chat">'+lastSeen+'</span><span class="avatar-chat" style="background: url(public/images/users/'+userId+'/user_64.jpg) center center"></span><h5>'+family+'</h5></div><div class="row-chat-main2 flex-column"><p class="txt-chat">'+txt+'</p></div><div class="row-show-date-time"><span><span>'+date+'</span><span style="margin-right: 10px">'+time+'</span></span><span style="justify-content: flex-end"><span class="btn-show-more1" style="font-size: 8pt; color: white">مشاهده متن کامل</span></span></div></a></li>';


                                $('.ul-chat-used').append(appendItem);
                            })

                            var parentHeight = $('.row-chat-main2').css('height');
                            var parentHeight2 = parseFloat(parentHeight);

                            $.each($('.btn-show-more1'), function (index, value) {
                                var txtHeight = $(this).parents('.li-chat').find('.txt-chat').css('height');
                                txtHeight2 = parseFloat(txtHeight);
                                if (txtHeight2 < parentHeight2) {
                                    $(this).css('display', 'none');
                                } else {
                                    $(this).css('display', 'block');
                                }
                            });

                            $('.btn-show-more1').click(function () {
                                var txtChatParent = $(this).parents('.li-chat').find('.row-chat-main2');
                                txtChatParent.toggleClass('show-more', 600);
                                if (txtChatParent.hasClass('show-more')) {
                                    $(this).text('مشاهده متن کامل');
                                } else {
                                    $(this).text('نمایش کمتر');
                                }
                            })

                        } , 'json')

                }

                if (time == 10){
                    time = 0;
                }
                time++;
            }

           /* keeprefreshing();*/
        }

        /*refreshMainChat();*/

        /*//*/

        /*show more button in main chat*/
        var parentHeight = $('.row-chat-main2').css('height');
        var parentHeight2 = parseFloat(parentHeight);

        $.each($('.btn-show-more1'), function (index, value) {
            var txtHeight = $(this).parents('.li-chat').find('.txt-chat').css('height');
            txtHeight2 = parseFloat(txtHeight);
            if (txtHeight2 < parentHeight2) {
                $(this).css('display', 'none');
            } else {
                $(this).css('display', 'block');
            }
        });

        $('.btn-show-more1').click(function () {
            var txtChatParent = $(this).parents('.li-chat').find('.row-chat-main2');
            txtChatParent.toggleClass('show-more', 600);
            if (txtChatParent.hasClass('show-more')) {
                $(this).text('مشاهده متن کامل');
            } else {
                $(this).text('نمایش کمتر');
            }
        })

        /*//*/

            $('.ul-chat-used').mCustomScrollbar({
                setWidth: false,
                setHeight: false,
                setTop: 0,
                setLeft: 0,
                axis: "y",
                scrollbarPosition: "outside",
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
                    enable: false,
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


    })


</script>
