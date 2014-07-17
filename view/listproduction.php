<?php 
require '../controller/ShopController.php';
$shop = new ShopController();
$data = $shop->listProduct();
//session_start();


?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <h3><a href="add.php">  Add new production</a></h3>
         <h3><a href="../controller/ShopController.php?logout">Logout</a></h3>
        <table>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Make in</td>
                <td>Price</td>
              </tr>
        <?php
        if($data !== null){
     while ($row = mysqli_fetch_array($data)) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</dt>';
            echo '<td>'.$row['pro_name'].'</dt>';
            echo '<td>'.$row['make_in'].'</dt>';
            echo '<td>'.$row['price'].'</dt>';
            echo '<td>'; ?>
                <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
            <?php 
            echo  '</td>';
            echo '<td>'; ?>
                <a href="../controller/ShopController.php?delete=<?php echo $row['id']; ?>">delete</a>
            <?php 
            echo  '</td>';
            echo '</tr>';
        }
        }
?>
              </table>
    </body>
</html>