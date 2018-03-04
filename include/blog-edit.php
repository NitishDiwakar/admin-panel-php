<?php  
	include 'session.php';
	include 'connection.php';

	$id           = $_REQUEST['id'];
	$blog_title   = $_REQUEST['blog_title'];
	$blog_slug    = $_REQUEST['blog_slug'];
	$blog_cat     = $_REQUEST['blog_cat'];
	$blog_descr   = $_REQUEST['blog_descr'];
	$blog_tags    = $_REQUEST['blog_tags'];
	// $blog_banner  = $_REQUEST['blog_image'];
	if (!empty($_FILES['image']['name']))
	{

		$pic= ($_FILES['image']['name']);
		// Check if file type is valid image
		$allowed =  array('png' ,'jpg');
		$ext     = pathinfo($pic, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) 
		{
			$_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-times"></i> Only .jpg and .png extenstions are allowed.</div>';
			echo "<script>window.location = '../blogs.php'</script>";
			exit();
		}

		$date = date('Y-m-d h:i:s');
		$date = strtotime($date);

		$pic =  $date . '_' . $pic;
	    $target_dir = "../uploads/blogs/";
	    $target_file = $target_dir . $pic;
	  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // e n
	}
	if (empty($_FILES['image']['name']))
	{
		$pic = $_REQUEST['image_current'];
		// echo $pic;
	}

	$sql = "UPDATE tbl_blog SET 
	blog_title = '".$blog_title."',
	blog_slug = '".$blog_slug."',
	blog_cat = '".$blog_cat."',
	blog_banner = '".$pic."',
	blog_descr = '".$blog_descr."',
	blog_tags = '".$blog_tags."'
	WHERE blog_id = '".$id."' ";
	if($conn->query($sql) === TRUE)
	{
		$_SESSION['msg'] = '<div class="alert alert-success">
		<i class="fa fa-check"></i> Blog updated.</div>';
		header('location: ../blogs.php');
		exit();
	}
	else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger">
		<i class="fa fa-times"></i> Something went wrong. Please try again later.</div>';
		header('location: ../blogs.php');
		exit();
	}

?>