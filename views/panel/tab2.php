<script src="public/tiny/tinymce.min.js"></script>
<script src="public/ckeditor/ckeditor.js"></script>

<div class="loader-container">
    <div class="loader2 book">
        <figure class="page2"></figure>
        <figure class="page2"></figure>
        <figure class="page2"></figure>
    </div>

    <h1 class="txt-loader fs1">شعر</h1>
</div>

<?php $userPoems = $data['userPoems'] ?>
    <div class="sidebar-poem-notebook">
        <div class="d-flex">

        <span class="btn-add-new-poem"><i style="font-size: 1.4rem" class="fas fa-plus-circle mr-2 ml-2"></i>
            افزودن شعر جدید</span>
        </div>
        <ul class="ul-sidebar-poem-notebook">
            <?php
            $poems_number = sizeof($userPoems);
            $i=$poems_number;
            foreach ($userPoems as $row){ ?>
            <li onclick="poemsLi(this)" id="poem-<?=$row['id']?>" data-id="<?=$row['id']?>" class="li-poem-notebook"><span class="txt-sidebar-poem-notebook"><?=$row['title']?></span><span class="hover-number-poem"><?=$i;?></span></li>
            <?php $i--; } ?>
        </ul>
    </div>

<form class="add-poem">
    <div class="title-add-poem">
        <div class="right">
            <span>عنوان شعر:</span>
            <input type="text" name="title" class="input-title-poem">
        </div>

        <?php $poemCategory = $data['poemCategory'];
        ?>

        <div class="left">
            <span style="margin-left: 6px">قالب شعر</span>
            <div class="select-poem-type">
                <span class="select-title">انتخاب کنید
                    <span class="selected-item-txt"></span>
                                <span class="select-container-block">
<span style="z-index: 100" class="select-container flex-col-stretch-8">
    <?php foreach ($poemCategory as $category){ ?>
    <span data-id="<?=$category['id'];?>" class="option flex-row-5"><?=$category['title']?></span>
    <?php } ?>

</span>
                </span>
                </span>

            </div>
        </div>
    </div>
    <div class="content-add-poem">
        <span>متن شعر:</span>
        <textarea id="editor-add-poem" class="txt-add-poem"></textarea>
    </div>
    <div class="description-add-poem">
        <h5>توضیحات:</h5>
        <textarea name="description" class="txt-description-add-poem"></textarea>
    </div>
    <div class="flex-row-6 check-box-poem">
        <span>مایل به تولید اثر موسیقایی از این شعر هستم</span>
        <input class="check-box-poem-type" type="checkbox" name="poem_music" value="1">
    </div>
    <div class="flex-row-5 btn-container-add-poem">
        <span onclick="addPoem()" class="btn-add-poem flex-col-5">ثبت شعر</span>
        <span class="btn-cancel-add-poem flex-col-5">لغو</span>
    </div>
</form>

