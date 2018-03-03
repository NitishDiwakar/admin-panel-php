<?php  
	include 'session.php';
	include 'connection.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM tbl_gallery_cat WHERE cat_id = '".$id."' ";
	if($conn->query($sql) === TRUE)
	{
		$_SESSION['msg'] = '<div class="alert alert-success">
		<i class="fa fa-check"></i> Gallery Category deleted.</div>';
		header('location: ../gallery-category.php');
		exit();
	}
	else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger">
		<i class="fa fa-times"></i> Something went wrong. Please try again later.</div>';
		header('location: ../gallery-category.php');
		exit();
	}
?>