<?php
include "../conn.php";

global $users, $calendars, $events, $dbconn;

session_start();

if (isset($_SESSION['username'])) {
    header('Location: ../');
    die();
}


if (isset($_POST['submit'])) {
    $str = "SELECT * FROM $users[table] where $users[id]='$_POST[username]' and $users[password]='$_POST[password]'";
    $result = $dbconn->query($str);
    if ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row[$users["id"]];
        header('Location: ../index.php');
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
<br>
<a href='signup.php'>Signup</a>
";