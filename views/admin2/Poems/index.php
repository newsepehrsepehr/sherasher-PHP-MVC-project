<?php require('views/admin2/layout.php');
?>
<link rel="stylesheet" type="text/css" href="public/css2/jquery-ui.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="card p-0">
    <div class="card-header main-bg">بررسی اجمالی اشعار</div>
    <div class="card-body" style="direction: ltr">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
</div>

<form id="users-form" action="adminpoems/dofilterpoem" method="post">
    <div class="card p-0">
        <div class="card-header main-bg">مدیریت اشعار</div>
        <div class="card-body">

            <div style="padding: 0;" class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <span>نوع</span>
                        <select onchange="doFilterPoem(1)" name="type" class="select-menu-ui">
                            <option value="10">همه</option>
                            <option value="1">ترانه</option>
                            <option value="2">کلاسیک</option>
                            <option value="3">نیمایی</option>
                            <option value="4">سپید</option>
                            <option value="5">کودک و نوجوان</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <span class="">وضعیت</span>
                        <select onchange="doFilterPoem(1)" name="confirm" class="select-menu-ui">
                            <option value="10">همه</option>
                            <option value="1">تایید شده</option>
                            <option value="0">تایید نشده</option>
                        </select>
                    </div>
                    <div>
                        <span>تمایل به تولید اثر موسیقایی</span>
                    <input onclick="doFilterPoem(1);" type="checkbox" name="music" value="1">
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
                        <span onclick="doFilterPoem('' , 'filter-date')" class="btn btn-primary btn-filter-date ml-2">اعمال تاریخ</span>
                    </div>

                </div>
                <div class="result-details w-100 rounded my-2 d-flex align-items-center p-2 justify-content-between">
                    <div class="d-flex align-items-center">
                        <span class="">نمایش</span>
                        <span class="filter1 ml-2 text-secondary">همه اشعار</span>
                        <span class="filter2 ml-2 text-secondary"></span>
                        <span class="filter3 ml-2 text-secondary"></span>
                        <span class="filter4 ml-2 text-secondary"></span>
                    </div>
                    <div class="d-flex align-items-center">
                    <span>
                        تعداد نتایج:
                    </span>
                        <span class="result-number">
                        0
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
                    <li onclick="doFilterPoem(parseFloat(currentPage)-1)" class="page-item prev-page"><a style="font-size: .8rem; width: 80px; text-align: center" class="page-link">صفحه قبل</a></li>
                </ul>
                <ul style="direction: " class="pagination page-navigators my-0 mx-1">
                    <li class="page-item disabled"><a class="page-link" tabindex="-1">3</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">1</a></li>
                </ul>
                <ul style="direction: " class="pagination my-0 mr-3">
                    <li onclick="doFilterPoem(parseFloat(currentPage)+1)" class="page-item next-page"><a style="font-size: .8rem; width: 80px; text-align: center" class="page-link">صفحه بعد</a></li>
                </ul>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="showModal('#confirm-modal' , this)" data-toggle="modal" data-target="#confirm-modal" type="button" class="btn btn-success btn-table">تایید</button>
                    <button onclick="showModal('#unconfirm-modal' , this)" data-toggle="modal" data-target="#unconfirm-modal" type="button" class="btn btn-secondary btn-table">لغو تایید</button>
                    <button onclick="showModal('#delete-modal' , this)" data-toggle="modal" data-target="#delete-modal" type="button" class="btn btn-danger btn-table">حذف</button>
                </div>

            </div>

            <div style="overflow-y: scroll">
                <table style="overflow-y: scroll" class="table table-striped mt-4 my-0">
                    <thead>
                    <tr>
                        <th style="width: 6%">ردیف</th>
                        <th style="width: 6%">کد</th>
                        <th style="width: 10%">نوع</th>
                        <th style="width: 28%">عنوان</th>
                        <th style="width: 17%">شاعر</th>
                        <th style="width: 13%">وضعیت</th>
                        <th style="width: 13%">تاریخ ثبت</th>
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
                <h4 class="modal-title">اطمینان از تایید شعر</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal-confirm modal-text">
                آیا می خواهید موارد انتخاب شده را تایید کنید؟
            </div>
            <div class="modal-body modal-confirm modal-empty">
                شما هیچ موردی را انتخاب نکرده اید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer modal-btn">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="doFilterPoem('' , 'btn-confirm')">بله</button>
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
                <h4 class="modal-title">اطمینان از لغو تایید شعر</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body modal-confirm modal-text">
                آیا می خواهید موارد انتخاب شده را لغو تایید کنید؟
            </div>
            <div class="modal-body modal-confirm modal-empty">
                شما هیچ موردی را انتخاب نکرده اید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer modal-btn">
                <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="doFilterPoem('' , 'btn-unconfirm')">بله</button>
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
                <h4 class="modal-title">اطمینان از حذف شعر</h4>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="doFilterPoem('' , 'btn-delete')">بله</button>
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
                <h4 class="modal-title">نمایش شعر</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->

            <div class="modal-body">


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-confirm-poem" data-dismiss="modal">تایید شعر</button>
                <button type="button" class="btn btn-secondary btn-unconfirm-poem" data-dismiss="modal">لغو تایید شعر</button>
            </div>

        </div>
    </div>
