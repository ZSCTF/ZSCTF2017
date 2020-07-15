<html>
<head>
    <title>login page</title>
</head>
<body>
    <form action="./" method="get">
	<label for="usr">username:</label><input type="text" name="usr" id="usr" /><br />
        <label for="passwd">password:</label><input type="password" name="passwd" id="passwd" /><br />
	<input type="submit" value="Login" /><br />
    </form>
</body>





























































<!--read the source at index.src-->
</html>
<?php
error_reporting(~E_ALL);
$flag = file_get_contents('flag.php');
if (isset($_REQUEST['usr']) && isset($_REQUEST['passwd'])){
    if ($_REQUEST['usr'] == $_REQUEST['passwd']){
        die('username and password could not be the same');
    }
    if (sha1($_REQUEST['usr']) == md5($_REQUEST['passwd'])){
	die($flag);
    }
    die('invaild username and password');
}

