<?php 
    require '../controller/ShopController.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
         <h3><a href="login.php">Login</a></h3>
<?php 
    $shop = new ShopController();
    $data = $shop->index();
    ?>
        <table>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Make in</td>
                <td>Price</td>
              </tr>
        <?php
     while ($row = mysqli_fetch_array($data)) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</dt>';
            echo '<td>'.$row['pro_name'].'</dt>';
            echo '<td>'.$row['make_in'].'</dt>';
            echo '<td>'.$row['price'].'</dt>';
            echo '</tr>';
        }
?>
              </table>
    </body>
</html>