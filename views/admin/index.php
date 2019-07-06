<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?= URL ?>">
    <link rel="stylesheet" type="text/css" href="public/bootstrap_rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/css1/admin.css">
    <link rel="stylesheet" type="text/css" href="public/css1/projectStyles.css">
    <script src="public/js2/jquery-3.3.1.min.js"></script>
    <script src="public/js2/jquery-ui.min.js"></script>
    <script src="public/bootstrap/popper.js"></script>
    <script src="public/bootstrap_rtl/bootstrap.min.js"></script>
    <script src="public/js2/jquery.hoverIntent.js"></script>



    <style>
        html{
            height: 100%;
        }
    </style>

</head>
<body class="h-100" style="direction: rtl; font-family: yekan; font-size: 10pt">

<header class="header d-flex w-100">

</header>

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-12 col-md-3  col-lg-2 bg-dark p-2">

            <ul class="list-group">
                <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center active">
                    داشبورد
                    <span class="badge badge-light">14</span>
                </li>
                <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                    کاربران
                    <span class="badge badge-light">2</span>
                </li>
                <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                    اشعار
                    <span class="badge badge-light ">1</span>
                </li>
            </ul>

        </div>
        <div class="col-12 col-md-9 col-lg-10 bg-secondary">

            <form id="form-user" action="admin/dofilter" method="post">
            <div id="users" class="w-100 h-100 p-2">
                <div class="w-100 rounded-top used-filter-bar mt-3 d-flex align-items-center position-relative flex-wrap">


                    <span class="ml-4 mr-2">نوع</span>
                    <select onchange="doFilter()" name="type">
                        <option value="12">همه</option>
                        <option value="1">شاعر</option>
                        <option value="2">خواننده</option>
                    </select>

                    <span class="ml-4 mr-2">وضعیت</span>
                    <select onchange="doFilter()" name="confirm">
                        <option value="10">همه</option>
                        <option value="1">تایید شده</option>
                        <option value="0">تایید نشده</option>
                    </select>

                    <span class="ml-4 mr-2">جنسیت</span>
                    <select onchange="doFilter()" name="gender">
                        <option value="10">همه</option>
                        <option value="1">مرد</option>
                        <option value="0">زن</option>
                    </select>

                    <span class="ml-4 mr-2">آنلاین/آفلاین</span>
                    <select onchange="doFilter()" name="status">
                        <option value="10">همه</option>
                        <option value="1">آنلاین</option>
                        <option value="0">آفلاین</option>
                    </select>

                    <div class="d-flex ">
                        <div id="compare" action="" method="" class="d-flex">
                            <div>
                                <span>تاریخ آغاز</span>
                                <span>روز</span>
                                <select name="day1">
                                    <?php for ($i=1; $i<32; $i++){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                                <span>ماه</span>
                                <select name="month1">
                                    <?php for ($i=1; $i<=12; $i++){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                                <span>سال</span>
                                <select name="year1">
                                    <?php
                                    $thisYear = Model::jalaliDate('Y');
                                    for ($i=$thisYear; $i>=1300; $i--){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="ml-5">
                                <span>تاریخ پایان</span>
                                <span>روز</span>
                                <select name="day2">
                                    <?php for ($i=1; $i<32; $i++){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                                <span>ماه</span>
                                <select name="month2">
                                    <?php for ($i=1; $i<=12; $i++){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                                <span>سال</span>
                                <select name="year2">
                                    <?php
                                    $thisYear = Model::jalaliDate('Y');
                                    for ($i=$thisYear; $i>=1300; $i--){ ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="container-fluid">
                <div class="row p-3">
                    <div class="col-12 col-lg-8">
                        <div class="fixed-header">
                        <div class="">

                            <div class="filter-title rounded bg-dark text-white mb-2 mx-auto d-flex align-items-center p-2">
                                <span class="">نمایش</span>
                                <span class="filter1 ml-2 text-warning">همه کاربران</span>
                                <span class="filter2 ml-2 text-warning"></span>
                                <span class="filter3 ml-2 text-warning"></span>
                                <span class="filter4 ml-2 text-warning"></span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-1">
                        <h6 class="text-white">تعداد نتایج:
                        <span class="result-number">10</span>
                        </h6>
                                <div class="btn-group used-btn-bar">
                                    <button type="button" class="btn btn-success" onclick="showModal('#myModal' , this)">تایید عضویت</button>
                                    <button type="button" class="btn btn-dark" onclick="showModal('#myModal2' , this)">لغو عضویت</button>
                                    <button type="button" class="btn btn-danger" onclick="showModal('#myModal3' , this)">حذف</button>
                                    <button type="button" class="btn btn-primary btn-select-all"">انتخاب همه</button>
                                </div>
                            </div>

                            <input class="form-control" id="myInput" type="text" placeholder="جستجو..">
                            <div class="pagination-row justify-content-end align-items-center mt-1">

                                <p class="mr-2 m-0 text-light rounded">تعداد نمایش در هر صفحه</p>

                                <select class="mr-4 used-select-number">
                                    <option value="10">10</option>
                                    <option value="20" selected>20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>

                                <button type="button" class="btn btn-light btn-sm mr-2 used-btn-next" onclick="doFilter(parseFloat(currentPage)+1)">صفحه بعد</button>
                            <ul class="pagination m-0 p-0 justify-content-end used-pagination-users flex-row-reverse align-items-center">

                            </ul>
                                <button type="button" class="btn btn-light btn-sm ml-2 used-btn-back" onclick="doFilter(parseFloat(currentPage)-1)">صفحه قبل</button>

                            </div>
                        </div>
                        </div>

                <table id="table-all" class="table-user table table-dark table-hover table-bordered table-responsive-md rounded mt-4">
                    <thead>
                    <tr id="head-tr" class="thead-light">
                        <th>ردیف</th>
                        <th>نوع</th>
                        <th>نام و نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>وضعیت</th>
                        <th >تاریخ عضویت</th>
                    </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody id="myTable">


                    </tbody>
                </table>
                    </div>

                    <div class="col-12 col-lg-4 show-user-details">


                    </div>

                </div>
                </div>

            </div>
            </form>

        </div>
    </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">اطمینان از تایید عضویت</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal-confirm modal-text">
                آیا می خواهید عضویت موارد انتخاب شده را تایید کنید؟
            </div>
            <div class="modal-body modal-confirm modal-empty">
                شما هیچ موردی را انتخاب نکرده اید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer modal-btn">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="doFilter('' , 'confirm')">بله</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">اطمینان از لغو عضویت</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal-confirm modal-text">
                آیا می خواهید عضویت موارد انتخاب شده را لغو کنید؟
            </div>
            <div class="modal-body modal-confirm modal-empty">
                شما هیچ موردی را انتخاب نکرده اید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer modal-btn">
                <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="doFilter('' , 'unconfirm')">بله</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">اطمینان از حذف کاربر</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal-confirm modal-text">
                آیا می خواهید موارد انتخاب شده را حذف کنید؟
            </div>
            <div class="modal-body modal-confirm modal-empty">
                شما هیچ موردی را انتخاب نکرده اید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer modal-btn">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="doFilter('' , 'delete')">بله</button>
            </div>

        </div>
    </div>
</div>



<script>



    /*filter title*/

    $('select[name="type"]').on('change' , function () {
        if ($(this).val() == 1){
            $('.filter1').text('شاعران')
        } else if ($(this).val() == 2){
            $('.filter1').text('خوانندگان')
        } else {
            $('.filter1').text('همه کاربران')
        }
    })

    $('select[name="confirm"]').on('change' , function () {
        if ($(this).val() == 1){
            $('.filter2').text('تایید شده')
        } else if ($(this).val() == 0){
            $('.filter2').text('تایید نشده')
        } else {
            $('.filter2').text('')
        }
    })

    $('select[name="gender"]').on('change' , function () {
        if ($(this).val() == 1){
            $('.filter3').text('مرد')
        } else if ($(this).val() == 0){
            $('.filter3').text('زن')
        } else {
            $('.filter3').text('')
        }
    })

    $('select[name="status"]').on('change' , function () {
        if ($(this).val() == 1){
            $('.filter4').text('آنلاین')
        } else if ($(this).val() == 0){
            $('.filter4').text('آفلاین')
        } else {
            $('.filter4').text('')
        }
    })

    /*//*/

    var heightHeader = parseFloat($('.header').css('height'));
    var heightfilters = parseFloat($('.used-filter-bar').css('height'));
    var totalHeight = heightfilters + heightHeader;
    var tableWidth = $('#table-all').css('width');
    var fixedHeaderWidth = $('.fixed-header').css('width');


    $(window).scroll(function() {
        if ($(this).scrollTop() > totalHeight+400){
            $('.fixed-header').addClass("sticky" , 800);
            $('.fixed-header').css('width' , tableWidth);
            $('.pagination-row').css('display' , 'none');
            $('.show-user-details').addClass('sticky' , 800);

        }
        else{
            $('.fixed-header').removeClass("sticky");
            $('.fixed-header').css('width' , fixedHeaderWidth);
            $('.pagination-row').css('display' , 'flex');
            $('.show-user-details').removeClass('sticky');
        }
    });

    doFilter();

    $('.btn-select-all').click(function () {
        if ($(this).text().trim() == 'انتخاب همه') {
            $('#table-all tr:not(#head-tr)').addClass('active');
            $('.input-select-user').attr('checked', true);
            $(this).text('لغو انتخاب همه')
        } else {
            $('#table-all tr:not(#head-tr)').removeClass('active');
            $('.input-select-user').attr('checked', false);
            $(this).text('انتخاب همه')
        }
    })

        function showModal(modalId , tag) {
            var thisTag = $(tag);

            thisTag.attr({'data-toggle': 'modal', 'data-target': ''+modalId+''});

            if ($('.input-select-user:checked').length < 1) {
                $('.modal-text').hide();
                $('.modal-empty').show();
                $('.modal-btn').hide();
            } else {
                $('.modal-text').show();
                $('.modal-empty').hide();
                $('.modal-btn').show();
            }
        }


    /*selectable table item*/

    var control = false;
    $(document).on('keyup keydown', function(e) {
        control = e.ctrlKey;
    });

    $('#table-all tr:not(#head-tr)').on('click', function() {
        var checkBox = $(this).find('.input-select-user');
        if (control) { // control-click
            $(this).toggleClass('active');

            if ($(this).hasClass('active')){
                checkBox.attr('checked', true);
            } else {
                checkBox.attr('checked', false);
            }

        } else { // single-click
            $('#table-all tr:not(#head-tr)').removeClass('active');
            $(this).addClass('active');
                $('.input-select-user').attr('checked', false);
                checkBox.attr('checked', true);

        }
    });

    /*//*/

    /*search by keyword*/

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /*//*/

    /*change dropdown name*/

    $('.used-drop-menu > li').click(function () {
        $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
    })

    /*//*/

    /*btn show more*/

    $('.used-btn-show-more').click(function () {
        $('.used-filter-bar-dates').slideToggle(600);
    })

    /*//*/

    /*pagination*/

    $('.used-pagination-users li').click(function () {
        $('.used-pagination-users li').removeClass('active');
        $(this).addClass('active');
        doFilter();
    })

    /*//*/

    var currentPage = 1;

    /*do filter*/

    function doFilter(page='' , option='') {

        var lastPage = $('.used-pagination-users li:last').find('a').text();

        if (page == '') {

            currentPage = $('.used-pagination-users li.active').find('a').text();
            if (currentPage == '') {
                currentPage = 1;
            }

        } else {

            if (page < 1){
                page = 1;
            }
            if (page > lastPage){
                page = lastPage;
            }
            if (page == 11){
                page = 2;
            }


            currentPage = page;
        }

        if (option == 'confirm'){
            var btnConfirm = 1;

        }
        if (option == 'unconfirm'){
            var btnUnConfirm = 1;
        }
        if (option == 'delete'){
            var btnDelete = 1;
        }


        var submit = 0;


        if (currentPage == 1){
            $('.used-btn-back').addClass('text-muted');
        } else {
            $('.used-btn-back').removeClass('text-muted');
        }

        if (currentPage == lastPage){
            $('.used-btn-next').addClass('text-muted');
        } else {
            $('.used-btn-next').removeClass('text-muted');
        }




        var itemsNumber = $('.used-select-number').find(":checked").val();

        var url = 'admin/doFilter';

        var data = $('#form-user').serializeArray();
        data.push({'name': 'submit', 'value': submit});
        data.push({'name': 'current_page', 'value': currentPage});
        data.push({'name': 'limit', 'value': itemsNumber});
        data.push({'name': 'btn_confirm', 'value': btnConfirm});
        data.push({'name': 'btn_unconfirm', 'value': btnUnConfirm});
        data.push({'name': 'btn_delete', 'value': btnDelete});

        console.log(data);


        $.post(url , data , function (msg) {

            $('.result-number').text(msg[1]);

            console.log(msg[0])


            var i = 1;
            var userType = '';
            var userConfirm = '';



            var resultNumber = msg[1];
            var pagesNumber = Math.ceil(resultNumber/itemsNumber);

            var active2 = '';
            var i2 = 1;

            $('.used-pagination-users').html('');

            for(i2=1; i2<=pagesNumber; i2++) {

                if(i2 == currentPage){
                    active2 = 'active';
                } else {
                    active2 = '';
                }


                $('.used-pagination-users').append('<li class="page-item '+active2+'"><a class="page-link">'+i2+'</a></li>');

            }

            $('.used-pagination-users li').click(function () {
                $('.used-pagination-users li').removeClass('active');
                $(this).addClass('active');
                doFilter();
            })


            $('#myTable').html('');

            $.each(msg[0] , function (index , value) {

                var type = value['type'];

                if (type == 1){
                    userType = 'شاعر';
                } else if (type == 2){
                    userType = 'خواننده';
                }

                var family = value['family'];
                var email = value['email'];

                var confirm = value['confirm'];

                if (confirm == 1){
                    userConfirm = 'تایید شده';
                } else if (confirm == 0){
                    userConfirm = 'تایید نشده';
                }

                var fullDate = value['register_date'];

                var explodDate = fullDate.split('-');

                var date = explodDate[0];
                var time = explodDate[1];

                var rowNumber = i+(itemsNumber*(currentPage-1));

                var appendItem = '<tr><td>'+rowNumber+'</td><td>'+userType+'</td><td>'+family+'</td><td>'+email+'</td><td>'+userConfirm+'</td><td>'+date+'</td><td class="d-none"><input class="input-select-user" name="id[]" value="'+value['id']+'" type="checkbox"></td></tr>';


                $('#myTable').append(appendItem);

                i++;
            })

            /*set index for items*/

            /*//*/


            /*-----selectable table items by ctrl+click*/

            $('#table-all tr:not(#head-tr)').on('click', function() {
                var checkBox = $(this).find('.input-select-user');
                if (control) { // control-click
                    $(this).toggleClass('active');

                    if ($(this).hasClass('active')){
                        checkBox.attr('checked', true);
                    } else {
                        checkBox.attr('checked', false);
                    }

                } else { // single-click
                    $('#table-all tr:not(#head-tr)').removeClass('active');
                    $(this).addClass('active');
                    $('.input-select-user').attr('checked', false);
                    checkBox.attr('checked', true);

                    $('.show-user-details').html('');

                    var userId = $(this).find('input').val();





                    var data2 = {'id_user':userId};
                    var url2 = 'admin/getUsersInfo2';
                    console.log(data2);
                    $.post(url2 , data2 , function (msg2) {
                        console.log(msg2);
                        var userId = msg2['id'];
                        var family = msg2['family'];
                        var type = msg2['type'];
                        if (type == 1){
                            type = 'شاعر';
                        } else {
                            type = 'خواننده';
                        }
                        var mobile = msg2['mobile'];
                        var email = msg2['email'];
                        var state = msg2['state'];
                        var city = msg2['city'];
                        var married = msg2['married'];
                        if (married == 0){
                            married = 'مجرد';
                        } else {
                            married = 'متاهل';
                        }
                        var job = msg2['job'];
                        var edu = msg2['edu'];
                        var gender = msg2['gender'];
                        if (gender == 1){
                            gender = 'مرد';
                        } else {
                            gender = 'زن';
                        }
                        var lastseen = msg2['lastseen2'];
                        var description = msg2['description'];
                        var birthday = msg2['birthday'];


                        var appendDetails =  '<div class="media border p-3"><img src="public/images/users/'+userId+'/user_64.jpg" alt="John Doe" class="mr-3 rounded-circle" style="width:60px;"><div class="media-body"><h6 class="text-white">'+family+'<span class="badge badge-light">'+type+'</span></h6><p class="text-light">'+description+'</p></div></div><table class="table-user table table-light table-striped table-bordered table-responsive-md rounded table-sm"><thead></thead><tfoot></tfoot><tbody><tr><td>کد عضویت</td><td>'+userId+'</td></tr><tr><td>موبایل</td><td>'+mobile+'</td></tr> <tr><td>ایمیل</td><td>'+email+'</td></tr><tr><td>آخرین بازدید</td><td>'+lastseen+'</td></tr><tr><td>استان</td><td>'+state+'</td></tr><tr><td>شهر</td><td>'+city+'</td></tr><tr><td>جنسیت</td><td>'+gender+'</td></tr><tr><td>وضعیت تاهل</td><td>'+married+'</td></tr><tr><td>شغل</td><td>'+job+'</td></tr><tr><td>تحصیلات</td><td>'+edu+'</td></tr><tr><td>تاریخ تولد</td><td>'+birthday+'</td></tr></tbody></table>';
                        $('.show-user-details').append(appendDetails);


                    } , 'json')

                }
            });

            /*------//*/

            
        } , 'json')
    }


    $('.used-select-number').on('change', function() {
        doFilter(1);
    });




</script>

</body>
</html>