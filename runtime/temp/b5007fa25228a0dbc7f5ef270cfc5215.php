<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\svncrm\auth\public/../app/index\view\index\index.html";i:1516360893;}*/ ?>
<html>
]<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<script type="application/javascript" charset="UTF-8">
    window.onload = function(){
        window.addEventListener('message',function(event){
            if(event.source!=window.parent) return;
            var origin = event.origin || event.originalEvent.origin;
            console.log('rec message');
            console.log(origin);
            console.log(event.data);
            document.cookie = "user="+event.data;
        },false)
    }
</script>
</body></html>