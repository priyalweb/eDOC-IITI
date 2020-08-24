
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/c7565cd913.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        .navbar-nav {
            margin-left: auto;
        }
    </style>
    <title>Admin Login</title>
</head>

<body style="background-color: rgb(209, 209, 209);">
    <header>
        <nav class="navbar navbar-expand-lg  sticky-top " class="navbar navbar-light"
            style="background-color: #05385c;">
            <a class="navbar-brand" href="#"><i class="fas fa-passport"></i>eDOC@IITI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" class="navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><span
                    style="color: rgb(0, 0, 0);font-size: 30px;font-family: Bahnschrift SemiBold;padding: 10px;">Welcome
                    Admin, Please Log In :</span></li>
        </ol>
    </nav>
    <table class="table table-bordered table-dark">
  <thead>
    <tr>
    <th scope="col">Doctor's ID</th>  
    <th scope="col">Doctor's Category</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Image</th>
      <th scope="col">Gender</th>
      <th scope="col">Description</th>
      <th scope="col" >Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
      
      $link=mysqli_connect("127.0.0.1","yourName","password");
      $db=mysqli_select_db($link,"edoc");
      $query = "select * from d_profile";
      $data = mysqli_query($link,$query);
      $total = mysqli_num_rows($data);

      if($total!=0)
      {
          while($result=mysqli_fetch_assoc($data))
          {
            $hhh=$result['category_id'];
            $dd=$result['doctor_id'];
            $queforcid=mysqli_query($link,"SELECT * FROM category WHERE  category_id='$hhh'");
            $row2 = $queforcid->fetch_row();
            $cid = $row2[1] ?? false;
            $quef=mysqli_query($link,"SELECT * FROM doctors WHERE  doctor_id='$dd'");
            $row889 = $quef->fetch_row();
            $dg = $row889[4] ?? false;

              echo "
              <tr>
              <td>".$result['doctor_id']."</td>
              <td>".$cid."</td>
              <td>".$result['first_name']."</td>
              <td>".$result['last_name']."</td>
              <td>".$result['email']."</td>
              <td>".$result['contact_number']."</td>
              <td>".$result['image_']."</td>
              <td>".$result['gender']."</td>
              <td>".$result['description_']."</td>
              <td><a href='updatedoctor.php?did=$result[doctor_id]&cid=$cid&pp=$dg&ln=$result[last_name]&fn=$result[first_name]&eml=$result[email]&cn=$result[contact_number]&img=$result[image_]&gen=$result[gender]&dse=$result[description_]'>Update</a>
               <br>
              <a href='deletedoctor.php?did=$result[doctor_id]'>Delete</a></td>
              </tr>       
              ";
          }
      }

  ?>
  </tbody>
</table>
    
    
    <footer class="page-footer font-large " style=" color:rgb(255, 255, 255) ; background-color: #000000e0;">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h4 class="font-weight-bold text-uppercase mt-3 mb-4">EDOC@IITI</h4>
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
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Useful Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a
                                href="#https://www.google.com/maps/place/Health+Center,+IIT+Indore/@22.5257442,75.9265184,15z/data=!4m5!3m4!1s0x0:0xc62fac9439197054!8m2!3d22.5257442!4d75.9265184">On
                                Google-Map</a>
                        </li>
                        <li>
                            <a
                                href="#https://www.google.com/search?q=first+aid&oq=first+aid&aqs=chrome.0.0l2j46j0l2j69i60l3.3572j0j4&sourceid=chrome&ie=UTF-8">First-Aid</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->


                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">IIT Indore</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#https://www.iiti.ac.in/">Visit Official Page</a>
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
                <a class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            CodeBreakers
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>