<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>	
			</ul>
			<div class="nav-login">
				<form action="includes/login.inc.php" method ="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<button type="login" name="login">Login</button>
				</form>	
				<a href="signup.php">Sign Up</a>
			</div>
		</div>	
	</nav>	
</header>