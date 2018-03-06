<?php
/*
 *Developer: The陈铭
 *Date: 2017/7/27
 *Time: 19:31
 */
date_default_timezone_set("PRC");
echo '<div id="time"></div>
<script type="text/javascript">
    var dayNames = new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
         function get_obj(time){
              return document.getElementById(time);
         }
         var ts='.(round(microtime(true)*1000)).';
               function getTime(){
               var t=new Date(ts);
               with(t){
                    var _time=""+getFullYear()+"-" + (getMonth()+1)+"-"+getDate()+" " + (getHours()<10 ? "0" :"") + getHours() + ":" + (getMinutes()<10 ? "0" :"") + getMinutes() + ":" + (getSeconds()<10 ? "0" :"") + getSeconds() + " " + dayNames[t.getDay()];
               }
               get_obj("time").innerHTML=_time;
               setTimeout("getTime()",1000);
               ts+=1000;
         }
         getTime();
</script>';
