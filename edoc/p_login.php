<?php
require_once "pdo.php";
require_once "util.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}if( isset($_POST["p_email"]) && isset($_POST["p_pass"]) ){
  unset($_SESSION["p_name"] );
$salt = 'XyZzy12*_';
      $stored_hash = '83699e97a7dfb2636fee4c0c12bff008';
      $check = hash('md5', $salt.$_POST['p_pass']);
$stmt = $pdo->prepare('SELECT patient_id, p_name FROM patients
      WHERE p_email = :em AND p_password = :pw');
$stmt->execute(array( ':em' => $_POST['p_email'], ':pw' => $check));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row !== false ) {
      $_SESSION['p_name'] = $row['p_name'];
      $_SESSION['patient_id'] = $row['patient_id'];
      // Redirect the browser to index.php
      header("Location: patient_dashboard.php");
      return;
      } else{
        error_log("Login fail ".$_POST['email']." $check");
        $_SESSION['error'] = "Incorrect password";
        header("Location: p_login.php");
        return;
      }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "header.php"; ?>
<?php require_once "head.php"; ?>
<link rel="stylesheet" href="css/style1.css">
<title>Priyal Dubey - Javascript profile</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;
background-color: aliceblue;
    margin: 4%;
    margin-top: 2%;
}
</style>
</head>
<body style="background-color: aliceblue;" >
<h1 style="margin: 1% 39% 1% 42%;" >Patient Login</h1>
<?php
flashMessages();
?>
<form action="p_login.php" method="POST">
  <div class="imgcontainer">
    <img src="img/patient.jpg" alt="Avatar" class="avatar">
  </div>
<div class="container">
    <label for="nam"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="p_email" id="id_0" required>
<label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="p_pass" id="id_1723" required>
<button type="submit" onclick="return doValidate();" id="id_111" class="b111">Login</button>
</div>
<div class="container" style="background-color:#f1f1f1">
    <a href="#">
     <button type="button" id="id_222" class="cancelbtn">Cancel</button> </a>
  </div>
</form>
<script>
function doValidate() {
console.log('Validating...');
try {
pw = document.getElementById('id_1723').value;
em = document.getElementById('id_0').value;
console.log("Validating em="+em);
console.log("Validating pw="+pw);
if (pw == null || pw == "") {
alert("Both fields must be filled out");

return false;
}
else if( em.indexOf("@") == (-1) ){
  alert("Invalid email address");

  return false;
}

return true;

} catch(e) {

return false;

}

return false;

}
</script>
<p style="color: #cecece;" >
Enter Email: patient(1-4)@gmail.com(eg patient1@gmail.com ) <br>
Hint: The password is either badminton or 1.
</p>
</div>
</body>
<?php require_once 'footer.php'; ?>
