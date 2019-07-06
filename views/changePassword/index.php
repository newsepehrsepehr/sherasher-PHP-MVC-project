<?php
$email = $data['email'];
$token = $data['token'];
echo $token.'ssssss';
?>

<div class="container change-pass-container">

    <form class="form-change-pass">
        <?php if ($token == ''){ ?>
    <label>رمز عبور فعلی</label>
    <input type="password" name="old-pass" class="form-control">
        <?php } ?>
    <label>رمز عبور جدید</label>
    <input type="password" name="new-pass" class="form-control">
    <label>تکرار رمز عبور جدید</label>
    <input type="password" name="new-pass-c" class="form-control">

        <input type="hidden" value="<?php echo Model::csrf_token('changePass'); ?>" name="csrf_token" />

        <?php if ($token == ''){ ?>
        <span onclick="changePassword()" class="btn-change-pass btn btn-success mt-4">تایید</span>
        <?php } else { ?>
        <span onclick="changePassword('<?=$token?>' , '<?=$email?>')" class="btn-change-pass-token btn btn-success mt-4">تایید</span>
        <?php } ?>
    </form>

</div>

<script>

    function changePassword(hasToken='' , email='') {

        var newPass = $('input[name=new-pass]');
        var newPassC = $('input[name=new-pass-c]');

        if (hasToken == ''){
            var oldPass = $('input[name=old-pass]');
            if (oldPass.val().trim() == ''){
                oldPass.val('');
                oldPass.attr("placeholder", "رمز عبور فعلی را وارد کنید");
            }
        }
        if (newPass.val().trim() == ''){
            newPass.val('');
            newPass.attr("placeholder", "رمز عبور جدید را وارد کنید");
        } else if (newPassC.val().trim() == ''){
            newPassC.val('');
            newPassC.attr("placeholder", "تکرار رمز عبور جدید را وارد کنید");
        } else if (newPass.val().length < 4){
            mainNtf('رمز عبور نمی تواند کمتر از 4 حرف یا عدد باشد');
        } else if (newPass.val() != newPassC.val()){
            mainNtf('رمز عبور جدید با تکرار آن مطابقت ندارد');
        } else {

            var url = 'changePassword/changeVerify';
            var data = $('.form-change-pass').serializeArray();
            data.push({'name':'hasToken' , 'value':hasToken});
            data.push({'name':'email' , 'value':email});

            $.post(url , data , function (msg) {

                console.log(msg);

                if (msg == 1){
                    mainNtf('رمز عبور شما با موفقیت تغییر یافت');
                    setTimeout(function () {
                        window.location = 'panel';
                    },3500)
                } else  if (msg == 2){
                    mainNtf('رمز عبور شما با موفقیت تغییر یافت');
                    setTimeout(function () {
                        window.location = 'panel';
                    },3500)
                } else if (msg == 'passWrong'){
                    mainNtf('رمز عبور فعلی اشتباه است');
                    oldPass.val('');
                    oldPass.attr("placeholder", "رمز عبور فعلی اشتباه است");
                } else if (msg == 'notChanged'){
                    mainNtf('عملیات تغییر رمز عبور با مشکل مواجه شده است. لطفا دوباره امتحان کنید');
                } else if (msg == 'expired'){
                    mainNtf('متاسفانه لینک بازیابی رمز عبور شما منقضی شده است. لطفا دوباره درخواست تغییر رمز عبور دهید');
                }
            })

        }
    }


</script>