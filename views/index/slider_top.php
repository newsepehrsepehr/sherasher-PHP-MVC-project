<?php $sliderTop = $data['sliderTop'] ?>

<div id="slider-top">
    <div class="slider-top">
        <div class="slider-top-img-limiter">

            <?php foreach ($sliderTop as $row) { ?>
            <a href="<?=$row['href']?>" class="img-slider-top">
                <img src="public/images/slider_top/<?=$row['img']?>">
            </a>
            <?php } ?>


        </div>
        <div class="slider-top-navigator">
            <span class="btn-back-slider-top"></span>
            <ul class="ul-navigator">
                <li class="selector btn-navigator1"></li>
                <li class="selector btn-navigator2"></li>
                <li class="selector btn-navigator3"></li>
                <li class="selector btn-navigator4"></li>
                <li class="selector btn-navigator5"></li>
            </ul>
            <span class="btn-next-slider-top"></span>
        </div>
        <div class="progress-bar-container">
            <span class="progress-bar-slider"></span>
            <span class="progress-bar-slider"></span>
            <span class="progress-bar-slider"></span>
            <span class="progress-bar-slider"></span>
            <span class="progress-bar-slider"></span>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        /*slider-top*/

        var sliderTag = $('.slider-top');
        var sliderItems = sliderTag.find('a');
        var numItems = sliderItems.length;
        var nextSlide = 1;
        var timeOut = 14000;
        var sliderNavigators = sliderTag.find(".selector");
        var sliderNavigators2 = sliderTag.find(".progress-bar-slider");

        function slider() {

            if (nextSlide > numItems) {
                nextSlide = 1;
            }

            if (nextSlide < 1) {
                nextSlide = numItems;
            }

            sliderItems.fadeOut(1000);
            sliderItems.eq(nextSlide - 1).fadeIn(1000);
            sliderNavigators.removeClass('active');
            sliderNavigators2.removeClass('active2');
            sliderNavigators.eq(nextSlide - 1).addClass('active');
            sliderNavigators2.eq(nextSlide - 1).addClass('active2');
            nextSlide++;

        }

        slider();
        var sliderInterval = setInterval(slider, timeOut);

        sliderTag.mouseleave(function () {
            clearInterval(sliderInterval);
            sliderInterval = setInterval(slider, timeOut);
        });


        function goTonext() {
            slider();
        }

        $('.btn-back-slider-top').click(function () {
            clearInterval(sliderInterval);
            goTonext();

        });

        function goToprev() {
            nextSlide = nextSlide - 2;
            slider();
        }

        $('.btn-next-slider-top').click(function () {
            clearInterval(sliderInterval);
            goToprev();

        });


        function goToSlide(index) {
            nextSlide = index;
            slider();
        }

        $('.selector').click(function () {

            clearInterval(sliderInterval);
            var index = $(this).index();
            goToSlide(index + 1);
        });

        /*//*/



    })

</script>