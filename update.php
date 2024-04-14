<?php
global $dbconn, $id;
include "conn.php";
global $users, $calendars, $events, $dbconn;

echo "<link rel='stylesheet' href='style.css'>";

if (isset($_POST["submit"])) {
    if ($dbconn->query("UPDATE $events[table] SET $events[title] = '$_POST[title]', $events[date] = '$_POST[date]' WHERE $events[id] = $_GET[item]")) {
        header("Location: ./");
    }
}

$result = $dbconn->query("select * from $events[table] where $events[id]='$_GET[item]'");

$row = $result->fetch_assoc();
$gtitle = $row['etitle'];
$gdate = $row['edate'];

echo "
<form class='container' method='post'>
    <input type='text' name='title' value='$gtitle' required>
    <input type='date' name='date' value='$gdate' required>
    <input type='submit' name='submit' value='submit'>
</form>
";
