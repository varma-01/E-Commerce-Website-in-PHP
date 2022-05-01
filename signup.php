<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'components/_dbconnect.php';
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exist = false;

    //check if username already exist
    $existSQL = "SELECT * FROM `customers` WHERE `cust_username` = '$username'";
    $result = mysqli_query($conn, $existSQL);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows>0)
    {
        $showError = "Account with that username or Phone Number already Exist";
    }
    else{
    
        if($cpassword == $password)
    {
        $sql = "INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`,
        `cust_address`, `cust_username`, `cust_password`) 
        VALUES (NULL, '$name', '$phoneNumber', '$email', '$address', '$username', '$password');";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
    }
    else{
        $showError = "Passwords do not match";
    }  
    }

    
}

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

    <title>Sign Up</title>
</head>

<body>
    <?php require "components/_nav.php" ?>

    <?php
if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>' .$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>

    <div class="container-fluid bg-info bg-gradient pb-3 md-5" align="center">
        
            <h1 class="bg-dark bg-gradient text-warning text-center pb-2"> Sign Up to out website</h1>
            <form action="/project/signup.php" method="POST">
                <div class="form-group mb-3 col-md-5 text-start" >
                    <label for="name" class="form-label ">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                        placeholder="Phone Number">
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address"
                        placeholder="Address"></textarea>
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <div id="emailHelp" class="form-text">Make sure you enter a unique Username.</div>
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group mb-3 col-md-5 text-start">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                    <div id="emailHelp" class="form-text">Make sure you type the same password.</div>
                </div>
                <button type="submit" class="btn btn-success btn-gradient">SignUp</button>
            </form>
        
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