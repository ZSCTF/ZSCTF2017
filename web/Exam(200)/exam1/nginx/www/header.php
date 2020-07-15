<?php
	session_start();
	include "config.php";
?>
<html>
   <head>
      <title>0.0 Exam</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script charset="utf-8" src="kindeditor/kindeditor.js"></script>
	  <script charset="utf-8" src="kindeditor/lang/zh-CN.js"></script>
	  <script>
		        KindEditor.ready(function(K) {
		                window.editor = K.create('#editor_id');
		        });
	  </script>
   </head>
   <body>
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">0.0 Exam</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">0.0 Exam</a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li>
									 <a href="login.php">Login</a>
								</li>
								<li>
									 <a href="register.php">Register</a>
								</li>								
								<li>
									 <a href="post.php">Post</a>
								</li>
								<li>
									 <a href="classes.php">Classes</a>
								</li>
								<li>
									 <a href="answer.php">Exam</a>
								</li>
								<li>
									<a href="user.php">Ucenter</a>
								</li>
								<?php
									if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
										print "	<li><a href=\"manager.php\">Admin</a></li>";
									}
								?>
								<li>
									<a href="logout.php">Logout</a>
								</li>
							</ul>
						</div>
						
					</nav>
