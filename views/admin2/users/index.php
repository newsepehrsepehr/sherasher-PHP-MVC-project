<?php require('views/admin2/layout.php');?>
<link rel="stylesheet" type="text/css" href="public/css2/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<form id="users-form" action="adminusers/dofilter" method="post">
    <div class="card p-0">
        <div class="card-header main-bg">مدیریت کاربران</div>
        <div class="card-body">

            <div style="padding: 0;" class="container-fluid">
            <div class="row">
                <div class="col-md-3">
            <span>نوع</span>
            <select onchange="doFilter(1)" name="type" class="select-menu-ui">
                <option value="12">همه</option>
                <option value="1">شاعر</option>
                <option value="2">خواننده</option>
            </select>
                </div>

                <div class="col-md-3">
            <span class="">وضعیت</span>
            <select onchange="doFilter(1)" name="confirm" class="select-menu-ui">
                <option value="10">همه</option>
                <option value="1">تایید شده</option>
                <option value="0">تایید نشده</option>
            </select>
                </div>

                <div class="col-md-3">
            <span class="">جنسیت</span>
            <select onchange="doFilter(1)" name="gender" class="select-menu-ui">
                <option value="10">همه</option>
                <option value="1">مرد</option>
                <option value="0">زن</option>
            </select>
                </div>

                <div class="col-md-3">
            <span class="">آنلاین/آفلاین</span>
            <select onchange="doFilter(1)" name="status" class="select-menu-ui">
                <option value="10">همه</option>
                <option value="1">آنلاین</option>
                <option value="0">آفلاین</option>
            </select>
                </div>
            </div>
                <div class="d-flex">

                    <div id="compare" class="d-flex mt-3 justify-content-center align-items-center">
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
                        <span onclick="doFilter('' , 'filter-date')" class="btn btn-primary btn-filter-date ml-2">اعمال تاریخ</span>
                    </div>

                </div>
                <div class="result-details w-100 rounded my-2 d-flex align-items-center p-2 justify-content-between">
                    <div class="d-flex align-items-center">
                    <span class="">نمایش</span>
                    <span class="filter1 ml-2 text-secondary">همه کاربران</span>
                    <span class="filter2 ml-2 text-secondary"></span>
                    <span class="filter3 ml-2 text-secondary"></span>
                    <span class="filter4 ml-2 text-secondary"></span>
                    </div>
                    <div class="d-flex align-items-center">
                    <span>
                        تعداد نتایج:
                    </span>
                    <span class="result-number">
                        400
                    </span>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <input style="height: 35px" class="form-control mr-2" id="search-input" type="text" placeholder="جستجو در جدول..">

                <span class="title-select-number">تعداد</span>
                <select class="select-numbers" name="item-number">
                    <option selected value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="250">250</option>
                    <option value="400">400</option>
                    <option value="1000">1000</option>
                </select>

                <ul style="direction: " class="pagination my-0 ml-2">
                    <li onclick="doFilter(parseFloat(currentPage)-1)" class="page-item prev-page"><a style="font-size: .8rem; width: 80px; text-align: center" class="page-link">صفحه قبل</a></li>
                </ul>
                <ul style="direction: " class="pagination page-navigators my-0 mx-1">
                    <li class="page-item disabled"><a class="page-link" tabindex="-1">3</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">1</a></li>
                </ul>
                <ul style="direction: " class="pagination my-0 mr-3">
                    <li onclick="doFilter(parseFloat(currentPage)+1)" class="page-item next-page"><a style="font-size: .8rem; width: 80px; text-align: center" class="page-link">صفحه بعد</a></li>
                </ul>

            <div class="btn-group" role="group" aria-label="Basic example">
                <button onclick="showModal('#confirm-modal' , this)" data-toggle="modal" data-target="#confirm-modal" type="button" class="btn btn-success btn-table">تایید عضویت</button>
                <button onclick="showModal('#unconfirm-modal' , this)" data-toggle="modal" data-target="#unconfirm-modal" type="button" class="btn btn-secondary btn-table">لغو عضویت</button>
                <button onclick="showModal('#delete-modal' , this)" data-toggle="modal" data-target="#delete-modal" type="button" class="btn btn-danger btn-table">حذف</button>
            </div>

            </div>

            <div style="overflow-y: scroll">
                <table style="overflow-y: scroll" class="table table-striped mt-4 my-0">
                    <thead>
                    <tr>
                        <th style="width: 8%">ردیف</th>
                        <th style="width: 8%">کد</th>
                        <th style="width: 30%">نام و نام خانوادگی</th>
                        <th style="width: 21%">ایمیل</th>
                        <th style="width: 13%">وضعیت</th>
                        <th style="width: 13%">تاریخ عضویت</th>
                        <th style="width: 4%">مشاهده</th>
                        <th style="text-align: center; width: 4%"><input class="select-all" style="cursor: pointer" type="checkbox"></th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="table-users">
            <table class="table table-bordered table-striped">
                <tbody id="table-users">
                <tr>
                    <td style="width: 8%">John</td>
                    <td style="width: 8%">Doe</td>
                    <td style="width: 30%">Doe</td>
                    <td style="width: 21%">Doe</td>
                    <td style="width: 15%">Doe</td>
                    <td style="width: 15%">john@example.com</td>
                    <td><input class="input-select" name="id[]" value="1" style="width: 4%; cursor: pointer" type="checkbox"></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</form>

