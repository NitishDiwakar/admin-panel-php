<?php  
	include 'include/session.php';
	include 'include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blog add - AITS Admin</title>

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
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blog add</li>
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
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<div class="row">
	<div class="col-sm-9">
		<h4>Add Blog</h4>
	<?php  
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
	<form action="include/blog-add.php" method="post" class="well" enctype="multipart/form-data">
		<div class="form-group">
			<label>Blog Title:</label>
			<input type="text" id="blog_title" class="form-control" name="blog_title" required>
		</div>

		<div class="form-group">
			<label>Blog Url:</label>
			<input type="text" id="slug" class="form-control" name="blog_slug" required>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Category:</label>
					<select id="blog_category" class="form-control" name="blog_cat">
						<option>Select Category:</option>
			<?php  
              $sql = "SELECT * FROM tbl_blog_cat";
              $result = $conn->query($sql);
              while($row = $result->fetch_array()) {
            ?>
              <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
              <?php } ?>
					</select>
				</div>

				
			</div>
			<div class="col-md-6">
				<!-- <div class="form-group">
					<label>Sub Category:</label>
					<select id="blog_sub_category" class="form-control" name="blog_sub_cat">

					</select>
				</div> -->
				
			</div>
		</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
				<label>Banner:</label>
				<img id="blah" class="img img-responsive" src="#" alt="" />
				<input type="file" onchange="readURL(this);" accept="image/jpeg, image/png" class="form-control" name="image">
				
				</div>
				</div>
				<div class="col-md-6"></div>
			</div> <!-- End row -->

		<div class="form-group">
			<label>Description:</label>
			<textarea id="editor1" class="form-control" name="blog_descr" required></textarea>
		</div>

		<div class="form-group">
			<label>Tags: (<i>Seperate multiple tags by comma.</i>)</label>
			<input type="text" class="form-control" name="blog_tags">
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
            // $('#hd').hide();

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
