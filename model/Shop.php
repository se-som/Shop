<?php
require '../config/config.php';

Class Shop {
    protected $config;
    function __construct() {
        $this->config = new Config();   
    }
    function select ($table){
        $con = $this->config->connect();
        $result = mysqli_query($con, "SELECT * FROM $table");
        return $result;
        
    }
     function insert($table, $data){
         $name=$data["pro_name"];
         $make_in=$data["make_in"];
         $price=$data["price"];
        $con = $this->config->connect();
        mysqli_query($con, "INSERT INTO $table (pro_name ,make_in,price)
                values ('$name', '$make_in', $price)");
        return true;
         
    }
    function insertWhere($table, $id){
        $con = $this->config->connect();
        $result = mysqli_query($con, "SELECT * FROM $table where id=$id");
        return $result;
        
    }
     function edit($table, $data){
         $id=$data['id'];
         $name=$data['pro_name'];
         $makeIn=$data['make_in'];
         $price=$data['price'];
        
        $con = $this->config->connect();
       $result = mysqli_query($con, "UPDATE $table SET pro_name='$name', make_in='$makeIn', price=$price where id=$id");
       return $result;
        
    }
      function delete($table, $id){
      
        
        $con = $this->config->connect();
       $result = mysqli_query($con, "DELETE from $table where id=$id");
       return $result;
        
    }
    
}
?>