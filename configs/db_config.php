<?php
$linki = mysqli_connect('localhost', 'root', '0000');
mysqli_select_db($linki,'tiehua') or die('1234');
mysqli_query($linki,'SET NAMES utf8');
mysqli_query($linki,'SET CHARACTER_SET_CLIENT=utf8');
mysqli_query($linki,'SET CHARACTER_SET_RESULTS=utf8');
date_default_timezone_set("Asia/Taipei");
define ("TABLE_NAME",'tch_');