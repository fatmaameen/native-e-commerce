 <?php
   session_start();
   include("../../database/database.php");
   include "../../validation/validation.php";
  
$errors=[];
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] =='POST'){
$name =trim(htmlentities(htmlspecialchars($_POST['name'])));
$price =trim(htmlentities(htmlspecialchars($_POST['price'])));
$category_id =trim(htmlentities(htmlspecialchars($_POST['category_id'])));
$image=$_FILES['image'];
$product_id =trim(htmlentities(htmlspecialchars($_POST['product_id'])));


/*
echo("<pre>");
     echo ("test");
    print_r($image);*/
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

//category

if(!requiredInput($category_id)){
    $errors[]= "category_id required" ;
}


    if(isset($_SESSION['user_id']) ){
        $user_id=$_SESSION['user_id'];
        
    }
$sql1="SELECT `name` FROM `product` WHERE `name`='$name' AND `user_id`='$user_id'";
     $result=mysqli_query($connect ,$sql1);
     $row=mysqli_fetch_assoc($result);
     if($row != null){
        $errors[]="name is exist";
     }
    //...............................................
    //...............................................
    if(empty($errors)){
        include( "../../uploadfile/uploadfile.php");
    if($image['error']==0){
    $sql_image="SELECT `image` FROM `product`WHERE `user_id`='$user_id' AND `id`='$product_id '";
    $result_image=mysqli_query($connect ,$sql_image);
$row_image=mysqli_fetch_assoc($result_image);
$check_image=$row_image['image'];
  if(isset($check_image) && file_exists("../../upload/$check_image")){
    unlink("../../upload/$check_image" );
  }

    uploadfile("../../upload/",$image ,$errors);
    if(isset($_SESSION['image_name'])){
        $image_name=$_SESSION['image_name'];
        $sql="UPDATE  `product` SET `name`='$name',`price`='$price' ,`image`='$image_name',`user_id`='$user_id' ,`category_id`='$category_id' WHERE `id`='$product_id'";

        if(mysqli_query($connect,$sql)){
           $_SESSION['success']=['updated'];
         
}else{
    $_SESSION['errors']=['not updated'];
}
}

 }else{
 $sql="UPDATE  `product` SET `name`='$name',`price`='$price',`user_id`='$user_id' ,`category_id`='$category_id' WHERE `id`='$product_id'";

 if(mysqli_query($connect,$sql)){
    $_SESSION['success']=['updated'];
  
}else{
$_SESSION['errors']=['not updated'];
}
 }
 header("Location: ../../edit_product.php?id=$product_id");
} else{
      $_SESSION['errors']=$errors;;
    
header("Location: ../../edit_product.php?id=$product_id");
   
}
    }


?>