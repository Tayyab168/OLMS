<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS --> 
    <link rel = "stylesheet" href ="../css/bootstrap.min.css">
    <!-- FontAwsom CSS -->
    <link rel= "stylesheet" href = "../css/all.min.css">
    <!-- Custom CSS -->
    <link rel= "stylesheet" href = "../css/custom.css">

    <title><?php echo TITLE ?></title>
</head>
<body>
<!-- Top Navbar -->
 <nav class= "navbar navbar-expand-md navbar-dark bg-info pl-5 fixed-top">
    <a href="Requesterprofile.php" class= "navbar-brand d-print-none">OLMS</a> 

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="myMenu">
                <ul class="navbar-nav pl-5 custom-nav">
                    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active';} ?>" href="Requesterprofile.php">
                        <i class="fas fa-user mr-2">  </i>Profile </a>
                    </li>
                   
                    <li class="nav-item"><a class="nav-link  <?php if(PAGE == 'submitRequest'){echo 'active';} ?>" href="submitRequest.php">
                        <i class="fab fa-accessible-icon mr-2">  </i>Submit Request </a>
                    </li>
                   
                    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="CheckStatus.php">
                        <i class="fas fa-align center mr-2">  </i>Service Status </a>
                    </li>
                   
                    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Requesterchangepass'){echo 'active';} ?>" href="Requesterchangpass.php">
                        <i class="fas fa-key mr-2">  </i>Change Password </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt mr-2">  </i>Logout </a>
                    </li>

                </ul>
            </div>
 </nav>
<!-- Start Container -->
<div class="container-fluid" style="margin-top: 40px;">
    
    <!-- Start Row -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed-top d-print-none">
        <!-- SideBar Start 1st column -->
           
        </nav>
        <!-- SideBar End 1st Column -->