<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\Web\thinkphp5SSO\public/../app/index\view\index\index.html";i:1516551316;}*/ ?>
<html>
<head>
    <title><?php echo $user['fullname']; ?>(登录demo)</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1> <small>(Single Sign-On demo)</small></h1>
    <h3>Logged in</h3>

    <pre><?= json_encode($user, JSON_PRETTY_PRINT); ?></pre>

    <a id="logout" class="btn btn-default" href="/logout">Logout</a>
</div>
</body>
</html>