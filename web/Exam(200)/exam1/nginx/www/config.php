<?php
	$mysql_username = 'web';
	$mysql_password = 'catchtheweb';
	$mysql_host = 'db';
	$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, "web");
	$init = "SET names utf8";
	$conn->query($init);