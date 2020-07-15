<?php
	include "header.php";
	if (isset($_SESSION['login'])) {
		die("<script>alert('You have logged in!');location.href='user.php';</script>");
	}
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = addslashes($_POST['username']);
		$password = md5($_POST['password']);
		if (stripos($username, 'union') !== False) {
			print "<script>alert('Don't do evil thing!');</script>";
		}else{
			$sql = "INSERT INTO `users` VALUES(NULL,'{$username}', '{$password}',0)";
			$result = $conn->query($sql);
			if ($result !== False) {
				$sql = "INSERT INTO `posts` VALUES(NULL, 'Good good study, day day up!', '{$username}')";
				$result = $conn->query($sql);
				$conn->close();
				header("Location: login.php");
			}else{
				$conn->close();
				print "<script>alert('Something wrong happened!');</script>";
			}
		}
	}
?>
					<div class="jumbotron">
						<form role="form" action="register.php" method="post" ectype="application/x-www-form-urlencoded">
							<div class="form-group">
								 <label for="username">Username</label><input type="text" class="form-control" name="username" id="username" />
							</div>
							<div class="form-group">
								 <label for="password">Password</label><input type="password" class="form-control" name="password" id="password" />
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>


<?php
	include "footer.php";
?>