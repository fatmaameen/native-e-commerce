<?php
   include("../../database/database.php");
   include "../../validation/validation.php";
session_start();
$errors=[];
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] =='POST'){
$email =trim(htmlentities(htmlspecialchars($_POST['email'])));
$password=trim(htmlentities(htmlspecialchars($_POST['password'] )));


if(!requiredInput($email)){
    $errors[]= "email required" ;
}elseif(checkEmail($email)){
    $errors[]="please inter correct email" ;
    }
     
    if(!requiredInput($password)){
        $errors[]= "password required" ;
    }elseif( !minLength($password ,2) ){
        $errors[]="password length must be greater than 2 char" ;
    }elseif(!maxLength($password ,20)){
        $errors[]="password length must be smaller than 10 char";
    }

     // code of dont repeate user_email 
     $sql1="SELECT * FROM `users` where `email`='$email' " ;
     $result1=mysqli_query($connect ,$sql1);
      foreach($result1 as $row){
        if($row['email'] != null){
         $errors[]="sorry ,email is exist ";
         break;
        }}
     header("Location: ../../regester.php")  ;

     
    if(empty($errors)){
     
    $new_password=password_hash($password ,PASSWORD_DEFAULT);
    $sql=" INSERT INTO `users` (`email` ,`password`) VALUES ('$email' ,'$new_password')";
   
     if(mysqli_query($connect,$sql)){
         $_SESSION['success']=['added'];
        $_SESSION['login'] =true;
     }else{
        $_SESSION['errors']=['not added'];
      
     }
     header("Location: ../../regester.php")  ;


    }else{
      $_SESSION['errors'] =$errors;
    
      header("Location: ../../regester.php")  ;
    }
}

?>