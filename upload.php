<?php session_start(); ?>
<?php
include 'include/connection.php';
$target_dir = "uploads/gallery/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// n
$image_name = basename($_FILES["file"]["name"]);


// image name encryption
/*$date = date('Y-m-d h:i:s');
$date = strtotime($date);
$image_name =  $date . '_' . $image_name;*/

$cat = $_REQUEST['cat'];
$sql = "INSERT INTO tbl_gallery 
	(
		gal_cat,
		name
	)
	VALUES 
	(
		'".$cat."',
		'".$image_name."'
	)
	";
$conn->query($sql);

// en

/*echo $target_file;
var_Dump($_FILES);*/

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
}
