<html>
    <head>
        <title>ProductDetails</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <style>
             
        body {
              margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.topnav b {
  float: right;
  display: block;
  color: white;
  text-align: right;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 34px;
}

.topnav b:hover {
  background-color: #ddd;
  color: black;
}
        body{
        background-image: url("img1.jpeg");
        color: white;
        }
      
            
        th, td {
            padding: 15px;
        }

        @media (max-width: 600px) {  
                .col1, .col2 {width:100%;
                    font-size:1.8rem;}
                }
 
        @media screen and (min-width:900px){
                body{
                        font-size:1.6rem;
                        center:50%
                    }
                }
                .col1{
                    float:left;
                    width:25%;
                    margin-top:8px;
                   
                    
                    
                }
            .col2{
                    float:left;
                   
            }
                 .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:black;
   color: white;
   text-align: center;
   height: 25px;
   font-size: 18px;
}
              
 
        </style>
    </head>
    <body>
         <center>
          <h1   style=" font-size:5vw; font-family:courier; text-align:center">SOLIDUOUS SYSTEMWARE</h1>
           <div class="topnav">
        <a class="active" href="homepage.php">Home</a>
        <a href="http://localhost/miniproject/ajax.php">Service Centres</a>
            <a href="http://localhost/miniproject/form2.html">Feedback</a>
            <a href="http://localhost/miniproject/aboutus.php">About Us</a>

            <?php
            session_start();
            if (!isset($_SESSION['email'])) {
              
                ?>
                <a href="form1.html">Login</a>
                <a href="customer.html">Registration</a>
            <?php } else {
                if ($_SESSION['email'] === "admin"){
                ?>
                 
                <a href='custdetails.php'>Customer Details</a>
                <a href='product.php'>Product Details</a>
                <a href="orders.php">Orders</a>
                <a href="vfeedback.php">View Feedback</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } else {?>
                <a href="addtocard.php">Purchase</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } }?>
         </div>
        <h5  style="font-size:5vw"> Feedbacks </h5>
        
<?php
            $product = $user = $quantity = $amount = "";
            $received = NULL;
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "miniproject";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
           

            $sql = "SELECT * from feedback";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='table_form' border=5>";
                echo "<tr>";
                echo "<th>"; echo "Name"; echo "</th>";
                echo "<th>"; echo "Email"; echo "</th>";
                echo "<th>"; echo "Mobile No"; echo "</th>";
                echo "<th>"; echo "Feedback"; echo "</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["mobile_number"] . "</td>";
                    echo "<td>" . $row["fb"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            
            $conn->close();
        ?>
        <footer  style="text-align: center; padding: 5px">
            <p>
                © 2018 Soliduous Systemware. All rights reserved.
            </p>
        </footer>
    </body>
</html>
