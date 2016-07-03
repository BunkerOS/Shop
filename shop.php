<?php
include("config.php");
function getapp($json=false){
    global $bdd;
    $select = $bdd->query("SELECT * FROM  `app` LIMIT 0 , 30")->fetchAll();
    if(!$json == false){
        $select = json_encode($select);
    }
    return $select ;
}

function new_app( $app, $auteur, $description ,$path){
    global $bdd;
    $bdd->query("INSERT INTO `app` (`id`, `app`, `auteur`, `description`, `path`) VALUES (NULL, ".$app.", '".$auteur."', '".$description."','".$path."');");
}

if (isset($_GET['api'])){
    if($_GET['api'] == 'true') {
        //Mode API
        echo getapp(true);
    }else{
        //Mode Client Web
        //echo getapp();
        include('header.php');
        foreach (getapp(false) as $item){
           echo $item['app'];
           echo $item['app'];
           echo $item['app'];
           echo "<hr><br>";
        }
        include('footer.php');
    }
}else{
    header('Location: shop.php?api=false');
}


?>
