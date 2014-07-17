

<?php

require_once '../model/Shop.php';

class ShopController {

    protected $shop;

    function __construct() {
        $this->shop = new Shop();
    }

    function index() {
        $result = $this->shop->select('production');
        return $result;
    }

    function login($data) {
        $result = $this->shop->select('user');
        while ($row = mysqli_fetch_array($result)) {
            if ($data['Name'] === $row['name'] && $data['Password'] === $row['password']) {
                session_start();
                // store session data
                $_SESSION['name'] = true;
                $_SESSION['password'] = true;
                
                  header("Location:http://localhost/shop/view/listproduction.php");
                   exit();   
            }
        }
        header("Location:http://localhost/shop/view/login.php");
        exit();
    }

    function listProduct() {
        $result = null;
        session_start();
        if(empty($_SESSION['name'])){
            header("Location:http://localhost/shop/view/login.php");
            exit();
        }  else {
            $result = $this->shop->select('production');
            return $result;
        }
    }

    function insert($data) {
        $result = $this->shop->insert('production', $data);
        if ($result === true) {
            echo 'add product success';
        }
    }
      function selectWhere($id) {
        $result = $this->shop->insertWhere('production', $id);
        return $result;
    }
       function edit($data) {
        $result = $this->shop->edit('production', $data);
        if($result === true){
            header("Location:http://localhost/shop/view/listproduction.php");
            exit();
        }
        header("Location:http://localhost/shop/view/edit.php?id=".$data['id']);
        exit();
    }
       function  delete($id) {
        $this->shop->delete('production', $id);
        //"../controller/ShopController.php?delete=<?php echo $row['id'];
//                    header("Location:http://localhost/shop/view/listproduction.php?$id=['id']");
        header("Location:http://localhost/shop/view/listproduction.php");
        exit();
    }
   
    function logout() {
        session_start();
        session_destroy();
        header("Location:http://localhost/shop/view/login.php");
        exit();
    }
    

}

$obj = new ShopController();
if ($_POST) {
    if ($_POST['submit'] === 'login') {
        $obj->login($_POST);
    }
    if ($_POST['submit'] === 'add') {
        $obj->insert($_POST);
    }
     if ($_POST['submit'] === 'edit') {
        $obj->edit($_POST);
    }
}
if($_SERVER['QUERY_STRING']==='logout'){
    $obj->logout();
}
$data = explode("=", $_SERVER['QUERY_STRING']);
if($data['0']==='delete'){
    $id = (int)$data['1'];
    $obj = new ShopController();
    $data = $obj->delete($id);
}

?>
