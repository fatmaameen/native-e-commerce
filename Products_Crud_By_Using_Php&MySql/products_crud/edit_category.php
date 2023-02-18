<?php include("database/database.php" ) ;?>
<?php include("layout/header.php" ) ;?>
<?php 
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $user_id =$_SESSION['user_id'];
    $sql="SELECT `name` FROM `category`  WHERE `user_id`='$user_id ' AND `id`='$id'";
    $result=mysqli_query($connect ,$sql);
    $row=mysqli_fetch_assoc($result);
    }


?>
<div class="container pt-5">
    <div class="row">
        <div class="cal_8 mx-auto">
<a href="<?php echo $url; ?> index_category.php" class="btn btn-primary mb-2" > veiw category</a>


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

  
            <form action="handler/categories/update.php?id=<?php echo $id; ?>" method="POST" class="border p-4">
               
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> nameOfCategory</label>
                        <input type="text" name="name" value="<?php if(isset($row['name'])) : echo $row['name'] ;endif; ?>"  class="form-control"
                            id="exampleInputName">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">update category</button>
            </form>


        </div>

    </div>
</div>

<?php include("layout/footer.php" ) ;?>