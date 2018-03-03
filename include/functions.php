<?php 

	function checkLogin()
	{
		if(!isset($_SESSION['admin_id']))
		{
			echo "<script>window.location = 'login.php'</script>";
			exit();
		}
	}

	function showMessage()
	{
		if(isset($_SESSION['msg']))
	    {
	        echo $_SESSION['msg'];
	        unset($_SESSION['msg']);
	    }
	}

	function checkNotLogin()
	{
		if(isset($_SESSION['admin_id']))
		{
			echo "<script>window.location = 'index.php'</script>";
			exit();
		}
	}

	
?>