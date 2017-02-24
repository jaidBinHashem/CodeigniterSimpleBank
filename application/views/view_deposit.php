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
			<h2>DEPOSIT</h2>
			<form method="post">
				<table cellpadding="4" cellspacing="4">
					<tr>
						<td>ACCOUNT NO.</td>
						<td><input type="text" name="accno" /></td>
					</tr>
					<tr>
						<td>AMOUNT</td>
						<td><input type="number" name="amount"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="deposit" value="Save" /></td>
					</tr>
				</table>
			</form>
			<br />
			
			<!-- Label to display error message -->
			<label><?php echo $message; ?></label>
			<br/>
			<br/>
			<a href="http://localhost:8082/ci226/home">Back to Home</a>
		</center>
	</body>
</html>