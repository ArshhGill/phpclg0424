<?php

global $dbconn, $title;
include "conn.php";

echo "<link rel='stylesheet' href='style.css'>";


$result = $dbconn->query("select * from calendar ORDER BY $date ASC");
echo "<div class='main-container'><span class='heading'>Events</span><a href='githhi.php'>Add Task</a>";





while ($row = $result->fetch_assoc()) {
    echo eventdiv($row[$id], $row[$title], $row[$date]);
}
echo "</div>";

function eventDiv($cid, $title, $date): string
{
    return "
    <div class='eventDiv' id='$cid'>
    <div class='bottom-div'>
        <span class='date'>$date</span>
        <div>
        <a href='loveGithhi.php?item=$cid' class='button'>Edit</a>
        <span class='slash'>/</span>
        <a href='shrinkGithhi.php?item=$cid' class='button'>Delete</a>
        </div>
    </div>
            <span>$title</span>
    </div>";
}
