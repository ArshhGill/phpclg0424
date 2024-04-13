<?php

session_start();

if (!isset($_SESSION['username'])){
    header("Location: ./usersystem/login.php");
}

global $users, $calendars, $events, $dbconn;
include "conn.php";


echo "<link rel='stylesheet' href='style.css'>";


$query = <<<sql
 SELECT events.eid, events.etitle, events.edate
 FROM events
 INNER JOIN calendars ON calendars.cid=events.cid where calendars.uname='$_SESSION[username]';
sql;

//echo $query;



$result = $dbconn->query($query);
echo "<div class='sides'><div class='head-container'><span class='heading'>Events</span><a href='insert.php' id='btn' class='button'>Add Task</a></div></div>";
echo "<div class='main-container'><div class='tasks'>";

//echo "<div class='head-container'><span class='heading'>Events</span><a href='insert.php' id='btn' class='button'>Add Task</a></div><div class='main-container'>";


while ($row = $result->fetch_assoc()) {
    echo eventdiv($row[$events['id']], $row[$events['title']], $row[$events['date']]);
}
echo "</div></div>";
echo "<div class='sides'></div>";

function eventDiv($cid, $title, $date): string
{
    return "
    <div class='eventDiv' id='$cid'>
    <div class='bottom-div'>
        <span class='date'>$date</span>
        <div>
        <a href='update.php?item=$cid' class='button'>Edit</a>
        <span class='slash'>/</span>
        <a href='delete.php?item=$cid' class='button'>Delete</a>
        </div>
    </div>
            <span>$title</span>
    </div>";
}
