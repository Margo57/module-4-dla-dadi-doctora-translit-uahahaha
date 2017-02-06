<?php
session_start();

unset($_SESSION['user_id']);
header("Location: /module4/login.php");
 
