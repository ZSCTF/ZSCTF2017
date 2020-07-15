<?php
	include "header.php";
	if (isset($_SESSION['login'])) {
		die("<script>alert('You have logged in!');location.href='user.php';</script>");
	}
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = addslashes($_POST['username']);
		$password = md5($_POST['password']);
		if (stripos($username, 'union') !== False) {
			print "<script>alert('Slience is gold!');</script>";
		}else{
			$sql = "SELECT * FROM `users` WHERE username = '{$username}'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if ($row['password'] === $password) {
				$_SESSION['login'] = 1;
				$_SESSION['username'] = $row['username'];
				$result->free();
				$conn->close();
				header("Location: user.php");
			}else{
				print "<script>alert('Username or password is wrong!');</script>";
				$result->free();
				$conn->close();
			}
		}
	}
?>

					<div class="jumbotron">
						<form role="form" action="login.php" method="post" enctype="application/x-www-form-urlencoded">
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