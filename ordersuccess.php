<?php session_start();?>
<?php
    require "components/_dbconnect.php";

    $sql = "SELECT * FROM `products` WHERE `prod_id` = ".$_GET['id']." ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $id= $row['prod_id'];
    $name = $row['prod_name'];
    $price = $row['prod_price'];
    $specs = $row['prod_desc'];
    $image = $row['prod_img'];

    $desc = str_replace("/", "<li>", $specs);

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

    <title>Order Placed Successfully!</title>
</head>

<body>
    <?php require "components/_nav.php";?>


    <h1 class="text-center bg-success bg-gradient py-2 my-2">Yayyy! Order Placed Successfully!!!</h1>

    <!-- <?php 
         $variable1 = $_SERVER['REQUEST_METHOD'];
         echo '<h1 class="text-center py-2 bg-danger bg-gradient">'.$variable1.'</h1>';
    ?>

    <?php 
         $variable2 = $_GET['id'];
         echo '<h1 class="text-center py-2 bg-danger bg-gradient">'.$variable2.'</h1>';
    ?> -->
    <div class="container my-3 text-center">
    <img src="/project/imgs/loki_success.gif" class="img-fluid" alt="Success Image">
    </div>

    <div class="container" align="center">
        <div class="card mb-3 bg-dark bg-gradient text-light" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $image;?>" alt="Product Image" class="img-thumbnail">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title text-start"><?php echo $name; ?></h2>
                        <h3 class="card-title text-start">Rs. <?php echo $price; ?></h3>
                        <p class="card-text text-start"><?php echo $desc?></p>
                        <p class="card-text text-start"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3 text-center">
    <a type="submit" class="btn btn-info btn-lg" href="/project" >Go back to Home Page and shop More</a>
    </div>

    <?php include "components/_footer.php"?>    

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