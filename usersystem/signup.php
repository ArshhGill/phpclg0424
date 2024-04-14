<?php
include "../conn.php";

global $users, $calendars, $events, $dbconn;

session_start();

if (isset($_SESSION['username'])) {
    header('Location: ../');
    die();
}


if (isset($_POST['submit'])) {
    $str = "SELECT * FROM $users[table] where $users[id]='$_POST[username]'";
    $result = $dbconn->query($str);
    if ($row = $result->fetch_assoc()) {
        echo "user already exists.";
    } else {
        $query = <<<sql
INSERT INTO $users[table] ($users[id], $users[password]) VALUES ('$_POST[username]', '$_POST[password]');
sql;
        $dbconn->query($query);
        header("location: ./login.php");
        die();
    }
}


echo "
<form method='post' action='signup.php'>
<input type='text' name='username' placeholder='Username'>
<input type='password' name='password' placeholder='Password'>
<input type='submit' name='submit' value='Signup'>
</form>
<br>
<a href='login.php'>Login</a>
";
