<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
$location = echo $_SESSION["id"];
$target_path = "uploads/{$location}/" . $_FILES['file']['name'];
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
{
echo($_POST['index']); // to validate 
}
exit;
}

?>
