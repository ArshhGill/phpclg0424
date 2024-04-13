<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpclg0424";
$dbconn = new mysqli($servername, $username, $password, $dbname);

$calendars = array("table" => "calendars", "id" => "cid", "title" => "cname", "owner" => "uname");
$events = array("table" => "events", "id" => "eid", "title" => "etitle", "date" => "edate", "calendar" => "cid");
$users = array("table" => "users", "id" => "uname", "password" => "upass", "type" => "utype");

if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
}
