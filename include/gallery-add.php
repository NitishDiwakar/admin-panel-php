<?php  
	session_start();
	ob_start();
	include 'connection.php';

	if(isset($_POST['submit']))
	{
		// echo "hell";
		// n
		$pic  = ($_FILES['file']['name']);
		$date = date('Y-m-d h:i:s');
		$date = strtotime($date);

		$pic =  $date . '_' . $pic;
	    $target_dir = "../uploads/gallery/";
	    $target_file = $target_dir . $pic;
	  	move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        // e n
	}
?>