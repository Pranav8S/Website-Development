<html>
    <head>
        <title>homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </head>
    <body>
<center>
            <h2>Product Cost</h2>
            <br>
            <form action="" method="POST">
                <div>
                    <label for="name">Name</label>
                    
                    <input type="text" name="name"  class="form-control" style="width:200px" placeholder="Enter Product Name" required/>
                </div>
                <br>
                <br>
                
                <button type="submit" class="btn btn-success" name="submit" class="btn">Submit</button>
            </form>

            <h3>
                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];

                    $url = "http://localhost/miniproject/api.php?name=" . $name;

                    $client = curl_init($url);
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($client);
                    
                    $result = json_decode($response);
                    
                    echo $result->data;
                } // Refer above PHP code
                ?>
            </h3>
</center>
</body>
</html>
