<?php
include("config.php");
function getapp($json=false){
    $select = $bdd->query("SELECT * FROM  `app` LIMIT 0 , 30")->fetchAll();
    if(!$json == false){
        $select = json_encode($select);
    }
    return $select ;
}

function new_app( $app, $auteur, $description){
    $bdd->query("INSERT INTO `app` (`id`, `app`, `auteur`, `description`) VALUES (NULL, ".$app.", '".$auteur."', '".$description."');");
}

if (isset($_GET['api'])){
    if($_GET['api'] == 'true') {
        //Mode API
        echo getapp(true);
    }else{
        //Mode Client Web
        //echo getapp();
        include('header.php');
        ?>
        
        <?php
        include('footer.php');
    }
}else{
    header('Location: /?api=false');
}


?>
