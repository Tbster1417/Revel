<?php

include_once 'session.php';

if(isset($_SESSION['u_id'])){
	include_once 'loggedin.php';
}
else{
	include_once 'header.php';
}
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2><center>Home</center></h2>
		<?php
		if(isset($_SESSION['u_id'])){
			echo "You are logged in!";
		}
		?>
	</div>`
</section>

<?php
	include_once 'footer.php';
?>