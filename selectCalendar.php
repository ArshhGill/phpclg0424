<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./usersystem/login.php");
}

global $users, $calendars, $events, $dbconn;
include "conn.php";

$query = <<<sql
SELECT * FROM $calendars[table] WHERE $calendars[owner]='$_SESSION[username]';
sql;

$result = $dbconn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<div class='calendar-select' id='$row[$calendars][id]'><span>$row[$calendars][title]</span></div>";
}