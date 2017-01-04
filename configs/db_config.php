<?php
$linki = mysqli_connect('10.10.137.227', 'bond', 'TsOy_1215');
mysqli_select_db($linki,'bond') or die('1234');
mysqli_query($linki,'SET NAMES utf8');
mysqli_query($linki,'SET CHARACTER_SET_CLIENT=utf8');
mysqli_query($linki,'SET CHARACTER_SET_RESULTS=utf8');
date_default_timezone_set("Asia/Taipei");
define ("TABLE_NAME",'tch_');