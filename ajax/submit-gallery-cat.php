<?php
    include '../include/connection.php';
    // $conn = db();
if( $_POST ){
	
	//$fname = $_POST['txt_fname'];
	$cat_name = $_POST['cat_name'];

    $sql = "INSERT INTO tbl_gallery_cat(cat_name) VALUES( '".$cat_name."')";
    if($conn->query($sql) === TRUE) {
	?>
    
    <div class="alert alert-success"><strong><i class="fa fa-check" aria-hidden="true"></i></strong> Category added.</div>
    <?php
	}
    else { ?>
        <div style="color: red" class="text-center"><strong><i class="fa fa-times" aria-hidden="true"></i></strong> Category already added.</div>
    <?php }
}