<?php require('views/admin2/layout.php');?>
<link rel="stylesheet" type="text/css" href="public/css2/flipTimer.css">


    <div class="card p-0">
        <div class="card-header main-bg">بررسی اجمالی سایت</div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-gray d-flex flex-column align-items-center py-5">
                                <h4><i style="font-size: 1.3rem" class="mr-2 fas fa-user-friends"></i>400</h4>
                                <h6 class="mt-2">کاربران</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-gray d-flex flex-column align-items-center py-5">
                                <h4><i style="font-size: 1.3rem" class="mr-2 fas fa-file"></i>400</h4>
                                <h6 class="mt-2">اشعار</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-gray d-flex flex-column align-items-center py-5">
                                <h4><i style="font-size: 1.3rem" class="mr-2 far fa-eye"></i>400</h4>
                                <h6 class="mt-2">بازدیدکنندگان</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-gray d-flex flex-column align-items-center py-5">
                                <h4><i style="font-size: 1.3rem" class="mr-2 fas fa-check-circle"></i>400</h4>
                                <h6 class="mt-2">تراکنش ها</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card p-0 mt-4">
        <div class="card-header">جدیدترین کاربران</div>
        <div class="card-body">
            <table class="table table-bordered table-sm table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>کد</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>وضعیت</th>
                    <th>تاریخ عضویت</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Doe</td>
                    <td>Doe</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>Moe</td>
                    <td>Moe</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>Dooley</td>
                    <td>Dooley</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card p-0 mt-4">
        <div class="card-header"><i class="mr-2 fab fa-sellcast"></i>سود هفته اخیر</div>
        <div style="direction: ltr" class="card-body">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
    </div>

<div class="flipTimer" style="direction: ltr">
    <div class="hours"></div>
    <div class="minutes"></div>
    <div class="seconds"></div>
</div>




<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="public/jquery/jquery.flipTimer.js"></script>

<script>

    /*chart*/

    window.onload = function () {

        var options = {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Actual vs Projected Sales"
            },
            axisX:{
                valueFormatString: "DD MMM"
            },
            axisY: {
                title: "Number of Sales",
                suffix: "K",
                minimum: 30
            },
            toolTip:{
                shared:true
            },
            legend:{
                cursor:"pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "Projected Sales",
                markerType: "square",
                xValueFormatString: "DD MMM, YYYY",
                color: "#F08080",
                yValueFormatString: "#,##0K",
                dataPoints: [
                    { x: new Date(2017, 10, 1), y: 63 },
                    { x: new Date(2017, 10, 2), y: 69 },
                    { x: new Date(2017, 10, 3), y: 65 },
                    { x: new Date(2017, 10, 4), y: 70 },
                    { x: new Date(2017, 10, 5), y: 71 },
                    { x: new Date(2017, 10, 6), y: 65 },
                    { x: new Date(2017, 10, 7), y: 73 },
                    { x: new Date(2017, 10, 8), y: 96 },
                    { x: new Date(2017, 10, 9), y: 84 },
                    { x: new Date(2017, 10, 10), y: 85 },
                    { x: new Date(2017, 10, 11), y: 86 },
                    { x: new Date(2017, 10, 12), y: 94 },
                    { x: new Date(2017, 10, 13), y: 97 },
                    { x: new Date(2017, 10, 14), y: 86 },
                    { x: new Date(2017, 10, 15), y: 89 }
                ]
            },
                {
                    type: "line",
                    showInLegend: true,
                    name: "Actual Sales",
                    lineDashType: "dash",
                    yValueFormatString: "#,##0K",
                    dataPoints: [
                        { x: new Date(2017, 10, 1), y: 60 },
                        { x: new Date(2017, 10, 2), y: 57 },
                        { x: new Date(2017, 10, 3), y: 51 },
                        { x: new Date(2017, 10, 4), y: 56 },
                        { x: new Date(2017, 10, 5), y: 54 },
                        { x: new Date(2017, 10, 6), y: 55 },
                        { x: new Date(2017, 10, 7), y: 54 },
                        { x: new Date(2017, 10, 8), y: 69 },
                        { x: new Date(2017, 10, 9), y: 65 },
                        { x: new Date(2017, 10, 10), y: 66 },
                        { x: new Date(2017, 10, 11), y: 63 },
                        { x: new Date(2017, 10, 12), y: 67 },
                        { x: new Date(2017, 10, 13), y: 66 },
                        { x: new Date(2017, 10, 14), y: 56 },
                        { x: new Date(2017, 10, 15), y: 64 }
                    ]
                }]
        };
        $("#chartContainer").CanvasJSChart(options);

        function toogleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else{
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }


    /*//*/

    $('.flipTimer').flipTimer({
        direction: 'down',
        date: 'february 22,2019 23:25:20',
        callback: function() {
            $('#finished-timer').fadeIn(1000);
        }
    });

            </script>


<!--/*required from layout*/-->

<div>
</div>
</div>
</section>
</body>
</html>

