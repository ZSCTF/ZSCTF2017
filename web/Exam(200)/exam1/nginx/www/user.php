<?php
	include "header.php";
	if (!isset($_SESSION['login'])) {
		die("<script>alert('You need to log in!');location.href='login.php';</script>");
	}
?>
					<div class="jumbotron">
						<p>来点笔记吧~ <a href="post.php">here</a></p>
						<?php
							$username = addslashes($_SESSION['username']);
							$sql = "SELECT * FROM `posts` WHERE username='{$username}';";
							$sql_r = "SELECT grades FROM `users` WHERE username='{$username}';";
							$result = $conn->query($sql);
							$result_r = $conn->query($sql_r);
							$row = $result->fetch_assoc();
							$row_r = $result_r->fetch_assoc();
							print "<h1>{$row['username']}</h1>";
							print "<p>{$row['content']}</p>";
							print "<p>你的得分是:{$row_r['grades']}</p>";
							print "<br />";
							
							$result->free();
							$conn->close();
						?>
					</div>
<?php
	include "footer.php";
?>