<?php $dashboardInfo = $data['dashboard_info'];
$lastPoem = $dashboardInfo['last_poem'];
if ($lastPoem['confrim'] == 1){
    $status = 'تایید شده';
    $color = 'green';
} elseif ($lastPoem['confrim'] == 0){
    $status = 'در انتظار تایید';
    $color = 'darkslategray';
} elseif ($lastPoem['confrim'] == -1){
    $status = 'تایید نشده';
    $color = 'red';
}
?>


<div class="dashboard-main container-fluid rounded">

    <div class="row">

        <div class="col-md-9">

            <div class="container-fluid">

    <div class="row h-100">
        <div class="col-md-3">
            <div class="h-100 w-100 bg-dark d-flex flex-column align-items-center justify-content-center rounded">
                <h6>تعداد کل بازدید از اشعار شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_viewes']?></span>
                <h6 class="mt-2">میانگین بازدید هر شعر شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_viewes']/$dashboardInfo['poems_number']?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 w-100 bg-dark d-flex flex-column align-items-center justify-content-center rounded">
                <h6>تعداد کل پسندهای اشعار شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_likes']?></span>
                <h6 class="mt-2">میانگین پسند هر شعر شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_likes']/$dashboardInfo['poems_number']?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 w-100 bg-dark d-flex flex-column align-items-center justify-content-center rounded">
                <h6>تعداد کل نظرات دریافتی شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_comments_number']?></span>
                <h6 class="mt-2">تعداد کل نظرات ارسالی شما</h6>
                <span class="badge badge-light fs0-85"><?=$dashboardInfo['all_sent_comments']?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="h-100 w-100 bg-dark d-flex flex-column align-items-center justify-content-center rounded">
                <h6>تعداد درخواست های کاری به شما</h6>
                <h6 class="mt-2">تعداد درخواست های کاری موفق به شما</h6>
            </div>
        </div>
    </div>
                <div class="card newest-poem mt-3">
                    <div class="card-header text-secondary">آخرین شعر ارسالی شما</div>
                    <div class="card-body">
                        <table class="table table-bordered last-poem">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th><?=$lastPoem['title']?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>کد</td>
                                <td><?=$lastPoem['id']?></td>
                            </tr>
                            <tr>
                                <td>نوع</td>
                                <td><?=$lastPoem['title_category']?></td>
                            </tr>
                            <tr>
                                <td>وضعیت</td>
                                <td style="color: <?=$color?>"><?=$status?></td>
                            </tr>
                            <tr>
                                <td>تاریخ ثبت</td>
                                <td><?=$lastPoem['date']?></td>
                            </tr>
                            <tr>
                                <td>تاریخ انتشار</td>
                                <td><?=$lastPoem['date_show']?></td>
                            </tr>
                            <tr>
                                <td>بازدیدها</td>
                                <td><?=$lastPoem['view']?></td>
                            </tr>
                            <tr>
                                <td>پسندها</td>
                                <td><?=$lastPoem['likes']?></td>
                            </tr>
                            <tr>
                                <td>نظرات</td>
                                <td><?=$lastPoem['commentsNumber']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3" style="direction: ltr">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
                    اشعار دفتر شعر
                    <span class="badge badge-dark badge-pill"><?=$dashboardInfo['poems_number']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
                    اشعار تایید شده
                    <span class="badge badge-dark badge-pill"><?=$dashboardInfo['confirmed']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
                    اشعار تایید نشده
                    <span class="badge badge-dark badge-pill"><?=$dashboardInfo['unconfirmed']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
                    اشعار در انتظار تایید
                    <span class="badge badge-dark badge-pill"><?=$dashboardInfo['waiting']?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-dark">
                    همکاری های موفق
                    <span class="badge badge-dark badge-pill">99</span>
                </li>
            </ul>


                <ul class="list-group mt-3">
                    <li class="list-group-item bg-dark">پربازدیدترین شعر</li>
                    <?php foreach ($dashboardInfo['max_view'] as $row){ ?>
                    <li class="list-group-item list-group-item-light"><?=$row?></li>
                    <?php } ?>

                    <li class="list-group-item bg-dark">محبوب ترین شعر</li>

                    <?php foreach ($dashboardInfo['max_likes'] as $row){ ?>
                    <li class="list-group-item list-group-item-light"><?=$row?></li>
                    <?php } ?>
                </ul>


        </div>

    </div>
</div>