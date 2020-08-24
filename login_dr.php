<?php
require('config.php');
session_start();


if (isset($_POST['submit'])) {
	if ((isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		$sqlEmail = "SELECT * FROM `doctors` WHERE d_email = '$email' AND d_password = '$password'";
		$rs = mysqli_query($conn, $sqlEmail);

		$numRows = mysqli_num_rows($rs);


		if ($numRows) {
			$row = mysqli_fetch_assoc($rs);

			if ($_POST['email'] == $row['d_email'] &&  $_POST['password'] == $row['d_password']) {
				$_SESSION['doctor_id'] = $row['doctor_id'];
				$_SESSION['d_name'] = $row['d_name'];
				$_SESSION['d_name'] = $row['d_name'];

				header('location:dashboard.php');
				exit;
			} else {
				$errorMsg =  "Wrong Email Or Password";
			}
		} else {
			$errorMsg =  "No User Found with such credentials";
		}
	}
}
?>

<?php
if (isset($errorMsg)) {
	echo "<div class='error-msg'>";
	echo $errorMsg;
	echo "</div>";
	unset($errorMsg);
}
?>
<?php
if (isset($_GET['logout'])) {
	echo "<div class='success-msg'>";
	echo "You have successfully logout";
	echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor_Login_Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="https://kit.fontawesome.com/c7565cd913.js" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<link rel="stylesheet" href="dr_login_style.css">
	<script src="https://kit.fontawesome.com/c7565cd913.js" crossorigin="anonymous"></script>

	<style>
		body {
			background-color:pink ; 
		}

		.navbar-nav {
			margin-left: auto;
		}

		#footer {
			
			position: absolute;
			margin-top: 850px;
			width: 100%;
		}

		#logincontainer {

			position: relative;
			top: -620px;
			left: 230px;
			background-color: rgb(255, 255, 255);
			width: 650px;
			height: 400px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-width: 4px;
			border-radius: 4px;
			
		}
		#doctor_image{
			position: absolute;
			top: 70px;
			width: 100%;
			left: 195px;
			    background-color:hotpink;
				height: 770px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

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

<div class="container" id="doctor_image">
	<img src="images/doctor_login_picfinal.jpg" alt="doctor_loginpage_image">
	<div class="container" id="logincontainer">
		<div style="text-align: center;">
			<h1>HELLO DOCTOR!</h1>
			<h3>PLEASE LOGIN TO SEE YOUR APPOINTMENTS </h3>
		</div>
		<br>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
			<div class="form-group">
				<label for="user">Email:</label>
				<input type="email" class="form-control" id="user" placeholder="Enter Email" name="email">
			</div>
			<div class="form-group">
				<label for="pass">Password:</label>
				<input type="password" class="form-control" id="pass" placeholder="Enter password" name="password">
			</div>

			<button type="submit" class="btn btn-success" name="submit">LOG-IN</button>
			<button onclick="gobackto_index_page()" type="button" id="go_back_btn_dr_myappoints" class="btn btn-danger">CANCEL</button>

		</form>
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
		function gobackto_index_page() {
			window.location.href = ("http://localhost/eDOC@IITI/index.php?logout=true");
		}
	</script>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>