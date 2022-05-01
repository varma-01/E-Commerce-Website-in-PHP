<?php 
session_start();
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

    <title>Shop By Category!</title>
</head>

<body>
    <?php require "components/_nav.php";?>

    <h1 class="text-center bg-dark text-light my-0 py-2 ">Shop By Category!</h1>
    <?php 
    require "components/_dbconnect.php";
    $var = $_GET['category'];
    $sql = "SELECT * FROM `products` WHERE `prod_category` ='".$var."' ";
    $result = mysqli_query($conn, $sql);
   
    echo ' <h1 class="text-center bg-warning text-dark my-0">'.$var.'</h1>';
    
    ?>

    <div class="container-fluid mx-auto bg-secondary py-2" align="center">

        <?php
 
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


//echo '<img src="data:image/jpg/png/jpeg;base64,' . base64_encode( $image ) . '"/>';

//echo '<img src="data:image/jpg/png/jpeg;base64,' . base64_encode( $image ) . '"/>';
//<img src="" class="img-fluid" alt="Image">

?>



    </div>
    <?php require "components/_footer.php";?>
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