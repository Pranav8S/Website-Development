<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_id = clean_input($_POST["customer_id"]);
        $customer_name = clean_input($_POST["customer_name"]);
        $mobile_number = clean_input($_POST["mobile_number"]);
        $email = clean_input($_POST["email"]);
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        
        if(isset($_POST['Update'])) {
            $stmt = $conn->prepare("UPDATE customer_details set customer_name= ?, mobile_number= ?, email=? where customer_id= ?");
            $stmt->bind_param("sdsd", $customer_name, $mobile_number, $email, $customer_id);     
            $stmt->execute();
        } 
 
        else{
            echo 'Something went wrong';
        }
        $conn->close();        
        header("location: cdetails.php"); 
    }
    
    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>