<?php
include "../conn.php";

global $users, $calendars, $events, $dbconn;

if (isset($_POST['submit'])) {
    $str = "SELECT * FROM $users[table] where $users[id]='$_POST[username]' and $users[password]='$_POST[password]'";
    $result = $dbconn->query($str);
    if ($row = $result->fetch_assoc()) {
        echo "UWUWUWUWUWU";
        echo $row[$users["id"]];
        die();
    } else {
        echo "user not found uwu";
    }

}


echo "
<form method='post' action='login.php'>
<input type='text' name='username' placeholder='Username'>
<input type='password' name='password' placeholder='Password'>
<input type='submit' name='submit' value='Login'>
</form>
";