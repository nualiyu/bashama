
<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	if(mysqli_query($db_con,"DELETE FROM `categories` WHERE `id` = '$id'")){
		header('Location: index.php?page=all-cat&delete=success');
	}else{
		header('Location: index.php?page=all-cat&delete=error');
	}
}else{
	header('Location: login.php');
 }
 
?>