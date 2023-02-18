<?php
include "../../validation/validation.php";
include("../../database/database.php");
session_start();
$errors=[];
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] =='POST'){
   
$email =trim(htmlentities(htmlspecialchars($_POST['email'])));
$password=trim(htmlentities(htmlspecialchars($_POST['password'] )));

 if(!requiredInput($email)){
       $errors[]= "email required" ;
   }
   elseif(checkEmail($email)){
       $errors[]="please inter correct email" ;
       }
     
       if(!requiredInput($password)){
           $errors[]= "password required" ;
       }elseif(!minLength($password ,2) ){
           $errors[]="password length must be greater than 2 char" ;
       }elseif(!maxLength($password ,20)){
           $errors[]="password length must be smaller than 20 char";
       }

       // code of check email ,password are exist or not say to login my account

    $sql=" SELECT * FROM `users` where `email` ='$email' ";
    $result=mysqli_query($connect ,$sql);
   $row=mysqli_fetch_assoc($result);
    if($row==null) {
        $errors[] ="email is not exist" ;
              
            } if( password_verify($password , PASSWORD_DEFAULT)){
                $errors[]="password is not exist" ;
              
         }
         
              
   if(empty($errors)){
      $_SESSION['success'] =[' login succssfully'];
      $_SESSION['login'] =true;
      $_SESSION['user_id'] = $row['id'];
     
        header("Location: ../../login.php");
       
   }

      else{
        $_SESSION['errors'] =$errors;
    
         header("Location: ../../login.php");
    }
}

?>