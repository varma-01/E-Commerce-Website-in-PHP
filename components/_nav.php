<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    $loggedin = true;
}
else{
    $loggedin = false;
}


echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
    <a class="navbar-brand" href="/project">ElectroniKArt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/project">Home</a>
        </li>';
    

    
        
       echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Shop By Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/project/catCards.php?category=Phone" method="get">Phone</a></li>
            <li><a class="dropdown-item" href="/project/catCards.php?category=TV">Smart TV</a></li>
            <li><a class="dropdown-item" href="/project/catCards.php?category=Watch">Smart Watch</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">';
        if($loggedin)
        {
         echo '<a class="nav-link" href="/project/yourorders.php" tabindex="-1" aria-disabled="true">Your Orders</a>';
        }
        else
        {
          echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>';
        }

       echo '</li>
      </ul>';
      if($loggedin)
      { echo   '<div class="mx-2 text-light">Hello '.$_SESSION['name'].'</div>';
      }
      echo'
      <div class="mx-2">
      
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mx-2" type="submit">Search</button>';
        if(!$loggedin)
        { 
          echo '<a class="btn btn-primary ml-2"  href="#"  data-bs-toggle="modal" data-bs-target="#login_modal">Login</a>
          <a class="btn btn-secondary mx-2" type="submit" href="/project/signup.php">Signup</a>';
        }
        if($loggedin)
        {   echo '
          
            <a class="btn btn-danger ml-2" href="#" data-bs-toggle="modal" data-bs-target="#logout_conf">Logout</a>
            
            <!-- Modal -->
            <div class="modal fade" id="logout_conf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Logout?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action = "/project/logout.php">
                    <a class="btn btn-primary" href="/project/logout.php" role="button">Logout</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>';
        }
        echo '
          </form>
      </div>
    </div>
  </div>
</nav>';

include "login.php";
?>