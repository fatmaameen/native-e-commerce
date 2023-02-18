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
    $errors[]="name length must be smaller than 20 char";
}
// one user  not add the same category again.........
    
if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    
$sql1="SELECT `name`  FROM `category`  WHERE (`name`='$name' AND `user_id`='$user_id')";
     $result=mysqli_query($connect ,$sql1);
    $row = mysqli_fetch_assoc($result);
     if($row['name'] != null){
        $errors[]="this type of category added before ,please add anather one ";
     }
    }
    header("Location: ../../create_category.php");

  // .......................

     if(empty($errors)){

      if(isset($_SESSION['user_id'])){
    $user_id =$_SESSION['user_id'];
    $sql ="INSERT INTO `category` (`name` ,`user_id`) VALUE ('$name','$user_id' )";
   
    if(mysqli_query($connect,$sql)){
       $_SESSION['success']=['added'];
   }else{
      $_SESSION['errors']=['not added'];
    
}}
    
    header("Location: ../../create_category.php")  ;


      
    }else{
      $_SESSION['errors'] =$errors;
    
      header("Location: ../../create_category.php")  ;
    }

}
?>