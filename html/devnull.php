<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{

 $info = pathinfo($_FILES['file']['name']);
 $ext = $info['extension']; // get the extension of the file
 $newname = "{$_SESSION["id"]}.".$ext; 

 $target = 'uploads/'.$newname;
 
if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
{
echo($_POST['index']); // to validate 
}
exit;
}

?>
