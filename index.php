<?php
include_once __DIR__ . '/sql/CreateDB.php';
use install\sql\CreateDB;
$inst = new CreateDB();

if ($inst->does_db_exist() == 0) {
    header("location: install.php");
}?>
<!DOCTYPE HTML>
<html lang='ru'>
<head>
    <title>install</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='resources/css/db.min.css'/>
</head>
<body>
<h2>Installation: success</h2>
</body>
</html>
