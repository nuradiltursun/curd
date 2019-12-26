<?php 
require('db.php');
$id=$_GET["id"];
if($conn->prepare("DELETE FROM person WHERE id=:id")->execute([':id'=>$id])){
    header("Location: index.php");
}else{
    echo "some error in deleting...";
}

?>