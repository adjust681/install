<?php
include_once __DIR__ . '/config/Config.php';
include_once __DIR__ . '/sql/CreateDB.php';
use install\config\Config;
use install\sql\CreateDB;
$inst = new CreateDB();
?>
<!DOCTYPE HTML>
<html lang='ru'>
<head>
    <title>install</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='resources/css/db.min.css'/>
</head>
<body>
<content>
    <div id="main">
        <h1>Database '<?= Config::MYSQL_DB_NAME; ?>' not exist!</h1>
        <form method="post">
            <div id="form">
                <div id="login-x">
                    <label for="login">db login</label>
                    <input type="text" id="login" name="login" value="<?= Config::MYSQL_USER; ?>"/>
                </div>
                <div id="pass-x">
                    <label for="password">db password</label>
                    <input type="text" id="password" name="password" value="<?= Config::MYSQL_PASSWORD; ?>"/>
                </div>
                <div id="dbname-x">
                    <label for="dbname">db name</label>
                    <input type="text" id="dbname" name="dbname" value="<?= Config::MYSQL_DB_NAME; ?>"/>
                </div>
                <input type="submit" id="btn-install" name="btn-install" value="Install"/>
            </div>
        </form>
    </div><?php
    if (isset($_POST['btn-install'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $dbname = $_POST['dbname'];
        if($login != '' && $password != '' && $dbname != '') {
            $data = file_get_contents(__DIR__ . '/resources/config.txt');
            $data = str_replace("{USER}", "'" . $login . "'", $data);
            $data = str_replace("{PASSWORD}", "'" . $password . "'", $data);
            $data = str_replace("{DBNAME}", "'" . $dbname . "'", $data);
            $f = fopen(__DIR__ . '/config/Config.php', 'w');
            fwrite($f, $data);
            fclose($f);
            header("location: create.php");
        }
    } ?>
</content>
</body>
</html><?php