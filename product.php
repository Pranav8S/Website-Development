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
        
        input.transparent-input{
        background-color:rgba(0,0,0,0);
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
        <script type='text/javascript'>
            function validation()
            {
                if (document.product.product_name.value == "")
                {
                    alert("Product Name should not be empty")
                    return false;
                }
                if (document.product.price.value == "")
                {
                    alert("Price should not be empty")
                    return false;
                }
                if (document.product.stock.value == "")
                {
                    alert("Status should not be empty")
                    return false;
                }
                return true;
            }       
        </script>  
              
    </head>
    
    
    <body style="background-image:url('img6.jpg')">
    <center>
<h1   style="font-size:5vw; font-family:courier; text-align:center; font-color:#000000;">SOLIDUOUS SYSTEMWARE</h1>
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
        <h5  style="font-size:5vw"> Details/Status </h5>
        <form id="form1" name='product' action="productdetails.php" method="post">
            <table name='table_form'>
                
                
                <tr >
                    <th class="col1" >ProductId </th> <th class="col2" > <input type="hidden"  class="form-control transparent-input" placeholder="Enter Id" name="product_id" id="product_id" > </th>
                </tr>
                
                <tr >
                    <th class="col1" >Product </th> <th class="col2" > <input type="text" class="form-control transparent-input" placeholder="Enter Product Name" name="product_name" id="product_name" > </th>
                </tr>
    
                <tr >
                    <th class="col1" >Price </th> <th class="col2" ><input type="number" min="1" class="form-control transparent-input" placeholder="Enter Price" name="price" id="price"> </th>
                </tr>
           
                <tr >
                    <th class="col1" >Stock </th> <th class="col2" ><input type="number" min="1" class="form-control transparent-input" placeholder="Enter Stock" name="stock" id="stock"> </th>
                </tr>
           
                <tr > 
                    <th class="col1" > </th> <th class="col2" > <button type="submit" class="btn btn-success" id="Insert" name="Insert" onclick="return validation()">Insert</button> <button type="submit" id="Update" class="btn btn-warning" name="Update" onclick="return validation()">Update</button> <button type="submit" class="btn btn-danger" id="Delete" name="Delete">Delete</button></th>
                </tr>
                </table>
  
              
            
       </form>
        
        <?php
            $product_id = $product_name = $price = $stock = "";
            $received = NULL;
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "miniproject";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            echo "Data";

            $sql = "SELECT * from product_details";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='table_form' border=1>";
                echo "<tr>";
                echo "<th>"; echo "Product Id"; echo "</th>";
                echo "<th>"; echo "Product Name"; echo "</th>";
                echo "<th>"; echo "Price"; echo "</th>";
                echo "<th>"; echo "Stock"; echo "</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row["pname"] . "</td>";
                    echo "<td>" . $row["pcost"] . "</td>";
                    echo "<td>" . $row["stock"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            
            $conn->close();
        ?>        
        <script type='text/javascript'>
            let table = document.getElementById('table_form'), iIndex;
            for(let i = 0; i < table.rows.length; i++){
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;
                    document.getElementById('product_id').value = this.cells[0].innerHTML;
                    document.getElementById('product_name').value = this.cells[1].innerHTML;
                    document.getElementById('price').value = this.cells[2].innerHTML;
                    document.getElementById('stock').value = this.cells[3].innerHTML;
                }
            }
        </script>
          <footer  style="text-align: center; padding: 5px">
            <p>
                © 2018 Soliduous Systemware. All rights reserved.
            </p>
        </footer>
        
        </center>
    </body>
</html>

