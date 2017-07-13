<!DOCTYPE html>
<html>
<head>
    <title>请勿重复激活</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">请勿重复激活</div>
        <div>
            <h2><a href="{{'http://'.$_SERVER['HTTP_HOST'].'/login'}}">点击登陆</a></h2>
        </div>
    </div>
</div>
</body>
</html>
