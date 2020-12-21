<html>
    <head>
        <title>homepage</title>
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

.carousel .item {
  height: 650px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 300px;
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
                    width:5%
                   
                    
                    
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
    <body style="background-image:url('testing.png')">
    <center>
       <h1   style="background-color:#f2f2f2; font-size:5vw; font-family:courier; text-align:center">SOLIDUOUS SYSTEMWARE</h1>
         <div class="topnav">
             <a class="active" href="homepage.php">Home</a>
        
        
        <a href="http://localhost/miniproject/ajax.php">Service Centres</a>
            <a href="http://localhost/miniproject/form2.html">Feedback</a>
            <a href="http://localhost/miniproject/aboutus.html">About Us</a>

            <?php
            session_start();
            if (!isset($_SESSION['email'])) {
              
                ?>
                <a href="form1.html">Login</a>
                <a href="customer.html">Registration</a>
                <a href="alogin.php">Admin</a>
            <?php } else {
                if ($_SESSION['email'] === "admin"){
                ?>
                 
                <a href='custdetails.php'>Customer Details</a>
                <a href='product.php'>Product Details</a>
                <a href="orders.php">Orders</a>
                <a href="vfeedback.php.php">View Feedback</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } else {?>
                <a href="purchase.php">Purchase</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } }?>
         </div>
 l
       

       
        <div class="footer">
            <p class="leftFooter">
                © 2018 Soliduous Systemware. All rights reserved.
            </p>
            </div>
        
    <body>

        <?php
         
        
        $cname = $_SESSION['email'];
        echo 'Welcome : ' . $cname . '<br>';
        $conn = mysqli_connect('localhost', 'root','', 'miniproject');   
        
        $stm=mysqli_query($conn,"select pname from product_details ");
        $products=array();
        while($row=mysqli_fetch_array($stm)){
            $products[]=$row['pname'];
        }
            
            
        $stm1=mysqli_query($conn,"select pcost from product_details");
        $amounts= array();
        while($row1=mysqli_fetch_array($stm1)){
            $amounts[]=$row1['pcost'];
        }
            
            

            //Load up session
            if ( !isset($_SESSION["total"]) ) {
                $_SESSION["total"] = 0;
                for ($i=0; $i< count($products); $i++) {
                $_SESSION["qty"][$i] = 0;
                $_SESSION["amounts"][$i] = 0;
                }
            }
            
            //Reset
            if ( isset($_GET['reset']) )
            {
                if ($_GET["reset"] == 'true')
                {
                    unset($_SESSION["qty"]); //The quantity for each product
                    unset($_SESSION["amounts"]); //The amount from each product
                    unset($_SESSION["total"]); //The total cost
                    unset($_SESSION["cart"]); //Which item has been chosen
                }
            }
            
            //Checkout
            if ( isset($_GET['checkout']) )
            {
                if ($_GET["checkout"] == 'true')
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "miniproject";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $temp = 1;
                    $stmt = $conn->prepare("INSERT INTO orderid (t1) VALUES (?)");
                    $stmt->bind_param("i", $temp);    
                    $stmt->execute();                    
                    $stmt->close();
                    
                    $sql = "SELECT max(id) as id from orderid";
                    $result = $conn->query($sql);
                    $r=$result->fetch_assoc();                    
                    $order_id = $r['id'];
                    
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                        $stmt = $conn->prepare("INSERT INTO order_details (product, user, quantity, amount, order_id) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssidi", $products[$_SESSION["cart"][$i]],$cname, $_SESSION["qty"][$i], $_SESSION["amounts"][$i], $order_id);    
                        $stmt->execute();
                        $stmt->close();
                    }
                    $conn->close();
                }
            }
            
            //Add
            if ( isset($_GET["add"]) )
            {
                $i = $_GET["add"];
                $qty = $_SESSION["qty"][$i] + 1;
                $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
                $_SESSION["cart"][$i] = $i;
                $_SESSION["qty"][$i] = $qty;
            }

             //Delete
             if ( isset($_GET["delete"]) )
            {
                $i = $_GET["delete"];
                $qty = $_SESSION["qty"][$i];
                $qty--;
                $_SESSION["qty"][$i] = $qty;
                //remove item if quantity is zero
                if ($qty == 0) {
                    $_SESSION["amounts"][$i] = 0;
                    unset($_SESSION["cart"][$i]);
                }
                else
                {
                    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
                }
            }
            echo"<div class='card-columns'>";
            for($i=0; $i<count($products); $i++)
            {
                echo "
                <div class='card'>
                    <img src='/miniproject/image/img$i.jpeg' class='card-img-top img-responsive' width='30px' height='150px'>
                    <div class='card-body'>
                    <h4 class='card-title'>Name : ",$products[$i] ,"</h4>
                    <p> Price: ₹ ",$amounts[$i]," </p>
                    <a href='?add=",$i,"' class='btn btn-primary'>Add to Cart</a>
                    </div>
                </div>";
            }
            echo "</div>";
        ?>
        
            
       
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="5"><a href="?reset=true">Reset Cart</a></td>
            <td colspan="5"><a href="?checkout=true">Checkout</a></td>
        </tr>
        </table>
        <?php
            if ( isset($_SESSION["cart"]) ) {
        ?>
            <br/><br/><br/>
            <h2>Cart</h2>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
        <?php
                $total = 0;
                foreach ( $_SESSION["cart"] as $i ) {
        ?>
                    <tr>
                        <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                        <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                        <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
                    </tr>
        <?php
                    $total = $total + $_SESSION["amounts"][$i];
        }
                    $_SESSION["total"] = $total;
        ?>
                    <tr>
                    <td colspan="7">Total : <?php echo($total); ?></td>
                    </tr>
            </table>
        <?php
            }
        ?>
</center>
    </body>
</html>