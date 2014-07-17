<?php 
session_start();
if(empty($_SESSION['name'])){
   header("Location:http://localhost/shop/view/login.php");
   exit();
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
            <input type="hidden" name="submit" value="add">
            Product name: <input type="text" name="pro_name"><br>
            Make in: <input type="text" name="make_in"><br>
            Price: <input type="text" name="price">
           <input type="submit" value="add" />
        </form>
    </body>
</html>