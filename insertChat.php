<?php
session_start();
$uname = $_SESSION['u_uname'];
$msg = $_REQUEST['msg'];

include 'connection/connection.php';

$sql = "INSERT INTO chat (username, msg) VALUES ('$uname', '$msg')";
$result = mysqli_query($conn, $sql);


$sql1 = "SELECT * FROM chat ORDER BY id DESC LIMIT 15";
$result1 = mysqli_query($conn, $sql1);

while($extract = mysqli_fetch_assoc($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}