<?php
global $dbconn, $id;
include "conn.php";

if (isset($_POST["submit"])) {
    
    echo $dbconn->query("INSERT into calendar ($title, $date) VALUES ('$_POST[title]', '$_POST[date]')");
}


echo $_GET["item"];
$result = $dbconn->query("select * from calendar where $id='$_GET[item]'");

$row = $result->fetch_assoc();
$gtitle = $row[$title];
$gdate = $row[$date];



echo "
<form method='post'>
    <input type='text' name='title' value='$gtitle' required>
    <input type='date' name='date' value='$gdate' required>
    <input type='submit' name='submit' value='submit'>
</form>
";
