


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?php 
	include_once 'header.php';
 ?>
<div class="stripped">
<img "piMedia.png" alt="pi Media">

	<section class="main-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<input type="text" name="email" placeholder="E-mail">
				<input type="password" name="pwd" placeholder="Password">
				<button type="submit" name="submit">Sign up</button>
			</form>
		</div>
	</section>
</div>
<?php 
	include_once 'footer.php';
?>


</body>
</html>



