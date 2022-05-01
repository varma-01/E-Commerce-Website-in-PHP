<?php
$login = false;
$showError1 = false;



      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
          include 'components/_dbconnect.php';
          $username = $_POST['username'];
          $password = $_POST['password'];
      

              $sql = "SELECT * FROM `customers` WHERE `cust_username` ='$username' AND `cust_password` ='$password' ";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $num = mysqli_num_rows($result);
              if($num == 1)
              {
                  $login=true;
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION['username'] = $username;
                  $_SESSION['name'] = $row['cust_name'];
                  $_SESSION['custId'] = $row['cust_id'];

                  header("location: index.php");

              }  
            
          else{
              $showError1 = "Failed to login, Incorrect Password";
              echo "login error";
          }  
      }

?>


<!-- Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Login to our website</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container md-5">

                    <form action="login.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Your Username should be unique.</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>