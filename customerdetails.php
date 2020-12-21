<?php
    $customer_name = $mobile_number = $email = $password ="";
    $received = NULL;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_name = clean_input($_POST["customer_name"]);
        $mobile_number = clean_input($_POST["mobile_number"]);
        $email = clean_input($_POST["email"]);
        $pwd = clean_input($_POST["pwd"]);
              
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $stmt = $conn->prepare("INSERT INTO customer_details(customer_name, mobile_number, email, pwd) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdss", $customer_name, $mobile_number, $email, $pwd);    
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "<script type='text/javascript'> window.alert('Record Inserted Successfully') </script>";
        header("location: customer.html");
    }

    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

