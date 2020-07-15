<?php
	$sql = "SELECT * FROM `posts`;";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		print "<h1>{$row['username']}</h1>";
		print "<p>{$row['content']}</p>";
		print "<br />";
	}
	$result->free();
	$conn->close();
?>