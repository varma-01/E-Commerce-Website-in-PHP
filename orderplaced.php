
<?php session_start();?>
<?php
    $status = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //echo $_SESSION['name'];
        //echo "\n" ;
        require 'components/_dbconnect.php';
        $custId = $_SESSION['custId'];
        $prodid = $_POST['id'];
        //echo $_SESSION['']
        $sql1 = "SELECT * FROM `customers` WHERE `cust_id` =".$custId." ";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);

        $email1 = $row1['cust_email'];
        $phone1 = $row1['cust_phone'];
        $address1 = $row1['cust_address'];

        $sql = "INSERT INTO `orders`(`cust_id`, `prod_id`, `ord_status`,
                `receiver_email`, `receiver_phone`, `receiver_address`) 
                VALUES ('".$custId."','".$prodid."','pending','$email1','$phone1','$address1')";
        
        $result = mysqli_query($conn, $sql);

        echo " yes order is placed successfully";
        $status = true;
        header("location: ordersuccess.php?id=$prodid");
    }


?>

