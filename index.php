<?php

echo "<link rel='stylesheet' href='style.css'>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpclg0424";
$dbconn = new mysqli($servername, $username, $password, $dbname);
$id = 'eid';
$title = 'etitle';
$date = 'edatetime';

if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}

$result = $dbconn->query("select * from calendar ORDER BY $date ASC");
echo "<div class='main-container'><span class='heading'>Events</span>";
while ($row = $result->fetch_assoc()) {
    echo eventDiv($row[$id], $row[$title], explode(" ", $row[$date])[0]);
}
echo "</div>";

function eventDiv($id, $title, $date): string
{
    return "<div class='eventDiv' id='$id'><div class='topDiv'>
    <span>$title</span>
    </span>$date</span></div>
    </div>";
}
