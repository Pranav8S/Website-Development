<?php
// process client request via URL
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['name']))
{    //find name of product 
    $name=$_GET['name'];
    //find price of product
    $price = get_price($name);
    if(empty($price))//if product does not exist in inventory
    {
        deliver_response(200,"Product Not Found",NULL);
    }
    else
    {
        deliver_response(200,"Product Found",$price);
    }	
}
else
{
    //throwing invalid request
    deliver_response(400,"Invalid Request",NULL);
}

function deliver_response($status,$status_message,$data)
{
    //header("HTTP/1.1 $status $status_message");
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);//in webservice instead of responding in html, we respond in json (or xml)
    echo $json_response;
}
?>
