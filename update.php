<?php
global $dbconn, $id;
include "conn.php";

echo "<link rel='stylesheet' href='style.css'>";

if (isset($_POST["submit"])) {
    if ($dbconn->query("UPDATE calendar SET $title = '$_POST[title]', $date = '$_POST[date]' WHERE $id = $_GET[item]")) {
        header("Location: index.php");
    }
}

$result = $dbconn->query("select * from calendar where $id='$_GET[item]'");

$row = $result->fetch_assoc();
$gtitle = $row[$title];
$gdate = $row[$date];

echo "
<form class='container' method='post'>
    <input type='text' name='title' value='$gtitle' required>
    <input type='date' name='date' value='$gdate' required>
    <input type='submit' name='submit' value='submit'>
</form>
";
