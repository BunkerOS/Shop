<?php

$config['bdd']['servername'] = "mysql.hostinger.fr";
$config['bdd']['username'] = "u923455845_bun";
$config['bdd']['password'] = "bunkeros";
$config['bdd']['database'] = "u923455845_bun";

// Create connection
$pdo = 'mysql:host='.$config['bdd']['servername'].';dbname='.$config['bdd']['database'] ;
$bdd = new PDO($pdo, $config['bdd']['username'], $config['bdd']['password']);

?>