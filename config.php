<?php

$config['bdd']['servername'] = "mysql.hostinger.fr";
$config['bdd']['username'] = "u923455845_bun";
$config['bdd']['password'] = "bunkeros";
$config['bdd']['database'] = "u923455845_bun";
// Create connection


$mypdo = 'mysql:host='.$config['bdd']['servername'].';dbname='.$config['bdd']['database'];
$bdd = new PDO( $mypdo , $config['bdd']['username'], $config['bdd']['password']);
 

function getapp($json=false){
    global $config ;
    global $bdd ;
    $select = $bdd->query("SELECT * FROM  `app` LIMIT 0 , 30")->fetchAll();
    if(!$json == false){
        $select = json_encode($select);
    } return $select ;
}

function new_app( $app, $auteur, $description ,$path){
    global $bdd;
    $bdd->query("INSERT INTO `app` (`id`, `app`, `auteur`, `description`, `path`) VALUES (NULL, '$app' , '$auteur', '$description','$path');");
}


?>