<!-- The Modal -->
<div class="modal fade" id="confirm-modal">
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
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="doFilter('' , 'btn-confirm')">بله</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="unconfirm-modal">
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
                <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="doFilter('' , 'btn-unconfirm')">بله</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="delete-modal">
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
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="doFilter('' , 'btn-delete')">بله</button>
            </div>

        </div>
    </div>
</div>

<!-- User info Modal -->
<div class="modal fade" id="user-info-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">نمایش کاربر</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>

        </div>
    </div>
</div>




<script>

    function showModal(modalId , tag) {
        var thisTag = $(tag);

        thisTag.attr({'data-toggle': 'modal', 'data-target': ''+modalId+''});

        if ($('.input-select:checked').length < 1) {
            $('.modal-text').hide();
            $('.modal-empty').show();
            $('.modal-btn').hide();
        } else {
            $('.modal-text').show();
            $('.modal-empty').hide();
            $('.modal-btn').show();
        }
    }


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

    $('.input-select').click(function () {
        if ($(this).prop('checked')) {
            $(this).parents('tr').addClass('active');
        } else {
            $(this).parents('tr').removeClass('active');
        }
    })

    $('.select-all').click(function () {
        if ($(this).prop('checked')) {
            $('.input-select').prop('checked' , true);
            $('#table-users tr').addClass('active');
        } else {
            $('.input-select').prop('checked' , false);
            $('#table-users tr').removeClass('active');
        }
    })


    doFilter();


    /*search by keyword*/

    $("#search-input").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-users tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    /*//*/


    /*pagination*/

    $('.page-navigators li').click(function () {
        $('.page-navigators li').removeClass('active');
        $(this).addClass('active');
        doFilter();
    })

    /*//*/

    var currentPage = 1;

    /*do filter*/

    function doFilter(page='' , option='') {

        var lastPage = $('.page-navigators li:last').find('a').text();

        if (page == '') {

            currentPage = $('.page-navigators li.active').find('a').text();
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

        if (option == 'btn-confirm'){
            var btnConfirm = 1;

        }
        if (option == 'btn-unconfirm'){
            var btnUnConfirm = 1;
        }
        if (option == 'btn-delete'){
            var btnDelete = 1;
        }
        if (option == 'filter-date') {
            var filterDate = 1;
        }


        var submit = 0;


        if (currentPage == 1){
            $('.prev-page').addClass('text-muted');
        } else {
            $('.prev-page').removeClass('text-muted');
        }

        if (currentPage == lastPage){
            $('.next-page').addClass('text-muted');
        } else {
            $('.next-page').removeClass('text-muted');
        }




        var itemsNumber = $('.select-numbers').find(":checked").val();

        var url = 'adminusers/doFilter';

        var data = $('#users-form').serializeArray();
        data.push({'name': 'submit', 'value': submit});
        data.push({'name': 'current_page', 'value': currentPage});
        data.push({'name': 'limit', 'value': itemsNumber});
        data.push({'name': 'btn_confirm', 'value': btnConfirm});
        data.push({'name': 'btn_unconfirm', 'value': btnUnConfirm});
        data.push({'name': 'btn_delete', 'value': btnDelete});
        data.push({'name': 'filter_date', 'value': filterDate});

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

            $('.page-navigators').html('');

            for(i2=1; i2<=pagesNumber; i2++) {

                if(i2 == currentPage){
                    active2 = 'active';
                } else {
                    active2 = '';
                }


                $('.page-navigators').append('<li class="page-item '+active2+'"><a class="page-link">'+i2+'</a></li>');

            }

            $('.page-navigators li').click(function () {
                $('.page-navigators li').removeClass('active');
                $(this).addClass('active');
                doFilter();
            })


            $('#table-users').html('');

            $.each(msg[0] , function (index , value) {

                var userId = value['id'];
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

                var appendItem = '<tr><td style="width: 8%">'+rowNumber+'</td><td style="width: 8%">'+userId+'</td><td style="width: 30%">'+family+'</td><td style="width: 21%">'+email+'</td><td style="width: 13%">'+userConfirm+'</td><td style="width: 13%">'+date+'</td><td style="width: 4%"><button style="max-height: 25px; max-width: 25px" data-toggle="modal" data-target="#user-info-modal" type="button" class="btn btn-secondary d-flex align-items-center justify-content-center"><i style="font-size: 9pt" class="fas fa-user"></i></button> </td><td><input class="input-select" name="id[]" value="'+userId+'" style="width: 4%; cursor: pointer" type="checkbox"></td></tr>';


                $('#table-users').append(appendItem);

                i++;
            })

            $('.input-select').click(function () {
                if ($(this).prop('checked')) {
                    $(this).parents('tr').addClass('active');
                } else {
                    $(this).parents('tr').removeClass('active');
                }
            })

            /*set index for items*/

            /*//*/


            /*-----user details*/

            $('#table-users tr').on('click', function() {


                    $('#user-info-modal .modal-body').html('');
                    var userId = $(this).find('input').val();

                    var data2 = {'id_user':userId};
                    var url2 = 'adminusers/getUsersInfo2';
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


                        var appendDetails =  '<div class="media border p-3"><img src="public/images/users/'+userId+'/user_64.jpg" class="mr-3 rounded-circle" style="width:60px;"><div class="media-body"><h6 class="text-dark">'+family+'<span class="badge badge-dark">'+type+'</span></h6><p class="text-secondary">'+description+'</p></div></div><table class="table-user table table-light table-striped table-bordered table-responsive-md rounded table-sm"><thead></thead><tfoot></tfoot><tbody><tr><td>کد عضویت</td><td>'+userId+'</td></tr><tr><td>موبایل</td><td>'+mobile+'</td></tr><tr><td>ایمیل</td><td>'+email+'</td></tr><tr><td>آخرین بازدید</td><td>'+lastseen+'</td></tr><tr><td>استان</td><td>'+state+'</td></tr><tr><td>شهر</td><td>'+city+'</td></tr><tr><td>جنسیت</td><td>'+gender+'</td></tr><tr><td>وضعیت تاهل</td><td>'+married+'</td></tr><tr><td>شغل</td><td>'+job+'</td></tr><tr><td>تحصیلات</td><td>'+edu+'</td></tr><tr><td>تاریخ تولد</td><td>'+birthday+'</td></tr></tbody></table>';
                        $('#user-info-modal .modal-body').append(appendDetails);


                    } , 'json')


            });

            /*------//*/


        } , 'json')
    }


    $('.select-numbers').on('change', function() {
        doFilter(1);
    });

</script>


<!--required from layout-->

<div>
</div>
</div>
</section>
</body>
</html>