</div>

<?php $stat = $data[0]; ?>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<script>

    window.onload = function() {

        var options = {

            exportEnabled: true,
            animationEnabled: true,
            title:{
                text: "انواع شعر"
            },
            legend:{
                horizontalAlign: "right",
                verticalAlign: "center"
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
                indexLabel: "{name}",
                legendText: "{name} (#percent%)",
                indexLabelPlacement: "inside",
                dataPoints: [
                    <?php foreach ($stat as $row){ ?>
                    { y: <?=$row['number']?>, name: "<?=$row['title']?>" },
                    <?php } ?>

                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }

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


    doFilterPoem();


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
        doFilterPoem();
    })

    /*//*/

    var currentPage = 1;

    /*do filter*/

    function doFilterPoem(page='' , option='') {

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

        var url = 'adminpoems/doFilterPoem';

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

            console.log(msg[0])

            $('.result-number').text(msg[1]);




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
                doFilterPoem();
            })


            $('#table-users').html('');

            $.each(msg[0] , function (index , value) {

                var userId = value['id_user'];
                var poemId = value['id'];
                var category = value['category'];

                var family = value['family'];

                var confirm = value['confrim'];

                if (confirm == 1){
                    userConfirm = 'تایید شده';
                } else if (confirm == 0){
                    userConfirm = 'تایید نشده';
                }

                var fullDate = value['date'];

                var explodDate = fullDate.split('-');

                var date = explodDate[0];
                var time = explodDate[1];

                var title = value['title'];

                var rowNumber = i+(itemsNumber*(currentPage-1));

                var appendItem = '<tr><td style="width: 6%">'+rowNumber+'</td><td style="width: 6%">'+poemId+'</td><td style="width: 10%">'+category+'</td><td style="width: 28%">'+title+'</td><td class="td-family" style="width: 17%">'+family+'</td><td style="width: 13%">'+userConfirm+'</td><td style="width: 13%">'+date+'</td><td style="width: 4%"><button style="max-height: 25px; max-width: 25px" data-toggle="modal" data-target="#user-info-modal" type="button" class="btn btn-secondary d-flex align-items-center justify-content-center"><i style="font-size: 9pt" class="fas fa-user"></i></button> </td><td><input class="input-select" name="id[]" value="'+poemId+'" style="width: 4%; cursor: pointer" type="checkbox"></td></tr>';


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


            /*-----poem details*/

            $('#table-users tr').on('click', function() {


                $('#user-info-modal .modal-body').html('');
                var poemId = $(this).find('input').val();
                var family = $(this).find('.td-family').text();

                var data2 = {'id_poem':poemId};
                var url2 = 'adminpoems/getPoemInfo';
                console.log(data2);
                $.post(url2 , data2 , function (msg2) {
                    console.log(msg2);
                    var description = msg2['description'];
                    var poem = msg2['txt'];
                    var title = msg2['title'];
                    var userId = msg2['id_user'];

                    var confirm = msg2['confrim'];

                    if (confirm == 1){
                        var confirmPoem = 'تایید شده';
                    } else if (confirm == 0){
                        var confirmPoem = 'تایید نشده';
                    }

                    var appendDetails = '<div class="media border p-3"><img src="public/images/users/'+userId+'/user_64.jpg" class="mr-3 mt-3 rounded-circle" style="width:60px;"><div class="media-body"><h4>'+family+'</h4><span class="d-flex mt-4"><p>وضعیت شعر:</p><p>'+confirmPoem+'</p></span></div></div><h6 class="mt-4">'+title+'</h6><p>'+poem+'</p><hr><p>'+description+'</p>';

                    $('#user-info-modal .modal-body').append(appendDetails);

                    $('.btn-confirm-poem').click(function () {
                        $('.input-select').each(function () {
                            var checkboxId = $(this).val();
                            if (checkboxId == poemId){
                                $('.input-select').prop('checked' , false);
                                $(this).prop('checked' , true);
                            }
                        })
                        doFilterPoem(1 , 'btn-confirm');
                    })

                    $('.btn-unconfirm-poem').click(function () {
                        $('.input-select').each(function () {
                            var checkboxId = $(this).val();
                            if (checkboxId == poemId){
                                $('.input-select').prop('checked' , false);
                                $(this).prop('checked' , true);
                            }
                        })
                        doFilterPoem(1 , 'btn-unconfirm');
                    })

                } , 'json')


            });

            /*------//*/


        } , 'json')
    }


    $('.select-numbers').on('change', function() {
        doFilterPoem(1);
    });

</script>


<!--required from layout-->

<div>
</div>
</div>
</section>
</body>
</html>

