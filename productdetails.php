<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = clean_input($_POST["product_id"]);
        $product_name = clean_input($_POST["product_name"]);
        $price = clean_input($_POST["price"]);
        $stock = clean_input($_POST["stock"]);
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if(isset($_POST['Insert'])) {
        $stmt = $conn->prepare("INSERT INTO product_details (pname, pcost, stock) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $product_name, $price, $stock);    
        $stmt->execute();
        }
        
        if(isset($_POST['Update'])) {
            $stmt = $conn->prepare("UPDATE product_details set pname= ?, pcost= ?, stock= ? where product_id= ?");
            $stmt->bind_param("sddd", $product_name, $price, $stock, $product_id);     
            $stmt->execute();
        } 
        else if (isset($_POST['Delete'])) {
            $stmt = $conn->prepare("DELETE from product_details where pname = ?");
            $stmt->bind_param("s", $product_name);    
            $stmt->execute();
        } 
        else{
            echo "Something went wrong";
        }
        $conn->close();        
        header("location: product.php"); 
    }
    
    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>