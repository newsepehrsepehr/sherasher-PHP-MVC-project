<?php $targetTab = $data['tab'];
$secoundTargt = $data['subTab'];
if ($targetTab == 'messages'){
    $targetTab = 'tab3';
}
if ($targetTab == 'poems'){
    $targetTab = 'tab2';
}
?>

<?php if ($targetTab != ''){ ?>
    <script>
        $(document).ready(function () {
            $('#<?=$targetTab?>').trigger('click');
            setTimeout(function () {
                $('#poem-<?=$secoundTargt?>').trigger('click');
                $('#message<?=$secoundTargt?>').trigger('click');
            },200)


            /*window.location = 'panel';*/

        })
    </script>
<?php } ?>


<div class="sidebar-panel px-0">
    <ul class="ul-panel-items">
        <li id="tab1" class="li-tabs"><i class="fas fa-home"></i><span id="tab1-panel" class="txt-panel-item">میز کار</span></li>
        <li id="tab2" class="li-tabs"><i class="fas fa-book-open"></i><span id="tab2-panel" class="txt-panel-item">دفتر شعر</span></li>
        <li id="tab3" class="li-tabs"><i class="fas fa-envelope"></i><span id="tab3-panel" class="txt-panel-item">پیام ها</span></li>
        <li style="display: none" id="tab4" class="li-tabs"><span id="tab4-panel" class="txt-panel-item">مدیریت نظرات</span></li>
        <li id="tab5" class="li-tabs"><i class="fas fa-award"></i><span id="tab5-panel" class="txt-panel-item">فعالیت ها و سوابق هنری</span></li>
        <li id="tab6" class="li-tabs"><i class="fas fa-user"></i><span id="tab6-panel" class="txt-panel-item">اطلاعات کاربری</span></li>
        <li style="display: none" id="tab7" class="li-tabs"><span id="tab7-panel" class="txt-panel-item">مشخصات فردی</span></li>
        <li style="display: none" id="tab8" class="li-tabs"><span id="tab8-panel" class="txt-panel-item">تنظیمات</span></li>
    </ul>
</div>
<div class="content-center-panel">

    <ul class="ul-tabs-panel">

        <li class="li-tab1-panel tab-panel"></li>
        <li class="li-tab2-panel tab-panel"></li>
        <li class="li-tab3-panel tab-panel"></li>
        <li style="display: none" class="li-tab4-panel tab-panel"></li>
        <li class="li-tab5-panel tab-panel"></li>
        <li class="li-tab6-panel tab-panel"></li>
        <li style="display: none" class="li-tab7-panel tab-panel"></li>
        <li style="display: none" class="li-tab8-panel tab-panel"></li>

        <?php /*require ('tab1.php');
        require ('tab2.php');
        require ('tab3.php');
        require ('tab4.php');
        require ('tab5.php');
        require ('tab6.php');
        require ('tab7.php');
        require ('tab8.php');*/
        ?>
    </ul>
</div>

<script>





        /*panel tabs*/

        $('.ul-panel-items > .li-tabs').click(function () {

           /* localStorage.setItem('tab' , $(this).prop('id'));*/
            sessionStorage.setItem('tab' , $(this).prop('id'));

            if ($(this).prop('id') != 'tab3') {
                sessionStorage.removeItem('message');
            }

            var index = $(this).index();
            $('.ul-panel-items > .li-tabs').removeClass('active');
            $(this).addClass('active');
            $('.sidebar-panel .ul-panel-items > li').eq(index).addClass('active');
            $('.min-tabs ul li').eq(index).addClass('active');

            $('.ul-tabs-panel > li').fadeOut(0);
            var selectedTab = $('.ul-tabs-panel > li').eq(index);

            var tabTitle = $(this).find('.txt-panel-item').text();
            $('.title-content-panel > h5').text(tabTitle);

            var tabIndex = index+1;
            var url = 'panel/tab';
            var data = {'index':tabIndex};
            $.post(url , data , function (msg) {
                selectedTab.html(msg);
            })
            selectedTab.fadeIn().css('display','flex');

            doProgress(1 , 0 , 2000)


        })


        $(document).ready(function () {
            console.log(sessionStorage.getItem('tab'))

            if (sessionStorage.getItem('tab') == null){
                $('#tab1')[0].click();
            } else {
                $('#' + sessionStorage.getItem('tab'))[0].click();
            }



        })


</script>
