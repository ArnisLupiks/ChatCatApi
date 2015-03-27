<?php

	$db_conn = mysqli_connect("localhost","anarchy","this@1985!","chatcat");

	if (mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}
	define("GOOGLE_API_KEY", "AIzaSyCPNLSN5gt1U2944qcH6SNmpP6rNJClpLE");

?>
