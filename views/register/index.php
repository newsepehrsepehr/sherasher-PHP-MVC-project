<script src="public/jquery/city.js"></script>

<link rel="stylesheet" type="text/css" href="public/css1/register.css">



<div class="register-form">
    <div class="input-title-container">
    <span class="txt-typing-input-title animated fadeInRight txt1">سلام. خوشحالیم که می خواهید به جمع بپیوندید.</span>
    <span class="txt-typing-input-title animated fadeInRight txt2">لطفا موارد زیر را به ترتیب و با دقت پر کنید</span>
    </div>

    <div class="selecting-type flex-column-8">
        <span class="txt-title-selecting">ثبت نام به عنوان</span>
        <label class="pure-material-radio">
            <input type="radio" name="group" value="1" checked>
            <span class="txt-select-type">شاعر</span>
        </label>
        <br/>
        <br/>
        <label class="pure-material-radio">
            <input type="radio" name="group" value="2">
            <span class="txt-select-type">خواننده</span>
        </label>
        <br/>
        <br/>
        <label class="pure-material-radio">
            <input type="radio" name="group" value="3">
            <span class="txt-select-type">شاعر و خواننده</span>
        </label>
    </div>

    <div class="input-container animated fadeInRight">
        <span onclick="validiation()" class="btn-next-register">مرحله بعد</span>
        <div class="show-error"><h5></h5>

            <span class="loader"><span class="loader-inner"></span></span>

        </div>
        <div class="input-container2">
        <span class="register-input email"><span style="display: flex; align-items: center"><span style="font-size: 1.1rem; margin-left: 6px">ایمیل</span><input name="email" type="text" class="input-register input-register-email"></span></span>
        <span class="register-input pass"><span style="display: flex; align-items: center"><span style="font-size: 1.1rem; margin-left: 6px">رمز عبور</span><input name="pass" type="password" class="input-register"></span></span>
        <span class="register-input pass"><span style="display: flex; align-items: center"><span style="font-size: 1.1rem; margin-left: 6px">تکرار رمز عبور</span><input name="c-pass" type="password" class="input-register"></span></span>
        </div>
    </div>

    <div class="form-container-info">
    <form class="input-container-info">
        <span onclick="registerInfo()" class="btn-next-register">مرحله بعد</span>
        <div class="show-error"><h5></h5>

            <span class="loader"><span class="loader-inner"></span></span>

        </div>
        <div class="input-container2-info">
            <span class="register-info-input"><span style="display: flex; align-items: center"><span style="font-size: 1.1rem; margin-left: 6px">نام و نام خانوادگی</span><input name="family" type="text" class="input-register"></span></span>
            <span class="register-info-input"><span style="display: flex; align-items: center"><span style="font-size: 1.1rem; margin-left: 6px">شماره تماس</span><input name="mobile" type="text" class="input-register"></span></span>
            <div class="selecting-type2">
                <span class="txt-title-selecting2">جنسیت</span>
                <label class="pure-material-radio">
                    <input type="radio" name="gender" value="1" checked>
                    <span class="txt-select-type">مرد</span>
                </label>
                <br/>
                <br/>
                <label class="pure-material-radio">
                    <input type="radio" name="gender" value="0">
                    <span class="txt-select-type">زن</span>
                </label>
            </div>

            <div class="select-city">

                <span>استان/شهر</span>

            <div class="city">

                <select name="state2" class="state-select selectpicker" onchange="state(this)" data-live-search="true" title="استان خود را انتخاب کنید">
                        <option data-val ="0" value="نامشخص">انتخاب کنید</option>
                        <option data-val ="41" value="آذربایجان شرقی">آذربایجان شرقی</option>
                        <option data-val ="44" value="آذربایجان غربی">آذربایجان غربی</option>
                        <option data-val ="45" value="اردبیل" data-tokens="اردبیل ardebil">اردبیل</option>
                    <option data-val ="31" value="اصفهان">اصفهان</option>
                    <option data-val ="26" value="البرز">البرز</option>
                    <option data-val ="84" value="ایلام">ایلام</option>
                    <option data-val ="77" value="بوشهر">بوشهر</option>
                    <option data-val ="21" value="تهران">تهران</option>
                    <option data-val ="56" value="چهار محال بختیاری">چهار محال بختیاری</option>
                    <option data-val ="51" value="خراسان رضوی">خراسان رضوی</option>
                    <option data-val ="58" value="خراسان شمالی">خراسان شمالی</option>
                    <option data-val ="61" value="خوزستان">خوزستان</option>
                    <option data-val ="24" value="زنجان">زنجان</option>
                    <option data-val ="23" value="سمنان">سمنان</option>
                </select>

            </div>
                <div class="shahr">
                    <select name="city2" class="city-select selectpicker" data-live-search="true" title="شهر خود را انتخاب کنید">

                    </select>
                </div>
            </div>



    </form>
    </div>

    <div class="get-user-info">

    </div>

</div>



