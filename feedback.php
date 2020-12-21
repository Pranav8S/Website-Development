<?php
    $name = $email = $mobile_number = $fb = "";
    $received = NULL;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_input($_POST["name"]);
        $email = clean_input($_POST["email"]);
        $mobile_number = clean_input($_POST["mobile_number"]);
        $fb = clean_input($_POST["fb"]);
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, mobile_number, fb) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $mobile_number, $fb);    
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "<script type='text/javascript'> window.alert('Record Inserted Successfully') </script>";
        header("location: form2.html"); 
    }

    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>