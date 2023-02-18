<?php 
session_start();
include("../../database/database.php");

if(isset($_GET['id'])){
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];
 $sql="DELETE FROM `category` WHERE `user_id` ='$user_id' AND `id` ='$id'";

      if(mysqli_query( $connect,$sql)){
       $_SESSION['success']=['deleted'];

}else{
    $_SESSION['errors']=[' not deleted'];
}
header("Location: ../../index_category.php");

}





?>