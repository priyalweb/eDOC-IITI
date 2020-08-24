<?php
function flashMessages(){
  if( isset($_SESSION['error']) ){
    echo('<p style="color: red; margin-left:15%;font-size: 20px;background-color: #ff00002b; display: inline-block;">'.htmlentities($_SESSION['error'])."</p>\n" );
    unset($_SESSION['error']);
  }
  if( isset($_SESSION['success']) ){
    echo('<p style="color: green; margin-left:15%;font-size: 20px;background-color: #7fffd45e;display: inline-block;">'.htmlentities($_SESSION['success'])."</p>\n" );
    unset($_SESSION['success']);
  }
}
function validateProfile(){
// p_profile_id	patient_id	first_name	last_name	email	roll_number	contact_number	gender	room_number	med_history
  if(strlen($_POST['first_name']) < 1 || strlen($_POST['last_name']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['roll_number']) < 1
  || strlen($_POST['contact']) < 1 || strlen($_POST['room_number']) < 1 || strlen($_POST['med_history']) < 1){
    return "All values are required";
  }
  if( strpos($_POST['email'],'@') === false || strpos($_POST['email'],'.') === false ){
    return 'Email should be of format dash@dash.dash';
  }
  return true;
}
function validateApp(){
  for($i=1; $i<=9; $i++) {
    if( ! isset($_POST['app_category'.$i]) ) continue;
    if( ! isset($_POST['app_desc'.$i]) ) continue;
    $category = $_POST['app_category'.$i];
    $description = $_POST['app_desc'.$i];
    if ( strlen($category) == 0 || strlen($description) == 0 ){
      return "All fields are required";
    }
  }
  return true;
}
function loadApp($pdo , $p_profile_id){
  $stmt = $pdo->prepare('SELECT rank,date,time,description,name FROM Booking
    JOIN Category
        ON booking.category_id = category.category_id
    WHERE p_profile_id = :ppid ORDER BY rank');
    $stmt->execute(array(':ppid' => $p_profile_id)) ;
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $bookings;
}
function insertBookings($pdo, $p_profile_id){
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
          $stmt->execute(array(':ppid' => $p_profile_id,':date' => $date,':time' => $time,':desc' => $description,  ':rank' => $rank,':cid' => $category_id));
      $rank++;

    }
}
?>
