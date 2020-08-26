<?php
require_once 'pdo.php';
$stmt = $pdo->prepare('SELECT hostel_name FROM Hostel
     WHERE hostel_name LIKE :prefix');
$stmt->execute(array( ':prefix' => $_REQUEST['term']."%"));

$retval = array();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    $retval[] = $row['hostel_name'];
}
echo(json_encode($retval, JSON_PRETTY_PRINT));
