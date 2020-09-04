<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$data['student']->name}}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

    <style>
        .pdf-container {
            position: relative;
        }

        .header-wrapper {
            text-align: center;
            margin: 30px 0 45px 0;
        }

        .logo {
            width: 100px;
            display: block;
        }

        .address {
            margin: 0;
        }

        .footer-wrapper {
            position: absolute;
            bottom: 0;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container" style="font-family: DejaVu Sans, sans-serif;">
    <div class="row" style="font-family: DejaVu Sans, sans-serif;">
        <div class="col-md-12" style="font-family: DejaVu Sans, sans-serif;">
            <div class="box">
                <div class="pdf-container" style="font-family: DejaVu Sans, sans-serif;">

                    <div class="header-wrapper" style="font-family: DejaVu Sans, sans-serif;">
                        <img class="logo" src="{{asset('img/logo.png')}}" alt="">
                        <p class="address">Tekno kent</p>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Ögrenci Adi</th>
                            <th>Ödenen Tutar</th>
                            <th>Kalan Tutar</th>
                            <th>Ödeme Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$data['student']->name}}</td>
                            <td>100 tl</td>
                            <td>200 tl</td>
                            <td>{{date("d/m/Y")}}</td>
                            {{--                        <td>{{\Carbon\Carbon ::now('Europe/Istanbul')}}</td>--}}
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer-wrapper" style="font-family: DejaVu Sans, sans-serif;">
                <p class="address">Tekno kent</p>
            </div>

        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
