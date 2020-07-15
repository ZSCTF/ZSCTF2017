<?php
	include "header.php";
	if (!isset($_SESSION['login'])) {
		die("<script>alert('You need to log in!');location.href='login.php';</script>");
	}
	if (isset($_POST['content'])) {
		if (strlen($_POST['content'])>255) {
			die("<script>alert('The content is too long!');location.href('post.php');</script>");
		}
		$content = htmlspecialchars($_POST['content']);
		$username = addslashes($_SESSION['username']);
		$sql = "UPDATE `posts` SET content = '{$content}' WHERE username = '{$username}'";
		$result = $conn->query($sql);
		if ($result !== False) {
			$conn->close();
			print "<script>alert('Success');</script>";
		}else{
			$conn->close();
			print "<script>alert('Something wrong happened!');</script>";
		}
	}
?>
					<div class="jumbotron">
						<p>Please write your study vow.</p>
						<form role="form" action="post.php" method="post" enctype="application/x-www-form-urlencoded">
							<textarea id="editor_id" name="content" style="width:700px;height:300px;"></textarea>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>

					</div>
<?php
	include "footer.php";
?>