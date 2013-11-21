<html>
	<head>
		<title>Register opslaan</title>
		<style type="text/css">
			body{
				font-family: "Helvetica Neue", "Helvetica", sans-serif;
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		Hallo! Ik ben nog steeds controller <b>Register</b> (register.php), dat komt omdat er /register/ in de url staat<br><br>
		Je bevindt je nu in de save($username, $password) methode van deze class omdat je url /register/save/ is<br><br>
		Je username is: <b><?php echo $username; ?></b><br>
		en je wachtwoord is: <b><?php echo $password; ?></b><br><br>
		Dit komt omdat de laatste twee waarden in je url, de parameters voor de methode in de controller zijn.
		
		dus... /*controller_naam*/*methode*/*parameter1*/*parameter2*/ enz...
		
		<br><br>
		<a href="/">Keer terug naar home</a>
	</body>
</html>