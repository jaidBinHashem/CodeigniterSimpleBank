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
			<h2>TRANSFER</h2>
			<form method="post">
				<table cellpadding="4" cellspacing="4">
					<tr>
						<td>FROM ACCOUNT</td>
						<td><input type="text" name="fraccno" /></td>
					</tr>
					<tr>
						<td>TO ACCOUNT</td>
						<td><input type="text" name="toaccno" /></td>
					</tr>
					<tr>
						<td>AMOUNT</td>
						<td><input type="text" name="amount" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="transfer" value="Save" /></td>
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