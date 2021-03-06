<?php  
	include 'include/session.php';
	include 'include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blog Edit - AITS Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	</head>

	<body class="no-skin">
		<?php include 'include/header.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php include 'include/sidebar.php'; ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="blogs">Blogs</a>
							</li>
							<li class="active">Blog Edit</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-sm-9">
		<h4>Edit Blog</h4>
	<?php  
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
	<?php 
		$blog_id = $_GET['id']; 
		$sql = "SELECT * FROM tbl_blog WHERE blog_id = '".$blog_id."' ";
		$result      = $conn->query($sql);
		$row         = $result->fetch_array();
		$blog_cat    = $row['blog_cat'];
		$blog_banner = $row['blog_banner'];
		$blog_descr  = $row['blog_descr'];
		$blog_tags   = $row['blog_tags'];
	?>
	<form action="include/blog-edit.php" method="post" class="well" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $row['blog_id']; ?>" name="id">
		<input type="hidden" value="<?php echo $row['blog_banner']; ?>" name="image_current">
		<div class="form-group">
			<label>Blog Title:</label>
			<input type="text" id="blog_title" class="form-control" value="<?php echo $row['blog_title']; ?>" name="blog_title" required>
		</div>

		<div class="form-group">
			<label>Blog Url:</label>
			<input type="text" id="slug" value="<?php echo $row['blog_slug']; ?>" class="form-control" name="blog_slug" required>
		</div>

        <div class="row">             <div class="col-md-6">
<div class="form-group">                     <label>Category:</label>
<select id="blog_category" class="form-control" name="blog_cat">
<option>Select Category:</option>        
     <?php                 
     $sql = "SELECT * FROM tbl_blog_cat";               
     $result = $conn->query($sql);
while($row = $result->fetch_array()) {             ?>               <option
value="<?php echo $row['cat_id']; ?>" <?php if($row['cat_id'] == $blog_cat) {
echo 'selected'; } ?>><?php echo $row['cat_name']; ?></option>
<?php } ?>                     </select>                 </div>

				
			</div>
			<div class="col-md-6">
				
				
			</div>
		</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
				<label>Banner:</label><br>
				<img src="uploads/blogs/<?php echo $blog_banner; ?>" id="hd" height="150px">
				<img id="blah" class="img img-responsive" src="#" alt="" />
				<input type="file" onchange="readURL(this);" accept="image/jpeg, image/png" class="form-control" name="image">
				
				</div>
				</div>
				<div class="col-md-6"></div>
			</div> <!-- End row -->

		<div class="form-group">
			<label>Description:</label>
			<textarea id="editor1" class="form-control" name="blog_descr" required><?php echo $blog_descr; ?></textarea>
		</div>

		<div class="form-group">
			<label>Tags: (<i>Seperate multiple tags by comma.</i>)</label>
			<input type="text" value="<?php echo $blog_tags; ?>" class="form-control" name="blog_tags">
		</div>

		<button class="btn btn-success" type="submit" name="submit"><i class="fa fa-plus"></i> Add Blog</button>
	</form>
	</div>
	<div class="col-sm-3"></div>
</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'include/footer.php'; ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script type="text/javascript">
            $("#blog_title").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);       
        });
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#blog_category').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                console.log(response);
                $("#blog_sub_category").html(response);
            },
        });
    }); 

});

</script>
<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    // .width(150)
                    .width()
                    .height(150);
            };
            $('#hd').hide();

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
		CKEDITOR.replace('editor1');
</script>

		<!-- inline scripts related to this page -->
	</body>
</html>
