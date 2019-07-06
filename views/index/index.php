<!--slider top-->

<?php $ntf = $data['ntf'];
if ($ntf == 'okChallenge'){ ?>
<script>
    $(document).ready(function () {
        mainNtf('شعر شما با موفقیت در چالش ثبت شد و پس از تایید در سایت قرار می گیرد' , 1 , 0)
    })
</script>
<?php } ?>

<link rel="stylesheet" type="text/css" href="public/owlSlider/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="../../public/owlSlider/owl.theme.default.min.css">
<script src="public/owlSlider/owl.carousel.min.js"></script>

<?php require ('slider_top.php') ?>

<!--content-->
<div id="content" class="flex-row">
    <?php require ('sidebar_right.php');
    require ('content_center.php');
    require ('sidebar_left.php');
    ?>
</div>

<div class="dark-window"></div>
<div class="light-window"></div>




<script>
    $(document).ready(function () {

        /*prevent clicking on window*/
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
        




    })
</script>