<?php
// check about image.............

function uploadfile( $dirct ,$request ,$errors=[]){
$file = $request;

$file_name=$file['name'];
$file_temp_name=$file['tmp_name'];
$file_error=$file['error'];
$file_size=$file['size'];
$list=['jpg' ,'png' ,'webp' ,'jpeg'];

if(file_exists($dirct)){

    if($file_error==0){

 $file_info =pathinfo($file_name);
 $file_extension=$file_info['extension'];
 if(in_array($file_extension , $list)){
    if($file_size<=400000){

    $new_name = uniqid('' ,true)."." .$file_extension;
    $dest=$dirct .$new_name;
           if(move_uploaded_file($file_temp_name ,$dest)){
            $_SESSION['success'] =['uploaded'];
            $_SESSION['image_name']=$new_name;
           }else{
            $errors[] =['not uploaded'];
           }
    }else{
       $errors[]=['size not allowed'];
    }

 }else{
    $errors[]=['extention not allowed'];
 }    
    }else{
        $errors[]=[' Photo errors'];
    }

}else{
    $errors[]=['not found direct'];
}
//.........................................................
if(empty($errors)){
   
}else{
    $_SESSION['errors'] =$errors;
}
}
?>


