<html>
    <head>
        <title>form1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <style>
             
        div{
  display:block;
  padding:0px;
  margin:0px;
}
  
            
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
       
        color: white;
        }
        
        input.transparent-input{
        background-color:rgba(0,0,0,0) 
        }
            
        th, td {
            padding: 15px;
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
    background-image: url("img3.jpg"); 
    
}
.img2 { background-image: url("img5.jpg"); }
.img3 { background-image: url("img6.jpg"); }

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
}
              

        </style>
    </head>
    <body  >
        
        <center>
                     <div class="bg-image img1">
<h1   style="font-size:5vw; font-family:courier; text-align:center; font-color:#000000;">SOLIDUOUS SYSTEMWARE</h1>

         <div class="topnav">
        <a class="active" href="homepage.html">Home</a>
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
                <a href="vfeedback.php.php">View Feedback</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } else {?>
                <a href="addtocard.php">Purchase</a>
                <a style='color:red'><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php">Logout</a>
            <?php } }?>
                
                      
         </div>
      <p align="center">Tradition since 1998</p>
      <p class="text-justify" >The SOLIDUOUS SYSTEMWARE was started by Mr. Ramkrishnan Iyer at 1998. Our main motto is to trade the hardware product, provide services, fix the hardware and software parts and also helping the customer to buy a perfect laptop for himself/herself. 
          we look forward for the customer's happiness and appreciation.We strive hard to provide the best possible deals and services. We are open 365 Days & also provide free home delivery to customers with certain bill amount. </p>
</div>
       
   <div class="bg-image img2">
    <h2> Our Services Features </h2>
     <dl>
		<ul>
		<li>
		<dt> Unlimited Free Deliveries </dt>
		<dd> Order as often as you'd like above Rs.200 and will never charged a delivery fee for it.</dd>
		</li>
		<br>
		
		<li>
		<dt> Exclusive Wednesday Special Offers </dt>
		<dd> On every Wednesdday special combo offers will be available!! </dd>
		</li>
		<br>
		
		<li>
		<dt> Minimal Delivery Charges </dt>
		<dd> Every Order Below Rs.200 will be charged extra with the Delivery Charge of Rs.30 </dd>
		</li>
		<br>
                </ul>
   </dl>	<br> <br> <br>
   
   
   </div>   
<div class="bg-image img3">
  
		
		<h3> Areas We Serve </h3> 
			<ul>
				<li>Borivali </li>
				<li>Mira Road</li>
				<li>Bhayander </li>
				<li>Vile Parle</li>
			        <li>Dombivli</li>
                                <li>Kalyan</li>
                                <li>Thane</li>
                        </ul>	<br> <br>
</div>
         
              <div class="footer">
       
        <td class="leftFooter">
			© 2018 Soliduous sytemware. All rights reserved.
		</td>
        </div>
        </form>
        
        </center>

        
    </body>
</html>