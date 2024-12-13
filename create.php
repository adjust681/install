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
        <h1>Database '<?= Config::MYSQL_DB_NAME; ?>' is not created!</h1>
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
            </div>
        </form>
    </div>
    <div id="print">
        <div>
            <ul id="ul"></ul>
        </div>
    </div>
    <script>
        let _ul = document.getElementById('ul');
        let _li, _p, _b;
    </script><?php
    $res_db = $inst->create_db();
    $res_tb = $inst->create_table();
    if ($res_db == 0) {
        ?>
        <script>
            _li = document.createElement('li');
            _li.classList.add('e-success');
            _li.innerHTML = '<h4>Create database \'<?=Config::MYSQL_DB_NAME;?>\':&nbsp;<i>successfully!</i></h4>';
            _ul.appendChild(_li);
            document.querySelector('#main h1').innerHTML = 'Database \'<?= Config::MYSQL_DB_NAME; ?>\' is created!';
        </script><?php
    } else {
    ?>
        <script>
            _li = document.createElement('li');
            _li.classList.add('e-err');
            _li.innerHTML = "<h4>Create database '<?=Config::MYSQL_DB_NAME;?>':&nbsp;<i><?=$res_db;?></i></h4>";
            _ul.appendChild(_li);
        </script><?php
    }
    if ($res_tb == 0) {
        ?>
        <script>
            _li = document.createElement('li');
            _li.classList.add('e-success');
            _li.innerHTML = '<h4>Create table \'<?=Config::MYSQL_TABLE_NAME;?>\':&nbsp;<i>successfully!</i></h4>';

            _p = document.createElement('p');
            _p.classList.add('e-refrash');
            _p.innerHTML = '<a href="index.php">home</a>';

            _ul.appendChild(_li);
            _ul.appendChild(_p);
        </script><?php
    } else {
    ?>
        <script>
            _li = document.createElement('li');
            _li.classList.add('e-err');
            _li.innerHTML = "<h4>Create table '<?=Config::MYSQL_TABLE_NAME;?>':&nbsp;<i><?=$res_tb;?></i></h4>";
            _ul.appendChild(_li);

            _b = document.createElement('p');
            _b.classList.add('e-refrash');
            _b.innerHTML = '<a href="index.php">back</a>';

            _ul.appendChild(_li);
            _ul.appendChild(_b);
        </script><?php
    } ?>
    <script>
        document.getElementById('login').value = '<?=Config::MYSQL_USER;?>';
        document.getElementById('password').value = '<?=Config::MYSQL_PASSWORD;?>';
        document.getElementById('dbname').value = '<?=Config::MYSQL_DB_NAME;?>';
    </script>
</content>
</body>
</html>
