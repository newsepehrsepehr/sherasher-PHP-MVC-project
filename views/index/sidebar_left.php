<?php $newestUsers = $data['newestUsers'] ?>
    <div class="sidebar-left flex-column">
    <div class="sidebar-left-container">
            <span class="title-bar-users-works">
                جدیدترین کاربران
            </span>
        <div class="newest-users">
            <div class="navigator-container">

            </div>
            <div class="ul-slides owl-carousel owl2">

                <?php foreach ($newestUsers as $row){ ?>
                <span class="slide-newest-users"><a class="img-newest-users" style="background: url(public/images/users/<?=$row['id']?>/user_64.jpg) center center no-repeat"></a>
                    <a class="family-newest-users"><?=$row['family']?></a>
                    <p class="city-newest-users"><?=$row['city']?></p>
                </span>
                <?php } ?>


            </div>
        </div>
        <span class="title-bar-users-works">
                جدیدترین آثار کاربران
            </span>

        <div class="users-works">
            <ul class="ul-newest-works">
                <li class="flex-column" style="position: relative">
                    <span class="btn-close-work"></span>
                    <div class="work-info flex-row">
                        <h5>کتاب</h5>
                        <h4>سودای بی سود</h4>
                    </div>
                    <div class="work-info flex-row">
                        <h5>نوشته:</h5>
                        <h6 style="margin-right: 4px">جابر شکوری</h6>
                    </div>
                    <div class="work-info flex-row">
                        <h5>نشر:</h5>
                        <h6 style="margin-right: 4px">فصل پنجم</h6>
                    </div>
                    <div class="work-img flex-row">
                        <span style="background: url(public/images/works/1/work.jpg) center center no-repeat" class="img-work"></span>
                    </div>
                    <div class="work-user flex-row"></div>
                </li>

                <li class="flex-column" style="position: relative">
                    <span class="btn-close-work"></span>
                    <div class="work-info flex-row">
                        <h5>موسیقی</h5>
                        <h4>چشمای ملتهب</h4>
                    </div>
                    <div class="work-info flex-row">
                        <h5>ترانه:</h5>
                        <h6 style="margin-right: 4px">نیما جابری تبریزی</h6>
                    </div>
                    <div class="work-info flex-row">
                        <h5>با صدای:</h5>
                        <h6 style="margin-right: 4px">فریدون آسرایی</h6>
                    </div>
                    <div class="work-img flex-row">
                        <span style="background: url(public/images/works/2/work.jpg) center center no-repeat" class="img-work"></span>
                    </div>
                    <div class="work-user flex-row"></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        $(".owl2").owlCarousel({
            rtl: true,
            loop:true,
            autoplay:true,
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            items:1,
            smartSpeed:350
        });

        /*slider newest users*/


        var ulSlides = $('.ul-slides');
        var navigatorContainer = $('.navigator-container')
        var index = 0;

        var liNumber = ulSlides.find('.owl-item').not('.cloned').length;

        for (var i = 1; i <= liNumber; i++) {
            navigatorContainer.append('<span class="slider-newest-users-navigator"></span>');
        }

        var navigator = navigatorContainer.find('.slider-newest-users-navigator');

        navigator.eq(index).text(index + 1).addClass('active');

        function setNavigatorActive() {
            navigator.text('').removeClass('active');
            navigator.eq(index).text(index + 1).addClass('active');

        }


        navigator.hover(function () {
            var circlrIndex2 = $(this).index();
            index2 = circlrIndex2;
            $(this).text(index2 + 1);
        }, function () {
            if (index != index2) {
                $(this).text('');
            }

        })

        $('.owl2').on('changed.owl.carousel' , function (event) {
            var page = event.page.index;
            index = page;
            setNavigatorActive();
        })

        navigatorContainer.hover(function () {
            $('.owl2').trigger('stop.owl.autoplay')
        } , function () {
            $('.owl2').trigger('play.owl.autoplay',[6000])
        })


        /*function callback1(event) {
            var page = event.page.index;
            index = page;
        }*/


        navigator.click(function () {
            var circlrIndex = $(this).index();
            $('.owl2').trigger('to.owl.carousel' , circlrIndex , 1000);
            index = circlrIndex;
            setNavigatorActive()

        })


        /*//*/

        /*user works*/

        $('.ul-newest-works > li').click(function () {
            var cloneLi = $(this).clone().css({
                'position': 'absolute',
                'height': '100%',
                'width': '100%',
                'top': '0',
                'left': '0',
                'padding': '15px',
                'background': 'rgba(0,0,0,.95)',
                'z-index': '25',
                'overflow': 'hidden'
            });
            cloneLi.appendTo(this);
            cloneLi.click(function (e) {
                e.stopPropagation();
            });
            cloneLi.find('.work-img').css({'flex-direction': 'row', 'justify-content': 'flex-start'})
            cloneLi.find('.img-work').animate({'width': '20%'}, 700);
            $('.light-window').fadeIn();
            cloneLi.animate({'width': '320%'}, 800, function () {
                $('.btn-close-work', this).fadeIn(400);
                $('<p class="txt-info-work">کتاب سودای بی سود اثر جدید جابر شکوری که پس از دو ماه از انتشار به عنوان کتاب سال شعر انتخاب شدانتشار به عنوان کتاب سال شعر انتخاب شدانتشار به عنوان کتاب سال شعر انتخاب شدانتشار به عنوان کتاب سال شعر انتخاب شدانتشار به عنوان کتاب سال شعر انتخاب شدانتشار به عنوان کتاب سال شعر انتخاب شد.</p>').appendTo(cloneLi.find('.work-img')).slideDown(800)
                $('<span class="user-info-work">مشاهده پروفایل جابر شکوری</span>').appendTo(cloneLi).slideDown(1000);
            });

            var btnCloseWork = $('.btn-close-work');

            btnCloseWork.click(function () {
                closeWorkInfo();
            })

            $('.light-window').click(function () {
                closeWorkInfo();
            })

            function closeWorkInfo() {
                $('.txt-info-work').slideUp(800);
                $('.user-info-work').slideUp(800);
                $('.btn-close-work').fadeOut(400);
                cloneLi.find('.img-work').delay(600).animate({'width': '100%'}, 800)

                $('.light-window').fadeOut(800);
                cloneLi.delay(600).animate({'width': '100%'}, 800, function () {
                    cloneLi.find('.work-img').css({'flex-direction': 'column', 'justify-content': 'center'})
                    cloneLi.animate({'opacity': '0'}, 100)
                    cloneLi.find('.img-work').animate({'width': '100%'}, 700, function () {
                        cloneLi.remove();
                    });

                });
            }
        })

        /*//*/

    })

</script>