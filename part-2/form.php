<?php

$success = 0;

$link = mysqli_connect("localhost", "root", "", "test");

if (isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($link, "SELECT * FROM `login` WHERE `username` = '$username' AND `password` = '$password'");

	if (mysqli_num_rows($query)) $success = 1;
}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php if (!$success) { ?>
	<h1>Login</h1>
	<?php if (!$success) print "<span style='color: red;'>Error: Username or password incorrect!</span>"; ?>
	<form method="post">
		<div>
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
		</div>
		<div>
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
		</div>
		<button type="submit">LOGIN</button>
	</form>
	<?php } else { print "<h1>Welcome, " . $username . "!</h1>"; } ?>
</body>

</html>