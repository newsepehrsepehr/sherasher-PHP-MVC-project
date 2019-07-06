
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>admin</title>

    <!-- Bootstrap core CSS -->
    <base href="<?= URL ?>">
    <link rel="stylesheet" type="text/css" href="public/bootstrap_rtl/bootstrap.css">
    <!--<link rel="stylesheet" type="text/css" href="public/fontawesome/fontawesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="public/css1/admin2.css">
    <link rel="stylesheet" type="text/css" href="public/css1/projectStyles.css">
    <link rel="stylesheet" type="text/css" href="public/css2/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="public/js2/jquery-3.3.1.min.js"></script>
    <script src="public/js2/jquery-ui.min.js"></script>
    <script src="public/bootstrap/popper.js"></script>
    <script src="public/bootstrap_rtl/bootstrap.min.js"></script>
    <script src="public/js2/jquery.hoverIntent.js"></script>

    <style>
        body {
            font-family: yekan;
            font-size: .9rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">پنل مدیریت</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">داشبورد <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">کاربران</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">اشعار</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تنظیمات</a>
            </li>
        </ul>
        <ul class="navbar-nav" style="font-size: .8rem">
            <li class="nav-item">
                <a class="nav-link" href="#">فرهاد قادری، خوش آمدید <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">خروج</a>
            </li>

        </ul>

    </div>
</nav>

<header id="header">
    <div class="container-fluid h-100">
        <div class="row py-2 h-100">
            <div class="col-md-10 secound-header d-flex align-items-center">
                <h3>
                    <i class="fas fa-sliders-h"></i>
                    داشبورد
                    <small class="ml-2 text-secondary">مدیریت سایت</small>
                </h3>
            </div>
            <div class="col-md-2 h-100 d-flex align-items-center">

            </div>
        </div>
    </div>
</header>

<section>
    <nav id="breadcrumb"  aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">داشبورد</li>
        </ol>
    </nav>
</section>

<section>
    <div class="container-fluid content3">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group sidebar-right">
                    <li class="list-group-item active main-color-bg"><i class="mr-2 fas fa-sliders-h"></i>داشبورد</li>
                    <li class="list-group-item"><i class="mr-2 fas fa-user-friends"></i>کاربران<span class="badge badge-dark ml-2">4</span></li>
                    <li class="list-group-item"><i class="mr-2 fas fa-file"></i>اشعار<span class="badge badge-dark ml-2">4</span></li>
                    <li class="list-group-item"><i class="mr-2 fas fa-cog"></i>تنظیمات</li>
                </ul>

                <div class="card mt-4">
                    <div class="card-body">
                        <h6>فضای استفاده شده از سرور</h6>
                        <div class="progress bg-white">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>

                        <h6 class="mt-4">پهنای باند مصرفی</h6>
                        <div class="progress bg-white">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>کاربران</td>
                                <td>4000</td>
                            </tr>
                            <tr>
                                <td>کاربران تایید نشده</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>شاعران</td>
                                <td>3600</td>
                            </tr>
                            <tr>
                                <td>خوانندگان</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>اشعار</td>
                                <td>4000</td>
                            </tr>
                            <tr>
                                <td>کاربران آنلاین</td>
                                <td>800</td>
                            </tr>
                            <tr>
                                <td>مهمانان وبسایت</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>قراردادهای موفق</td>
                                <td>260</td>
                            </tr>
                            <tr>
                                <td>کاربران جدید امروز</td>
                                <td>180</td>
                            </tr>
                            <tr>
                                <td>کاربران فعال</td>
                                <td>680</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-9">



