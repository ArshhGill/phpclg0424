<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpclg0424";
$dbconn = new mysqli($servername, $username, $password, $dbname);
$id = 'eid';
$title = 'etitle';
$date = 'edate';

if ($dbconn->connect_error) {
die("Connection failed: " . $dbconn->connect_error);
}
