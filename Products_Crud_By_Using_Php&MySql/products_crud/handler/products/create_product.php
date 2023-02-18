<?php
   include("../../database/database.php");
   include "../../validation/validation.php";
   include( "../../uploadfile/uploadfile.php");
session_start();
$errors=[];
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] =='POST'){
$name =trim(htmlentities(htmlspecialchars($_POST['name'])));
$price =trim(htmlentities(htmlspecialchars($_POST['price'])));
$category_id =trim(htmlentities(htmlspecialchars($_POST['category_id'])));
$_SESSION['product_name'] =$name;
$_SESSION['product_price'] =$price;
$_SESSION['product_category_id'] =$category_id;

$image =$_FILES['image'];
//.......................

//name
if(!requiredInput($name)){
    $errors[]= "name required" ;
}elseif( !minLength($name ,2) ){
    $errors[]="name length must be greater than 2 char" ;
}elseif(!maxLength($name ,20)){
    $errors[]="name length must be smaller than 20 char";
}



//price

if(!requiredInput($price)){
    $errors[]= "price required" ;
}elseif( !minLength($price ,1) ){
    $errors[]="price length must be greater than 1 char" ;
}elseif(!maxLength($price ,33330000)){
    $errors[]="price length must be smaller than 33330000 char";
}
// image
if(!requiredInput($image)){
    $errors[]= "image required" ;
}
//category
if(!requiredInput($category_id)){
    $errors[]= "category_id required" ;
}

 if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
 }
$sql1="SELECT `name` FROM `product` WHERE (`name`='$name' AND `user_id`='$user_id')";
     $result=mysqli_query($connect ,$sql1);
    $row= mysqli_fetch_assoc($result);
     if($row != null){
        $errors[]="name is exist";
     }
     header("Location: ../../create_product.php");

    if(empty($errors)){
// upload to image
uploadfile("../../upload/" ,$image ,$errors);
if(isset($_SESSION['image_name'])){
    $image_name =$_SESSION['image_name'];
    $sql="INSERT INTO `product` (`name`,`price` ,`image`,`user_id` ,`category_id`)  VALUE ('$name' ,'$price' ,'$image_name','$user_id','$category_id')";
    if(mysqli_query($connect,$sql)){
       $_SESSION['success']=['pruduct added'];
     
}else{
    $_SESSION['errors']=['pruduct not added'];
}
}
header("Location: ../../create_product.php");
    
   }else{
      $_SESSION['errors']=$errors;
    
}
header("Location: ../../create_product.php");
   

    }


?>