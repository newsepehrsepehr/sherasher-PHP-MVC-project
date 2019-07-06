<link rel="stylesheet" type="text/css" href="public/Croppie/croppie.css">
<script src="public/Croppie/croppie.min.js"></script>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6 register-item register-item1">
                <div class="jumbotron py-2 right d-flex justify-content-around flex-column align-items-center">
                    <h1 class="fs1-8"><i class="fas fa-fighter-jet"></i>
                        ثبت نام سریع</h1>
                    <p class="text-center line-height-1-4 mt-4 fs0-9">اگر حوصله پر کردن اطلاعاتو ندارید میتونید با انتخاب این گزینه به سوالات اصلی جواب بدید و توی سایت ثبت نام کنید.</p>
                    <p class="text-center line-height-1-4 mt-2 fs0-9">ولی ما پیشنهاد می کنیم که از ثبت نام کامل استفاده کنید.</p>
                </div>
            </div>
            <div class="col-md-6 register-item register-item2">
                <div class="jumbotron py-2 right d-flex justify-content-around flex-column align-items-center">
                    <h1 class="fs1-8"><i class="fas fa-coffee"></i>
                        ثبت نام کامل</h1>
                    <p class="text-center line-height-1-4 mt-4 fs0-9">در ثابت کامل شما چند لحظه ای از وقت گرانبهاتونو در اختیار ما قرار میدید و ما هم در عوض قول میدیم خیلی هم سرتونو درد نیاریم.</p>
                    <p class="text-center line-height-1-4 mt-2 fs0-9">با این نوع ثبت نام با خیال راحت میتونید فعالیتتونو در سایت شروع کنید و درگیر تکمیل اطلاعات کاربریتون نشید.</p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-7 form-register">

                <!--form1-->

                <form class="form-register-1" method="post">

                    <h5 class="fs1 text-dark">ثبت نام به عنوان</h5>

                    <div class="d-flex fs1 text-dark mt-4">
                        <input type="radio" name="type" value="1" checked>
                        <span class="mr-2">شاعر</span>
                    </div>
                    <div class="d-flex fs1 text-dark mt-3">
                        <input type="radio" name="type" value="2">
                        <span class="mr-2">خواننده</span>
                    </div>
                    <div class="d-flex fs1 text-dark mt-3">
                        <input type="radio" name="type" value="1">
                        <span class="mr-2">شاعر و خواننده</span>
                    </div>

                <h4 class="text-dark mt-4 fs1">ایمیل</h4>
                <div class="input-group mb-3">
                    <input type="text" class="form-control input-email" placeholder="ایمیل" name="email">
                    <div class="input-group-append">
                        <span class="input-group-text">@example.com</span>
                    </div>
                </div>
                <h4 class="text-dark mt-4 fs1">رمز عبور</h4>
                <div class="input-group mb-3">
                    <input type="password" class="form-control input-pass" placeholder="مثلا 1234" name="pass">
                    <div class="input-group-append">
                        <span style="font-size: .8rem" class="input-group-text">حداقل 4 حرف یا عدد</span>
                    </div>
                </div>
                <h4 class="text-dark mt-4 fs1">تکرار رمز عبور</h4>
                <div class="input-group mb-3">
                    <input type="password" class="form-control input-cpass" placeholder="مثلا 1234" name="c-pass">
                    <div class="input-group-append">
                        <span style="font-size: .75rem" class="input-group-text">برای این که یادتون بمونه</span>
                    </div>
                </div>
                    <h4 class="text-dark mt-4 fs1">نام و نام خانوادگی</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-family" placeholder="مثلا فرهاد قادری" name="family">
                    </div>

                <button class="btn btn-primary mt-4 fs0-85">مرحله بعد</button>
                <span class="btn btn-secondary mt-4 mr-4 fs0-85">مرحله قبل</span>
                </form>

                <!--form2-->

                <form class="form-register-2" method="post">
                    <h4 class="text-dark mt-4 mb-3 fs1">تصویر</h4>
                    <div class="input-group mb-3" style="height: 85px">
                        <div class="select-avatar">
                            <img src="" class="avatar-circle">
                            <input type="file" class="input-img" name="img">
                        </div>

                    </div>
                    <h4 class="text-dark mt-4 fs1">شماره تماس</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-pass" placeholder="مثلا 09123456789" name="mobile">
                        <div class="input-group-append">
                            <span style="font-size: .8rem" class="input-group-text">سعی کنید شماره همراه باشه</span>
                        </div>
                    </div>
                    <h4 class="text-dark mt-4 fs1">استان/شهر</h4>
                    <div class="input-group mb-3">

                        <label for="state">استان: </label><select id="state" class="l" name="state" onchange="Func()">
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
                        </select><label for="city"> شهرستان: </label><select name="city" id="city" class="l">
                        </select>

                    </div>

                    <div>

                        <h4 class="text-dark mt-4 fs1">تولد</h4>
                        <div class="input-group mb-3 text-dark fs1 d-flex align-items-center">
                        <span class="">روز</span>
                        <select class="mr-2" name="day1" style="display: block!important;">
                            <?php for ($i=1; $i<32; $i++){ ?>
                                <option value="<?=$i;?>"><?=$i;?></option>
                            <?php } ?>
                        </select>
                        <span class="mr-5">ماه</span>
                        <select class="mr-2" name="month1" style="display: block!important;>
                            <?php for ($i=1; $i<=12; $i++){ ?>
                                <option value="<?=$i;?>"><?=$i;?></option>
                            <?php } ?>
                        </select>
                        <span class="mr-5">سال</span>
                        <select class="mr-2" name="year1" style="display: block!important;>
                            <?php
                            $thisYear = Model::jalaliDate('Y');
                            for ($i=$thisYear; $i>=1300; $i--){ ?>
                                <option value="<?=$i;?>"><?=$i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                        <div></div>

                    <h5 class="fs1 text-dark mt-54">جنسیت</h5>
                    <div class="d-flex fs1 text-dark mt-4">
                        <input type="radio" name="gender" value="1">
                        <span class="mr-2">مرد</span>
                    </div>
                    <div class="d-flex fs1 text-dark mt-3">
                        <input type="radio" name="gender" value="0">
                        <span class="mr-2">زن</span>
                    </div>

                    <h4 class="text-dark mt-4 fs1">شغل</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="مثلا معلم" name="job">
                    </div>

                    <h4 class="text-dark mt-4 fs1">تحصیلات</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="مثلا لیسانس" name="edu">
                    </div>

                    <h4 class="text-dark mt-4 fs1">توضیح مختصر از خود</h4>
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="" name="description"></textarea>
                    </div>

                    <button class="btn btn-primary mt-4 fs0-85 btn-borm2">مرحله بعد</button>
                    <span class="btn btn-secondary mt-4 mr-4 fs0-85">مرحله قبل</span>
                </form>

            </div>

            <div class="col-md-5 p-5 alerts-box">

                <span class="loader loader-register"><span class="loader-inner"></span></span>

                <div class="jumbotron text-dark line-height-1-4 alerts-box-text">
                    <p class="text-1">
                        چند نکته کوتاه
                        <br>
                        <br>
                        ۱- ایمیلی که وارد می کنید حکم همون نام کاربری رو داره و برای ورود به سایت باید همین ایمیل رو وارد کنید
                        <br>
                        <br>
                        ۲- بعد از این مرحله یک ایمیل فعالسوزی براتون ارسال میشه که کافیه روی لینک داخلش کلیک کنید تا به صورت خودکار حسابتون تایید بشه. توجه کنید که اگه حسابتونو تایید نکنید نمی تونید از امکانات سایت استفاده کنید
                        <br>
                        <br>
                        ۳- در طول عملیات ثبت نام هرجا نیاز به توضیح بیشتر بود داخل همین کادر راهنماییتون میکنیم تا ثبت نام سریع تر جلو بره.

                    </p>
                    <p class="text-2">
                        مرحله دوم
                        <br>
                        <br>
                        ۱- وارد کردن هیچ کدوم از موارد این مرحله الزامی نیست و شما میتونید با زدن روی دکمه «مرحله بعد» ازش عبور کنید.
                        <br>
                        <br>
                        ۲- ما به شما پیشنهاد میکنیم که اگر قصد وارد کردن این اطلاعات رو ندارید حداقل یک تصویر برای پروفایلتون آپلود کنید.
                        <br>
                        <br>
                        ۳- قسمت «توضیح مختصر از خود» میتونه یه بیوگرافی کوتاه از خودتون باشه یا جمله ای که بیانگر حس و حالتونه. این جمله داخل صفحه کاربریتون نمایش داده میشه.
                        <br>
                        <br>
                        ۴- هر کدوم از این موارد داخل صفحه کاربریتون به بقیه کاربران نمایش داده میشه به جز شماره تماس.
                    </p>
                    <span class="txt-alert-box text-danger">

                    </span>
                </div>
            </div>

        </div>

    </div>



</div>

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

    /*//*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 260){
            $('.alerts-box').addClass('scroll' , 600)
        }
        else{
            $('.alerts-box').removeClass('scroll' , 600)
        }
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
            sessionStorage.setItem('avatar' , response);
            $('.avatar-circle').attr('src' , response);
        })
    })

    /*//*/


    $('.register-item2').click(function () {
        $(this).siblings().addClass('disable');
        $(this).find('p').fadeOut(200);
        $(this).siblings().gPreventClick();

            setTimeout(function () {
                $('html').animate({scrollTop: '300'});
                $('.form-register-1').fadeIn(800);
                setTimeout(function () {
                    $('.alerts-box').fadeIn('400');
                } , 600)
            })

    })
    
    $('.form-register-1').submit( function( e ) {

        var pass = $('.input-pass').val();
        var cPass = $('.input-cpass').val();
        var email = $('.input-email').val();
        var family = $('.input-family').val();
        var regEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


        if (email == '') {
            showNotification('ایمیل را وارد کنید');
        } else if (!regEmail.test(email)) {
            showNotification('ایمیل وارد شده اشتباه است');
        } else if (pass == '') {
            showNotification('رمز عبور را وارد کنید');
        } else if (pass.length < 4) {
            showNotification('رمز عبور باید بیش از ۴ حرف یا عدد باشد');
        } else if (cPass == '') {
            showNotification('تکرار رمز عبور را وارد کنید');
        } else if (pass != cPass) {
            showNotification('رمز عبور با تکرار آن مطابقت ندارد');
        } else if (family.trim() == '') {
            showNotification('نام و نام خانوادگی را وارد کنید');
        } else {

            $('.alerts-box-text').addClass('loading');
            $('.loader-register').fadeIn(400);
            var data = $(this).serializeArray();
            var url = 'register2/emailVerify';


            $.post(url, data, function (msg) {
                console.log(msg);
                $('.loader-register').fadeOut(400);
                $('.alerts-box-text').removeClass('loading');
                if (msg == 2) {
                    showNotification('با این ایمیل قبلا در سایت ثبت نام شده است');
                }

                if (msg == 1) {
                    showNotification('ایمیل فعالسازی برایتان ارسال شد');
                    sessionStorage.setItem('email' , email);
                    step2();

                }
            })

        }

        function step2(){

            $('.form-register-1').fadeOut(800);
            $('.form-register-2').fadeIn(800);
            $('.alerts-box .text-2').fadeIn(400);
            $('.alerts-box .text-1').fadeOut(400);

            $('.form-register-2').submit( function( e ) {
                var data = $(this).serializeArray();
                alert(sessionStorage.getItem('email'));
                data.push({'name': 'email' , 'value': sessionStorage.getItem('email')});
                data.push({'name': 'avatar' , 'value': sessionStorage.getItem('avatar')});
                var url = 'register2/setUserInfo';
                $.post(url , data , function (msg) {
                    if (msg[0] == 'type-error'){
                        showNotification('پسوند تصویر تنها می تواند jpg , jpeg , png و gif باشد');
                    } else if (msg[0] == 1 && msg[1] == 1){
                        step3();
                    }
                })
                e.preventDefault();
            });

        }
        e.preventDefault();
        
    });


</script>