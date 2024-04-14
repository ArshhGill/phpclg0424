<?php
session_start();

if (!isset($_SESSION['username'])){
header("Location: ./usersystem/login.php");
}

if (!isset($_SESSION['calendar'])){
header("Location: ./selectCalendar.php");
}
