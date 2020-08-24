<?php
require_once "pdo.php";
require_once "util.php";
session_start();
if ( ! isset($_SESSION['patient_id']) ) {
    die('ACCESS DENIED');
    return;
}
if ( isset($_POST['cancel'] ) ) {
    header("Location: patient_dashboard.php");
    return;
}
if ( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
&& isset($_POST['roll_number']) && isset($_POST['contact']) && isset($_POST['gender'])
&& isset($_POST['room_number'])&& isset($_POST['med_history'])
&& isset($_POST['bloodgroup'])  && isset($_POST['hostel_name']) ){
          $msg = validateProfile();
             if ( is_string($msg) ){
               $_SESSION['error'] = $msg;
               header("Location: p_add.php");
               return;
             }
                    $bloodgroup = $_POST['bloodgroup'];
                    $bg_id = false;
                    $stmt = $pdo->prepare('SELECT bg_id FROM
                          Bloodgroup WHERE bloodgroup = :bloodgroup');
                    $stmt->execute(array(':bloodgroup' => $bloodgroup) );
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ( $row !== false ) $bg_id = $row['bg_id'];
                    if ( $bg_id === false ) {
                      $stmt = $pdo->prepare('INSERT INTO Bloodgroup
                            (bloodgroup) VALUES (:bloodgroup)');
                      $stmt->execute(array(':bloodgroup' => $bloodgroup));
                      $bloodgroup_id = $pdo->lastInsertId();
                    }
                    $hostel = $_POST['hostel_name'];
                    $hostel_id = false;
                    $stmt = $pdo->prepare('SELECT hostel_id FROM
                          Hostel WHERE hostel_name = :hostel_name');
                    $stmt->execute(array(':hostel_name' => $hostel) );
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ( $row !== false ) $hostel_id = $row['hostel_id'];
                    if ( $hostel_id === false ) {
                      $stmt = $pdo->prepare('INSERT INTO Hostel
                            (hostel_name) VALUES (:hostel_name)');
                      $stmt->execute(array(':hostel_name' => $hostel));
                      $hostel_id = $pdo->lastInsertId();
                    }
                      $patient_id = false;
                      $stmt = $pdo->prepare('SELECT patient_id FROM
                            P_Profile WHERE patient_id = :patient_id');
                      $stmt->execute(array(':patient_id' => $_SESSION['patient_id']));
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      if ( $row !== false ) {
                        $patient_id = $row['patient_id'];
                        $_SESSION['error'] = 'You have already entered your details, For correction please contact the administrator. Thankyou for your patience.';
                        header("Location: patient_dashboard.php");
                        return;
                      }
                      if ( $patient_id === false ) {
                        $stmt = $pdo->prepare('INSERT INTO P_Profile
                          (patient_id, bg_id, hostel_id, first_name, last_name, email, roll_number, contact,	gender,	room_number,	med_history)
                          VALUES ( :pid, :bid, :hid, :fn, :ln, :em, :rolln, :con, :ge, :roomn, :mh) ');

                        $stmt->execute(array(
                          ':pid' => $_SESSION['patient_id'],':bid' => $bg_id,':hid' => $hostel_id,':fn' => $_POST['first_name'],':ln' => $_POST['last_name'],':em' => $_POST['email'],
                          ':rolln' => $_POST['roll_number'],':con' => $_POST['contact'],':ge' => $_POST['gender'],':roomn' => $_POST['room_number'],':mh' => $_POST['med_history']));
    }
                      $p_profile_id = $pdo-> lastInsertId();
$rank = 1;
                      for($i=1; $i<=9; $i++){
                        if ( !isset($_POST['app_date'.$i]) ) continue;
                        if ( !isset($_POST['app_time'.$i]) ) continue;
                        if ( !isset($_POST['app_category'.$i]) ) continue;
                        if ( !isset($_POST['app_desc'.$i]) ) continue;
                        $category = $_POST['app_category'.$i];
                        $date = $_POST['app_date'.$i];
                        $time = $_POST['app_time'.$i];
                        $description = $_POST['app_desc'.$i];
                        $category_id = false;
                        $stmt = $pdo->prepare('SELECT category_id FROM
                              Category WHERE name = :name');
                        $stmt->execute(array(':name' => $category));
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ( $row !== false ) $category_id = $row['category_id'];

                        if ( $category_id === false ) {
                          $stmt = $pdo->prepare('INSERT INTO Category
                                (name) VALUES (:name)');
                          $stmt->execute(array(':name' => $category));
                          $category_id = $pdo->lastInsertId();
                        }
                        $stmt = $pdo->prepare('INSERT INTO Booking
                            (p_profile_id, date, time, description, rank, category_id)
                            VALUES (:ppid, :date, :time, :desc, :rank, :cid) ');
                        $stmt->execute(array(
                            ':ppid' => $p_profile_id,':date' => $date,':time' => $time,':desc' => $description,':rank' => $rank,':cid' => $category_id)
                        );
                        $rank++;
                      }
                      $_SESSION['success'] = "Your details have been saved successfully!";
                      header("Location: patient_dashboard.php");
                      return;
}
?>
<!DOCTYPE html>
<html>
<head> <title>Priyal Dubey - Add personal details</title>
<?php require_once "header.php"; ?>
<?php require_once "head.php"; ?>
</head>
<body style="background-color: aliceblue;font-family: Arial, Helvetica, sans-serif;font-size: 16px;">
<div class="container addc">
  <div style="padding: 1%; background-color: rgb(217 237 255);">
<h1 style="margin-left: 15%;margin-bottom: 2%; display:inline-block;">Adding personal details for  <?php
echo("<h1 style='color:#2a66ba;; display:inline-block;margin-left: 10px'>");
echo(htmlentities($_SESSION['p_name']));
echo("</h1>") ?> </h1>
</div>
<p style="margin:auto; margin-left:15%; margin-bottom:1.5%; display:inline-block;">Please enter only your own personal details. You may be able to submit this form only once.</p><span style="color: red; font-size:30px;">*</span>
<?php flashMessages(); ?>

<form method="post" style="font-size: 16px;font-weight: 600; background-color: #dcebf73b;padding: 1%;border: 8px solid rgb(146 255 251 / 34%);
    border-width: 1px 10px 10px 1px;" action="p_add.php" onsubmit="document.getElementById('myButton').disabled=true;
document.getElementById('myButton').value='Submitting, please wait...';" >
<div class="imgcontainer">
  <img src="img/personal.png" alt="Avatar" class="avatar">
</div>
  <p>First Name:
  <input type="text" name="first_name" class="fn" size="60"/></p>
  <p>Last Name:
  <input type="text" name="last_name" class="ln" size="60"/></p>
  <p>Email:
  <input type="text" name="email" class="em" size="30" value="" /></p>
  <p>Roll Number:
  <input type="text" name="roll_number" class="rolln" size="30"></p>
  <p>Contact Number:
  <input type="text" name="contact" class="con" size="30"></p>
  <p>Bloodgroup:
  <input type="text" size="15" name="bloodgroup" id="bloodgroup-template" class="bg" value="" /></p>
    <script>
              $('.bg').autocomplete({
              source: "bloodgroup.php"
              });
    </script>
<p>Gender:
  <input type="radio" name="gender" value="1" style="margin-left:4%;">  Female
  <input type="radio" name="gender" value="0" style="margin-left:4%;" checked>  Male</p>
<p>Hall of Residence:<br>
  <input type="text" size="80" id="hostel-template" name="hostel_name" class="hn" value="" /></p>
    <script>
              $('.hn').autocomplete({
              source : "hostel.php"
              });
    </script>
<p>Room Number:
  <input type="text" name="room_number" class="roomn" size="20"></p>
<p>Medical History:<br/>
  <textarea name="med_history" placeholder="write some details about your medical history OR type nil..." rows="9" class="med" cols="60"></textarea></p>
<template>
  <p><h3 style="display: inline-block;">Appointments:</h3>
  <input type="submit" id="addApp" class="appointment" value="BOOK">
  <div id="app_fields">
  </div>
  </p>
</template>
<p>
      <input type="submit" name="cancel" class="cancelbutton" id="cancelbutton" value="Cancel" style="background-color: #ff00008c;font-size: 15;
      padding-bottom: 1.5%;padding-top: 1.5%; margin-left: 25%;" onclick="return confirm('Are you sure you want to cancel?');">
  <input type="submit" class="addbutton" id="myButton" value="Submit" style="background-color: #21e6167a;font-size: 15;padding-bottom: 1.5%;padding-top: 1.5%;
  margin-left: 10%;" onclick="return confirm('Are you sure you want to submit? (You can only submit once)');">
</p>
</form>
<script>
countApp = 0;
$(document).ready(function(){
  console.log('Document ready called');
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
      <h2><input type="text" id="appnum" name="appnum" value="Appointment @COUNT@" readonly><br></h2>
      <p>Category: <input type="text" size="80" name="app_category@COUNT@" class="category" value="" />
      </p>
      <p>Preferred Date: <input type="date" class="dt" name="app_date@COUNT@" value="" />
      <p>Preferred Time: <input type="time" class="tm" name="app_time@COUNT@" value="" />
      <input type="button" class="minus" value="Delete" onclick="$('#app@COUNT@').remove(); return false;"><br>
      <p>Description:<br/>
      <textarea name="app_desc@COUNT@" placeholder="Type any extra info you want to convey OR type nil..." rows="9" class="desc" cols="70"></textarea></p>
<div>
 </script>
</div>
</body>
</html>
<?php require_once "footer.php"; ?>
