<?php 
session_start();
include("../../database/database.php");

if(isset($_GET['id']) && isset($_GET['image_name'])){
$id=$_GET['id'];
$image_name=$_GET['image_name'];
$user_id =$_SESSION['user_id'];

if(file_exists("../../upload/$image_name")){
  $sql="DELETE FROM `product` WHERE `id`='$id' AND `user_id`='$user_id'";
if(mysqli_query($connect ,$sql)){
    unlink("../../upload/$image_name");
    $_SESSION['success']=['deleted'];
}else{
    $_SESSION['errors']=['not deleted'];
}

}else{
    $sql="DELETE FROM `product` WHERE `id`='$id' AND `user_id`='$user_id'";
    if(mysqli_query($connect ,$sql)){
        $_SESSION['success']=['deleted'];
    }else{
        $_SESSION['errors']=['not deleted'];
    }
}
header("Location: ../../index_product.php");

}

?>