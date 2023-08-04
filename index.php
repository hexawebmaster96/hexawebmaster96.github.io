<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<style>
			body {
				display: flex;
				justify-content: left;
				align-items: center;
				height: 100vh;
				margin:15%;
			}

			#contact-form {
				text-align: left;
				width: 70%;
				margin: 5%;
				background-color: #f0f0f0;
				padding: 25px, 50px, 25px, 50px;
			}
		</style>
	</head>
	<body style="width:70%;">
		<section id="contact-form">
			<div style="font-size:75%;"> Find the Better Future! <span style="color:#FF4F00;">JOIN</span> WITH <span style="color:#FF4F00;">US</span> </div>
			<hr style="height:2px; background-color:#ffffff; width: 99%;">
			<div style="font-size:60%; color:#FF4F00;">Login</div>
			<form action="login.php" method="post">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required style="height:40px; padding:8px; width:575px; font-size:16px;">
				<button type="submit">Log In</button>
				<div required>
				<br><hr style="height:2px; background-color:#ffffff; width: 100%;">
			</div>
			</form>
			<div style="font-size:60%; color:#FF4F00;">Register</div>
			<form action="register.php" method="post">
				<input type="text" name="new_username" placeholder="Username" required>
				<input type="password" name="new_password" placeholder="Password" required style="height:40px; padding:8px; width:575px; font-size:16px;">
				<button type="submit">Register</button>
			</form>
		</section>
	</body>
</html>