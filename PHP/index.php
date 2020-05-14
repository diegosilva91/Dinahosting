<?php
date_default_timezone_set('UTC');
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'\calculator_diff_time_stamp.php');

//Se toma una fecha por defecto como fecha de inicio
$show=new CalculatorDiffTimeStamp('2020-05-01 01:01:16');
$show->diff_time_stamp();
$show->diff_time_stamp_days();
$show->diff_time_stamp_month();


?> 
