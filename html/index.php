

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php" title="">Home</a></li>
				</ul>
				<div class="nav-login">
					<?php
						if (isset($_SESSION['u_id'])) {
							echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name = "submit">Logout</button>
								</form>';
						} else {
							echo 	'<form action="includes/login.inc.php" method="POST">
									<input type="text" name="uid" placeholder="Username/e-mail">
									<input type="password" name="pwd" placeholder="password">
									<button type="submit" name="submit">Login</button>
									</form>
									<a href="signup.php">Sing up</a>';
						}
					?>
				</div>
			</div>
		</nav>
</head>
<body>
<?php 
	include_once 'header.php';
 ?>



	<section class="main-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php  

				if (isset($_SESSION['u_id'])) {
					echo "You are logged in!";
				}

			?>

		</div>
	</section>

<?php 
	include_once 'footer.php';
?>

</body>
</html>
