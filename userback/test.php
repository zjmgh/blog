<?php

function Show($msg='添加成功',$url=''){
    $str ="<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <title></title>
            </head>
            <body>
            <span id='show' style='font-size:25px;font-weight: bold;display:block;width:50px;height:50px;line-height: 50px;text-align: center;'></span>
<h3>{$msg}</h3>
<script>
    runCount(3);
    function runCount(t){
        if(t>0){
            document.getElementById('show').innerHTML = t;
            t--;
            setTimeout('runCount('+t+')',1000);
        }else{
            window.location.href='{$url}';
        }
    }
</script>
        </body>
        </html>";
    echo $str;
}
