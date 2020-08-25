
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
    <title>Patient's List</title>
</head>

<body style="background-color: rgb(209, 209, 209);">
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
                        <a class="nav-link" href="http://localhost/eDOC@IITI/AboutUs.php?logout=true" style="color:white ;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/eDOC-IITI-priyal/edoc/iiti_medical.php" style="color:white ;">Contact Us</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><span
                    style="color: rgb(0, 0, 0);font-size: 30px;font-family: Bahnschrift SemiBold;padding: 10px;">Patient's List</span></li>
        </ol>
    </nav>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="admindashboard.php" class="btn btn-primary">Go to Dashboard</a>
    <table class="table table-bordered table-dark">
  <thead>
    <tr>
    <th scope="col">Patients's ID</th>
    <th scope="col">Patient's Blood group</th>
    <th scope="col">Patient's Hostel</th>  
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Roll no.</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Gender</th>
      <th scope="col">Room No.</th>
      <th scope="col">Medical History</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
      
      $link=mysqli_connect("127.0.0.1","yourName","password");
      $db=mysqli_select_db($link,"edoc");
      $query = "select * from p_profile";
      $data = mysqli_query($link,$query);
      $total = mysqli_num_rows($data);

      if($total!=0)
      {
          while($result=mysqli_fetch_assoc($data))
          {
            $hhh=$result['bg_id'];
            $hos=$result['hostel_id'];
            $dd=$result['patient_id'];
            $queforcid=mysqli_query($link,"SELECT * FROM bloodgroup WHERE  bg_id='$hhh'");
            $row2 = $queforcid->fetch_row();
            $cid = $row2[1] ?? false;
            $queforcidh=mysqli_query($link,"SELECT * FROM hostel WHERE  hostel_id='$hos'");
            $row2h = $queforcidh->fetch_row();
            $cidh = $row2h[1] ?? false;
            $quef=mysqli_query($link,"SELECT * FROM patients WHERE  patient_id='$dd'");
            $row889 = $quef->fetch_row();
            $dg = $row889[4] ?? false;
            $gender1="Male";
            if($result['gender']==1)
                {
                    $gender1="Female";
                }
                else
                {
                    $gender1="Male";
                }

              echo "
              <tr>
              <td>".$result['patient_id']."</td>
              <td>".$cid."</td>
              <td>".$cidh."</td>
              <td>".$result['first_name']."</td>
              <td>".$result['last_name']."</td>
              <td>".$result['email']."</td>
              <td>".$result['roll_number']."</td>
              <td>".$result['contact']."</td>
              <td>".$gender1."</td>
              <td>".$result['room_number']."</td>
              <td>".$result['med_history']."</td>
              <td><a href='updatepatient.php?did=$result[patient_id]&cid=$cid&cidh=$cidh&mh=$result[med_history]&pp=$dg&ln=$result[last_name]&fn=$result[first_name]&eml=$result[email]&cn=$result[contact]&img=$result[roll_number]&gen=$result[gender]&dse=$result[room_number]'>Update</a>
               <br>
              <a href='deletepatient.php?did=$result[patient_id]'>Delete</a></td>
              </tr>       
              ";
          }
      }

  ?>
  </tbody>
</table>
    
    
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