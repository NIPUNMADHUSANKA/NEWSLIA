<?php

//date_default_timezone_set("Asia/Calcutta");

/*$time1 = new DateTime('2017-01-23 18:16:25');
$time2 = new DateTime('2019-01-23 11:36:28');
$timediff = $time1->diff($time2);*/

$System_Date = date("Y-m-d");
$System_Time = date("H:i:s");

$time3 = new DateTime(".$System_Date.".$System_Time.");

echo $timediff->format('%y year %m month %d days %h hour %i minute %s second')."<br/>";

echo $timediff->s."<br/>";
echo $timediff->i."<br/>";
echo $timediff->h."<br/>";
echo $timediff->d."<br/>";
echo $timediff->m."<br/>";*/

?>