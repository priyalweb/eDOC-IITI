<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/c7565cd913.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Home_Page</title>

    <style>
        body {
            background-image: url(images/background\ 5.jpg);
            background-repeat: no-repeat;

        }

        .navbar-nav {
            margin-left: auto;
        }

        #carouselExampleIndicators {
            /* max-width: 100%; */
            width: 59em;
            top: 110px;
            left: 590px;
            position: absolute;
        }

        #headerofmaincontent {
            position: absolute;
            top: 115px;
            left: 90px;
            color: aliceblue;
        }

        #buttons {
            position: absolute;
            top: 400px;
            left: 14px;
        }

        #footer {
            position: absolute;
            margin-top: 650px;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" class="navbar navbar-light" style="color:white ; background-color: #092235;">
            <a class="navbar-brand" href="http://localhost/eDOC@IITI/index.php?logout=true"><i class="fas fa-hospital-user"></i> eDOC@IITI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" class="navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <a class="nav-link" href="http://localhost/eDOC@IITI/index.php?logout=true" style="color:white ;">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:white ;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:white ;">Contact Us</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <div class="container" id="maincontent">
        <div id="headerofmaincontent">
            <h1 style="font-size: 75px;"><span style="color: rgb(5, 5, 51);"> eDOC</span>@<span style="color: rgb(5, 5, 51);">IITI</span></h1>
            <p style="font-size: 20px;">Solution To Every Health Problem</p>
        </div>



        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-70" src="images/carousel2.jpg" alt="First slide">
                    <div style="color:yellow ;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>THIS COMPLETE WEBSITE IS MADE BY THE STUDENTS OF IIT INDORE</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-70" src="images/carousel3.jpg" alt="Second slide">
                    <div style="color:powderblue ;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>INAUGRATION CEREMONY</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-70" src="images/carousel4.jpg" alt="Third slide">
                    <div style="color:turquoise ;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>INTERIORS</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-70" src="images/carousel5.jpg" alt="Fourth slide">
                    <div style="color:ghostwhite;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>A VIEW FROM BACK</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-70" src="images/carousel6.jpg" alt="Fifth slide">
                    <div style="color:WHITE ;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>DENTIST'S CLINIC</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-70" src="images/carousel7.jpg" alt="Sixth slide">
                    <div style="color:whitesmoke ;" class="carousel-caption d-none d-md-block">
                        <h5><b>IIT INDORE HEALTH CENTER</b></h5>
                        <p><b>A TYPICAL WARD</b></p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container" id="buttons">
            <button onclick="goto_patient_login_page()" style="border: solid 3px white ;" type="button" id="button1" class="btn btn-warning btn-lg">Login As
                Patient</button>
            <button onclick="goto_dr_login_page()" style="border: solid 3px white ;" type="button" id="button2" class="btn btn-danger btn-lg">Login As
                Doctor</button>
            <button onclick="goto_admin_login_page()" style="border: solid 3px white ;" type="button" id="button3" class="btn btn-success btn-lg">Login As
                Admin</button>
        </div>
    </div>

    <footer id="footer" class="page-footer font-large " style=" color:rgb(255, 255, 255) ; background-color: #000000e0;">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h4 class="font-weight-bold text-uppercase mt-3 mb-4">eDOC@IITI</h4>
                    <p>We are always open (24x7) to serve you. If you find any problem, contact us.</p>
                    <p>Postal Address:
                        Health Centre,
                        Indian Institute of Technology Indore
                        Khandwa Road, Simrol, Indore,
                        Pin code 453 552, Madhya Pradesh, India
                    </p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">IIT Indore Useful Links</h5>

                    <ul class="list-unstyled">
                    <li>
                            <a href="https://www.iiti.ac.in/">Visit Official Page</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/maps/place/Health+Center,+IIT+Indore/@22.5257442,75.9265184,15z/data=!4m5!3m4!1s0x0:0xc62fac9439197054!8m2!3d22.5257442!4d75.9265184">On
                                Google-Map</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/search?q=first+aid&oq=first+aid&aqs=chrome.0.0l2j46j0l2j69i60l3.3572j0j4&sourceid=chrome&ie=UTF-8">First-Aid</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->


                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">COVID-19</h5>

                    <ul class="list-unstyled">
                        
                        <li>
                            <a href="https://www.google.com/search?q=covid-19&oq=covid-19&aqs=chrome..69i57j0l7.3330j0j7&sourceid=chrome&ie=UTF-8#wptab=s:H4sIAAAAAAAAAONgVuLVT9c3NMwySk6OL8zJecTozS3w8sc9YSmnSWtOXmO04eIKzsgvd80rySypFNLjYoOyVLgEpVB1ajBI8XOhCvHsYuLIL0stKstMLV_EypGcX5aZomtoCQCktBSudQAAAA">Overview</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/search?q=covid-19&oq=covid-19&aqs=chrome..69i57j0l7.3330j0j7&sourceid=chrome&ie=UTF-8#wptab=s:H4sIAAAAAAAAAONgVuLVT9c3NMwySk6OL8zJecTozS3w8sc9YSmnSWtOXmO04eIKzsgvd80rySypFNLjYoOyVLgEpVB1ajBI8XOhCvHsYuL2SE3MKckILkksKV7EKpicX5Sfl1iWWVRarFAMEgMAoubRkIEAAAA">Statistics</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/search?q=covid-19&oq=covid-19&aqs=chrome..69i57j0l7.3330j0j7&sourceid=chrome&ie=UTF-8#wptab=s:H4sIAAAAAAAAAONgVuLVT9c3NMwySk6OL8zJecTozS3w8sc9YSmnSWtOXmO04eIKzsgvd80rySypFNLjYoOyVLgEpVB1ajBI8XOhCvHsYuL2SE3MKckILkksKV7EKpicX5Sfl1iWWVRarFAMEgMAoubRkIEAAAA">Testings</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/search?q=covid-19&oq=covid-19&aqs=chrome..69i57j0l7.3330j0j7&sourceid=chrome&ie=UTF-8#wptab=s:H4sIAAAAAAAAAONgVuLVT9c3NMwySk6OL8zJecTozS3w8sc9YSmnSWtOXmO04eIKzsgvd80rySypFNLjYoOyVLgEpVB1ajBI8XOhCvHsYuLzSE3MKckIrswtKMnPLV7EKpKcX5Sfl1iWWVRarFAMFQYAHgCUcIcAAAA">Health Info</a>
                        </li>
                       <li>
                            <a href="https://www.google.com/search?q=Coronavirus+coping&oq=covid-19&aqs=chrome..69i57j0l7.3330j0j7&sourceid=chrome&ie=UTF-8&stick=H4sIAAAAAAAAAONgVuLVT9c3NMwySk6OL8zJecTozS3w8sc9YSmnSWtOXmO04eIKzsgvd80rySypFNLjYoOyVLgEpVB1ajBI8XOhCvHsYhLxSE3MKcnwTc0rScwJT83JyUstLl7EKuScX5Sfl1iWWVRarJCcX5CZlw4ArYkPtIsAAAA&ictx=1&ved=2ahUKEwi7-IPc3q_rAhXgzDgGHcv7CGwQyNoBKAR6BAgeEA0
                       ">Coronavirus Coping</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center font-weight-bold mt-3 mb-2">
            <li class="list-inline-item">
                <a href="https://www.facebook.com/ashish.raj.58323" class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://www.google.com" class="btn-floating btn-gplus mx-1">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/ashish-raj-0714151a8/" class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            PUSJPD GROUP
        </div>
        <!-- Copyright -->
    </footer>


    <script>
        function goto_patient_login_page() {
            window.location.href = ("http://localhost/eDOC-IITI-priyal/edoc/p_login.php");
        }

        function goto_dr_login_page() {
            window.location.href = ("http://localhost/eDOC@IITI/login_dr.php");
        }

        function goto_admin_login_page() {
            window.location.href = ("http://localhost/eDOC@IITI/admin_login.php");
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>