<?php include("layout/header.php" ) ;?>
  
<div class="container pt-5">
    <div class="row">
        <div class="cal_8 mx-auto">

     <?php  if(isset($_SESSION['errors'])):foreach($_SESSION['errors'] as $error) :?>

<div class="alert alert-danger" role="alert">
    <?php  echo $error;?>

</div>
<?php endforeach; unset($_SESSION['errors']);endif;?>

<?php  if(isset($_SESSION['success'])):foreach($_SESSION['success'] as $succes) :?>
<div class="alert alert-success" role="alert">
    <?php  echo $succes;?>
</div>
<?php endforeach; unset($_SESSION['success']);endif;?>


            <form class="border p-5" 
            action="handler/auth/regester.php" method="POST" class="border p-4">
                <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" placeholder="inter your user_email" class="form-control"
           id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Password</label>
             <input type="password" name="password" placeholder="inter your password" class="form-control"
             id="exampleInputPassword1">
          </div>

     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     </form>


        </div>

    </div>
</div>

<?php include("layout/footer.php" ) ;?>