<?php
global $dbconn, $title, $date;
include "conn.php";

if (isset($_POST["submit"])) {
    if ($dbconn->query("INSERT into calendar ($title, $date) VALUES ('$_POST[title]', '$_POST[date]')")) {
        header("Location: index.php");
    }
}


echo "
<form method='post'>
    <input type='text' name='title' required>
    <input type='date' name='date' value='today' required>
    <input type='submit' name='submit' value='submit'>
</form>
";