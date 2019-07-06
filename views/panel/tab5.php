<?php $arts = $data['arts']; ?>

    <div class="sidebar-poem-notebook used-sidebar-tab5">
        <div class="d-flex">

        <span class="btn-add-new-poem btn-art"><i style="font-size: 1.4rem" class="fas fa-plus-circle mr-2 ml-2"></i>
            افزودن</span>
        </div>
        <ul class="ul-sidebar-poem-notebook">
            <?php $i=sizeof($arts); foreach ($arts as $art){ ?>
            <li class="li-achievement"><span class="txt-sidebar-poem-notebook d-flex text-warning" style="margin-right: 45px">
                    <span class="ml-2 text-white"><?php if ($art['type'] == 1){echo 'کتاب';} elseif($art['type'] == 2){echo 'موسیقی';} elseif ($art['type'] == 3){echo '';} ?></span>
                    <?=$art['title'];?></span><span class="hover-number-poem"><?=$i;?></span></li>
            <?php $i--; } ?>
        </ul>

    </div>

    <div class="content-art w-100 p-4 rounded">
        <div class="container-fluid add-art">
        <div class="card-header text-secondary">ثبت فعالیت و سوابق هنری</div>
        <div class="card-body d-flex justify-content-around">
            <span class="text-dark">یکی از موارد را انتخاب کنید</span>
            <ul class="list-group w-25 art-type">
                <li class="text-dark list-group-item">کتاب</li>
                <li class="text-dark list-group-item">موسیقی</li>
                <li class="text-dark list-group-item">کنگره ها و جشنواره ها</li>
            </ul>
        </div>
        <div class="jumbotron art-types">
            <!--form book-->
            <form action="" class="book-type" enctype="multipart/form-data" method="post" data-type="1">
                <div class="form-group">
                    <label for="title">نام کتاب:</label>
                    <input type="text" class="form-control req" name="title">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="author">پدیدآور:</label>
                    <input type="text" class="form-control req" name="author">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="publisher">ناشر:</label>
                    <input type="text" class="form-control req" name="publisher">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="book-year">سال نشر:</label>
                    <input type="text" class="form-control" name="year">
                </div>
                <div class="form-group">
                    <label for="book-pages">تعداد صفحه:</label>
                    <input type="text" class="form-control" name="pages">
                </div>
                <div class="form-group">
                    <label for="isbn">شابک:</label>
                    <input type="text" class="form-control req" name="isbn">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="publish-number">نوبت چاپ:</label>
                    <input type="text" class="form-control" name="publish-number">
                </div>
                <div class="form-group">
                    <label for="subject">موضوع:</label>
                    <input type="text" class="form-control" name="subject">
                </div>
                <div class="form-group">
                    <label for="description-book">توضیحات:</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label class="d-flex">لینک خرید اینترنتی<span style="line-height: 20px" class="mr-2 text-gray-dark w-75">( در صورتی که کتابتان به صورت اینترنتی به فروش می رسد، لینک صفحه مربوط به کتابتان در وبسایت فروشنده یا سایت خودتان را اینجا وارد کنید )</span></label>
                    <input type="text" class="form-control" name="link">
                </div>

                <div class="form-group">
                    <label class="d-flex">تصویر کتاب<span class="mr-2 text-gray-dark">(افزودن تصویر کتاب الزامی نیست اما فقط کتاب های که تصویر دارند در صفحه اول سایت قرار می گیرند.)</span></label>
                    <div class="input-group">
            <span class="input-group-btn">
                <span style="font-size: .9rem" class="btn btn-default btn-file btn-info">
                    یافتن… <input type="file" class="upload_img" name="img">
                </span>
            </span>
                        <div class="img-demo mt-3" style="width: 100%;">
                            <img src="">
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">
                    <label class="form-check-label d-flex align-items-center">
                        <input class="form-check-input mr-2 accept-agreement" type="checkbox"> شرایط درج کتاب را قبول دارم
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">ثبت اطلاعات
                    <span class="loader loader-art"><span class="loader-inner"></span></span>
                </button>

            </form>

            <!--form music-->
            <form action="" class="music-type" enctype="multipart/form-data" method="post" data-type="2">
                <div class="form-group">
                    <label for="title-music">عنوان:</label>
                    <input type="text" class="form-control req" name="title">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="singer">خواننده:</label>
                    <input type="text" class="form-control req" name="singer">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="music-poet">شاعر:</label>
                    <input type="text" class="form-control req" name="poet">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="composer">آهنگساز:</label>
                    <input type="text" class="form-control req" name="composer">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="corrector">تنظیم کننده:</label>
                    <input type="text" class="form-control" name="corrector">
                </div>
                <div class="form-group">
                    <label for="year-music">سال تولید:</label>
                    <input type="text" class="form-control" name="year">
                </div>
                <div class="form-group">
                    <label for="description-music">توضیحات:</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label class="d-flex">تصویر کتاب<span class="mr-2 text-gray-dark">(افزودن تصویر موسیقی الزامی نیست اما فقط مواردی که تصویر دارند در صفحه اول سایت قرار می گیرند.)</span></label>
                    <div class="input-group">
            <span class="input-group-btn">
                <span style="font-size: .9rem" class="btn btn-default btn-file btn-info">
                    یافتن… <input type="file" class="upload_img" name="img">
                </span>
            </span>
                        <div class="img-demo mt-3" style="width: 100%;">
                            <img src="">
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">

                        <input class="form-check-input accept-agreement mr-2" type="checkbox"> شرایط را درج کتاب را قبول دارم

                </div>
                <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
            </form>

            <!--form festival-->
            <form action="" class="festival-type" enctype="multipart/form-data" method="post" data-type="3">
                <div class="form-group">
                    <label for="title">عنوان:</label>
                    <input type="text" class="form-control req" name="title">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="area">گستره:</label>
                    <input type="text" class="form-control" name="area">
                </div>
                <div class="form-group">
                    <label for="rank">مقام:</label>
                    <input type="text" class="form-control req" name="rank">
                    <i class="fas fa-star-of-life icon-star-art"></i>
                </div>
                <div class="form-group">
                    <label for="year">سال:</label>
                    <input type="text" class="form-control" name="year">
                </div>
                <div class="form-group">
                    <label for="description">توضیحات:</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label class="d-flex">تصویر کتاب<span class="mr-2 text-gray-dark">(افزودن تصویر لوح یا تندیس الزامی نیست.)</span></label>
                    <div class="input-group">
            <span class="input-group-btn">
                <span style="font-size: .9rem" class="btn btn-default btn-file btn-info">
                    یافتن… <input type="file" class="upload_img" name="img">
                </span>
            </span>
                        <div class="img-demo mt-3" style="width: 100%;">
                            <img src="">
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">
                        <input class="form-check-input accept-agreements mr-2" type="checkbox"> شرایط را قبول دارم
                </div>
                <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
            </form>


        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="Modal-img">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger crop_image" data-dismiss="modal">Crop</button>
                </div>

            </div>
        </div>
    </div>

        <div class="container-fluid art-show-container">

            <ul>
                <?php foreach ($arts as $row){
                    $type = $row['type'];
                    $confirm = $row['confirm'];
                    ?>

                    <?php if ($type == 1){ ?>
                <li>
                    <div class="card">
                        <div class="card-header d-flex">
                            <span>کتاب</span>
                            <div class="d-flex">
                            <span class="mr-5">وضعیت:</span>
                            <span class="<?php if ($confirm == 1){echo 'text-success';}elseif ($confirm == -1){echo 'text-danger';}elseif ($confirm == 0){echo 'text-gray-dark';} ?>"><?php if ($confirm == 1){echo 'تایید شده';}elseif ($confirm == -1){echo 'تایید نشده';}elseif ($confirm == 0){echo 'در انتظار تایید';} ?></span>
                            </div>
                            <div class="d-flex flex-grow-1 justify-content-end">
                                <span class="cursor-pointer text-secondary ml-5">درخواست ویرایش</span>
                                <span class="cursor-pointer text-success">درخواست نمایش در صفحه اصلی سایت</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-art">
                                <thead>
                                <tr>
                                    <th>عنوان کتاب</th>
                                    <th><?= $row['title'] ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>پدیدآور</td>
                                    <td><?= $row['author'] ?></td>
                                </tr>
                                <tr>
                                    <td>ناشر</td>
                                    <td><?= $row['publisher'] ?></td>
                                </tr>
                                <tr>
                                    <td>سال نشر</td>
                                    <td><?= $row['year'] ?></td>
                                </tr>
                                <tr>
                                    <td>تعداد صفحه</td>
                                    <td><?= $row['pages'] ?></td>
                                </tr>
                                <tr>
                                    <td>شابک</td>
                                    <td><?= $row['isbn'] ?></td>
                                </tr>
                                <tr>
                                    <td>نوبت چاپ</td>
                                    <td><?= $row['publish_number'] ?></td>
                                </tr>
                                <tr>
                                    <td>موضوع</td>
                                    <td><?= $row['subject'] ?></td>
                                </tr>
                                <tr>
                                    <td>توضیحات</td>
                                    <td><?= $row['description'] ?></td>
                                </tr>
                                <tr>
                                    <td>تصویر</td>
                                    <td><img src="public/images/users/<?=$row['id_user']?>/art/<?=$row['img']?>"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">Footer</div>
                    </div>
                </li>
                        <?php } ?>

                    <!--//-->

                    <?php if ($type == 2){ ?>
                        <li>
                            <div class="card">
                                <div class="card-header d-flex">
                                    <span>موسیقی</span>
                                    <div class="d-flex">
                                        <span class="mr-5">وضعیت:</span>
                                        <span class="<?php if ($confirm == 1){echo 'text-success';}elseif ($confirm == -1){echo 'text-danger';}elseif ($confirm == 0){echo 'text-gray-dark';} ?>"><?php if ($confirm == 1){echo 'تایید شده';}elseif ($confirm == -1){echo 'تایید نشده';}elseif ($confirm == 0){echo 'در انتظار تایید';} ?></span>
                                    </div>
                                    <div class="d-flex flex-grow-1 justify-content-end">
                                        <span class="cursor-pointer text-secondary ml-5">درخواست ویرایش</span>
                                        <span class="cursor-pointer text-success">درخواست نمایش در صفحه اصلی سایت</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-art">
                                        <thead>
                                        <tr>
                                            <th>نام موسیقی</th>
                                            <th><?= $row['title'] ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>خواننده</td>
                                            <td><?= $row['singer'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>شاعر</td>
                                            <td><?= $row['poet'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>آهنگساز</td>
                                            <td><?= $row['composer'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>تنظیم کننده</td>
                                            <td><?= $row['corrector'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>سال تولید</td>
                                            <td><?= $row['year'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>توضیحات</td>
                                            <td><?= $row['description'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>تصویر</td>
                                            <td><img src="public/images/users/<?=$row['id_user']?>/art/<?=$row['img']?>"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">Footer</div>
                            </div>
                        </li>
                    <?php } ?>
                    <!--//-->

                    <?php if ($type == 3){ ?>
                        <li>
                            <div class="card">
                                <div class="card-header d-flex">
                                    <span>جشنواره و کنگره</span>
                                    <div class="d-flex">
                                        <span class="mr-5">وضعیت:</span>
                                        <span class="<?php if ($confirm == 1){echo 'text-success';}elseif ($confirm == -1){echo 'text-danger';}elseif ($confirm == 0){echo 'text-gray-dark';} ?>"><?php if ($confirm == 1){echo 'تایید شده';}elseif ($confirm == -1){echo 'تایید نشده';}elseif ($confirm == 0){echo 'در انتظار تایید';} ?></span>
                                    </div>
                                    <div class="d-flex flex-grow-1 justify-content-end">
                                        <span class="cursor-pointer text-secondary ml-5">درخواست ویرایش</span>
                                        <span class="cursor-pointer text-success">درخواست نمایش در صفحه اصلی سایت</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-art">
                                        <thead>
                                        <tr>
                                            <th>نام جشنواره یا کنگره</th>
                                            <th><?= $row['title'] ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>گستره</td>
                                            <td><?= $row['author'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>مقام</td>
                                            <td><?= $row['publisher'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>سال برگزاری</td>
                                            <td><?= $row['year'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>توضیحات</td>
                                            <td><?= $row['description'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>تصویر</td>
                                            <td><img src="public/images/users/<?=$row['id_user']?>/art/<?=$row['img']?>"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">Footer</div>
                            </div>
                        </li>
                    <?php } ?>

                <?php } ?>
            </ul>

        </div>

    </div>

    <script>


        $('.btn-art').click(function () {
            $('.art-show-container > ul > li').fadeOut(1000);
            $('.add-art').fadeIn(1000);
        })

        $('.ul-sidebar-poem-notebook').on('click' , '.li-achievement' , function () {
            $('.add-art').fadeOut(1000);
            var index = $(this).index();
            $('.li-achievement').removeClass('active');
            $(this).addClass('active');


            $('.art-show-container > ul > li').fadeOut(1000);
            $('.art-show-container > ul > li').eq(index).fadeIn(1000);
        })


        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport:{
                width:140,
                height:180,
                type: 'square'
            } ,
            boundary:{
                width: 400,
                height: 300
            }
        });

        $('.upload_img').on('change' , function () {
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind' , {
                    url:event.target.result
                }).then(function () {
                    console.log('jquery bind compelete');
                })
            }
            reader.readAsDataURL(this.files[0]);
            $('#Modal-img').modal('show');
        });

        $('.crop_image').click(function (event) {
            $image_crop.croppie('result' , {
                type:'canvas',
                size:'viewport'
            }).then(function (response) {
                sessionStorage.setItem('image' , response);
                $('.img-demo img').attr('src' , response);
            })
        })



        /*//*/

        /*select art type*/

        $('.art-type li').click(function () {

            $('html').animate({scrollTop: '200'} , 400)

            $('.art-types').fadeIn(400);
            $('.art-type li').removeClass('active');
            $(this).addClass('active');

            var selectedIndex = $(this).index();

            $('.art-types > form').fadeOut(400);
            $('.art-types > form').eq(selectedIndex).slideDown(400);

        })

        /*//*/




        $('input.req').on("propertychange change keyup paste input", function(){
            $(this).parent().find('.icon-star-art').css('opacity', '0');
        });

        $('.art-types > form').submit( function( e ) {

            var type = $(this).attr('data-type');

            var isOk = 1;

             $(this).find('.req').each(function () {
                 var reqItems = $(this).val();
                 if (reqItems.trim() == '') {
                     $(this).parent().find('.icon-star-art').css('opacity', '.8');
                     isOk = 0;
                 }
            })

            if ($(this).find('.accept-agreement').prop("checked") == false) {
                showNotification('در صورت قبول نداشتن شرایط نمی توانید اطلاعات را ثبت کنید');
                e.preventDefault();
            }
            else if (isOk == 0) {
                showNotification('لطفا موارد ستاره دار را پر کنید');
                $('html').animate({scrollTop:'400'} , 1000)
                e.preventDefault();
            } else {

                $('.loader-art').fadeIn(400);
                var url = 'panel/addArt';
                var data = $(this).serializeArray();
                data.push({'name': 'image' , 'value': sessionStorage.getItem('image')});
                data.push({'name': 'type' , 'value': type});
                $.post(url , data , function (msg) {
                    $('.loader-art').fadeOut(400);
                    console.log(msg);
                    if (msg == 1){
                        showNotification('عملیات با موفقیت انجام شد');
                        setTimeout(function () {
                            window.location.reload();
                        },5000)

                    }
                });

            /*$.ajax({
                url: 'panel/addArt',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(result){
                    if (result == 'type-error'){
                        showNotification('فرمت قابل قبول برای تصویر jpg, jpeg , png و gif است');
                    } else if (result == 'size-error'){
                        showNotification('لطفا موارد ستاره دار را پر کنید');
                    } else if (result == 1){

                    }
                }
            });*/
            e.preventDefault();
        }
            } );

    </script>