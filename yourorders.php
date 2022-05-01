<?php session_start();?>

<?php 
       


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Your Orders!</title>
</head>

<body>
    <?php include "components/_nav.php"?>
    <h1 class="bg-info my-2 py-2">Here are Products that you orderd </h1>
    <div class="container" align="center">
    <?php

require "components/_dbconnect.php";

$custid = $_SESSION['custId'];
$sql1="SELECT * FROM `orders` 
        inner join `customers` 
        on orders.cust_id = customers.cust_id 
        where orders.cust_id=".$custid." 
        AND ord_status = 'pending'";
$result1 = mysqli_query($conn, $sql1);
while($row1= mysqli_fetch_assoc($result1))
{$prodid1= $row1['prod_id'];

$sql = "SELECT * FROM `products` WHERE `prod_id`=".$prodid1."";
$result = mysqli_query($conn, $sql);



    while ($row = mysqli_fetch_assoc($result))
{ 
   
    $id = $row['prod_id'];
    $name = $row['prod_name'];
    $price = $row['prod_price'];
    $image = $row['prod_img'];
    $specs = $row['prod_desc'];
    $desc = str_replace("/", "<li>", $specs);

            echo'<div class="card mb-3 text-start" style="max-width: 900px;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="'.$image.'" alt="Product Image" class="img-thumbnail">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h3 class="card-title">'.$name.'</h3>
                <h5 class="card-title">Rs. '.$price.'</h5>
                <p class="card-text">'.$desc.'</p>
                <a class="btn btn-primary ml-2" type="submit" href="/project/product.php?id='.$id.'" method="get">View Product</a>
                
                </div>
            </div>
            </div>
        </div>';
    }
}
?>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>