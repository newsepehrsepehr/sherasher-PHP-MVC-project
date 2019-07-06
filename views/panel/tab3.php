
<link rel="stylesheet" type="text/css" href="public/jquery.scrollbar-master/jquery.scrollbar.css">
<script src="public/jquery.scrollbar-master/jquery.scrollbar.min.js"></script>
<?php
$messages = $data['messages'];
$userInfo = Model::getUserInfo();
$id_loggedin_user = $userInfo['id'];

?>
    <div class="sidebar-poem-notebook fixed-poems-title" style="position: fixed; max-height: 400px; overflow-y: auto">
        <ul class="ul-sidebar-poem-notebook-messages" style=" ">
            <?php
            foreach ($messages as $row){
                $family = $row['user_info']['family'];
                $id_user = $row['user_info']['id'];
                ?>
            <li id="message<?=$row['user_info']['id']?>" onclick="liMessage(this , <?=$row['user_info']['id']?> , <?=$row['user_info']['type']?> , '<?=$row['user_info']['lastseen2']?>')" data-receiver="<?=$row['id_receiver'];?>" data-current-user="<?=$id_loggedin_user?>" data-viewed="<?=$row['viewed']?>" data-sender="<?=$row['user_info']['id']?>" class="li-message-sender"><span class="flex-row" style="align-items: center"><img src="public/images/users/<?=$id_user?>/user_64.jpg"><span data-id-user="<?=$id_user?>" class="txt-sidebar-poem-notebook" style="margin-right: 4px"><?=$family?></span></span><span class="flex-row-6"><span class="message-counter">1</span><span class="not-viewed-counter">0</span></span></li>
            <?php } ?>
        </ul>
    </div>



    <div class="content-messages" style="padding-right: 310px">

        <div class="messages-titlebar">
            <div class="right">
                <img src="public/images/users/1/user_64.jpg">
                <h6 style="margin-right: 4px; font-size: .95rem"></h6>
                <span class="user-type"></span>
                <span style="font-size: .75rem; margin-right: 10px">آخرین بازدید:</span>
                <span class="last-seen mr-2" style="font-size: .75rem; margin-right: 2px; color: gold"></span>
            </div>
            <div class="left">

                <div class="work-msg-agreements">
                    <span class="btn btn-info">قوانین قراردادها</span>
                </div>

                <div class="dropdown1">
    <span style="color: #2e2e2e;" class="btn">
        <i style="margin-left: 6px; font-size: 13pt; right: 4px; top: 2px; position: relative" class="fas fa-handshake"></i>
        ارسال پیام کاری</span>
                    <ul class="ul-dropdown1">
                        <li data-toggle="modal" data-target="#work1-modal" onclick="workMessage('1')">درخواست از میان اشعار دفتر شعر شاعر</li>
                        <li data-toggle="modal" data-target="#work2-modal" onclick="workMessage('2')">درخواست سرودن شعر جدید</li>
                        <li data-toggle="modal" data-target="#work3-modal" onclick="workMessage('3')">سایر موارد</li>
                    </ul>
                </div>

            </div>
        </div>

            <?php
            foreach ($messages as $row2){
                $family = $row2['user_info']['family'];
                $id_user = $row2['user_info']['id'];
                $selected_poems = $row2['poems'];

                $full_date = $row2['date'];
                $full_date = explode('-' , $full_date);
                @$date = $full_date[0];
                @$time = $full_date[1];

                if ($id_loggedin_user != $row2['id_sender']){
                    $isFront = 1;
                } else {
                    $isFront = 0;
                }
            ?>

                <?php if ($row2['work_type'] == 0){ ?>
        <div data-id-user="<?=$id_user?>" class="message-container <?php if ($id_loggedin_user != $row2['id_sender']){if($row2['viewed'] == 0){echo 'not-viewed';}} ?>" style="padding: <?php if ($id_loggedin_user == $row2['id_sender']){echo '25px 15px 25px 200px;';} else {echo '25px 200px 25px 15px;';} ?>; display: none; order: <?=$row2['id']?>">
            <div class="title-message" style="flex-direction: <?php if ($id_loggedin_user == $row2['id_sender']){echo 'row';} else {echo 'row-reverse';} ?>">
                <span class="<?php if ($id_loggedin_user == $row2['id_sender']){echo 'flex-row';} else {echo 'flex-row-reverse';} ?>" style="align-items: center"><img style="width: 35px; height: 35px; border-radius: 50%" src="public/images/users/<?php
                    if ($id_loggedin_user == $row2['id_sender']){echo $userInfo['id'];} else {echo $id_user;}
                    ?>/user_64.jpg"><span class="txt-sidebar-poem-notebook" style="margin-right: 4px; margin-left: 6px; font-size: 95%"><?php
                        if ($id_loggedin_user == $row2['id_sender']){echo $userInfo['family'];} else {echo $family;}
                        ?></span></span>
                <span class="<?php if ($id_loggedin_user == $row2['id_sender']){echo 'flex-row-reverse';} else {echo 'flex-row';} ?>" style="align-items: center;">
                                <span style="font-size: 80%; margin-right: 10px; margin-left: 20px">ساعت <?=$time?></span>
                                <span style="font-size: 80%"><?=$date?></span>
                            </span>
            </div>
            <div class="message-item" style="position: relative;">
                <p><?=$row2['txt']?></p>

                <?php if ($isFront == 0){ ?>
                    <i style="position: absolute; bottom: 4px; left: -20px; font-size: .7rem " class="ml-4 fas <?php if ($row2['viewed'] == 1){echo 'fa-check-double text-primary';} else {echo 'fa-check text-secondary';} ?>"></i>
                <?php } ?>

            </div>



        </div>
                <?php } else { ?>

                    <div data-id="<?=$row2['id']?>" data-id-user="<?=$id_user?>" class="message-container <?php if ($id_loggedin_user != $row2['id_sender']){if($row2['viewed'] == 0){echo 'not-viewed';}} ?>" style="position: relative; padding: <?php if ($id_loggedin_user == $row2['id_sender']){echo '25px 15px 25px 200px;';} else {echo '25px 200px 25px 15px;';} ?>; display: none; order: <?=$row2['id']?>">
                        <div class="title-message" style="position: relative; background: #F5DEB3; color: #2e2e2e; flex-direction: <?php if ($id_loggedin_user == $row2['id_sender']){echo 'row';} else {echo 'row-reverse';} ?>">
                <span class="<?php if ($id_loggedin_user == $row2['id_sender']){echo 'flex-row';} else {echo 'flex-row-reverse';} ?>" style="align-items: center"><img style="width: 35px; height: 35px; border-radius: 50%" src="public/images/users/<?php
                    if ($id_loggedin_user == $row2['id_sender']){echo $userInfo['id'];} else {echo $id_user;}
                    ?>/user_64.jpg"><span class="txt-sidebar-poem-notebook" style="margin-right: 4px; margin-left: 6px; font-size: 95%"><?php
                        if ($id_loggedin_user == $row2['id_sender']){echo $userInfo['family'];} else {echo $family;}
                        ?></span></span>
                            <span class="<?php if ($id_loggedin_user == $row2['id_sender']){echo 'flex-row-reverse';} else {echo 'flex-row';} ?>" style="align-items: center;">
                                <span style="font-size: 80%; margin-right: 10px; margin-left: 20px">ساعت <?=$time?></span>
                                <span style="font-size: 80%"><?=$date?></span>
                            </span>



                        </div>
                        <div class="message-item <?php if ($row2['status'] == -1 or $row2['status'] == 8){echo 'refused';} ?>" style="background: #F2E8D6; color: #3f3f3f; min-height: 82px; position: relative">


                            <div class="work-message-info-container">

                                <?php if ($row2['work_type'] == 1){ ?>

                                    <span class="mb-3">اشعار درخواستی</span>

                            <div class="work-message-info">

                                    <div class="selected-poems mb-4">
                                        <ul data-poem-ids="<?=$row2['poems']?>" class="list-group selected-poems-message-work">

                                        </ul>
                                    </div>
                            </div>

                                    <div class="work-message-price mb-4">
                                        <span>مبلغ پیشنهادی <?php if ($id_loggedin_user == $row2['id_sender']){echo $userInfo['family'];} else {echo $family;}  ?> برای قرارداد:</span>
                                        <span style="font-size: .95rem; font-family: Tahoma" class="badge badge-light mr-2"><?=number_format($row2['price'])?></span>
                                        <span class="mr-2">تومان</span>
                                    </div>

                                <?php } ?>

                            </div>

                            <?php if ($row2['work_type'] == 6){ ?>
                            <p style="font-size: .85rem" class="badge badge-success"><?php if ($isFront == 1){echo $family;}else{echo $userInfo['family'];} ?>
                                شرایط همکاری را پذیرفت.
                            </p>
                            <?php } ?>

                            <?php if ($row2['work_type'] == 5){ ?>
                                <p style="font-size: .85rem" class="badge badge-warning"><?php if ($isFront == 1){echo $family;}else{echo $userInfo['family'];} ?>
                                    مبلغ
                                    <span style="font-size: .85em; font-family: Tahoma" class="badge badge-dark"><?=number_format($row2['price'])?></span>
                                    تومان را پیشنهاد داد.
                                </p>
                            <?php } ?>

                            <?php if ($row2['work_type'] == 4){ ?>
                                <p style="font-size: .85rem" class="badge badge-danger"><?php if ($isFront == 1){echo $family;}else{echo $userInfo['family'];} ?>
                                    شرایط همکاری را رد کرد.
                                </p>
                            <?php }  ?>
                            <p class="mb-3"><?=$row2['txt']?></p>


                    <?php if ($row2['work_type'] != 0 && $row2['work_type'] != 8 && $row2['work_type'] != 4 && $row2['work_type'] != 6 && $row2['status'] != 1) { ?>
                        <?php if ($id_loggedin_user != $row2['id_sender']) { ?>
                            <span style="font-size: .8rem" class="btn btn-success btn-sm mb-2 btn-accept-work-msg" data-toggle="modal" data-target="#accept-modal<?=$row2['id']?>">پذیرفتن</span>
                            <span  style="font-size: .8rem" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#refuse-modal<?=$row2['id']?>">رد کردن</span>
                            <span style="font-size: .8rem" class="btn btn-warning btn-sm btn-new-price mb-2">درج مبلغ پیشنهادی من</span>

                            <div class="expand-new-price-container">
                            <div class="expand-new-price mt-3 mb-2 p-4">
                                <span>مبلغ پیشنهادی شما</span>
                                <input type="text" class="form-control price2 digits" id="usr" name="username">
                                <span style="font-size: .8rem" class="badge badge-light">تومان</span>
                                <span style="font-size: .8rem" class="btn btn-sm btn-success mr-3 btn-add-price2">ثبت</span>
                            </div>
                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="refuse-modal<?=$row2['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">اطمینان از رد درخواست همکاری</h4>
                                            <button type="button" class="close p-0 m-0" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <span class="mt-4">در صورت رد درخواست همکاری دیگر نمی توانید این مورد را ویرایش کنید و لازم است تا دوباره یک درخواست جدید ایجاد شود</span>
                                            <label class="mt-3">متن پیام</label>
                                            <textarea name="txt" class="form-control txt-refuse">

                                            </textarea>

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer modal-btn">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="refuseRequest(<?=$row2['id']?> , <?=$id_user?>)">بله، رد درخواست</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="accept-modal<?=$row2['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">اطمینان از پذیرفتن درخواست همکاری</h4>
                                            <button type="button" class="close p-0 m-0" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <span class="mt-4">در صورت پذیرفتن درخواست همکاری دیگر نمی توانید این مورد را ویرایش کنید و لازم است تا دوباره یک درخواست جدید ایجاد شود</span>

                                            <label class="mt-3">متن پیام</label>
                                            <textarea name="txt" class="form-control txt-accept">

                                            </textarea>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer modal-btn">
                                            <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" onclick="acceptRequest(<?=$row2['id']?> , <?=$id_user?>)">بله، پذیرفتن درخواست</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php }
                    }?>

                            <?php if ($isFront == 0){ ?>
                                <i style="position: absolute; bottom: 4px; left: -20px; font-size: .7rem " class="ml-4 fas <?php if ($row2['viewed'] == 1){echo 'fa-check-double text-primary';} else {echo 'fa-check text-secondary';} ?>"></i>
                            <?php } ?>

                            <?php if ($row2['status'] == 1){ ?>
                                <span class="refused-txt text-success">این درخواست پذیرفته شده است</span>
                            <?php } ?>

                            <?php if ($row2['status'] == -1){ ?>
                                <span class="refused-txt">این درخواست رد شده است</span>
                            <?php } ?>

                            <?php if ($row2['status'] == 8){ ?>
                                <span class="refused-txt">مبلغ پیشنهادی این درخواست پذیرفته نشده و مبلغ جدیدی پیشنهاد شده است</span>
                            <?php } ?>

                        </div>
                        <span style="right: <?php if ($isFront == 1){echo '16.45%';} else {echo 'unset; left: 17%;';} ?>" class="btn-container">
                            <i class="far fa-handshake icon-work-message"></i>
                            <?php
                                if ($row2['status'] == 1){
                                    if ($isFront == 0){
                                ?>

                                    <div class="work-msg-info">
                                        عملیات پرداخت
                                         <i class="fas fa-money-check-alt"></i>
                                    </div>

                                        <div class="payment-box">
                                        جزئیات قرارداد
                                         <i class="fas fa-hands-helping"></i>
                                    </div>

                                        <?php } else { ?>
                                        <div class="work-msg-info fs0-9 bg-danger" style="white-space: nowrap; right: -100px">
                                        در انتظار پرداخت
                                    </div>

                                        <div class="payment-box" style="right: -100px">
                                        جزئیات قرارداد
                                         <i class="fas fa-hands-helping"></i>
                                    </div>
                                        <?php } ?>



                                <i style="position: absolute; right: -11px; font-size: 1.3rem" class="fas fa-check-circle text-success"></i>

                                    <!-- work msg info modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">جزئیات قرارداد</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                <p>این قرارداد میان</p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

                        <?php
                           }
                                 ?>
                        </span>

                    </div>

                    <?php } ?>
            <?php } ?>

        <div class="input-send-message-container">
        <div class="input-send-message">
            <textarea class="form-control txt-send-message p-4 h-100" rows="5" id="comment" name="text"></textarea>
            <span class="circle-btn-send-message">
            <span class="btn-send-message"></span>
                </span>
        </div>
            <div class="send-work-msg d-flex">
                <input class="form-control check-work-msg" type="checkbox">
                <i class="far fa-handshake icon-work-message"></i>
                <span>ارسال به عنوان پیام کاری</span>
            </div>
        </div>


    </div>

<span class="btn-scroll2">اولین پیام</span>


<div class="modal" id="work1-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="work-message-container work-msg1">
                    <div class="work-message">
                        <div class="row-message">
                            <span>درخواست یکی از اشعار دفتر شعر</span>
                            <span class="family-front-user"></span>
                        </div>


                        <div class="list-container container-fluid">

                            <div class="row w-100">

                            <div class="main-select col-md-6">

                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <br>

                                <label class="text-dark">اشعار شاعر</label>
                                <ul class="list-group" id="myList">

                                </ul>

                            </div>

                                <div class="col-md-5">
                                    <label class="text-dark">اشعار انتخابی</label>
                            <ul class="list-group list-selected-poems">
                            </ul>
                                </div>

                            </div>
                        </div>

                        <span style="margin-bottom: 20px; color: #363636">متن پیام</span>

                        <textarea class="txt-work-message form-control"></textarea>

                        <div class="price-container">
                            <span style="margin-top: 22px; color: #2e2e2e">مبلغ پیشنهادی شما برای قرارداد</span>
                            <input class="txt-price-sender digits form-control" style="width: unset; display: inline-block">
                            <span style="margin-top: 22px; margin-right: 6px">تومان</span>
                        </div>

                        <div style="display: flex; justify-content: center; margin-top: 20px">
    <span class="btn-send-work-message" onclick="setWorkMessage(1 , this)">
        ارسال پیام
    </span>
                            <span data-dismiss="modal" style="background: #5f575f" class="btn-send-work-message">
        لغو
    </span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="work2-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="work-message-container work-msg2">
                    <div class="work-message">
                        <div class="row-message">
                            <span>درخواست سرودن شعر جدید از</span>
                            <span style="margin-right: 4px" class="family-front-user"></span>
                        </div>

                        <span style="margin-bottom: 20px; color: #363636">متن پیام</span>

                        <textarea class="txt-work-message form-control"></textarea>

                        <div class="price-container">
                            <span style="margin-top: 22px; color: #2e2e2e">مبلغ پیشنهادی شما برای قرارداد</span>
                            <input class="txt-price-sender digits form-control" style="width: unset; display: inline-block">
                            <span style="margin-top: 22px; margin-right: 6px">تومان</span>
                        </div>

                        <div style="display: flex; justify-content: center; margin-top: 20px">
    <span class="btn-send-work-message" onclick="setWorkMessage(2 , this)">
        ارسال پیام
    </span>
                            <span data-dismiss="modal" style="background: #5f575f" class="btn-send-work-message">
        لغو
    </span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="work3-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="work-message-container work-msg3">
                    <div class="work-message">
                        <div class="row-message">
                            <span>ارسال پیام کاری به</span>
                            <span style="margin-right: 4px" class="family-front-user"></span>
                        </div>

                        <div class="price-container" style="margin-bottom: 15px">
                            <span style="margin-top: 22px; color: #2e2e2e">عنوان درخواست</span>
                            <input style="font-size: .9rem; font-family: yekan; width: 240px" class="txt-price-sender digits form-control">
                        </div>


                        <span style="margin-bottom: 20px; color: #363636">متن پیام</span>

                        <textarea class="txt-work-message form-control"></textarea>

                        <div style="display: flex; justify-content: center; margin-top: 20px">
    <span onclick="setWorkMessage(3 , this)" class="btn-send-work-message">
        ارسال پیام
    </span>
                            <span data-dismiss="modal" style="background: #5f575f" class="btn-send-work-message">
        لغو
    </span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





<script>

    $(document).ready(function () {
        /*custom scroll bar*/
        $('.fixed-poems-title').mCustomScrollbar({
            setWidth: false,
            setHeight: false,
            setTop: 0,
            setLeft: 0,
            axis: "y",
            scrollbarPosition: "inside",
            scrollInertia: 250,
            autoDraggerLength: true,
            autoHideScrollbar: false,
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

        setTimeout( function () {
            $(".fixed-poems-title").mCustomScrollbar('scrollTo','.selected-chat');
        }, 100);
    })

    function pageLoad() {
        $('input.digits').keyup(function (event) {
            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) {
                event.preventDefault();
            }
            var $this = $(this);
            var num = $this.val().replace(/,/g, '');
            // the following line has been simplified. Revision history contains original.
            $this.val(num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
        });
    }

    function acceptRequest(messageId , frontUser){
        var txt = $('.txt-accept').val();
        var url = 'panel/acceptRequest/'+messageId+'/'+frontUser+'/'+txt;
        var data ={};
        $.post(url , data , function (msg) {
            if (msg == 1){
                showNotification('درخواست پذیرفته شد');
                setTimeout(function () {
                    window.location.reload();
                } , 5000)
            }
        })
    }

    $('.btn-new-price').click(function () {
        $(this).next().slideToggle(600);
        pageLoad();

        $('.btn-add-price2').click(function () {
            var price2 = $(this).parents('.expand-new-price').find('.price2').val().split(',').join('');
            price2 = parseInt(price2);
            var messageId = $(this).parents('.message-container').attr('data-id');
            var frontUser = $(this).parents('.message-container').attr('data-id-user');

            var url = 'panel/newPrice';
            var data = {'price':price2 , 'id_message':messageId , 'user_front':frontUser};
            $.post(url , data , function (msg) {
                if (msg == 1){
                    $(this).parents('.expand-new-price-container').slideUp(600);
                    showNotification('مبلغ مورد نظر شما ثبت شد');
                    setTimeout(function () {
                        window.location.reload();
                    } , 6000)
                }
            })

        })
    })
/*///////////*/
    function refuseRequest(messageId , frontUser){
        console.log(frontUser);
        var txt = $('.txt-refuse').val();
        var url = 'panel/refuseRequest/'+messageId+'/'+frontUser+'/'+txt;
        var data ={};
        $.post(url , data , function (msg) {
            if (msg == 1){
                showNotification('درخواست رد شد');
                setTimeout(function () {
                    window.location.reload();
                } , 6000)
            }
        })
    }

    $('.selected-poems-message-work').each(function () {
        var poemIds = $(this).attr('data-poem-ids');
        var poemIdsArray = poemIds.split(',');

        var thisUl = $(this);

        var url = 'panel/selectedPoemsTitle';
        var data = {'poems_array':poemIdsArray};
        $.post(url , data , function (msg) {
            console.log(msg);

            $.each(msg , function (index , value) {

                var poemTitle = value['title'];
                var poemId = value['id'];

                var appendItem = '<li class="list-group-item d-flex align-items-center"><span class="badge badge-light badge-pill ml-2">'+poemId+'</span>'+poemTitle+'<a class="badge badge-secondary mr-2" style="cursor: pointer">مشاهده</a></li>';

                thisUl.append(appendItem);

            })

            $(this).text()
        } , 'json')
    })

    function setWorkMessage(type , tag) {
        var thisTag = $(tag)
        var frontUserId = thisTag.parents('.work-message').attr('data-front-user');

            var poemIds = [];
            $('.list-selected-poems li').each(function () {
                var poemId = $(this).attr('data-id');
                poemIds.push(poemId);

            })
        console.log(poemIds);
            var txt = thisTag.parents('.work-message').find('.txt-work-message').val().replace(/\n/g, "<br />");
            var price = thisTag.parents('.work-message').find('.txt-price-sender').val().split(',').join('');
            price = parseInt(price);

        var data = {'poems':poemIds , 'txt':txt , 'price':price , 'type':type , 'id_receiver':frontUserId}
        var url = 'panel/setWorkMessage';
        doProgress(0,0);
        $.post(url , data , function (msg) {
            console.log(msg)
            if (msg == 1){
                mainNtf('پیام شما با موفقیت ارسال شد');
                setTimeout(function () {
                    $('.progress-line').finish();
                    window.location.reload();
                },2500)
            }
        })

    }





    $('.txt-work-message').gTextAreaAutoSize();

    $('.dropdown1 .btn').gDropDown1();

    $('.not-viewed').find('.message-item').css('border' , '1px solid #56F08D')

    function workMessage(type=''){
        var frontUserId = $('.messages-titlebar').find('h6').attr('data-user-id');
        var family = $('.messages-titlebar').find('h6').text();
        $('.work-message').find('.family-front-user').text('«'+family+'»');
        $('.work-message').attr('data-front-user' , frontUserId);
        if (type==1){
            $('#work1-modal').show();

            pageLoad();
            var url = 'panel/getUserPoemsTitle/'+frontUserId;
            var data = {};
            $.post(url , data , function (msg) {
                console.log(msg)

                $('.list-selected-poems').html('')
                $('.main-select ul').html('');
                $.each(msg , function (index , value) {
                    var title = value['title'];
                    var poemId = value['id'];

                    var appendItem = '<li data-id='+poemId+' class="list-group-item poem-list"><span class="ml-3 badge badge-secondary">'+poemId+'</span>'+title+'<i class="fas fa-times-circle mr-2 btn-delete d-none float-left" style="cursor: pointer; font-size: 1rem;"></i></li>';
                    $('.main-select ul').append(appendItem);

                })

                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myList li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });


                $('#myList').find('.poem-list').click(function () {
                    var dataId1 = $(this).attr('data-id');
                    var isRepeated = 0;
                    $('.list-selected-poems li').each(function () {
                        var dataId2 = $(this).attr('data-id');
                        if (dataId2 == dataId1){
                          isRepeated = 1;
                        }
                    })

                    if (isRepeated == 0) {
                        var cloneLi = $(this).clone();
                        cloneLi.appendTo('.list-selected-poems');
                        cloneLi.find('.btn-delete').removeClass('d-none');
                        $(this).addClass('disable' , 800)
                    }




                    $('.list-selected-poems i').click(function () {
                        $(this).parents('.poem-list').fadeOut(600 , function () {
                            $(this).remove()
                        })
                        var dataId3 = $(this).parents('.poem-list').attr('data-id');
                        $('#myList li').each(function () {
                            var dataId4 = $(this).attr('data-id');
                            if (dataId3 == dataId4){
                                $(this).removeClass('disable' , 800)
                            }
                        })
                    })

                })

            } , 'json')

        }

        if (type==2){
            $('.work-msg2').fadeIn(600);
            pageLoad();

        }

        if (type==3){
            $('.work-msg3').fadeIn(600);
        }
    }

    /*smooth scroll*/

    $(window).scroll(function () {
        if ($(this).scrollTop() > 650){
            $('.btn-scroll2').fadeIn(300);
        } else {
            $('.btn-scroll2').fadeOut(300);
        }

    })

    $('.btn-scroll2').click(function () {
        $('html').animate({scrollTop : '0'} , 'slow' )
    })


    /*//*/


    $('.li-message-sender').each(function () {
        var userId = $(this).find('.txt-sidebar-poem-notebook').attr('data-id-user');
        var messagesNumber = parseFloat($(this).find('.message-counter').text());


        var $rowsToGroup = $(this).nextAll('.li-message-sender').filter(function () {
            return $(this).find('.txt-sidebar-poem-notebook').attr('data-id-user') === userId;
        });


        $rowsToGroup.each(function () {

            messagesNumber += parseFloat($(this).find('.message-counter').text());
            $(this).remove();
        });


        $(this).find('.message-counter').text(messagesNumber);
    })


    $('.li-message-sender').each(function () {
        var senderId2 = $(this).attr('data-sender');

        var notViewedMsg = 0;

        $('.not-viewed').each(function () {
            var senderId = $(this).attr('data-id-user');

            if (senderId == senderId2){
                notViewedMsg++;
            }

        })
        if (notViewedMsg != 0) {
            $(this).find('.not-viewed-counter').text(notViewedMsg)
        } else {
            $(this).find('.not-viewed-counter').remove();
        }

    })

    /*//*/



    $('#'+sessionStorage.getItem('message'))[0].click();

    function liMessage(tag , senderId , type='' , lastseen='') {

        var thisTag = $(tag);

        sessionStorage.setItem('message' , thisTag.prop('id'));

        scrollSmoothToBottom();

        var clickedLi = thisTag;

        $('.input-send-message-container').fadeIn(600);

        $('.messages-titlebar').css("visibility", "visible");
        var family = thisTag.find('.txt-sidebar-poem-notebook').text();
        $('.messages-titlebar').find('h6').text(family);
        $('.messages-titlebar').find('h6').attr('data-user-id' , senderId);
        $('.messages-titlebar').find('img').attr('src' , 'public/images/users/'+senderId+'/user_64.jpg')
        $('.messages-titlebar').find('.last-seen').text(lastseen);

        if (lastseen.trim() == 'آنلاین'){
            $('.messages-titlebar').find('.last-seen').prev().fadeOut();
        }

        var userType = '';
        if (type == 1){
            userType = 'شاعر';
        } else if (type == 2){
            userType = 'خواننده';
        } else if (type == 3){
            userType = 'شاعر و خواننده';
        }

        $('.messages-titlebar').find('.user-type').text(userType);

        var url = 'panel/setmessageviewed';
        var data = {'id_sender':senderId};
        $.post(url , data , function (msg) {
            clickedLi.find('.not-viewed-counter').fadeOut(1400)
        })

        $('.ul-sidebar-poem-notebook-messages > .li-message-sender').css('background-color','#193d3d');
        thisTag.animate({backgroundColor:'#207066'} , 100);
        thisTag.addClass('selected-chat');

        $('.message-container').fadeOut(0);

        $('.message-container').each(function () {
            var liUserId = clickedLi.find('.txt-sidebar-poem-notebook').attr('data-id-user');

            var itemssToShow = $(this).filter(function () {
                return $(this).attr('data-id-user') === liUserId;
            });

            itemssToShow.each(function () {
                $(this).slideDown(400);
            })
        })


        $('.li-message-sender').each(function () {
            var userId = $(this).find('.txt-sidebar-poem-notebook').attr('data-id-user');
            var messagesNumber = parseFloat($(this).find('.message-counter').text());


            var $rowsToGroup = $(this).nextAll('.li-message-sender').filter(function () {
                return $(this).find('.txt-sidebar-poem-notebook').attr('data-id-user') === userId;
            });


            $rowsToGroup.each(function () {

                messagesNumber += parseFloat($(this).find('.message-counter').text());
                $(this).remove();
            });


            $(this).find('.message-counter').text(messagesNumber);
        })


        $('.li-message-sender').each(function () {
            var senderId2 = $(this).attr('data-sender');

            var notViewedMsg = 0;

            $('.not-viewed').each(function () {
                var senderId = $(this).attr('data-id-user');

                if (senderId == senderId2){
                    notViewedMsg++;
                }

            })
            if (notViewedMsg != 0) {
                $(this).find('.not-viewed-counter').text(notViewedMsg)
            } else {
                $(this).find('.not-viewed-counter').remove();
            }

        })


    }

    $('.circle-btn-send-message').click(function () {


        var senderId = $(this).parents('.content-messages').find('.message-container:visible:first').attr('data-id-user')
        var txtMsg = $('.txt-send-message').val().replace(/\n/g, "<br />");
        var isWorkMessage = 0;
        if ($('.check-work-msg').is(":checked")){
            isWorkMessage = 8;
        }


        var url = 'panel/sendMessage';
        var data = {'txt':txtMsg , 'id_receiver':senderId , 'is_work_msg':isWorkMessage};
        doProgress(0,0);
        $.post(url , data , function (msg) {
            if (msg == 1) {
                mainNtf('پیام شما با موفقیت ارسال شد');

                setTimeout(function () {
                    $('.progress-line').finish();
                    window.location.reload();
                }, 2000)
            } else {
                mainNtf('متاسفانه در ارسال پیام مشکلی به وجود آمده است. لطفا دوباره امتحان کنید');
            }

        })
    })

    function scrollSmoothToBottom () {
        $('html').animate({
            scrollTop: document.body.scrollHeight+9000
        }, 1000);
    }

    $(document).ready(function () {

        /*custom scroll bar*/
        $('.fixed-poems-title').mCustomScrollbar({
            setWidth: false,
            setHeight: false,
            setTop: 0,
            setLeft: 0,
            axis: "y",
            scrollbarPosition: "inside",
            scrollInertia: 250,
            autoDraggerLength: true,
            autoHideScrollbar: false,
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

        setTimeout( function () {
            $(".fixed-poems-title").mCustomScrollbar('scrollTo','.selected-chat');
        }, 100);
    })








</script>