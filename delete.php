<?php
include "sessionVarCheck.php";
global $users, $calendars, $events, $dbconn;
include "conn.php";

if (!isset($_GET['item']) || !isset($_SESSION['username'])){
    header("location: ./usersystem/login.php");
}
$dbconn->query("delete from $events[table] where $events[id] = '$_GET[item]'");
header("Location: ./");