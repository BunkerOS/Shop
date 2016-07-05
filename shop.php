<?php

if (isset($_GET['api'])){
    if($_GET['api'] == 'true') {
        //Mode API
        include('config.php');
        echo getapp(true);
    }else{
        //Mode Client Web
        //echo getapp();
        include('header.php');
        echo '<div class="container">';
        echo '<a class="btn btn-default" href="new_app.php" >Ajouter une application</a>';
        foreach (getapp(false) as $item){
           echo "<br>Nom de l'application: ". $item['app'];
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
