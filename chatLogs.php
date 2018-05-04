<?php

	include 'connection/connection.php';

$sql = "SELECT * FROM chat ORDER BY id DESC LIMIT 15";
$result = mysqli_query($conn, $sql);

while($extract = mysqli_fetch_assoc($result)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}