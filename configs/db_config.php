<?php
$linki = mysqli_connect('lma852.siteprotect.com', 'bond', 'TsOy_1215');
mysqli_select_db($linki,'bond') or die('1234');
mysqli_query($linki,'SET NAMES utf8');
mysqli_query($linki,'SET CHARACTER_SET_CLIENT=utf8');
mysqli_query($linki,'SET CHARACTER_SET_RESULTS=utf8');