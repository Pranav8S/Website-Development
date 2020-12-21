<!DOCTYPE HTML>
<html>
    <head>
        <title>homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


        <style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .carousel-inner img {
                width: 100%;
                height: 100%;
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

            .bg-image {
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;

}

/* Images used */
.img1 { 
    background-image: url("img5.jpg"); 
    
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
            
            .container{
                color: white;
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

            iframe {
                width: 350px;
                height: 350px;
                
            }

            footer {
                left: 0;
                bottom: 0;
                width: 100%;
                background-color:black;
                color: white;
                text-align: center;
                height: 35px;
                font-size: 20px;
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
                <a href="purchase.php">Purchase</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } }?>
        </div>



        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <a href="homepage.php"></a>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img0.jpg" alt="Los Angeles" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img2.jpg" alt="Chicago" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img3.png" alt="New York" width="1100" height="500">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div class="bg-image img1">
       <div class="maincont">
            <div class="container" style=" width: 320px; height: 320px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.772464575235!2d72.82144071445997!3d18.94146296111077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1e1dcfe5f1d%3A0x2ddc00e19af3ee69!2sMarine+Drive!5e0!3m2!1sen!2sin!4v1540278895017"  width="300" height="280" frameborder="1" style="border:2px solid #F66468"></iframe>
        </div>
        
           
        <div class="container">
            <br><br>
                <h1> SOLIDUOUS SYSTEMWARE </h1>
                <h4> <strong>Rahul Iyer</strong></h4>
                <p>1/612,Raghunath Chowk, Marines, Mumbai, Maharashtra, India - 400051</p>
                <p> <strong>Call Us :</strong> 08048060029 </p>
                <p><strong>Phone :</strong> +91-022-26471823<br><br>
                    <strong>Email Address :</strong><a href="mailto:yasin.mohammed16@siesgst.ac.in?subject=&body="> Rahuliyer1978@yahoo.com</a><br><br>
                    <strong>Web Site :</strong><a href="http://www.saujanyaenterprises.in"> http://www.saujanyaenterprises.in</a><br><br>
        </div>
       </div>
            
        <footer  style="text-align: center; padding: 5px">
            <p>
                © 2018 Soliduous Systemware. All rights reserved.
            </p>
        </footer>
    </center>
</body>

</html>