<?php 
require '../controller/ShopController.php';



session_start();
if(empty($_SESSION['name'])){
   header("Location:http://localhost/shop/view/login.php");
   exit();
}
$data = explode("=", $_SERVER['QUERY_STRING']);
if($data['0']==='id'){
    $id = (int)$data['1'];
    $obj = new ShopController();
    $data = $obj->selectWhere($id);
    $row = mysqli_fetch_array($data);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
<a href="index.php">Go to home page</a>
        <form method="POST" action="../controller/ShopController.php">
            <input type="hidden" name="submit" value="edit">
             <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Product name: <input type="text" name="pro_name" value="<?php echo $row['pro_name']; ?>"><br>
            Make in: <input type="text" name="make_in" value="<?php echo $row['make_in']; ?>"><br>
            Price: <input type="text" name="price" value="<?php echo $row['price']; ?>">
           <input type="submit" value="edit" />
        </form>
    </body>
</html>