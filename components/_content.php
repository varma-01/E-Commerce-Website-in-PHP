<div class="container-fluid bg-dark">
    <h2 class="text-center">SHOP THESE</h2>
    <div class="row" align="center">
        <?php
require "components/_dbconnect.php";
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result))
{ 
    $id = $row['prod_id'];
    $name = $row['prod_name'];
    $price = $row['prod_price'];
    $image = $row['prod_img'];
    $specs = $row['prod_desc'];
    $desc = str_replace("/", "<li>", $specs);

    echo '<div class="col-md-3 my-2">
          <div class="card" style="width: 18rem;">';
    echo ' <img src="'.$image.'" alt="" class"img-thumbnail mx-auto">';
                //<img src="/project/imgs/phone-1.jpg" class="card-img-top" alt="Product Image">
    echo  ' <div class="card-body">
            <h5 class="card-title">'.$name.'</h5>
                <p class="card-text">'.substr($specs, 0, 100).'...</p>
                <a class="btn btn-primary ml-2" type="submit" href="/project/product.php?id='.$id.'" method="get">View Product</a>
                </div>
                </div>
                </div>';
}


//echo '<img src="data:image/jpg/png/jpeg;base64,' . base64_encode( $image ) . '"/>';

//echo '<img src="data:image/jpg/png/jpeg;base64,' . base64_encode( $image ) . '"/>';
//<img src="" class="img-fluid" alt="Image">

?>

    </div>
</div>