<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\Web\thinkphp5SSO\public/../app/auth\view\authenticate\socketdemo.html";i:1516726204;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/css.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">

</head>

<body>

<!-- Top content -->
<div class="top-content">


</div>


<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
<script type="application/javascript">
    ws = new WebSocket("ws://thinkphp5sso.com:2346");
    ws.onopen = function() {
        alert("连接成功");
        ws.send('tom');
        alert("给服务端发送一个字符串：tom");
    };
    ws.onmessage = function(e) {
        alert("收到服务端的消息：" + e.data);
    };

</script>
