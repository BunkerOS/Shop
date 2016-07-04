<?php
/* Simple script to upload a zip file to the webserver and have it unzipped
   Saves tons of time, think only of uploading Wordpress to the server
   Thanks to c.bavota (www.bavotasan.com)
   I have modified the script a little to make it more convenient
   Modified by: Johan van de Merwe (12.02.2013)
*/   

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }
   
   rmdir($dir);
}

if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			$continue = strtolower($name[1]) == 'zip' ? true : false;
        	echo $continue ;
        	if(!$continue) {
        		$message = "Votre fichier n'est pas un fichier .zip !";
        	}
        
          /* PHP current path */
          $path = dirname(__FILE__).'/apps/app_';  // absolute path to the directory where zipper.php is in
          $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
          $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)
            
          $targetdir = $path . $filenoext; // target directory
          $targetzip = $path . $filename; // target zip file
        
        	if(move_uploaded_file($source, $targetzip)) {
        		$message = "Votre fichier a bien été upload";
        		
        	} else {	
        		$message = "Il y a eu un probleme avec votre upload réessayer";
        	}
			break;
		}
	}
	if (empty($okey)){
	    	$message = "Votre fichier n'est pas un fichier .zip !";
	    	if (isset($targetzip)){
	    	    unlink ($targetzip);
	    	}
	}
	
	
}


?>
<?php include('header.php'); ?>
<div class="container">
<?php if($message) echo "<p>$message</p>"; ?>
<form enctype="multipart/form-data" method="post" action="">
<label>Choisissez l'application a upload: <input type="file" name="zip_file" /></label>
<br />
<input type="submit" name="submit" value="Envoyer" />
</div>
<?php include('footer.php'); ?>