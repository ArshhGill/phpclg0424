<?php
include "sessionVarCheck.php";
global $users, $calendars, $events, $dbconn;
include "conn.php";

if (isset($_POST["submit"])) {
    $query = <<<sql
INSERT into $calendars[table] ($calendars[title], $calendars[owner]) VALUES ('$_POST[calname]', '$_SESSION[username]')
sql;
    if ($dbconn->query($query)) {
        header("Location: ./selectCalendar.php");
    }
}


echo " <form class='container' method='post'>
    <input type='text' name='calname' required>
    <input type='submit' name='submit' value='submit'>
    </form>";
