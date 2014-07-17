<?php
Class Config {
    function connect() {
        // Create connection
        $con = mysqli_connect("localhost", "root", "", "shop");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $con;
    }
}

?>