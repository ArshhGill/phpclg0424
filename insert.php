<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./usersystem/login.php");
}
global $users, $calendars, $events, $dbconn;
include "conn.php";

echo "<link rel='stylesheet' href='style.css'>";

if (isset($_POST["submit"])) {
    if ($dbconn->query("INSERT into $events[table] ($events[title], $events[date], $events[cid]) VALUES ('$_POST[title]', '$_POST[date]', '')")) {
        header("Location: index.php");
    }
}


echo " <form class='container' method='post'>";

$result = $dbconn->query("SELECT * FROM ");

echo "<input type='text' name='title' required>
    <input type='date' name='date' value='today' required>
    <input type='submit' name='submit' value='submit'>
    </form>";
