<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./usersystem/login.php");
}
global $dbconn, $title, $date;
include "conn.php";

echo "<link rel='stylesheet' href='style.css'>";

if (isset($_POST["submit"])) {
    if ($dbconn->query("INSERT into calendar ($title, $date) VALUES ('$_POST[title]', '$_POST[date]')")) {
        header("Location: index.php");
    }
}


echo "
<form class='container' method='post'>
    <input type='text' name='title' required>
    <input type='date' name='date' value='today' required>
    <input type='submit' name='submit' value='submit'>
</form>
";