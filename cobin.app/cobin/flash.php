<?php 
// include('FlashMessages.php');
session_start();
if (isset($_REQUEST['submit'])) {
	$_SESSION['success'] = "$msg->success('This is a success message');";
	echo "<script>window.location.href='index.php'</script>";
}
 ?>