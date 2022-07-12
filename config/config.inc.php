<?php

$dsn = 'mysql:dbname=bpysrv96cdlp2ozwfod7;host=bpysrv96cdlp2ozwfod7-mysql.services.clever-cloud.com';
$user = 'uuf8vrqkntu9usfc';
$password = 'DxAmSQUxTBBNyKBSHuMN';


try {
    $bdd = new PDO($dsn, $user, $password);
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}