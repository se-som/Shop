<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
<a href="index.php">go to list Log in</a>
        <form method="POST" action="../controller/ShopController.php">
            <input type="hidden" name="submit" value="login">
            User name: <input type="text" name="Name"><br>
            Password: <input type="password" name="Password">
           <input type="submit" value="Log in" />
        </form>
    </body>
</html>