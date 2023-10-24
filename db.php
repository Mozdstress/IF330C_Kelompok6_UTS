<?php
define('DSN', 'mysql:host=localhost;dbname=utsweb_lec');
define('DBUSER', 'root');
define('DBPASS', 'd@rkmozd04');

$db = new PDO(DSN, DBUSER, DBPASS);
