<?php

$link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        $doctorid=$_GET['did'];
        $fn=$_GET['fn'];
        $ln=$_GET['ln'];
        $ttt=$_GET['tt'];
        $categor=$_GET['cid'];
        $de=$_GET['dse'];

?>

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
    <title>Update Appointments</title>
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
                    style="color: rgb(0, 0, 0);font-size: 30px;font-family: Bahnschrift SemiBold;padding: 10px;">Update Appointments
                    </span></li>
        </ol>
    </nav>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="viewbookings.php" class="btn btn-primary">Check Updated version</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="admindashboard.php" class="btn btn-primary">Go to Dashboard</a>
<form method="POST" style="width: 700px;margin-left: 400px;margin-bottom: 20px;margin-top: 20px; ">
  <div class="form-row">

  <div class="form-group">
  <div class="form-group col-md-4">
      <label for="Category">Doctor's Category</label>
      <select id="Category" class="form-control" name="Category">
        <option>Cardiology</option>
        <option>Dentistry</option>
        <option>E. N. T.</option>
        <option>Gynaecology</option>
        <option>Medicine</option>
        <option>Neurologist</option>
        <option>Neurology</option>
        <option>Obstetrics & Gynaecology</option>
        <option>Ophthalmology</option>
        <option>Orthopedics</option>
        <option>Paediatrics</option>
        <option>Psychiatry</option>
        

      </select>
    </div>
    <div>
    <label for="r">Rank</label>
    <input type="number" class="form-control" id="r" name="r">
  </div>
  <div>
    <label for="d">Date</label>
    <input type="date" class="form-control" id="d" name="d">
  </div>
  <div>
    <label for="t">Time</label>
    <input type="time" class="form-control" id="t" name="t">
  </div>
  <div class="form-group">
    <label for="Description">Description</label>
    <textarea class="form-control" id="Description" rows="3" name="Description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" id="submit" name="submit" >Update</button>
</form>
<script>

document.getElementById("Description").value = "<?php echo "$de" ?>";
document.getElementById("Category").value = "<?php echo "$categor" ?>";
document.getElementById("d").value = "<?php echo "$gend" ?>";
document.getElementById("t").value = "<?php echo "$ttt" ?>";
document.getElementById("r").value = "<?php echo "$ln" ?>";

</script>
<?php

$error='';

if(isset($_POST['submit'])){
    if(empty($_POST['d'])||empty($_POST['t'])||empty($_POST['r'])||empty($_POST['Category'])||empty($_POST['Description'])){
        $error="Please Enter All The Details";
    }
    else{
        
        $rank=$_POST['r'];
        $date=$_POST['d'];
        $time=$_POST['t'];
        $category=$_POST['Category'];
        $description=$_POST['Description'];
        $link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        
        $queforcid=mysqli_query($link,"SELECT * FROM category WHERE  name_='$category'");
        $row2 = $queforcid->fetch_row();
        $cid = $row2[0] ?? false;
            
            $sql = "UPDATE booking SET category_id='$cid', rank='$rank', date='$date', time='$time', description='$description' WHERE p_profile_id='$doctorid'";
            if(mysqli_query($link, $sql)){

                $error = '<div class="alert alertsuccess">
                Data Updated successfully </div>';
                
                }else{
                $error = '<div class="alert alertwarning">
                ERROR: Unable to excecute: ' .$sql. '. ' .
                mysqli_error($link). '</div>';
                }
                
                
           
 
    }
}

?>
<div class="alert" role="alert" >
  <span style="text-align: center; font-size: 20px; "><?php  echo $error; ?></span>
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