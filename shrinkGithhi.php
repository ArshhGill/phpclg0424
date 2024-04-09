<?php
global $dbconn, $id;
include "conn.php";

$dbconn->query("delete from calendar where $id = '$_GET[item]'");
header("Location: index.php");