<?php include("layout/header.php" ) ;?>
<?php include("database/database.php" ) ;?>
<?php 
if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
$sql ="SELECT * FROM `category`  WHERE (`user_id`='$user_id')";
$result=mysqli_query($connect ,$sql);

}

?>
<div class="container pt-5">
    <div class="row">
<div class="cal-8 mx auto">
<table class="table">
<thead>

<th scope="col">#</th>
<th scope="col">name</th>
<th scope="col">action</th>
</thead>
<tbody>

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



<?php $i=1; if(isset($result)): foreach ($result as  $value) : ?>
    <tr>
          <th scope="row"> <?php echo $i++ ;?></th>
        <td> <?php echo $value['name'];?></td>
        <td>
  <div class="d-flex">
  <a href="<?php echo url; ?>edit_category.php?id=<?php echo $value['id'] ;?>" class="btn btn-primary ms-2">edit</a>
  <a href="<?php echo url ;?>handler/categories/delete.php?id=<?php echo $value['id'];?> "  class="btn btn-danger ms-2">delete</a>
</td>
</tr>
<?php endforeach; endif;?>
</div>





</tbody>
</table>

</div>


    </div>
</div>
<?php include("layout/footer.php" ) ;?>