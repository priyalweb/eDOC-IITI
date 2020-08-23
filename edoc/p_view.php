<?php
require_once "pdo.php";
require_once 'util.php';
session_start();
if ( ! isset($_SESSION['patient_id']) ){
    die('ACCESS DENIED');
    return;
}
if ( ! isset($_GET['p_profile_id']) ) {
  $_SESSION['error'] = "Missing p_profile_id";
  header('Location: patient_dashboard.php');
  return;
}
$stmt = $pdo->prepare("SELECT * FROM P_Profile JOIN Bloodgroup JOIN Hostel ON p_profile.bg_id = bloodgroup.bg_id AND p_profile.hostel_id = hostel.hostel_id
  WHERE p_profile_id = :xyz AND patient_id = :what");
$stmt->execute(array(":xyz" => $_GET['p_profile_id'],
       ':what' => $_SESSION['patient_id'] ));
$profile = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $profile === false ) {
    $_SESSION['error'] = 'Bad value for p_profile_id';
    header( 'Location: patient_dashboard.php' ) ;
    return;
}
$appointments = loadApp($pdo, $_REQUEST['p_profile_id']);
?>
<!DOCTYPE html>
<html>
<head>
<title>Priyal Dubey's Appointments View</title>
<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
<link rel="stylesheet" type="text/css" href="css/view.css">
</head>
<body style="background-color: aliceblue;">
<?php
flashMessages();
?>
<div class="container viewc">
<h1  style="margin-left: 15%;margin-bottom: 2%; display:inline-block;">Profile Details for
<?php
echo("<h1 style='color:#2a66ba;; display:inline-block;margin-left: 10px'>");
echo(htmlentities($_SESSION['p_name']));
echo("</h1>") ?> </h1>
<?php flashMessages(); ?>
<?php
$ff = htmlentities($profile['first_name']);
$ll = htmlentities($profile['last_name']);
$ee = htmlentities($profile['email']);
$rr = htmlentities($profile['roll_number']);
$cc = htmlentities($profile['contact']);
$gg = htmlentities($profile['gender']);
$rrrr = htmlentities($profile['room_number']);
$mmmm = htmlentities($profile['med_history']);
$bb = htmlentities($profile['bloodgroup']);
$hh = htmlentities($profile['hostel_name']);
$p_profile_id = $profile['p_profile_id'];

?>
<form method="post" action="p_edit.php" style="font-size: 20px;font-weight: 600; background-color: #dcebf7;padding: 1%;" action="p_add.php"
onsubmit="document.getElementById('myButton').disabled=true; document.getElementById('myButton').value='Submitting, please wait...';">
  <input type="hidden" name="p_profile_id"
value="<?= htmlentities($_REQUEST['p_profile_id']); ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"/>
  <details open>
      <summary style="    padding: 2%;background-color: #acdaff7a;border-radius: 5%;font-size: 18px; margin-bottom: 8%; margin-top: 2%;
      background: linear-gradient(#165e97a6 0%,aliceblue 100%);">View your personal details</summary>
  Patient Details:<br>
  <div style="border-style: dotted;padding: 1%;border-color: #737a80;border-width: medium;padding-bottom: 0;margin-bottom: 1%;margin-top: 1%;background-color: #acdaff7a;">
   <p>
   First Name:
   <input type="text" readonly name="first_name" class="fn" size="60"
   value="<?= $ff ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Last Name:
   <input type="text" readonly name="last_name" class="ln" size="60"
   value="<?= $ll ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Email:
   <input type="text" readonly name="email" class="em" size="30"
   value="<?= $ee ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Roll Number:
   <input type="text" readonly name="roll_number" class="rolln" size="50"
   value="<?= $rr ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Contact:
   <input type="text" readonly name="contact" class="cn" size="60"
   value="<?= $cc ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Bloodgroup:
   <input type="text" readonly name="bloodgroup" class="bg" size="30"
   value="<?= $bb ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <span>Gender:</span><p style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto; display:inline-block;margin-left: 4%;padding: 0% 4% 0% 4%;    margin-bottom: 1.5%;">
   <input type="radio" readonly name="gender" class="ge" <?php if($profile['gender']=="1"){echo "checked";}?> value="1" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;">Female
   <input type="radio" readonly name="gender" class="ge" <?php if($profile['gender']=="0"){echo "checked";}?> value="0" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;">Male
   </p>
   <p>Hall of Residence:
   <input type="text" readonly name="hostel_name" class="hn" size="50"
   value="<?= $hh ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Room Number:
   <input type="text" readonly name="room_number" class="roomn" size="50"
   value="<?= $rrrr ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"></p>
   <p>Medical History:<br/>
   <textarea name="med_history" readonly rows="9" cols="60" class="med" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"><?= $mmmm ?></textarea></p>
</div>
  </details>
 </form>
 <br><hr>
 <h2 style="margin-left: 10%;margin-bottom: 2%;margin-right: 50%;">Your Appointments</h2>
<table>
  <thead>
  <tr>
    <th>Appointment Number</th><th>Category</th><th>Date of appointment</th><th>Time of appointment</th><th>Description</th>
  </tr>
</thead>
  <tbody>
    <?php
    $countApp =0;
foreach($appointments as $appointment ){
      $countApp++;
      echo('<tr>');
      echo('<td>');
      echo(htmlentities($appointment['rank']));
      echo('</td>');
      echo('<td>');
      echo(htmlentities($appointment['name']));
      echo('</td>');
      echo('<td>');
      echo(htmlentities($appointment['date']));
      echo('</td>');
      echo('<td>');
      echo(htmlentities($appointment['time']));
      echo('<td>');
      echo(htmlentities($appointment['description']));
      echo('</td></tr> ');
  }
  echo('</tbody>');
?>
  </table>
<a  href='patient_dashboard.php'>
        <button style="margin-left: 70%;margin-top: 5%;border-style: solid;border-width: 1px 1px 4px 4px;border-color: #565656;" class="addbutton">
            DONE
        </button>
    </a>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>
<?php require_once "footer.php"; ?>
