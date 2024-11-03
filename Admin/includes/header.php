<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>

    <!-- Bootstrap CSS --> 
    <link rel = "stylesheet" href ="../css/bootstrap.min.css">
    <!-- FontAwsom CSS -->
    <link rel= "stylesheet" href = "../css/all.min.css">
    <!-- Custom CSS -->
    <link rel= "stylesheet" href = "../css/custom.css">

</head>
<body>

<!-- Top Navbar -->
<nav class= "navbar navbar-expand-md navbar-dark bg-info pl-5 fixed-top">
    
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

<!-- Start Container -->

   
    <!-- Start Row -->
        
        <!-- SideBar Start 1st column -->
            <div class="collapse navbar-collapse" id="myMenu">
                <ul class="navbar-nav pl-5 custom-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php">
                            <i class="fas fa-tachometer-alt mr-2">  </i>Dashboard 
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link  <?php if(PAGE == 'work'){echo 'active';} ?>" href="work.php">
                            <i class="fab fa-accessible-icon mr-2">  </i> Assigned Work
                         </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?>" href="request.php">
                            <i class="fas fa-align-center mr-2">  </i>Requests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'assets'){echo 'active';} ?>" href="assets.php">
                            <i class="fas fa-database mr-2">  </i> Store
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'technician'){echo 'active';} ?>" href="technician.php">
                            <i class="fab fa-teamspeak mr-2">  </i>Labour
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'requester'){echo 'active';} ?>" href="requester.php">
                            <i class="fas fa-users mr-2">  </i>Requester
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';} ?>" href="soldproductreport.php">
                            <i class="fas fa-table center mr-2">  </i>Sell Report
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';} ?>" href="workreport.php">
                            <i class="fas fa-table center mr-2">  </i>Work Report
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" href="changepass.php">
                            <i class="fas fa-key mr-2">  </i>Change Password 
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt mr-2">  </i>Logout </a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- SideBar End 1st Column -->