<?php
session_start();

if (!isset($_SESSION['username'])){
    header("Location: ./usersystem/login.php");
}

if (!isset($_SESSION['calendar'])){
    header("Location: ./selectCalendar.php");
}

global $users, $calendars, $events, $dbconn;
include "conn.php";

//echo "<link rel='stylesheet' href='style.css'>";

if (isset($_POST["submit"])) {
    if ($dbconn->query("INSERT into $events[table] ($events[title], $events[date], $events[calendar]) VALUES ('$_POST[title]', '$_POST[date]', '$_SESSION[calendar]')")) {
        header("Location: ./");
    }
}


echo " <form class='container' method='post'>
    <input type='text' name='title' required>
    <input type='date' name='date' value='today' required>
    <input type='submit' name='submit' value='submit'>
    </form>";
