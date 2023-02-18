
<?php include("layout/header.php" ) ;
?>

<?php ?>
<div class="container pt-5">
    <div class="row">
        <div class="cal_8 mx-auto">
<a href="<?php echo url;?>index_category.php" class="btn btn-primary mb-2" > veiw category</a>


        <?php  if(isset($_SESSION['errors'])): foreach($_SESSION['errors'] as $error) :?>

<div class="alert alert-danger" role="alert">
    <?php  echo $error;?>
</div>
<?php endforeach; unset($_SESSION['errors']);endif;?>

<?php  if(isset($_SESSION['success'])):foreach($_SESSION['success'] as $succes) :?>
<div class="alert alert-success" role="alert">
    <?php  echo $succes;?>
</div>
<?php endforeach; unset($_SESSION['success']);endif;?>

  
            <form action="handler/categories/create_category.php" method="POST" class="border p-4">
               
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> nameOfCategory</label>
                        <input type="text" name="name" placeholder="inter the name of category" class="form-control"
                            id="exampleInputName">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>


        </div>

    </div>
</div>

<?php include("layout/footer.php" ) ;?>