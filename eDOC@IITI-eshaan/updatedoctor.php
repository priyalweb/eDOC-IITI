<?php

$link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        $doctorid=$_GET['did'];
        $fn=$_GET['fn'];
        $ln=$_GET['ln'];
        $categor=$_GET['cid'];
        $em=$_GET['eml'];
        $cc=$_GET['cn'];
        $im=$_GET['img'];
        $gend=$_GET['gen'];
        $de=$_GET['dse'];
        $dgp=$_GET['pp'];

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
    <title>Admin Login</title>
</head>

<body style="background-color: rgb(209, 209, 209);">
    <header>
        <nav class="navbar navbar-expand-lg  sticky-top " class="navbar navbar-light"
            style="background-color: #05385c;">
            <a class="navbar-brand" href="#"><i class="fas fa-passport"></i> EDOC@IITI</a>
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
<form method="POST" style="width: 700px;margin-left: 400px;margin-bottom: 20px;margin-top: 20px; ">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="d_email">Email</label>
      <input type="email" class="form-control" id="d_email" name="d_email" value="<?php echo "$em" ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="d_password">Doctor's Password</label>
      <input type="text" class="form-control" id="d_password" name="d_password" >
    </div>
  </div>
  <div class="form-group">
    <label for="FN">First Name</label>
    <input type="text" class="form-control" id="FN" name="FN" value="<?php echo "$fn" ?>">
  </div>

  <div class="form-group">
    <label for="LN">Last Name</label>
    <input type="text" class="form-control" id="LN" name="LN" value="<?php echo "$ln" ?>">
  </div>
  <div class="form-group">
    <label for="img">Image</label>
    <input type="text" class="form-control" id="img" name="img" value="<?php echo "$im" ?>">
  </div>
  <div class="form-group">
    <label for="CN">Contact Number</label>
    <input type="tel" class="form-control" id="CN" name="CN">
  </div>
    <div class="form-group col-md-4">
      <label for="Category">Category</label>
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
    <div class="form-group col-md-4">
      <label for="Gender">Gender</label>
      <select id="Gender" class="form-control" name="Gender">
        <option>Male</option>
        <option>Female</option>
      </select>
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
document.getElementById("Gender").value = "<?php echo "$gend" ?>";
document.getElementById("CN").value = "<?php echo "$cc" ?>";
document.getElementById("d_password").value = "<?php echo "$dgp" ?>";

</script>
<?php

$error='';

if(isset($_POST['submit'])){
    if(empty($_POST['d_email'])||empty($_POST['d_password'])||empty($_POST['FN'])||empty($_POST['LN'])||empty($_POST['CN'])||empty($_POST['img'])||empty($_POST['Category'])||empty($_POST['Gender'])||empty($_POST['Description'])){
        $error="Please Enter All The Details";
    }
    else{
        $email=$_POST['d_email'];
        $password=$_POST['d_password'];
        $firstname=$_POST['FN'];
        $lastname=$_POST['LN'];
        $image=$_POST['img'];
        $category=$_POST['Category'];
        $gender=$_POST['Gender'];
        $cn=$_POST['CN'];
        $description=$_POST['Description'];
        $link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        
            $queforchem=mysqli_query($link,"SELECT * FROM doctors WHERE  d_email='$email'");
            
            $sql = "UPDATE doctors SET d_name='$firstname', d_email='$email', d_password='$password' WHERE doctor_id='$doctorid'";
            if(mysqli_query($link, $sql)){

                $error = '<div class="alert alertsuccess">
                Data Updated successfully </div>';
                
                }else{
                $error = '<div class="alert alertwarning">
                ERROR: Unable to excecute: ' .$sql. '. ' .
                mysqli_error($link). '</div>';
                }
                $quefordid=mysqli_query($link,"SELECT * FROM doctors WHERE  d_email='$email'");
                $row1 = $quefordid->fetch_row();
                $did = $row1[0] ?? false;
                $queforcid=mysqli_query($link,"SELECT * FROM category WHERE  name_='$category'");
                $row2 = $queforcid->fetch_row();
                $cid = $row2[0] ?? false;
                $sql1 = "UPDATE d_profile SET category_id='$cid', first_name='$firstname', last_name='$lastname', email='$email', contact_number='$cn', image_='$image', gender='$gender', description_='$description' WHERE doctor_id='$doctorid'";     
                if(mysqli_query($link, $sql1)){


                    $error = '<div class="alert alertsuccess">
                    Data Updated successfully </div>';
                    
                    }else{
                    $error = '<div class="alert alertwarning">
                    ERROR: Unable to excecute: ' .$sql. '. ' .
                    mysqli_error($link). '</div>';
                    }
           
 
    }
}
echo $error;
?>

    
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