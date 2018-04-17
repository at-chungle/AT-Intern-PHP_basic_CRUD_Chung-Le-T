<?php
	include("connectDB.php");
	  if(isset($_REQUEST['id']))
	  {
		$id = $_REQUEST['id'];
		}else{
		header("location:animals.php");
		exit();
		}
	$sql = "delete from animals where id = {$id}";
	$result = $conn->query($sql);
	if($result == true){
		header("location:animals.php");
		exit();
	}else{
		echo "Có lỗi xảy ra";
	}
?>