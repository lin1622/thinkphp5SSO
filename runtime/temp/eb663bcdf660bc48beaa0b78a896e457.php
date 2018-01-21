<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\Web\thinkphp5SSO\public/../app/auth\view\authenticate\commonhtml.html";i:1516549676;}*/ ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
index/index/index

<script type="application/javascript" charset="UTF-8">
    window.onload = function(){
        window.addEventListener('message',function(event){
            if(event.source!=window.parent) return;
            var origin = event.origin || event.originalEvent.origin;
            console.log('rec message');
            console.log(origin);
            console.log(event.data);
            document.cookie = "xmus="+event.data;
        },false)
    }
</script>
</body></html>