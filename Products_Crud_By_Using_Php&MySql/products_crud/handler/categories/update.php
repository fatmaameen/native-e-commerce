<?php
   include("../../database/database.php");
   include "../../validation/validation.php";
session_start();
$errors=[];
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] =='POST'){
$name =trim(htmlentities(htmlspecialchars($_POST['name'])));

if(!requiredInput($name)){
    $errors[]= "name required" ;
}elseif( !minLength($name ,2) ){
    $errors[]="name length must be greater than 2 char" ;
}elseif(!maxLength($name ,20)){
    $errors[]="name length must be smaller than 10 char";
}
//......................

    if(isset($_SESSION['user_id']) && isset($_GET['id'])){
        $user_id=$_SESSION['user_id'];
        $id=$_GET['id'];
    }
$sql1="SELECT `name` ,`user_id` FROM `category`  WHERE (`name`='$name' AND `user_id`='$user_id' )";
     $result=mysqli_query($connect ,$sql1);
    $row= mysqli_fetch_assoc($result);
     if($row['name'] != null){
        $errors[]="name is exist";
     }
    //.................
    if(empty($errors)){
if(isset($_SESSION['user_id'])) {
    $user_id=$_SESSION['user_id'];
    $sql="UPDATE `category` SET`name`='$name' where `id`='$id' ";
    if(mysqli_query($connect,$sql)){
       $_SESSION['success']=['updated'];
     
   }else{
      $_SESSION['errors']=['not updated'];
    
}

    
    }
    header("Location: ../../index_category.php")  ;




    }else{
      $_SESSION['errors'] =$errors;
    
      header("Location: ../../index_category.php")  ;
    }
}

?>