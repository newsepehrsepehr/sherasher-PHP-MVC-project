<link rel="stylesheet" type="text/css" href="public/Croppie/croppie.css">
<script src="public/Croppie/croppie.min.js"></script>

<?php $user = Model::getUserInfo();
$confirm = $user['confirm'];
$type = $user['type'];

$waitingEdits = $data['waitingEdits'];
$family_edit = $waitingEdits['family'];
$type_edit = $waitingEdits['type'];
if ($type_edit == 1){$type_edit = 'شاعر';} elseif ($type_edit == 2){$type_edit = 'خواننده';} elseif ($type_edit == 3){$type_edit = 'شاعر و خواننده';}
$job_edit = $waitingEdits['job'];
$edu_edit = $waitingEdits['edu'];
$description_edit = $waitingEdits['description'];
?>

<form class="container-fluid form-info-user" method="post">
    <table class="table table-striped bg-white rounded text-secondary">
        <thead>
        <tr>
            <th>ایمیل</th>
            <th><?=$user['email']?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>تصویر</td>
            <td class="d-flex align-items-center">
                <div class="d-flex flex-column align-items-center">
                <img class="rounded img-show2" src="public/images/users/<?=$user['id']?>/user_64.jpg">
                    <span class="badge badge-success badge-pill mt-1">تصویر فعلی</span>
                    <span onclick="deleteImage(1)" class="badge badge-secondary badge-pill mt-1 cursor-pointer">حذف</span>
                </div>
                <div class="img-show-container">
                <div class="secound-img-container flex-column mr-3 align-items-center">
                <img class="rounded img-show" src="public/images/users/<?=$user['id']?>/user_update.jpg">
                    <span class="badge badge-danger badge-pill mt-1">تصویر در انتظار تایید</span>
                    <span onclick="deleteImage(2)" class="badge badge-secondary badge-pill mt-1 cursor-pointer">حذف</span>
                </div>
                </div>
                <div class="d-flex flex-column mr-2">
                    <label class="fileContainer bg-warning text-white mb-0">تغییر تصویر<input type="file" class="input-img" name="img"/></label>
                <span class="fileContainer bg-success text-white mt-1 btn-insert-avatar cursor-pointer">ثبت تصویر</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>نام و نام خانوادگی
            <span class="badge badge-warning cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['family']?>
                <?php if ($family_edit != ''){ ?>
                <span class="badge badge-secondary fs0-85 mr-3"><?=$family_edit?><span class="badge badge-light mr-2 fs0-8">در انتظار تایید</span></span>
                <?php } ?>
                <input class="edit-items input-edit-field form-control" name="family">
                <i onclick="okEdit('confirm' , this , 2 , 'family')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>وضعیت کاربری</td>
            <td><?php if ($confirm == 1){echo 'تایید شده';}elseif ($confirm == -1){echo 'تایید نشده';}elseif ($confirm == 0){echo 'در انتظار تایید';} ?></td>
        </tr>
        <tr>
            <td>نوع کاربری
                <span class="badge badge-warning cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?php if ($type == 1){echo 'شاعر';}elseif ($type == 2){echo 'خواننده';}elseif ($type == 3){echo 'شاعر و خواننده';} ?>
                <?php if ($type_edit != ''){ ?>
                <span class="badge badge-secondary fs0-85 mr-3"><?=$type_edit?><span class="badge badge-light mr-2 fs0-8">در انتظار تایید</span></span>
                <?php } ?>
                <label class="edit-items mr-4">شاعر</label><input class="position-relative mr-1 edit-items" style="top: 4px" type="radio" name="type" value="1">
                <label class="edit-items mr-4">خواننده</label><input class="position-relative mr-1 edit-items" style="top: 4px" type="radio" name="type" value="2">
                <label class="edit-items mr-4">شاعر و خواننده</label><input class="position-relative mr-1 edit-items" style="top: 4px" type="radio" name="type" value="3">
                <i onclick="okEdit('confirm' , this , 1 , 'user_type')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field mr-3"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>شماره تماس
                <span class="badge badge-success cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['mobile']?>
                <input class="edit-items input-edit-field form-control" name="mobile">
                <i onclick="okEdit('' , this , 2 , 'mobile')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>استان/شهر
                <span class="badge badge-success cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['state']?>
                /<?=$user['city']?>

                <div class="edit-items">
                <label class="mr-5" for="state">استان: </label><select id="state" class="l" name="state" onchange="Func()">
                    <option value="نامشخص">انتخاب کنید</option>
                    <option value="البرز" data_city="آسارا , اشتهارد , چهارباغ , شهر جدید هشتگرد , طالقان , کرج , کمال‌شهر , کوهسار , گرمدره , ماهدشت , محمدشهر , مشکین‌دشت , نظرآباد , هشتگرد,سایر ">البرز</option>
                    <option value="آذربایجان شرقی" data_city="آبش‌احمد , آذرشهر , آقکند , اسکو , اهر , ایلخچی , باسمنج , بخشایش , بستان‌آباد , بناب , بناب جدید , تبریز , ترک , ترکمانچایتسوج , تیکمه‌داش , جلفا , خاروانا , خامنه , خراجو , خسروشهر , خضرلو , خمارلو , خواجه , دوزدوزان , زرنق , زنوز , سراب , سردرود , سهند , سیس , سیه‌رود , شبستر , شربیان , شرفخانه , شندآباد , صوفیان , عجب‌شیر , قره‌آغاج , کشکسرای , کلوانق , کلیبر , کوزه‌کنان , گوگان , لیلان , مراغه , مرند , ملکان , ملک‌کیان , ممقان , مهربان , میانه , نظرکهریزی , وایقان , ورزقان , هادیشهر , هرگلان , هریس , هشترود , هوراند , یامچی,سایر ">آذربایجان شرقی</option>
                    <option value="آذربایجان غربی" data_city="آواجیق , ارومیه , اشنویه , ایواوغلی , باروق , بازرگان , بوکان , پلدشت , پیرانشهر , تازه‌شهر , تکاب , چهاربرج , خوی , ربط , سردشت , سرو , سلماس , سیلوانه , سیمینه , سیه‌چشمه , شاهین‌دژ , شوط , فیرورق , قره‌ضیاءالدین , قوشچی , کشاورز , گردکشانه , ماکو , محمدیار , محمودآباد , مهاباد , میاندوآب , میرآباد , نالوس , نقده , نوشین‌شهر,سایر ">آذربایجان غربی</option>
                    <option value="اردبیل" data_city="خلخال , آبی‌بیگلو , اردبیل , اصلاندوز , بیله‌سوار , پارس‌آباد , تازه‌کند , تازه‌کند انگوت , جعفرآباد , رضی , سرعین , عنبران , فخرآباد , کلور , کوراییم , گرمی , گیوی , لاهرود , مشگین‌شهر , نمین , نیر , هشتجین , هیر,سایر ">اردبیل</option>
                    <option value="اصفهان" data_city="ابریشم , اردستان , اژیه , اصفهان , افوس , انارک , ایمان‌شهر , بادرود , باغ بهادران , برف‌انبار , بهاران‌شهر , بهارستان , بویین و میاندشت , پیربکران , تودشک , تیران , جندق , جوزدان , چادگان , چرمهین , چم گردان , حبیب‌آباد , حسن‌آباد , حنا , خالدآباد , خمینی‌شهر , خوانسار , خور , خوراسگان , خورزوق , داران , دامنه , درچه‌پیاز , دستگرد , دهاقان , دهق , دولت‌آباد , دیزیچه , رزوه , رضوان‌شهر , زاینده‌رود , زرین‌شهر , زواره , زیباشهر , سده لنجان , سگزی , سمیرم , شاهین‌شهر , شهرضا , طالخونچه , عسگران , علویجه , فریدون‌شهر , فلاورجان , فولادشهر , قهدریجان , کاشان , کرکوند , کلیشاد و سودرجان , کمشجه , کمه , کهریزسنگ , کوشک , کوهپایه , گز , گلپایگان , گل‌دشت , گل‌شهر , گوگد , مبارکه , محمدآباد , مشکات , منظریه , مهاباد , میمه , نایین , نجف‌آباد , نصرآباد , نطنز , نیک‌آباد , ورزنه , ورنامخواست , وزوان , ونک , هرند,سایر ">اصفهان</option>
                    <option value="ایلام" data_city="آبدانان , آسمان‌آباد , ارکواز , ایلام , ایوان , بدره , پهله , توحید , چوار , دره‌شهر , دلگشا , دهلران , زرنه , سرابله , سراب‌باغ , صالح‌آباد , لومار , مورموری , موسیان , مهران , میمه,سایر ">ایلام</option>
                    <option value="بوشهر" data_city="آب‌پخش , آبدان , امام حسن , اهرم , برازجان , بردخون , بردستان , بندر بوشهر , بندر دیر , بندر دیلم , بندر ریگ , بندر کنگان , بندر گناوه , تنگ ارم , جم , چغادک , خارک , خورموج , دالکی , دلوار , ریز , سعدآباد , شبانکاره , شنبه , طاهری , عسلویه , کاکی , کلمه , نخل تقی , وحدتیه,سایر ">بوشهر</option>
                    <option value="تهران" data_city="آبسرد , آبعلی , ارجمند , اسلام‌شهر , اندیشه , باغستان , باقرشهر , بومهن , پاکدشت , پردیس , پیشوا , تجریش , تهران , جوادآباد , چهاردانگه , حسن‌آباد , دماوند , رباطکریم , رودهن , شاهدشهر , شریف‌آباد , شهرری , شهریار , صالح‌آباد , صباشهر , صفادشت , فردوسیه , فشم , فیروزکوه , قدس , قرچک , کهریزک , کیلان , گلستان , لواسان , ملارد , نسیم‌شهر , نصیرآباد , وحیدیه , ورامین,سایر ">تهران</option>
                    <option value="چهارمحال و بختیاری" data_city="اردل , آلونی , باباحیدر , بروجن , بلداجی , بن , جونقان , چلگرد , سامان , سفیددشت , سودجان , سورشجان , شلمزار , شهرکرد , طاقانک , فارسان , فرادنبه , فرخ‌شهر , کیان , گندمان , گهرو , لردگان , مال‌خلیفه , ناغان , نافچ , نقنه , هفشجان,سایر ">چهارمحال و بختیاری</option>
                    <option value="خراسان جنوبی" data_city="آرین‌شهر , ارسک , اسدیه , اسفدن , اسلامیه , آیسک , بشرویه , بیرجند , حاجی‌آباد , خضری دشت بیاض , خوسف , زهان , سرایان , سربیشه , سه‌قلعه , شوسف , طبس مسینا , فردوس , قائن , قهستان , مود , نهبندان , نیمبلوک,سایر ">خراسان جنوبی</option>
                    <option value="خراسان رضوی" data_city="انابد , باجگیران , بار , باخرز , بایگ , بجستان , بردسکن , بیدخت , تایباد , تربت جام , تربت حیدریه , جغتای , جنگل , چاپشلو , چکنه , چناران , خرو , خلیل‌آباد , خواف , داورزن , دررود , درگز , دولت‌آباد , رباط سنگ , رشتخوار , رضویه , رودآب , ریوش , سبزوار , سرخس , سلامی , سلطان‌آباد , سنگان , شادمهر , شاندیز , ششتمد , شهرآباد , صالح‌آباد , طرقبه , عشق‌آباد , فرهادگرد , فریمان , فیروزه , فیض‌آباد , قاسم‌آباد , قدمگاه , قلندرآباد , قوچان , کاخک , کاریز , کاشمر , کدکن , کلات , کندر , گناباد , لطف‌آباد , مشهد , مشهد ریزه , ملک‌آباد , نشتیفان , نصرآباد , نقاب , نوخندان , نیشابور , نیل‌شهر , همت‌آباد,سایر ">خراسان رضوی</option>
                    <option value="خراسان شمالی" data_city="                آشخانه , اسفراین , بجنورد , پیش‌قلعه , جاجرم , حصار گرم‌خان , درق , راز , سنخواست , شوقان , شیروان , صفی‌آباد , فاروج , قاضی , گرمه , لوجلی,سایر ">خراسان شمالی</option>
                    <option value="خوزستان" data_city="آبادان , آغاجاری , اروندکنار , الوان , امیدیه , اندیمشک , اهواز , ایذه , باغ‌ملک , بستان , بندر امام خمینی , بندر ماهشهر , بهبهان , جایزان , جنت‌مکان , چمران , حر ریاحی , حسینیه , حمیدیه , خرمشهر , دزآب , دزفول , دهدز , رامشیر , رامهرمز , رفیع , زهره , سالند , سردشت , سوسنگرد , شادگان , شوش , شوشتر , شیبان , صفی‌آباد , صیدون , قلعه خواجه , قلعه‌تل , گتوند , لالی , مسجدسلیمان , مقاومت , ملاثانی , میانرود , مینوشهر , هفتگل , هندیجان , هویزه , ویس,سایر ">خوزستان</option>
                    <option value="زنجان" data_city="آب‌بر , ابهر , ارمغان‌خانه , چورزق , حلب , خرمدره , دندی , زرین‌آباد , زرین‌رود , زنجان , سجاس , سلطانیه , سهرورد , صائین‌قلعه , قیدار , گرماب , ماه‌نشان , هیدج ,سایر ">زنجان</option>
                    <option value="سمنان" data_city="          آرادان , امیریه , ایوانکی , بسطام , بیارجمند , دامغان , درجزین , دیباج , سرخه , سمنان , شاهرود , شهمیرزاد , کلاته خیج , گرمسار , مجن , مهدی‌شهر , میامی,سایر ">سمنان</option>
                    <option value="سیستان و بلوچستان" data_city="ادیمی , اسپکه , ایرانشهر , بزمان , بمپور , بنت , بنجار , پیشین , جالق , چابهار , خاش , دوست‌محمد , راسک , زابل , زابلی , زاهدان , زهک , سراوان , سرباز , سوران , سیرکان , فنوج , قصرقند , کنارک , گلمورتی , محمد‌آباد , میرجاوه , نصرت‌آباد , نگور , نوک‌آباد , نیک‌شهر,سایر ">سیستان و بلوچستان</option>
                    <option value="فارس" data_city="آباده , آباده طشک , اردکان , ارسنجان , استهبان , اسیر , اشکنان , افزر , اقلید , اهل , اوز , ایج , ایزدخواست , باب انار , بالاده , بنارویه , بهمن , بیرم , بیضا , جنت‌شهر , جهرم , جویم , حاجی‌آباد , خاوران , خرامه , خشت , خنج , خور , خومه‌زار , داراب , داریان , دوزه , دهرم , رامجرد , رونیز , زاهدشهر , زرقان , سده , سروستان , سعادت‌شهر , سورمق , سوریان , سیدان , ششده , شهرپیر , شیراز , صغاد , صفاشهر , علامرودشت , فتح‌آباد , فراشبند , فسا , فیروزآباد , قائمیه , قادرآباد , قطب‌آباد , قیر , کازرون , کامفیروز , کره‌ای , کنارتخته , کوار , گراش , گله‌دار , لارستان , لامرد , لپوئی , لطیفی , مرودشت , مشکان , مصیری , مهر , میمند , نوجین , نودان , نورآباد , نی‌ریز , وراوی , هماشهر,سایر ">فارس</option>
                    <option value="قزوین" data_city="آبگرم , آبیک , آوج , ارداق , اسفرورین , اقبالیه , الوند , بوئین‌زهرا , بیدستان , تاکستان , خاکعلی , خرمدشت , دانسفهان , رازمیان , سگزآباد , سیردان , شال , ضیاءآباد , قزوین , کوهین , محمدیه , محمودآباد نمونه , معلم‌کلایه , نرجه,سایر ">قزوین</option>
                    <option value="قم" data_city="جعفریه , دستجرد , سلفچگان , قم , قنوات , کهک,سایر ">قم</option>
                    <option value="کردستان" data_city="آرمرده , بابارشانی , بانه , بلبان‌آباد , بویین سفلی , بیجار , چناره , دزج , دلبران , دهگلان , دیواندره , زرینه , سروآباد , سریش‌آباد , سقز , سنندج , شویشه , صاحب , قروه , کامیاران , کانی‌دینار , کانی‌سور , مریوان , موچش , یاسوکند,سایر ">کردستان</option>
                    <option value="کرمان" data_city="اختیارآباد , ارزوئیه , امین‌شهر , انار , اندوهجرد , باغین , بافت , بردسیر , بروات , بزنجان , بم , بهرمان , پاریز , جبالبارز , جوزم , جوپار , جیرفت , چترود , خاتون‌آباد , خانوک , خرسند , درب بهشت , دهج , رابر , راور , راین , رفسنجان , رودبار , ریحان‌شهر , زرند , زنگی‌آباد , زیدآباد , سیرجان , شهداد , شهربابک , صفائیه , عنبرآباد , فاریاب , فهرج , قلعه گنج , کاظم‌آباد , کرمان , کشکوئیه , کهنوج , کوهبنان , کیان‌شهر , گلباف , گلزار , ماهان , محمدآباد , محی‌آباد , مردهک , مس سرچشمه , منوجان , نجف‌شهر , نرماشیر , نظام‌شهر , نگار , نودژ , هجدک , یزدان‌شهر,سایر ">کرمان</option>
                    <option value="کرمانشاه" data_city="ازگله , اسلام‌آباد غرب , باینگان , بیستون , پاوه , تازه‌آباد , جوانرود , حمیل , رباط , روانسر , سرپل ذهاب , سرمست , سطر , سنقر , سومار , صحنه , قصر شیرین , کرمانشاه , کرند غرب , کنگاور , کوزران , گهواره , گیلانغرب , میان‌راهان , نودشه , نوسود , هرسین , هلشی,سایر ">کرمانشاه</option>
                    <option value="کهکیلویه و بویراحمد" data_city="باشت , پاتاوه , چرام , چیتاب , دهدشت , دوگنبدان , دیشموک , سوق , سی‌سخت , قلعه رئیسی , گراب سفلی , لنده , لیکک , مارگون , یاسوج,سایر ">کهگیلویه و بویراحمد</option>
                    <option value="گلستان" data_city="آزادشهر ,آق‌قلا ,بندر گز ,ترکمن ,رامیان ,علی‌آباد ,کردکوی ,کلاله ,گرگان ,گنبد کاووس ,مراوه‌تپه ,مینودشت,سایر ">گلستان</option>
                    <option value="گیلان" data_city="آستارا , آستانه اشرفیه , احمدسرگوراب , اسالم , اطاقور , املش , بازارجمعه , بره‌سر , بندر انزلی , پره‌سر , توتکابن , جیرنده , چابکسر , چاف و چمخاله , چوبر , حویق , خشکبیجار , خمام , دیلمان , رانکوه , رحیم‌آباد , رستم‌آباد , رشت , رضوانشهر , رودبار , رودسر , رودبنه , سنگر , سیاهکل , شفت , شلمان , صومعه‌سرا , فومن , کلاچای , کوچصفهان , کومله , کیاشهر , گوراب زرمیخ , لاهیجان , لشت نشا , لنگرود , لوشان , لوندویل , لیسار , ماسال , ماسوله , مرجغل , منجیل , واجارگاه , هشتپر,سایر ">گیلان</option>
                    <option value="لرستان" data_city="زنا , اشترینان , الشتر , الیگودرز , بروجرد , پل‌دختر , چالانچولان , چغلوندی , چقابل , خرم‌آباد , درب گنبد , دورود , زاغه , سپیددشت , سراب‌دوره , فیروزآباد , کونانی , کوهدشت , گراب , معمولان , مومن‌آباد , نورآباد , ویسیان,سایر ">لرستان</option>
                    <option value="مازندران" data_city="آلاشت , آمل , امیرشهر , ایزدشهر , بابل , بابلسر , بلده , بهشهر , بهنمیر , پل سفید , تنکابن , جویبار , چالوس , چمستان , خرم‌آباد , خلیل‌شهر , خوش‌رودپی , دابودشت , رامسر , رستمکلا , رویان , رینه , زرگرمحله , زیرآب , ساری , سرخ‌رود , سلمان‌شهر , سورک , شیرگاه , شیرود , عباس‌آباد , فریدون‌کنار , فریم , قائم‌شهر , کتالم و سادات‌شهر , کلارآباد , کلاردشت , کله‌بست , کوهی‌خیل , کیاسر , کیاکلا , گزنک , گلوگاه , گلوگاه بابل , گتاب , محمودآباد , مرزن‌آباد , مرزیکلا , نشتارود , نکا , نور , نوشهر,سایر ">مازندران</option>
                    <option value="مرکزی" data_city="اراک , آستانه , آشتیان , پرندک , تفرش , توره , خمین , خنداب , داودآباد , دلیجان , رازقان , زاویه , ساوه , سنجانشازند , غرق‌آباد , فرمهین , قورچی‌باشی , کرهرود , کمیجان , مأمونیه , محلات , میلاجرد , نراق , نوبران , نیم‌ورهندودر,سایر ">مرکزی</option>
                    <option value="هرمزگان" data_city="ابوموسی , بستک , بندر چارک , بندر خمیر , بندرعباس , بندر لنگه , پارسیان , جاسک , جناح , حاجی‌آباد , درگهاندهبارز , رویدر , زیارت‌علی , سندرک , سوزا , سیریک , فارغان , فین , قشم , کنگ , کیش , هرمز , هشت‌بندیمیناب,سایر ">هرمزگان</option>
                    <option value="همدان" data_city="ازندریان , اسدآباد , برزول , بهار , تویسرکان , جورقان , جوکار , دمق , رزن , زنگنه , سامن , سرکان , شیرین‌سو , صالح‌آباد , فامنین , فرسفج , فیروزان , قروه درجزین , قهاوند , کبودرآهنگ , گل‌تپه , گیان , لالجین , مریانج , ملایر , مهاجران , نهاوند , همدان,سایر ">همدان</option>
                    <option value="یزد" data_city="ابرکوه , احمدآباد , اردکان , اشکذر , بافق , بهاباد , تفت , حمیدیا , خضرآباد , دیهوک , زارچ , شاهدیه , طبس , عشق‌آباد , عقدا , مروست , مهردشت , مهریز , میبد , ندوشن , نیر , هرات , یزد,سایر ">یزد</option>
                </select><label class="mr-2" for="city"> شهرستان: </label><select name="city" id="city" class="l">
                </select>
                </div>

                <i onclick="okEdit('' , this , 2 , 'city')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field mr-3"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>تاریخ تولد
                <span class="badge badge-success cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['birthday']?>
                <div class="edit-items mr-4">
                <div class="input-group mb-3 text-dark fs0-9 d-flex align-items-center">
                    <span class="">روز</span>
                    <select class="mr-2" name="day1" style="display: block!important;">
                        <?php for ($i=1; $i<32; $i++){ ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                        <?php } ?>
                    </select>
                    <span class="mr-5">ماه</span>
                    <select class="mr-2" name="month1" style="display: block!important;>
                    <?php for ($i=0; $i<=12; $i++){ ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                    </select>
                    <span class="mr-5">سال</span>
                    <select class="mr-2" name="year1" style="display: block!important;>
                    <?php
                    $thisYear = Model::jalaliDate('Y');
                    for ($i=$thisYear+1; $i>=1300; $i--){ ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                <?php } ?>
                    </select>
                </div>
                </div>
                <i onclick="okEdit('' , this , 2 , 'birthday')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>جنسیت
                <span class="badge badge-success cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?php if($user['gender'] == 1){echo 'مرد';} elseif ($user['gender'] == 0){echo 'زن';}?>
                <label class="edit-items mr-4">مرد</label><input class="position-relative mr-1 edit-items" style="top: 4px" type="radio" name="gender" value="1">
                <label class="edit-items mr-4">زن</label><input class="position-relative mr-1 edit-items" style="top: 4px" type="radio" name="gender" value="0">
                <i onclick="okEdit('' , this , 1 , 'gender')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>شغل
                <span class="badge badge-warning cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['job']?>
                <?php if ($job_edit != ''){ ?>
                <span class="badge badge-secondary fs0-85 mr-3"><?=$job_edit?><span class="badge badge-light mr-2 fs0-8">در انتظار تایید</span></span>
                <?php } ?>
                <input name="job" class="edit-items input-edit-field form-control">
                <i onclick="okEdit('confirm' , this , 2 , 'job')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>تحصیلات
                <span class="badge badge-warning cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['edu']?>
                <?php if ($edu_edit != ''){ ?>
                <span class="badge badge-secondary fs0-85 mr-3"><?=$edu_edit?><span class="badge badge-light mr-2 fs0-8">در انتظار تایید</span></span>
                <?php } ?>
                <input name="edu" class="edit-items input-edit-field form-control">
                <i onclick="okEdit('confirm' , this , 2 , 'edu')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        <tr>
            <td>تاریخ ثبت نام</td>
            <td><?=$user['register_date']?></td>
        </tr>
        <tr>
            <td>درباره من
                <span class="badge badge-warning cursor-pointer mr-2 btn-edit-field">ویرایش</span>
            </td>
            <td><?=$user['description']?>
                <?php if ($description_edit != ''){ ?>
                <span class="badge badge-secondary fs0-85 mr-3"><?=$description_edit?><span class="badge badge-light mr-2 fs0-8">در انتظار تایید</span></span>
                <?php } ?>
            <textarea name="description" class="edit-items input-edit-field form-control"></textarea>
                <i onclick="okEdit('confirm' , this , 3 , 'description')" class="edit-items fas fa-check-square fs1-4 text-success btn-ok-edit-field"></i>
                <i class="edit-items fas fa-window-close fs1-4 text-danger btn-cancel-edit-field"></i>
            </td>
        </tr>
        </tbody>
    </table>
<div class="jumbotron">
    <h5 class="text-dark">توجه:</h5>
    <p class="text-dark line-height-1-6">در صورتی که تصویر خود را تغییر دهید، تا زمانی که تصویر جدید شما توسط سایت تایید نشود تصویر قبلی شما در حساب کاربریتان نمایش داده خواهد شد و پس از تایید، تصویر قبلی حذف خواهد شد.</p>
    <p class="text-dark line-height-1-6">در صورت ویرایش مواردی که با
        <span class="badge badge-warning">ویرایش</span>
    مشخص شده اند، اطلاعات جدید باید توسط سایت تایید شود ولی مواردی که با
        <span class="badge badge-success">ویرایش</span>
        مشخص شده اند در صورت ویرایش بلافاصله در حساب کاربری شما ذخیره خواهند شد.
    </p>
</div>
</form>

<!-- The Modal -->
<div class="modal" id="Modal-img-profile">
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
                        <div class="image_demo" style="">

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

<script>

        $(".img-show").on("error", function() {
                $(this).parents('.img-show-container').fadeOut()
        });




    /*select profile image*/

    $image_crop = $('.image_demo').croppie({
        enableExif: true,
        viewport:{
            width:250,
            height:250,
            type: 'square'
        } ,
        boundary:{
            width: 400,
            height: 300
        }
    });

    $('.input-img').on('change' , function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind' , {
                url:event.target.result
            }).then(function () {
                console.log('jquery bind compelete');
            })
        }
        reader.readAsDataURL(this.files[0]);
        $('#Modal-img-profile').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop.croppie('result' , {
            type:'canvas',
            size:'viewport'
        }).then(function (response) {
            $('.img-show').attr('src' , response);
            $('.img-show-container').fadeIn()
            $('.btn-insert-avatar').fadeIn();
            $('.btn-delete-avatar').fadeOut();

            $('.btn-insert-avatar').click(function () {
                showConfirmAlert('در صورت تغییر تصویر تا زمانی که تصویر تایید نشود تصویر قبلی در پروفایل شما نمایش داده می شود' +
                    '<br><br>' +
                    'آیا می خواهید تصویر را تغییر دهید؟');

                $('.btn-ok-confirm').click(function () {
                    var url = 'panel/updateAvatar';
                    var data = {'img':response};
                    $.post(url , data , function (msg) {
                        if (msg == 1){
                            mainNtf('تصویر شما با موفقیت ثبت شد و پس تایید تغییر خواهد یافت' , 1 , 0);
                            setTimeout(function () {
                                window.location.reload();
                            } , 3000)

                        }
                    })

                })
            });

        })
    })

    function deleteImage(imgType) {
        var url = 'panel/deleteAvatar/'+imgType;
        var data = {};
        $.post(url , data , function (msg) {
            if (msg == 1){
                mainNtf('تصویر با موفقیت حذف شد');
                $('.img-show-container').fadeOut();
            }
        })
    }

    $('.btn-edit-field').click(function () {
        $(this).parents('tr').find('.edit-items').addClass('show');
    })

    function okEdit(confirm='' , tag , valueType , field='') {
        var thisTag = $(tag);

        var data = $('.form-info-user').serializeArray();

        if (confirm == 'confirm'){

            data.push({'name':'field' , 'value':field})

            var url = 'panel/editUserInfoConfirm';
            $.post(url , data , function (msg) {
                if (msg == 1){
                    mainNtf('اطلاعات با موفقیت ثبت شد و پس از تایید در حساب کاربری شما به روز رسانی خواهد شد.')
                    setTimeout(function () {
                        window.location.reload();
                    } , 3000)
                }
            })

        } else {

            var fieldValue = thisTag.parent().find('input').val();
            var url = 'panel/editUserInfo';
            data.push({'name':'value' , 'value':fieldValue})
            data.push({'name':'field' , 'value':field})
            $.post(url , data , function (msg) {
                if (msg == 1){
                    mainNtf('اطلاعات با موفقیت ثبت شد');
                    setTimeout(function () {
                        window.location.reload();
                    } , 3000)
                }
            })

        }
    }

        function Func() {
            var city = document.getElementById('city');
            var state=document.getElementById('state');
            var val=state.options[state.selectedIndex].getAttribute('data_city');
            var arr=val.split(',');
            city.options.length = 0;
            for(i = 0; i < arr.length; i++)
            {
                if(arr[i] != "")
                {
                    city.options[city.options.length]=new Option(arr[i],arr[i]);
                }
            }
        }

        $('.btn-cancel-edit-field').click(function () {
            $(this).parents('tr').find('.edit-items').removeClass('show');
        })




</script>