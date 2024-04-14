<?php
session_start();

if (!isset($_SESSION['username'])) {
header("Location: ./usersystem/login.php");
}

global $users, $calendars, $events, $dbconn;
include "conn.php";

if (isset($_POST["submit"])) {
    if ($dbconn->query("INSERT into $calendars[table] ($calendars[title], $calendars[owner]) VALUES ('$_POST[calname]', $_SESSION[username]')")) {
        header("Location: ./selectCalendar.php");
    }
}


echo " <form class='container' method='post'>
    <input type='text' name='calname' required>
    <input type='submit' name='submit' value='submit'>
    </form>";
