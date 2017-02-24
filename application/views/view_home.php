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
			<h2>HOME</h2>
			<table cellpadding="4" cellspacing="12">
				<tr>
					<td><a href="http://localhost:8082/ci226/addnew">Add New</a></td>
					<td><a href="http://localhost:8082/ci226/deposit">Deposit</a></td>
					<td><a href="http://localhost:8082/ci226/withdraw">Withdraw</a></td>
					<td><a href="http://localhost:8082/ci226/transfer">Transfer</a></td>
					<td><a href="http://localhost:8082/ci226/home/logout">Logout</a></td>
				</tr>
			</table>
			
			<br />
			<br />

			<table border="1" cellpadding="4" cellspacing="4">
				<thead>
					<tr>
						<th>ACCOUNT NO.</th>
						<th>ACCOUNT NAME</th>
						<th>OPTION</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($accountlist as $account) { ?>
					<tr>
						<td><a href="http://localhost:8082/ci226/home/accountdetails/<?php echo $account['account_no']; ?>"><?php echo $account['account_no']; ?></a></td>
						<td><?php echo $account['account_name']; ?></td>
						<td><a href="http://localhost:8082/ci226/home/deleteAccount/<?php echo $account['account_no']; ?>">Delete</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

		</center>
	</body>
</html>