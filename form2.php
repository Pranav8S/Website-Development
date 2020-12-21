<html>
    <head>
        <title>form2</title>
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

            input{
                color: white;
            }

            input.transparent-input{
                background-color:rgba(0,0,0,0) ;
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
                if (document.feedback.name.value == "")
                {
                    alert("Name should not be empty")
                    return false;
                }
                if (document.feedback.email.value == "")
                {
                    alert("Email should not be empty")
                    return false;
                }
                if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(document.feedback.email.value))
                {
                    alert("Enter valid email address")
                    return false;
                }
                if (document.feedback.mobile_number.value == "")
                {
                    alert("Mobile No should not be empty")
                    return false;
                }
                if (document.feedback.mobile_number.value.length != 10)
                {
                    alert("Mobile number must be of 10 digits")
                    return false;
                }
                if (document.feedback.fb.value == "")
                {
                    alert("Feedback should not be empty")
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body style="background-image:url('img2.jpeg')">
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
            ?>
            <a href="cdetails.php" style='color:red'><?php echo $_SESSION['email'] ?></a> 

            <a href='logout.php'>Logout</a>
            <?php } ?>
        </div>
        <h5 style="font-size:5vw">Feedback</h5>
        <form name='feedback' method="post" action="feedback.php"  >
            <table>
                <tr >
                    <th class="col1" >Name </th> <th class="col2"> <input type="text"  class="form-control transparent-input" placeholder="Enter Name" id="name" name="name"> </th>
                </tr>
                <tr >
                    <th class="col1">Email </th> <th class="col2"><input type="text"  class="form-control transparent-input"  placeholder="Enter Email" id="email" name="email"> </th>
                </tr>
                <tr >
                    <th class="col1">Mobile </th> <th class="col2"><input type="number" min="1111111111" class="form-control transparent-input" placeholder="Enter Mobile No" id="mobile_number" name="mobile_number"> </th>
                </tr>
                <tr >
                    <th class="col1" >Feedback </th> <th class="col2"> <input type="text" class="form-control transparent-input" placeholder="Enter Feedback here" id="fb" name="fb" > </th>
                </tr>
                <tr >                   
                    <th class="col2"><button type="submit" class="btn btn-success" name="submit" onclick="return validation()">Submit</button></th>
                </tr>                
            </table>

            <footer  style="text-align: center; padding: 5px">
                <p>
                    © 2018 Soliduous Systemware. All rights reserved.
                </p>
            </footer>

        </form>
    </center>
</body>
</html>