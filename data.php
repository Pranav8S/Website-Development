<?php
function get_price($name)
{
    $products = [
            "cpu"=>9050,
            "ram"=>5500,
            "ssd"=>3500,
            "gpu"=>16050,
    ];
    foreach($products as $product=>$price)
    {
            if($product==$name)
            {
                    return $price;
            }
    }
}
?>
