<?php

include('header.php'); 

function return_message($message){
        $message=urlencode($message);
      header("Location: new_app.php?message=$message");
}

?>
<div class="container">
<?php
if (isset($_POST['auteur']) and isset($_POST['description'])){
$dossier = 'apps/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.zip');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//DÃ©but des vÃ©rifications de sÃ©curitÃ©...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type zip ...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'Ã€ÃÃ‚ÃƒÃ„Ã…Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃÃŽÃÃ’Ã“Ã”Ã•Ã–Ã™ÃšÃ›ÃœÃÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã²Ã³Ã´ÃµÃ¶Ã¹ÃºÃ»Ã¼Ã½Ã¿', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que Ã§a a fonctionnÃ©...
     {

          new_app( $fichier, $_POST['auteur'] , $_POST['description'] ,'http://bunkeros.esy.es/'.$dossier.'/'.$fichier);
          return_message('Upload effectuÃ© avec succÃ¨s !');
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          return_message('Echec de l\'upload !');
     }
}
else
{
     return_message($erreur);
}
}
?>
</div>
<?php include('footer.php'); ?>