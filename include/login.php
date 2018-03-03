<?php  
	session_start();
	include 'connection.php';

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$password = md5($password);
	
	/*$sql = "SELECT * FROM tbl_admin WHERE username = '".$username."' AND password = '".$password."' ";
	$result = $conn->query($sql);*/

	$stmt = $conn->prepare('SELECT id, username, password FROM tbl_admin WHERE username = ? AND password = ? LIMIT 1');
	$stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($id, $username, $password);
    $stmt->store_result();
	if($stmt->num_rows == 1)
	{
		if($stmt->fetch()) //fetching the contents of the row
        {
			$_SESSION['admin'] = TRUE;
			$_SESSION['admin_id'] = $id;
			header('location: ../index.php');
			exit;
		}
	}
	else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger">
		Username or password is incorrect.
		</div>';
		header('location: ../login.php');
		exit;
	}
?>