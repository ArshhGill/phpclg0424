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

echo "<ol>";

while ($row = $result->fetch_assoc()) {
    $calid = $row[$calendars['id']];
    $caltitle = $row[$calendars['title']];
    echo "<li><a class='calendar-select' href='selectCalendarHandle.php?item=$calid'>$caltitle</a></li>";
}
echo "</ol><br><br>";

echo "<a id='btn' class='button' href='newCalendar.php'>Create Calendar</a>";