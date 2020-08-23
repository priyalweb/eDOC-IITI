<?php
require_once 'pdo.php';
require_once 'util.php';
session_start();
if ( ! isset($_SESSION['patient_id']) ){
    die('ACCESS DENIED');
    return;
}
if ( isset($_POST['cancel'] ) ) {
    header('Location: patient_dashboard.php');
    return;
}
if ( ! isset($_REQUEST['p_profile_id']) ) {
  $_SESSION['error'] = "Missing p_profile_id";
  header('Location: patient_dashboard.php');
  return;
}
$stmt = $pdo->prepare('SELECT * FROM P_Profile JOIN Bloodgroup JOIN Hostel ON p_profile.bg_id = bloodgroup.bg_id AND p_profile.hostel_id = hostel.hostel_id
  WHERE p_profile_id = :ppid AND patient_id = :pid');
$stmt->execute(array(":ppid" => $_REQUEST['p_profile_id'],
       ':pid' => $_SESSION['patient_id'] ));
$profile = $stmt->fetch(PDO::FETCH_ASSOC);
if ($profile === false){
    $_SESSION['error'] = 'Could not load profile';
    header( 'Location: patient_dashboard.php' ) ;
    return;
}
if ( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
     && isset($_POST['roll_number']) && isset($_POST['contact']) && isset($_POST['room_number'])
     && isset($_POST['med_history'])  && isset($_POST['bloodgroup'])  && isset($_POST['hostel_name']) ){
    $msg = validateProfile();
    if ( is_string($msg) ){
      $_SESSION['error'] = $msg;
      header("Location: p_book.php?p_profile_id=".$_REQUEST["p_profile_id"]);
      return;
    }
  $msg2 = validateApp();
    if ( is_string($msg2) ){
      $_SESSION['error'] = $msg2;
      header('Location: p_book.php?p_profile_id='.$_REQUEST["p_profile_id"]);
      return;
    }
       $stmt = $pdo->prepare('DELETE FROM Booking
              WHERE p_profile_id= :ppid');
       $stmt ->execute(array(':ppid' => $_REQUEST['p_profile_id']));

       //insert the education enteries
        insertBookings($pdo, $_REQUEST['p_profile_id']);

        $_SESSION['success'] = 'Appointment booking successful!';
        header("Location: patient_dashboard.php");
        return;
}
$appointments = loadApp($pdo, $_REQUEST['p_profile_id']);
?>
<!DOCTYPE html>
<html>
<head> <title>Priyal Dubey Profile Edit</title>
<?php require_once "head.php"; ?>
<?php require_once "header.php"; ?>
</head>
<body style="background-color: aliceblue;">
<div class="container editc">
  <h1 style="margin-left: 15%;margin-bottom: 2%; display:inline-block;">Booking appointment for
  <?php
  echo("<h1 style='color:#2a66ba;; display:inline-block;margin-left: 10px'>");
  echo(htmlentities($_SESSION['p_name']));
  echo("</h1>") ?> </h1>
  <?php flashMessages(); ?>
<?php
// p_profile_id	patient_id	first_name	last_name	email	roll_number	contact	gender	room_number	med_history
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
//$profile_id = $profile['profile_id'];
?>
<form method="post" action="p_book.php" style="font-size: 20px;font-weight: 600; background-color: #dcebf7;padding: 1%;" 
onsubmit="document.getElementById('myButton').disabled=true; document.getElementById('myButton').value='Submitting, please wait...';">
  <input type="hidden" name="p_profile_id"
  value="<?= htmlentities($_REQUEST['p_profile_id']); ?>" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"/>
<details>
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
       <textarea name="med_history" readonly rows="3" cols="70" class="med" style="border: 0;background-color: #b2ecff;padding: 2px;display: inline-block;margin: 0;width: auto;"><?= $mmmm ?></textarea></p>
      </div>
</details>
<p>Appointment: <input type="submit" id="addApp" value="Click here to BOOK" style="background-color: #21e6167a;font-size: 15;padding-bottom: 1.5%;padding-top: 1.5%;
margin-right: 4%;    margin-left: 5%;" onclick="return confirm('Do you want to add an appointment?');">
<input type="submit" class="cancelbutton" name="cancel" value="Go back" style="background-color: #7e7d7d8c;font-size: 15;
 padding-bottom: 1.5%;padding-top: 1.5%;  margin-left: 15%;">
<div id="app_fields">
</div>
</p>
<?php
$countApp = 0;
echo(' <details>
    <summary style="    padding: 2%;background-color: #acdaff7a;border-radius: 5%;font-size: 18px; margin-bottom: 2%;    margin-top: 10%;
    background: linear-gradient(#165e97a6 0%,aliceblue 100%);">View your previously booked Appointments:</summary> ');
echo('<p><div style="border-style: dotted;padding: 1%;border-color: #737a80;border-width: medium;padding-bottom: 0;margin-bottom: 1%;background-color: #acdaff7a;">'."\n");
if ( count($appointments) >0 ){
  foreach ($appointments as $appointment ) {
    $countApp++;
    echo('<div id="app'.$countApp.'">');
    echo('
    <h2><input style="border: 0;background-color: #0c8cff47;text-align: center;font-variant: all-small-caps;font-size: xx-large;font-weight: 700;margin: 0;padding: 0;" type="text"
    id="fname" name="app_num'.$countApp.'" value="Appointment '.$countApp.'" readonly><br></h2>
    <p>Category: <input style="border: 0;background-color: #ffffffb0;padding: 0px;display: inline-block;margin: 0;width: auto;margin: 0;padding: 0;" readonly
    type="text" size="60" name="app_category'.$countApp.'" class="category"
    value="'.htmlentities($appointment['name']).'" />
<p>Date: <input readonly style="border: 0;background-color: #ffffffb0;padding: 0px;display: inline-block;margin: 0;width: auto;margin: 0;padding: 0;"
type="date" class="dt" name="app_date'.$countApp.'" value="'.$appointment['date'].'" />
<p>Time: <input readonly style="border: 0;background-color: #ffffffb0;padding: 0px;display: inline-block;margin: 0;width: auto;margin: 0;padding: 0;"
type="time" class="tm" name="app_time'.$countApp.'" value="'.$appointment['time'].'" />

<input type="hidden" value="Delete" class="minus" onclick="$(\'#app'.$countApp.'\').remove(); return false;" />
<p>Description:<br/>
<textarea readonly style="border: 0;background-color: #ffffffb0;padding: 2px;display: inline-block;margin: 0;width: auto;margin: 0;padding: 0;"
name="app_desc'.$countApp.'" placeholder="Type any extra info you want to convey OR type nil..." rows="3" class="desc" cols="70">'.$appointment['description'].'</textarea></p>
');
    echo("\n</div>\n");
  }
}
echo("</div></p>\n");
echo(' </details>');
?>
</form>
<script>
countApp = <?= $countApp ?>;
$(document).ready(function(){
 window.console && console.log('Document ready called');
 $('#addApp').click(function(event){
        event.preventDefault();
        if( countApp >= 9 ){
          alert("Maximum of hundred appointment enteries exceeded");
          return;
        }
        countApp++;
        window.console && console.log("adding appointments "+countApp);
        var source = $("#appointment-template").html();
        $('#app_fields').append(source.replace(/@COUNT@/g,countApp));
        $('.category').autocomplete({
          source: "category.php"
        });
      });
$('.category').autocomplete({
        source: "category.php"
      });
});
</script>
 <script id="appointment-template" type="text">
  <div id="app@COUNT@">
      <h2 >
      <input style="border: 0;background-color: #0c8cff47;text-align: center;font-variant: all-small-caps;font-size: xx-large;font-weight: 700;"
       type="text" id="fname" name="fname" value="Appointment @COUNT@" readonly><br></h2>
      <p>Category: <input type="text" class="category" size="80" placeholder="eg Dentistry, Cardiology, Paediatrics" name="app_category@COUNT@"  value="" />
      </p>
      <p>Preferred Date: <input type="date" class="dt" name="app_date@COUNT@" value="" />
      <p>Preferred Time: <input type="time" class="tm" name="app_time@COUNT@" value="" />
      <input type="button" style="background-color:#ff00008c;font-size: 15;
      padding-bottom: 1.5%;padding-top: 1.5%; margin-left: 10%;" class="minus" value="Remove this appointment" onclick="$('#app@COUNT@').remove(); return false;">
      <p>Description:<br/>
      <textarea name="app_desc@COUNT@" placeholder="Type any extra info you want to convey OR type nil..." rows="9" class="desc" cols="70"></textarea></p>
    <div>
    <p style="    margin-top: 6%;background-color: #c0c0c047;padding: 5%;">
      <!-- <input type="submit" class="cancelbutton" name="cancel" value="Cancel" style="background-color: #ff00008c;width: 20%;font-size: 15;
      padding-bottom: 1.5%;padding-top: 1.5%;     margin-left: 4%;margin-right: 40%;"> -->
    <input type="submit" class="addbutton" value="Confirm Booking" style="background-color: #21e6167a;font-size: 15;padding-bottom: 1.5%;width: 100%;padding-top: 1.5%;"
    onclick="return confirm('Are you sure you want to confirm your booking?');">
</p>
 </script>
 </div>
 </body>
 </html>
<?php require_once "footer.php"; ?>
