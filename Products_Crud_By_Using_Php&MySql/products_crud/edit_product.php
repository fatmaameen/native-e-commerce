<?php include("layout/header.php" ) ;
include("database/database.php");

// options to (category_id) from  table category
if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
$sql="SELECT * FROM `category`";
$result=mysqli_query($connect ,$sql);
$cat=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // print_r($cat);
}

// put value of product in table to update it
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql1= "SELECT * FROM `product` WHERE `user_id`='$user_id' AND `id`='$id'";
    $result1=mysqli_query($connect ,$sql1);
    $row=mysqli_fetch_assoc($result1);
    // print_r($row);
}



?>

<div class="container pt-5">
    <div class="row">
        <div class="cal_8 mx-auto">

            <a href="<?php echo url; ?>index_product.php" class="btn btn-primary mb-2"> veiw product</a>

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


            <form action="handler/products/update_product.php?id=<?php echo $id;?>" method="POST"
                class="border p-4" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="formlabel"> nameOfproduct</label>
                    <input type="text" name="product_id" value="<?php if(isset($row['id'])) :  echo $row['id'] ;endif; ?>"
                        class="form-control" id="exampleInputName" hidden>
                    <input type="text" name="name" value="<?php if(isset($row['name'])) :  echo $row['name'] ;endif; ?>"
                        class="form-control" id="exampleInputName">
                </div>
                <div class="mb-3">
                    <label class="form-label"> price</label>
                    <input type="text" name="price"
                        value="<?php if(isset($row['price'])) :  echo $row['price'] ;endif; ?>" class="form-control"
                        placeholder="inter price" class="form-control" id="exampleInputText">
                </div>
                <div class="mb-3">
                    <label class="form-label"> image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputText">
                </div>
                <div class="mb-3">
                    <label class="form-label"> type of category</label>
                
                    <?php  ?>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <?php if(isset($_SESSION['user_id'])) : foreach ($cat as $value)  :?>
                        <option value="<?php echo $value['id'];?>"
                            <?php if($value['id'] == $row['category_id']):?>selected<?php endif;?>>
                            <?php echo $value['name'];?></option>
                        <?php endforeach; endif;?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">update Product</button>
            </form>


        </div>

    </div>
</div>

<?php include("layout/footer.php" ) ;?>