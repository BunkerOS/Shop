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
        echo '<div class="container">';
        foreach (getapp(false) as $item){
           echo "Nom de l'application: ". $item['app'];
           echo '<br>';
           echo "Auteur: ". $item['auteur'];
           echo '<br>';
           echo "Description de l'application: ". $item['description'];
           echo '<br>';
           echo "<hr><br>";
        }
        echo'</div>';
        include('footer.php');
    }
}else{
    header('Location: shop.php?api=false');
}


?>
