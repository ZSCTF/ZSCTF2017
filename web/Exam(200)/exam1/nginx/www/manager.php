<?php
	include "header.php";
	if( !isset($_SESSION['username']) || $_SESSION['username'] !== 'admin'){
		die("<script>alert('You need to log in!');location.href='login.php';</script>");
	}
	if (!isset($_GET['module']) || !isset($_GET['name'])) {
		header("Location: manager.php?module=article_manage&name=php");
	}
?>					
					<div class="jumbotron">
						<?php
							$ext = $_GET['name'];
							if ($ext === 'php') {
								$ext = ".".$ext;
							}else{
								$ext = '';
							}
							include "./".$_GET['module'].$ext;
						?>
					</div>
<?php
	include "footer.php";
?>