<?php foreach ($userPoems as $row){
    ?>
    <div id="poem<?=$row['id']?>" class="content-poem-notebook2">
        <div class="title2-poem-preview flex-row rounded" style="background: #0000004d;">
            <div class="flex-row" style="align-items: center; color: #FFFFFF">
                <span>بازدیدها</span>
                <span class="circle-counter"><?=$row['view']?></span>
                <span>نظرات</span>
                <span style="background: rgba(180,78,81,0.68)" class="circle-counter"><?=$row['commentsNumber']?></span>
                <span>پسند ها</span>
                <span style="background: rgba(41,83,41,0.81)" class="circle-counter"><?=$row['likes']?></span>
            </div>
            <div class="flex-row" style="align-items: center; justify-content: flex-end; color: #FFFFFF">
                <span style="margin-left: 15px">کد شعر:
                <?=$row['id']?>
                </span>
                <span style="margin-left: 2px">وضعیت:</span>
                <span style="margin-left: 15px; color: <?php $status = $row['confrim'];
                if($status == 0) {echo 'gold';}if($status == 1){echo 'green';}if ($status == -1){echo 'red';
                } ?>">
                <?php
                 $status = $row['confrim'];
                 if($status == 0) {
                     echo 'در انتظار تایید';}
                 if($status == 1){
                     echo 'تایید شده';}
                 if ($status == -1){
                     echo 'تایید نشده';
                 }
                 ?>
                </span>

                <?php $full_date = $row['date'];
                $full_date = explode('-' , $full_date);
                $date = $full_date[0];
                $time = $full_date[1];
                ?>

                <span style="margin-left: 15px">تاریخ انتشار: <?=$date?></span>
                <span>ساعت <?=$time?></span>
            </div>
        </div>
        <div class="show-poem-preview used-show-poem-main rounded mt-1">
            <div class="title-poem-preview used-title-poem-main">
                <span style="color: black">عنوان:</span>
                <input maxlength="60" disabled="disabled" class="title-poem" value="<?=$row['title']?>">
                <span onclick="editTitle(this , <?=$row['id']?>)" class="btn-edit-title"></span>
                <h6 style="margin-right: 35px"></h6>
                <span class="flex-row-4-r btn-delete-container">
                    <span onclick="deletePoem(<?=$row['id']?>)">حذف شعر</span>
                </span>
            </div>


            <div class="title3-poem-preview flex-column">

                            <span style="align-items: center" class="flex-row mt-2">
                                <span class="fs0-9 text-secondary">متن شعر</span>

                            </span>

                <textarea class="txt-poem-main" id="editor<?=$row['id']?>">
                    <?=$row['txt']?>
                </textarea>
                <span style="margin-top: 60px; border-top: 1px solid rgba(238,238,238,0.17);"></span>
                <span style="margin-top: 10px; color: black">توضیحات:</span>
                <textarea  class="poem-description"><?=$row['description']?></textarea>

                <span class="btn-change-poem-container flex-row-center">
                    <span onclick="editPoem('<?=$row['id']?>' , this , '<?=$row['description']?>')" class="btn-ok-change-poem">ثبت تغییرات</span>
                    <span onclick="editPoem('<?=$row['id']?>' , this , '<?=$row['description']?>' , 1)" class="btn-cancel-change-poem">لغو</span>
                    <span></span>
                </span>

                <div class="title-comment-main">
                    <span>نظرات کاربران</span>
                </div>
                <div class="comment-poem-main">

                    <div class="poem-comment-show">

                        <?php if (sizeof($row['poems_comments']) == 0){?>

                            <span style="margin-top: 40px; color: #4d4d4d; margin-right: 10px">هیچ نظری برای این شعر ثبت نشده است.</span>

                        <?php } ?>

                        <ul class="comments-container-profile">

                            <?php $poem_comments = $row['poems_comments'];
                            foreach ($poem_comments as $row2){
                            ?>
                                <li class="comment-container" data-id-poem="<?=$row2['id_poem']?>">

                            <div class="li-comments-profile delete-button" data-id="<?=$row2['id']?>">
                                <span class="dark-item"></span>
                                <span class="confirm-delete-comment">آیا می خواهید این نظر را حذف کنید؟
                                            <span class="btn-cancel-delete-comment">خیر</span>
                                            <span class="btn-ok-delete-comment">بله</span>
                                            </span>
                                <div class="title-comment">
                                    <div class="title-comment-right">
                                        <span class="p-circular-avatar2" style="background: url(public/images/users/1/user_64.jpg); width: 28px; height: 28px"></span>
                                        <h5><?=$row2['family']?></h5>
                                    </div>
                                    <div class="title-comment-left">
                                        <span><?=$row2['date']?></span>
                                        <span style="margin-right: 10px; margin-left: 20px">ساعت ۶:۴۸</span>
                                        <span class="set-answer" style="margin-right: 10px; margin-left: 20px; color:gold; cursor: pointer; font-size: 9pt">پاسخ دادن</span>
                                        <span class="btn-delete-comment" style="background: url(public/images/icon/icon32.png) 0 -605px; width: 32px; height: 32px; transform: scale(.85); cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="content-comment">
                                    <p><?=$row2['txt']?></p>
                                </div>
                            </div>

                                    <?php if ($row2['parent'] != 0){ ?>
                                        <a class="is-answer2 flex-col-8" href="#<?=$row2['parent']?>">
                    <span class="flex-row-4">
                    <i class="fas fa-reply"></i>
                <span style="margin-left: 4px">پاسخ به</span>
                        </span>
                                            <span class="txt-family-parent2" style="margin-top: 6px"><?=$row2['parent_family']?></span>
                                        </a>
                                    <?php } ?>

                                    <div class="add-answer" style="width: 100%">
                                    <div class="add-answer-container">
                                        <div class="btn-add-answer-container flex-row">
                                        <span class="writing-answer">نوشتن پاسخ . . .</span>
                                            <span class="flex-row">
                                            <span style="background: url(public/images/icon/icon32.png) 0 -257px" class="btn-add-answer btn-cancel-answer"></span>
                                            <span style="background: url(public/images/icon/icon32.png) 0 -674px" class="btn-add-answer btn-send-answer"></span>
                                                </span>
                                        </div>
                                        <textarea class="txt-add-answer"></textarea>
                                    </div>
                                    </div>




                                </li>

                            <?php } ?>


                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>

    /*delete poem*/

    function deletePoem(poemId){
        showConfirmAlert('آیا می خواهید این شعر را از دفتر شعر خود حذف کنید؟' , 'fade');
        $('.btn-ok-confirm').click(function () {
            var url = 'panel/deletePoem';
            var data = {'id_poem':poemId};
            $.post(url , data , function () {

                showNotification('شعر شما با موفقیت از دفتر شعرتان حذف شد');

                setTimeout(function () {
                    window.location.reload();
                },6000)
            })
        })
    }

    /*//*/


    /*change input size by value*/

    $('.title-poem').each(function (index , value) {
        $(this).attr('size', $(this).val().length);
    })


    /*//*/

    $('.btn-add-new-poem').click(function () {
        $('.content-poem-notebook2').fadeOut(0);
        $('.add-poem').fadeIn(300);
    })


    /*select-poem-type*/

    $('.select-title').click(function () {
        if ($('.select-container-block').hasClass('active')) {
            $('.select-container-block').removeClass('active');
        } else {
            $('.select-container-block').addClass('active');
            $(this).addClass('active');
        }

        $('.option').click(function () {
            var selectedItem = $(this).text();
            $('.selected-item-txt').text(selectedItem);
            $(this).removeClass('active');
            $('.option').removeClass('selected');
            $(this).addClass('selected');
        });



    })



    /*//*/

    /*editor add-poem*/

    tinymce.init({ selector:'#editor-add-poem',
        theme_advanced_font_sizes: "16px",
        language : 'fa_IR',
        height : "480",
        plugins : 'link',
        directionality: "rtl",
        menubar:false,
        statusbar: false,
        paste_auto_cleanup_on_paste : true,
        paste_postprocess : function(pl, o) {
            o.node.innerHTML = o.node.innerHTML.replace(/&nbsp;/ig, " ");

        },
        setup: function (ed) {
            ed.on("change", function () {
                TinyMceGetStatsLost2(ed);
            })
        }
    });

    function TinyMceGetStatsLost2(inst) {
        $('.btn-add-poem').css('display' , 'flex');
        $('.btn-cancel-add-poem').css('display' , 'flex');
    }

    /*//*/

    /*set title bar text*/

    $('.title-content-panel > h6').text('افزودن شعر جدید').css({'color' : 'gold' , 'cursor':'pointer'});

    /*//*/


        /*change numbers to persian*/

        /*persian={0:'۰',1:'۱',2:'۲',3:'۳',4:'۴',5:'۵',6:'۶',7:'۷',8:'۸',9:'۹'};
        function traverse(el){
            if(el.nodeType==3){
                var list=el.data.match(/[0-9]/g);
                if(list!=null && list.length!=0){
                    for(var i=0;i<list.length;i++)
                        el.data=el.data.replace(list[i],persian[list[i]]);
                }
            }
            for(var i=0;i<el.childNodes.length;i++){
                traverse(el.childNodes[i]);
            }
        }
        traverse(document.body);*/

        /*//*/

        /*change numbers to english*/

    function toEnglishDigits(string) {

        // convert persian digits [۰۱۲۳۴۵۶۷۸۹]
        var e = '۰'.charCodeAt(0);
        string = string.replace(/[۰-۹]/g, function(t) {
            return t.charCodeAt(0) - e;
        });

        // convert arabic indic digits [٠١٢٣٤٥٦٧٨٩]
        e = '٠'.charCodeAt(0);
        string = string.replace(/[٠-٩]/g, function(t) {
            return t.charCodeAt(0) - e;
        });
        return string;
    }

    /*//*/

        /*edit poem title*/
        var existClass = 0;
        function editTitle(tag , poemId) {

            var thisTag = $(tag);
            var changeOK = thisTag.clone();
            var oldPoemTitle = thisTag.prev().val();
            changeOK.on('click', stopEventOnce);

            if (existClass == 0) {
                changeOK.appendTo(thisTag).addClass('btn-ok-change');
                existClass = 1;
                thisTag.addClass('active');
                thisTag.prev().removeAttr('disabled').addClass('active');
            } else {
                thisTag.removeClass('active');
                changeOK.removeClass('btn-ok-change');
                thisTag.empty();
                existClass = 0;
                thisTag.prev().removeClass('active').prop('disabled' , true);
            }


            changeOK.click(function () {

                if (thisTag.prev().val() != ''){

                var poemTitle = thisTag.prev().val();

                thisTag.prev().removeClass('active').prop('disabled', true);
                thisTag.removeClass('active');
                changeOK.removeClass('btn-ok-change');
                thisTag.empty();
                existClass = 0;


                thisTag.prev().text(poemTitle);

                var hiddenInput = thisTag.prev();


                if (poemTitle.trim() != oldPoemTitle.trim()) {

                    var url = 'panel/changePoemTitle';
                    var data = {'id_poem': poemId, 'title_poem': poemTitle};
                    $.post(url, data, function (msg) {
                        hiddenInput.attr('size', hiddenInput.val().length);
                        mainNtf('عنوان شعر با موفقیت تغییر یافت');
                        doProgress(1,0);
                        console.log(msg);

                        $('.ul-sidebar-poem-notebook .li-poem-notebook').each(function (index , value) {
                            if ($(this).attr('data-id') == poemId){
                                $(this).find('span:first').text(poemTitle);
                            }
                        })


                    } , 'json')
                }

               } else {
                    alertShowLogin('عنوان شعر نمی تواند خالی باشد' , 8000 , 0)
                    setTimeout(function () {
                        thisTag.prev().removeClass('active').prop('disabled', true);
                        thisTag.removeClass('active');
                        changeOK.removeClass('btn-ok-change');
                        thisTag.empty();
                        existClass = 0;
                        thisTag.prev().val(oldPoemTitle);
                    },800)

                }

            })
        }
        /*//*/


        /*edit poem*/



        function editPoem(poemId , tag , oldDescription , cancelBtn=''){
            var thisTag = $(tag);
            var parentAll = thisTag.parents('.title3-poem-preview');
            var descriptionText =  parentAll.find('.poem-description').val();
            var oldPoemText = thisTag.parents('.title3-poem-preview').find('.txt-poem-main').text();
            var txtPoem = tinyMCE.get('editor'+poemId).getContent();

            if (cancelBtn == '') {

                var url = 'panel/editPoem';
                var data = {'id_poem': poemId, 'txt_poem': txtPoem, 'description': descriptionText};

                if (txtPoem.trim() != oldPoemText.trim() || oldDescription.trim() != descriptionText.trim()) {

                    $.post(url, data, function (msg) {
                        mainNtf('تغییرات با موفقیت اعمال شد.');
                        tinyMCE.activeEditor.setContent(txtPoem);
                        parentAll.find('.poem-description').val(descriptionText);
                        $('.btn-ok-change-poem').fadeOut(1000);
                        $('.btn-cancel-change-poem').fadeOut(1000);
                        doProgress(0,1);
                    })
                }
            } else {
                tinyMCE.activeEditor.setContent(oldPoemText);
                parentAll.find('.poem-description').val(oldDescription);
                mainNtf('تغییرات لغو شد');
                $('.btn-ok-change-poem').fadeOut(1000);
                $('.btn-cancel-change-poem').fadeOut(1000);
            }


        }

    $(".poem-description").on("propertychange change keyup paste input", function(){
        $('.btn-ok-change-poem').fadeIn(2500);
        $('.btn-cancel-change-poem').fadeIn(2000);
    });

    function TinyMceGetStatsLost(inst) {
        $('.btn-ok-change-poem').fadeIn(2500);
        $('.btn-cancel-change-poem').fadeIn(2000);
    }


        /*//*/

        /*function prevent click on child*/

        function stopEventOnce(event) {
            event.preventDefault();
            $(this).unbind('click',stopEventOnce);
            return false;
        }

        /*//*/

    $('#'+sessionStorage.getItem('poem'))[0].click();

    function poemsLi(tag) {
        var thisTag = $(tag);

        sessionStorage.setItem('poem' , thisTag.prop('id'))

        var dataId = thisTag.attr('data-id');

        $('.loader-container').fadeIn(200);
        $('.txt-loader').text('شعر«'+'dddd'+'»');

        $('.content-poem-notebook2').fadeOut(0);
        $('#poem'+dataId).delay(2500).fadeIn(400);
        $('.ul-sidebar-poem-notebook > .li-poem-notebook').removeClass('active');
        thisTag.addClass('active');
        $('.add-poem').fadeOut(0);

        tinymce.init({ selector:'#editor'+dataId,
            content_style: ".mce-content-body {font-size:18px;font-family:Arial;}",
            language : 'fa_IR',
            height : "480",
            plugins : 'link',
            directionality: "rtl",
            menubar:false,
            statusbar: true,
            paste_auto_cleanup_on_paste : true,
            paste_postprocess : function(pl, o) {
                o.node.innerHTML = o.node.innerHTML.replace(/&nbsp;/ig, " ");

            },
            setup: function (ed) {
                ed.on("change", function () {
                    TinyMceGetStatsLost(ed);
                })
            }
        })

        var url = 'panel/setviewedcomment';
        var data = {'id_poem':dataId};
        $.post(url , data , function (msg) {
        })

    }

    $('.comment-poem-main').on('click' , '.btn-delete-comment' , function () {
        $(this).parents('.delete-button').addClass('active' , 0);
        $('.btn-cancel-delete-comment').animate({backgroundColor:'#dbdbdb' , color:'#404040' , 'left':'80px'});
        $('.btn-ok-delete-comment').animate({'right':'80px' , backgroundColor:'#dbdbdb' , color:'#404040' })
    })


    function addPoem(){

        var data = $('.add-poem').serializeArray();
        var url = 'panel/addPoem';
        var categoryId = $('.select-container .option.selected').attr('data-id');
        var txtPoem = tinyMCE.get('editor-add-poem').getContent();
        data.push({'name': 'id_category', 'value': categoryId});
        data.push({'name': 'txt', 'value': txtPoem});

        if (typeof (categoryId) == 'undefined'){
            alertShowLogin('نوع شعر را انتخاب کنید' , 6000 , 0);
        } else if ($('.input-title-poem').val() == ''){
            alertShowLogin('عنوان شعر را مشخص کنید' , 6000 , 0);
        } else {

            $.post(url, data, function (msg) {
                $('.add-poem').fadeOut();
                $('.add-poem').trigger('reset');
                $('.selected-item-txt').text('');
                $('.option').removeClass('selected');
                window.location = 'panel/index/tab2-panel/add-poem';
            })
        }
    }

    $(document).ready(function () {



        /*----- tab2*/













        $('.btn-cancel-delete-comment').click(function () {
                $(this).parents('.delete-button').removeClass('active');

        })

        $('.btn-ok-delete-comment').click(function () {
            var dataId = $(this).parents('.li-comments-profile').attr('data-id');

            if (typeof dataId != 'undefined') {
                var dataIdChildren = $(this).parents('.comment-container').find('.comment-answer');
            } else {
                var dataIdChildren = $(this).parents('.comment-answer');
            }
            var childIdsArray = [];
            var childIdsStr = '';
            $.each(dataIdChildren , function (index , value) {
                var childId = $(this).attr('data-id');
                childIdsArray.push(childId);
                childIdsStr = childIdsArray.join(',');
            });

            console.log(childIdsStr);


            if (childIdsStr != '' && typeof dataId != 'undefined') {
                var allIdsStr = childIdsStr + ',' + dataId;
            } else if(typeof dataId == 'undefined'){
                var allIdsStr = childIdsStr;
            }
            else {
                var allIdsStr = dataId;
            }

            console.log(allIdsStr);

                $(this).parents('.li-comments-profile').remove();
                $(this).parents('.comment-answer').remove();


            var url = 'panel/deleteComment';
            var data = {'id_comments':allIdsStr};
            $.post(url , data , function (msg) {


            })



        })

        /*-----//*/

        $('.set-answer').click(function () {
            $(this).fadeOut();
            $(this).parents('.comment-container').find('.add-answer').slideDown(300);

            $('.btn-cancel-answer').click(function () {
                $('.set-answer').fadeIn();
                $(this).parents('.comment-container').find('.add-answer').slideUp(300);
            })

            $('.btn-send-answer').click(function () {

                var answerParent = $(this).parents('.comment-container').find('.li-comments-profile').attr('data-id');
                var poemId = $(this).parents('.comment-container').attr('data-id-poem');
                var txt = $(this).parents('.add-answer-container').find('.txt-add-answer').val();
                var url = 'panel/addanswer/li-tab2-panel';
                var data = {'txt_answer':txt , 'answer_parent':answerParent , 'id_poem':poemId};
                $.post(url , data , function (msg) {

                    window.location = 'panel/index/tab2-panel/success';





                })



            })

        })





    })





</script>