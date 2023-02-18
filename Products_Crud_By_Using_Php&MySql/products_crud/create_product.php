<?php include("layout/header.php" ) ;
include("database/database.php");

if(isset($_SESSION['user_id'])){ 
    $user_id = $_SESSION['user_id'];
$sql="SELECT * FROM `category` WHERE `user_id`='$user_id'";
$result=mysqli_query($connect ,$sql);
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `product` WHERE `user_id`='$user_id'";
    $result1 = mysqli_query($connect, $sql);
    $row = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    // print_r($row);
}
// echo("<pre>");
$product_id = "";
print_r($_SESSION['product_name']);
foreach($row as $key => $product){
    if ($product['user_id'] == $_SESSION['user_id']&& $product['name'] == $_SESSION['product_name']&& $product['price'] == $_SESSION['product_price']&& $product['category_id'] == $_SESSION['product_category_id']) {
       $product_id = $product['id'];
        echo ("true");
    }else{
        // echo ("false");
        // echo ("<pre>");
        print_r($product);
    }
    // print_r($product);
}
?>

<div class="container pt-5">
    <div class="row">
        <div class="cal_8 mx-auto">
            <a href="<?php echo url; ?>edit_product.php?id=<?php echo ($product_id); ?>" class="btn btn-primary mb-2"> view product</a>


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


            <form action="handler/products/create_product.php" method="POST" class="border p-4" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Product_name</label>
                    <input type="text" name="name"  class="form-control"
                        id="exampleInputName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> price</label>
                    <input type="text" name="price"  class="form-control"
                        id="exampleInputText">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> image</label>
                    <input type="file" name="image"  class="form-control"
                        id="exampleInputText">
                </div>
              
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">category_id</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <?php if(isset($_SESSION['user_id'])) : foreach ($result as $value) :?>
                        <option value = " <?php echo $value['id'] ;?>">
                        <?php echo $value['name'] ;?>
                        </option>
                        <?php endforeach; endif;?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>


        </div>

    </div>
</div>

<?php include("layout/footer.php" ) ;?>