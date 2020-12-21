<html >
<head>
    
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        background-image: url("img5.jpeg");
        color: black;
        }
        
        input.transparent-input{
        background-color:rgba(0,0,0,0) 
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
                <a href="addtocard.php">Purchase</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } }?>
          </div>
    <button type="button" class="btn btn-info" onclick="loadDoc()">VIEW SERVICE CENTRES</button>
    <br><br>
    <table id="demo" cellpadding='10'></table>
    <script>
    function loadDoc() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          myFunction(this);
        }
      };
      xhttp.open("GET", "ajax.xml", true);
      xhttp.send();
    }
    function myFunction(xml) {
      var i;
      var xmlDoc = xml.responseXML;
      var table="<tr><th>COMPANY</th><th>PLACE</th><th>CONTACTNO</th></tr>";
      var x = xmlDoc.getElementsByTagName("DETAILS");
      for (i = 0; i <x.length; i++) { 
        table += "<tr><td>" +
        x[i].getElementsByTagName("COMPANY")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("PLACE")[0].childNodes[0].nodeValue +
        "</td><td>"+
        x[i].getElementsByTagName("CONTACTNO")[0].childNodes[0].nodeValue +
        "</td></tr>";
      }
      document.getElementById("demo").innerHTML = table;
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