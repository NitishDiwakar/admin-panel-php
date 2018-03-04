<?php  
	session_start();
	ob_start();
	include 'connection.php';

	if(isset($_REQUEST['submit']))
	{
		$blog_title   = $_REQUEST['blog_title'];
		$blog_slug    = $_REQUEST['blog_slug'];
		$blog_cat     = $_REQUEST['blog_cat'];
		/*$blog_sub_cat = $_REQUEST['blog_sub_cat'];*/
		$blog_descr   = $_REQUEST['blog_descr'];
		$blog_tags    = $_REQUEST['blog_tags'];

		$pic= ($_FILES['image']['name']);
		// Check if if file type is valid image
		$allowed =  array('png' ,'jpg');
		$ext     = pathinfo($pic, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) 
		{
			$_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-times"></i> Only .jpg and .png extenstions are allowed.</div>';
			echo "<script>window.location = '../blog-add.php'</script>";
			exit();
		}

		$date = date('Y-m-d h:i:s');
		$date = strtotime($date);

		$pic =  $date . '_' . $pic;
	    $target_dir = "../uploads/blogs/";
	    $target_file = $target_dir . $pic;
	  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        
		
		$sql = "INSERT INTO tbl_blog 
		(
		blog_title, 
		blog_slug, 
		blog_cat, 
		blog_banner,
		blog_descr, 
		blog_tags
		) 
		VALUES 
		(
		'".$blog_title."',
		'".$blog_slug."',
		'".$blog_cat."',
		'".$pic."',
		'".$blog_descr."',
		'".$blog_tags."'
		)
		";
		/*$conn->query($sql) or die($conn->error);
		exit;*/
		if($conn->query($sql) === TRUE)
		{
			$_SESSION['msg'] = '<div class="alert alert-success"><i class="fa fa-success"></i> Blog added successfully.</div>';
			header('location: ../blog-add.php');
			exit();
		}
		else 
		{
			$_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-times"></i> Something went wrong.</div>';
			header('location: ../blog-add.php');
			exit();
		}
	}
?>