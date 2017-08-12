<?php
$linki = mysqli_connect('localhost', 'root', '0000');
mysqli_select_db($linki,'zkfk') or die('1234');
mysqli_query($linki,'SET NAMES utf8');
mysqli_query($linki,'SET CHARACTER_SET_CLIENT=utf8');
mysqli_query($linki,'SET CHARACTER_SET_RESULTS=utf8');
