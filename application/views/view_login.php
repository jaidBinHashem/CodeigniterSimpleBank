<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
			body{
				font-family: Arial;
			}
		</style>
	</head>
	<body>
		<center>
			<h2>LOGIN</h2>
			<form method="post">
				<table cellpadding="4" cellspacing="4">
					<tr>
						<td>USERNAME</td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>PASSWORD</td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="Login" name="buttonLogin" /></td>
					</tr>
				</table>
			</form>
			<br />
			
			<!-- Label to display error message -->
			<label><?php echo $message; ?></label>

		</center>
	</body>
</html>