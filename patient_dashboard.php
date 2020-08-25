<?php
require_once "pdo.php";
require_once "util.php";
session_start();

if ( ! isset($_SESSION['patient_id']) || ! isset($_SESSION['p_name']) ) {
    die('ACCESS DENIED');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Album example · Bootstrap</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/patient_dash.css" rel="stylesheet">
  </head>
<?php require_once "header.php"; ?>

  <body style="background-color: aliceblue;font-family: Arial, Helvetica, sans-serif;font-size: 16px;">
<main role="main">

  <section class="jumbotron text-center" style="padding: 1%; background-color: rgb(217 237 255);">
    <div class="container">
      <h1 style="font-weight: 800;"><strong>Patient Dashboard</strong></h1>
      <br>

      <h3  style="margin-left: 0%;margin-bottom: 2%; display:inline-block;">Welcome
      <?php
      echo("<h3 style='color:#2a66ba;; display:inline-block;margin-left: 10px'>");
      echo(htmlentities($_SESSION['p_name']));
      echo("</h3>") ?> </h3>
    </div>
  </section>
<?php flashMessages(); ?>
  <div class="album py-5 bg-light"   style="background:linear-gradient(aliceblue 0%,aliceblue 100%);" >
    <div class="container">


      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="border: 8px solid rgb(146 255 251 / 34%);border-width: 1px 10px 10px 1px;">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="1" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><img src="img/personal3.jpg" height="300px" >
              <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <h2>Add Your Details (*only once!)</h2>
              <p class="card-text">Enter your personal details,it will be useful for medical diagnosis. Don't worry your details are safe with us.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <?php  $logout = 'p_logout.php';
                  echo(' <a href="'.$logout.'" ><button style="padding: 10% 18%; font-weight: 600;font-size: 16px;color: #050505;background-color: #ff00008c;border width: 5;border-style: solid;
                  border-width: 1px 3px 3px 1px;" type="button" class="btn btn-sm btn-outline-secondary">LOGOUT</button></a> ')?>
                  <?php $add = 'p_add.php';
                  echo(' <a href="'.$add.'" ><button style="padding: 12% 44%;font-weight: 600;font-size: 16px;color: #050505;background-color: #21e6167a;
                  border width: 5;border-style: solid;border-width: 1px 3px 3px 1px;margin-left: 70%;" type="button" class="btn btn-sm btn-outline-secondary"> ADD</button></a> ')?>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="border: 8px solid rgb(146 255 251 / 34%);border-width: 1px 10px 10px 1px;">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><img src="img/booking2.jpg" height="300px">
              <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <h2>Book Your Appointment</h2>
              <p class="card-text">Fill out some details and book your medical Appointments here. We will get back to you as soon as possible.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <?php  $logout = 'p_logout.php';
                  echo(' <a href="'.$logout.'" ><button style="padding: 10% 18%; font-weight: 600;font-size: 16px;color: #050505;background-color: #ff00008c;border width: 5;border-style: solid;
                  border-width: 1px 3px 3px 1px;" type="button" class="btn btn-sm btn-outline-secondary">LOGOUT</button></a> ')?>

                  <?php
                  $patient_id1 = false;
                  $stmt = $pdo->prepare('SELECT patient_id,p_profile_id FROM
                        P_Profile WHERE patient_id = :patient_id');
                  $stmt->execute(array(':patient_id' => $_SESSION['patient_id'] ));
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  if ( $row !== false ) {
                    $patient_id1 = $row['patient_id'];
                    echo(' <a href="p_book.php?p_profile_id='.$row['p_profile_id'].'" style="margin-left: 15%;"><button style="padding: 11% 39%;font-weight: 600;font-size: 16px;color: #050505;background-color: #21e6167a;
                    border width: 5;border-style: solid;border-width: 1px 3px 3px 1px;margin-left: 45%;" type="button" class="btn btn-sm btn-outline-secondary">BOOK</button></a> ');
                  }
                  if ( $patient_id1 === false ) {
                    echo(' <a href="#" ><button onclick="myFunction()" style="padding: 11% 39%;font-weight: 600;font-size: 16px;color: #050505;background-color: #21e6167a;
                    border width: 5;border-style: solid;border-width: 1px 3px 3px 1px;margin-left: 45%;" type="button" class="btn btn-sm btn-outline-secondary">BOOK</button></a> ');
                  }
                  ?>
<script>
function myFunction() {
  alert("Please add your personal details first!");
}
</script>  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="border: 8px solid rgb(146 255 251 / 34%);border-width: 1px 10px 10px 1px;">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><img src="img/view.jpg" height="300px">
              <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <h2>View Your Appointments</h2>
              <p class="card-text">Did you just book an appointment? View appointment details and time scheduled for you here.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <?php  $logout = 'p_logout.php';
                  echo(' <a href="'.$logout.'" ><button style="padding: 10% 18%; font-weight: 600;font-size: 16px;color: #050505;background-color: #ff00008c;border width: 5;border-style: solid;
                  border-width: 1px 3px 3px 1px;" type="button" class="btn btn-sm btn-outline-secondary">LOGOUT</button></a> ')?>
  <?php
                  $patient_id1 = false;
                  $stmt = $pdo->prepare('SELECT patient_id,p_profile_id FROM
                        P_Profile WHERE patient_id = :patient_id');
                  $stmt->execute(array(':patient_id' => $_SESSION['patient_id'] ));
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  if ( $row !== false ) {
                    $patient_id1 = $row['patient_id'];
                    echo(' <a href="p_view.php?p_profile_id='.$row['p_profile_id'].'" ><button style="padding: 11% 39%;font-weight: 600;font-size: 16px;color: #050505;background-color: #21e6167a;
                    border width: 5;border-style: solid;border-width: 1px 3px 3px 1px;margin-left: 45%;" type="button" class="btn btn-sm btn-outline-secondary">VIEW</button></a> ');
                  }
                  if ( $patient_id1 === false ) {
                    echo(' <a href="#" ><button onclick="myFunction()" style="padding: 11% 39%;font-weight: 600;font-size: 16px;color: #050505;background-color: #21e6167a;
                    border width: 5;border-style: solid;border-width: 1px 3px 3px 1px;margin-left: 45%;" type="button" class="btn btn-sm btn-outline-secondary">VIEW</button></a> ');
                  }
                  ?>
<script>
function myFunction() {
  alert("Please add your personal details first!");
}
</script></div>
              </div>
            </div>
          </div>
        </div>


    </div>
  </div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
<?php require_once "footer.php"; ?>
