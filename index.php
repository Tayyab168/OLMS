<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OSMS</title>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- FontAwesom CSS -->
    <link rel="stylesheet" href="css/all.min.css">
        <!-- GoogleFont CSS -->
    <<link href="https://fonts.googleapis.com/css2?family=Ubuntu:
    ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"rel="stylesheet">

        <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

</head>
<body>
    
    <!-- Start Navigation -->

    <nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed-top">
    
        <a href="index.php" class="navbar-brand">Online Labour Managment System</a>
        
       <!-- <span class="navbar-text">Customer's Happiness is our first Aim & first Periority </span> -->

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myMenu">
           
            <ul class="navbar-nav pl-5 custom-nav">

                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#services" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#registration" class="nav-link">Registration</a>
                </li>
                <li class="nav-item">
                    <a href="Requester/Requesterlogin.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>

    </Nav>
    
    <!-- End Navigation -->

            <!-- Start Header Jumbotron -->
                <header class="jumbotron back-image" style="background-image:url(images/banner1.jpg);">

                    <div class="myclass mainHeading">
                    
                    <h1 class="text-danger font-weight-bold"> WELCOME TO <br> Online Labour Managment System </h1>
                        
                        <p class="font-italic"> Customer's Happiness is Our Aim </p>
                        
                        <a href="Requester/Requesterlogin.php" class="btn btn-success mr-4">Login</a>
                        
                        <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
                    
                    </div>

                </header>
                <!-- End Header Jumbotron -->

            <!-- Start Introduction Container -->

                <div class="container">
                    <div class="jumbotron">
                        <h3 class="text-center">Online Labour Managment System Services</h3>
                        <p>
                            OLMS is Pakistan leading chain of multi-brand Electronics
                            and Electrical service workshops offering wide array of services.
                            We focus on enhancing your uses experience by offering world-class Electronics.
                            Appliances maintenance services.
                            Our sole mission is “To provide electronic appliances care services to keep the device fit and healthy
                            and customer happy and smiling”.
                            With well-equipped Electronic Appliances services centers and fully trained mechanics,
                            we provide quality services with excellent packages that are designed to offer you great savings.
                             Our state-of-art workshops are conveniently located in many cities across the country.
                            Today customer don’t just except high quality and excellent service at a fair price __ they demand it.
                            Luckily, today we know far more about how to provide people with the experience they want.
                            And it all begins with online service maintenance service.
                        </p>

                    </div>

                    </div>      
            <!-- End Introduction Container -->

            <!-- Start Services Section -->
               
                <div class="container text-center border-bottom" id="services" >
                   
                    <h3>Our Services</h3>

                    <div class="row mt-4">
                        
                        <div class="col-sm-4 mb-4">
                            <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                            <h4 class="mt-4">Electrician</h4>

                        </div>
                        <div class="col-sm-4 mb-4">
                            <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                            <h4 class="mt-4">Plumber</h4>

                        </div>
                        <div class="col-sm-4 mb-4">
                            <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                            <h4 class="mt-4">Repairing</h4>

                        </div>
                    
                    </div>

                </div>
            <!-- End Services Section -->

            <!-- Start Registration Form -->
                <?php include('UserRegistration.php') ?>
            <!-- End Registration Form -->
                <!-- Start Customer Review -->
                    <div class="jumbotron bg-info">
                        <div class="container">
                            
                            <h2 class="text-center text-white"> Happy Customer</h2>
                            
                            <div class="row">
                                <!-- Start 1st customer -->
                                     <div class="col-lg-3 col-sm-6">
                                      <div class="card shadow-lg mb-2">
                                            <div class="card-body text-center">
                                            <img src="images/avtar1.jpg" class="img-fluid" style="border-radius:100px;" alt="avtr1">
                                                <h4 class="card-title">M Yousaf</h4>
                                                <p class="card-text">
                                                     This is good and relaible site for online labour managment for any Electronics Appliances.
                                                 </p>

                                            </div>

                                        </div>

                                    </div>
                                <!-- End 1st Customer -->
                                <!-- Start 2nd Customer -->
                                   <div class="col-lg-3 col-sm-6">
                                        <div class="card shadow-lg mb-2">
                                            <div class="card-body text-center">
                                                <img src="images/avtar2.jpg" class="img-fluid" style="border-radius:100px;" alt="avtr2">
                                                <h4 class="card-title">M Ajmal</h4>
                                                <p class="card-text">
                                                     This is good and relaible site for online labour managment for any Electronics Appliances.
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                <!-- End 2nd Customer -->
                                <!-- Start 3rd Customer -->
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card shadow-lg mb-2">
                                                <div class="card-body text-center">
                                                    <img src="images/avtar3.jpg" class="img-fluid" style="border-radius:100px;" alt="avtr3">
                                                    <h4 class="card-title">M Kashif</h4>
                                                    <p class="card-text">
                                                         This is good and relaible site for online labour managment for any Electronics Appliances.
                                                         I prefer this for Maintaince Appliances.
                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                    <!-- End 3rd Customer -->
                                    <!-- Start 4th Customer -->
                                       <div class="col-lg-3 col-sm-6">
                                            <div class="card shadow-lg mb-2">
                                                <div class="card-body text-center">
                                                    <img src="images/avtar4.jpg" class="img-fluid" style="border-radius:100px;" alt="avtr4">
                                                    <h4 class="card-title">M Asif</h4>
                                                    <p class="card-text">
                                                         This is good and relaible site for online labour managment for any Electronics Appliances.
                                                         I prefer this for Maintaince Appliances.
                                                     </p>

                                                </div>

                                            </div>

                                        </div>
                                    <!-- End 4th Customer -->
                            </div>
                        </div>
                    </div>
                <!--End Customer Review -->


<!-- start Contact us-->
    <div class="container" id="contact">
        
        <h2 class="text-center mb-4"> Contact Us</h2>
        <div class="row">
            <!-- Start 1st col-->
               <?php include('ContactForm.php') ?> 
               
            <!-- End 1st col-->

            <!-- Start 2nd col -->
                <div class="col-md-4 text-center">
                <strong>Headquarter:</strong><br>
                OLMS pvt Ltd, <br>
                7th Evenue Road, <br>
                Islmabad <br>
                Phone: +923040568810 <br>
                <a href="#" target="_blank"> WWW.OLMS.COM</a>
                <br> <br> <br>
                <strong>Branch:</strong><br>
                OLMS pvt Ltd, <br>
                Multan Road, <br>
                Mailsi <br>
                Phone: +923413882028 <br>
                <a href="#" target="_blank"> WWW.OLMS.COM</a>
                </div>
            <!-- End 2nd col -->
        </div>

    </div>
<!-- End Contact us -->

<!-- Start Footer -->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <!-- Start 1st Col in Footer -->
                    <div class="col-md-6">
                        <span class="pr-2"> Follow Us: </span>
                        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
                    </div>
                <!--  End 1st Col in Footer -->
                <!-- Start 2nd col -->
                    <div class="col-md-6 text-right">
                    <small> Designed by M Umair Yaar & copy; 2020 </small>
                    <small class="ml-2"> <a href="Admin/login.php"> Admin Login </a> </small>
                    
                    </div>

                <!-- End 2nd col -->
            
            </div>
        </div>
    </footer>


<!-- Start Footer -->


    <!-- javaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>

</body>
</html>