<script>


    $('.pure-material-radio').click(function () {
        $('input[name=group]').attr('checked', false);
        $(this).find('input').attr('checked', true);
    })


  $('.input-register').click(function () {
          $('.place-holder').animate({bottom: '35px', right: '-6px', fontSize: '10pt'});
  })

  $('.place-holder').click(function () {
  $(this).animate({bottom: '35px', right: '-6px', fontSize: '10pt'});
  })

  /*validation*/


  $('.input-register').on("propertychange change keyup paste input", function(){
      $('.show-error > h5').text('');
      $('.show-error').removeClass('empty' , 1000);
  });

  function validiation() {

      $('.show-error > h5').text('');
      $('.show-error').removeClass('empty active' , 600);

      var email = $('.input-register-email').val();
      var type = $("input[name='group']:checked").val();
      var password = $("input[name='pass']").val();
      var cPassword = $("input[name='c-pass']").val();
      var regEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if (typeof email != 'undefined' && email!= 0) {
          if (email.trim() == '') {
              $('.show-error > h5').text('ایمیل را وارد کنید');
              $('.show-error').addClass('empty' , 1000);
          }
          else if (!regEmail.test(email)){
              $('.show-error > h5').text('ایمیل وارد شده نامعتبر است');
              $('.show-error').addClass('empty' , 1000);
          }
          else {
              var url = 'register/emailverify';
              var data = {'email':email , 'type':type};

              $('.loader').fadeIn(400);
              $.post(url , data , function (msg) {
                  console.log(msg);
                  if (msg == 1){
                      $('.loader').fadeOut(400);
                      setTimeout(function () {
                          $('.show-error > h5').text('ایمیل فعالسازی برای شما ارسال شد.');
                          $('.show-error').addClass('active' , 1000);

                          setTimeout(function () {

                              $('.show-error > h5').text('');
                              $('.show-error').removeClass('active' , 1000);

                              $('.selecting-type').animate({'left':2500} , 1500)
                              $('.input-container').animate({'left':2500} , 1500).delay(200).animate({'left':-2500} , 0);

                              sessionStorage.setItem('email' , email);
                              $('.input-register-email').val(0);

                              setTimeout(function () {
                                  $('.selecting-type').fadeOut();
                                  $('.txt-insert-input').text('رمز عبور')
                                  $('.register-input').fadeOut();
                                  $('.pass').fadeIn();
                                  $('.input-container').animate({'left':0} , 1500);

                                  $('.txt1').slideUp(800);
                                  $('.txt2').slideUp(800);

                                  setTimeout(function () {
                                      $('.txt2').text('لطفا با رعایت نکات امنیتی یک رمز عبور مناسب انتخاب کنید').slideDown(800);
                                  } , 2500)
                              } , 2000);

                          } , 1500)

                      } , 1000)


                  }
                  else if (msg == 2){
                      $('.loader').fadeOut(400);
                      setTimeout(function () {
                          $('.show-error > h5').text('با این ایمیل قبلا در سایت ثبت نام شده است');
                          $('.show-error').addClass('empty' , 1000);
                      },1500)

                  }
              })
          }
      }

      else if (typeof password != 'undefined'){
          if (password == ''){
              $('.show-error > h5').text('رمز عبور را وارد کنید');
              $('.show-error').addClass('empty' , 1000);
          }
          else if (password.length < 4){
              $('.show-error > h5').text('رمز عبور خیلی کوتاه است. لطفا رمز عبوری با بیش از 4 حرف یا عدد انتخاب کنید');
              $('.show-error').addClass('empty' , 1000);
          }
          else if (cPassword == ''){
              $('.show-error > h5').text('تکرار رمز عبور را وارد کنید');
              $('.show-error').addClass('empty' , 1000);
          }
          else if (password != cPassword){
              $('.show-error > h5').text('رمز عبور با تکرار آن مطابقت ندارد');
              $('.show-error').addClass('empty' , 1000);
          } else if (password == cPassword){
              var url = 'register/setPass';
              var data = {'password':password , 'email':sessionStorage.getItem('email')};
              $('.loader').fadeIn(400);
              $.post(url , data , function (msg) {
                  if (msg == 1){
                      console.log(msg)+'sssss';
                      $('.loader').fadeOut(400);
                      setTimeout(function () {
                          $('.show-error > h5').text('رمز عبور با موفقیت ثبت شد');
                          $('.show-error').addClass('active' , 1000);

                          setTimeout(function () {
                              $('.show-error > h5').text('');
                              $('.show-error').removeClass('active' , 1000);

                              $('.input-container').animate({'left':2500} , 1500).delay(200).animate({'left':-2500} , 0);
                              $('.form-container-info').animate({'left':-2500} , 0);

                              setTimeout(function () {
                                  $('.input-container').fadeOut();

                                  $('.txt2').slideUp(800);

                                  setTimeout(function () {
                                      $('.txt2').text('لطفا موارد زیر را نیز تکمیل کنید').slideDown(800);
                                      $('.form-container-info').fadeIn();
                                      $('.form-container-info').animate({'left':0} , 1500);

                                  } , 2500)
                              } , 2000);

                          } , 1500)

                          })

                  }
              })
          }
      }

  }


  /*//*/

    function registerInfo(){
        var data = $('.input-container-info').serializeArray();
        data.push({'name': 'email', 'value': sessionStorage.getItem('email')});
        var url = 'register/setUserInfo';
        
        if ($('input[name="family"]').val().trim() == ''){
            $('.show-error > h5').text('لطفا نام و نام خانوادگی خود را وارد کنید');
            $('.show-error').addClass('empty' , 1000);
        } else {
            $('.loader').fadeIn(400);
            $.post(url, data, function (msg) {
                $('.loader').fadeOut(400);
                console.log(msg);
                $('.show-error > h5').text('اطلاعات با موفقیت ثبت شد');
                $('.show-error').addClass('active', 1000);
            })
        }
    }

    /*set first scroll*/

    $(window).scrollTop(135);

    /*//*/



</script>