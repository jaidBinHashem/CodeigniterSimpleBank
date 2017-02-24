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
			<h2>DELETE CONFIRMATION</h2>
				
				<table cellpadding="4" cellspacing="4">
					<tr>
						<td><b>ACCOUNT NO.:</b></td>
						<td><?php echo $account['account_no']; ?></td>
					</tr>
					<tr>
						<td><b>ACCOUNT NAME:</b></td>
						<td><?php echo $account['account_name']; ?></td>
					</tr>
				</table>
				<br />
				<br/>
				<h4>Are you sure you want to delete?</h4>
				<form method="post">
					<input type="hidden" />
					<input type="submit" name="delete" value="Confirm">
				</form>
				<br />
				<br/>
				<a href="http://localhost:8082/ci226">Back to Home</a>
		</center>
	</body>
</html>