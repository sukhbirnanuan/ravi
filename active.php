<?php

include('connection.php');

if(isset($_REQUEST['id'])){
	$a=$_REQUEST['id'];
	$s="UPDATE contacts SET status='0' WHERE id='$a'";
	mysqli_query($conn, $s);
	
	header('location:data.php');
}

?>