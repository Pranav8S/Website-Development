<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        
        
        if(isset($_POST['Reset'])) {
            $stmt = $conn->prepare("UPDATE customer_details set pwd= ? where email= ?");
            $stmt->bind_param("ss", $pwd, $email);     
            $stmt->execute();
        } 
        
        else{
            echo 'Something went wrong';
        }
        $conn->close();        
        header("location: form1.html"); 
    }
    
    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>