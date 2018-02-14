<?php
	include_once 'signupheader.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2><center>Signup</center></h2>
		<form class="signup-form" action="includes/signup.inc.php" method ="POST">
			<input type="text" name="first" placeholder="FirstName">
			<input type="text" name="last" placeholder="LastName">
			<input type="text" name="username" placeholder="Username">
			<input type="text" name="email" placeholder="E-mail address">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="passwordconfirm" placeholder="Confirm your password">
			<button type="submit" name="submit">Sign Up!</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>