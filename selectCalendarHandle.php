<?php
session_start();

if (!isset($_SESSION['username'])){
header("Location: ./usersystem/login.php");
}

if (!isset($_GET['item'])){
    header("Location: ./selectCalendar.php");
}

$_SESSION['calendar'] = $_GET['item'];
header("Location: ./");