<?php

session_start();
session_destroy();

echo'

<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=../principal.php">
	</head>
</html>

';

?>
