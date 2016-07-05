<?php
include('header.php'); 
?>
<div class='container'>
<?php

if(isset($_GET['message'])){
	echo('<div class="panel panel-default">
  <div class="panel-body">'.$_GET['message'].'</div></div>');
}

?>
<form method="POST" action="upload.php" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Auteur :<input type="text" name="auteur"><br>
     Description :<input type="text" name="description"><br>
     Fichier : <input type="file" name="avatar">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>
</div>
<?php include('footer.php'); ?>