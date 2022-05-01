<?php
        require "components/_dbconnect.php";
        $sql = "SELECT * FROM `products` WHERE `prod_id` = ".$_GET['id']." ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['prod_id'];
        $name = $row['prod_name'];
        $price = $row['prod_price'];
        $image = $row['prod_img'];
        $specs = $row['prod_desc'];
        
        $desc = str_replace("/", "<li>", $specs);

?>

<?php


        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true )
        {
            $loc='href="#"  data-bs-toggle="modal" data-bs-target="#login_modal" role="button"';
        }
        else{
            $loc='href = "/project/payment.php?id='.$id.'" method="get"';
        }

?>

<div class="container my-5">
    
    <div class="row">
        <div class="col col-md-6">
            <div class="container p-2">
                <img src="<?php echo $image ?>" alt="" style="width:60%">
            </div>
        </div>
        <div class="col col-md-6">
            <div class="container p-2">
                <h1><?php echo $name ;?></h1>
                <p class="">
                    <span class="badge bg-success">New</span>
                <h5 class="text-success fw-bold">Extra Rs. 8000 off</h5>
                <h2 class="fw-bolder">Rs. <?php echo $price ; ?></h2>
                <p class="text-decoration-line-through">Rs. 65000</p>
                </p>

                <p class="">
                <div class="_2cM9lP">
                    <div class="_3a9CI2">Highlights</div>
                    <div class="_2418kt">
                        <ul>
                           <?php
                            
                            echo $desc;
                            echo "<ul>";
                           ?>
                        </ul>
                    </div>
                </div>
                </p>

                <a class="btn btn-primary" <?php echo $loc; ?>>Buy Now</a>
                <a class="btn btn-primary mx-2" href="#" role="button">Save to Favourites</a>
            </div>
        </div>
    </div>
</div>