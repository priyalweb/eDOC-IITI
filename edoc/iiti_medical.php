<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IITI Health Center</title>
<link rel="stylesheet" href="css/style1.css">
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Loading icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
background-color: aliceblue;
    margin: 4%;
    margin-top: 2%;
    /* background-image: url(img/background5.jpg);
    background-repeat: no-repeat;
    background-size: cover; */

}

.navbar {
  width: 80%;
      background-color: rgb(8 112 137 / 0.5);
    overflow: auto;
    padding-top: 0;
    padding-bottom: 0;
    margin: auto;
    margin-bottom: 4%;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}



.active,#x {
        background-color: #164108;
}

.navbar a:hover ,#x:hover {
  background-color: #000;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}


/* The Modal (background) */
.modal1,.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 150%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal1-content,.modal2-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  margin-top: 10%;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close1,.close2 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus,
.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal1-header,.modal2-header {
  padding: 2px 16px;
  background-color: #000000;
  color: white;
}

.modal1-body,.modal2-body {padding: 2px 16px;
color: black;
    background-image: linear-gradient(to right, rgb(8 112 137 / 0.5) , white);
    font-width: 800;
    font-weight: 700;
    font-size: x-large;
}

.modal1-footer,.modal2-footer {
  padding: 2px 16px;
  background-color: #000000;
  color: white;
}
#myBtn1,#myBtn2 {
      background-color: #164108;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

header > h2{
	text-align: center;
	    font-weight: 700;
    font-size: xx-large;
        display: inline-block;
    margin: 0 auto;
    margin-left: 39%;
    background-color: #087089cc;
    color: white;
    padding: 0.5%;
    border-radius: 8%;
}
header > p{
	text-align: center;
	/*    font-weight: 700;
    font-size: xx-large;*/
    font-family: inherit;
    font-size: 18px;
    /* color: #ececec; */
margin-left: 5%;
margin-right: 5%;
}



* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
      border: solid #aeb4b2;
    border-width: 5px 16px;
    border-top-style: dotted;
    border-right-style: solid;
    border-bottom-style: dotted;
    border-left-style: solid;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

</style>
</head>
<body>

<header>
	<h2>IITI Health Center</h2>
<p>The Health Centre of the Indian Institute of Technology Indore provides dedicated health services to the institute community comprising of students, employees, their dependents and Institute Guests. The Health Centre offers Outpatient, Day care, Trauma and Emergency Care.</p>

</header>

<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#">
  	<!-- <h2>Animated Modal with Header and Footer</h2> -->

		<!-- Trigger/Open The Modal -->
		<button id="myBtn1"><i class="fa fa-fw fa-envelope"></i> Contact Information</button>

		<!-- The Modal -->
		<div id="myModal1" class="modal1">

		  <!-- Modal content -->
		  <div class="modal1-content">
			    <div class="modal1-header">
			      <span class="close1">&times;</span>
			      <h2>Contact Us</h2>

			    </div>
					    <div class="modal1-body">
					      <pre>
Contact Information:
Phone: Phone: +91 731 2438787
+91 731 2438700 Ext. No. 787 / 987 / 552
Ambulance Contact No. : +91-7509062832</pre>
					      <p>
					      </p>
					    </div>
			    <div class="modal1-footer">
			      <h4>Email: healthcentre@iiti.ac.in</h4>
			    </div>
			  </div>

		</div>

		<script>
		// Get the modal
		var modal1 = document.getElementById("myModal1");

		// Get the button that opens the modal
		var btn1 = document.getElementById("myBtn1");

		// Get the <span> element that closes the modal
		var span1 = document.getElementsByClassName("close1")[0];

		// When the user clicks the button, open the modal
		btn1.onclick = function() {
		  modal1.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span1.onclick = function() {
		  modal1.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal1 || event.target == modal2) {
		    modal1.style.display = "none";
		    modal2.style.display = "none";
		  }
		}
		</script>
  </a>

  <a href="#">
  			<!-- Trigger/Open The Modal -->
		<button id="myBtn2"><i class="fa fa-fw fa-envelope"></i> Postal Address</button>

		<!-- The Modal -->
		<div id="myModal2" class="modal2">

		  <!-- Modal content -->
		  <div class="modal2-content">
		    <div class="modal2-header">
		      <span class="close2">&times;</span>
		      <h2>Contact Us</h2>

		    </div>
		    <div class="modal2-body">
		      <pre>
Postal Address:
Health Centre,
Indian Institute of Technology Indore
Khandwa Road, Simrol, Indore,
Pin code 453 552, Madhya Pradesh, India</pre>
		      <p>
		      </p>
		    </div>
		    <div class="modal2-footer">
		      <h4>Email: healthcentre@iiti.ac.in</h4>
		    </div>
		  </div>

		</div>

		<script>
		// Get the modal
		var modal2 = document.getElementById("myModal2");

		// Get the button that opens the modal
		var btn2 = document.getElementById("myBtn2");

		// Get the <span> element that closes the modal
		var span2 = document.getElementsByClassName("close2")[0];

		// When the user clicks the button, open the modal
		btn2.onclick = function() {
		  modal2.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span2.onclick = function() {
		  modal2.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal2 || event.target == modal1) {
		    modal2.style.display = "none";
		    modal1.style.display = "none";
		  }
		}
		</script>
  </a>
  <a href="http://people.iiti.ac.in/~medical/facility.php" id="x"><i class="fa fa-fw fa-search"></i> More Info</a>
<!--   <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a> -->
</div>

<!-- <h2 style="text-align:center">Slideshow Gallery</h2> -->

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="img/health1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="img/health2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="img/health4.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="img/health3.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="img/health5.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="img/health6.jpg" style="width:100%">
  </div>

  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="img/health1.jpg" style="width:100% " onclick="currentSlide(1)" >
    </div>
    <div class="column">
      <img class="demo cursor" src="img/health2.jpg" style="width:100%"  onclick="currentSlide(2)" >
    </div>
    <div class="column">
      <img class="demo cursor" src="img/health4.jpg" style="width:100%;height: 89%;" onclick="currentSlide(3)" >
    </div>
    <div class="column">
      <img class="demo cursor" src="img/health3.jpg" style="width:100%" style="height:80%" onclick="currentSlide(4)" >
    </div>
    <div class="column">
      <img class="demo cursor" src="img/health5.jpg" style="width:100%" onclick="currentSlide(5)" >
    </div>
    <div class="column">
      <img class="demo cursor" src="img/health6.jpg" style="width:100%;height: 89%" onclick="currentSlide(6)" >
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</body>
</html>
<?php require_once 'footer.php'; ?>
