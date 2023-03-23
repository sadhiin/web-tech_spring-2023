<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 30px;
		}

		table {
			width: 80%;
			margin: 0 auto;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}

		th, td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		.action-btn {
			padding: 5px 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
			margin-right: 5px;
		}

		.action-btn:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Product List</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Buy Price</th>
				<th>Selling Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<!-- Here we would loop through the database and display the information in each row -->
			<tr>
				<td>Product 1</td>
				<td>$10.00</td>
				<td>$15.00</td>
				<td>
					<button class="action-btn">Edit</button>
					<button class="action-btn">Delete</button>
				</td>
			</tr>
			<tr>
				<td>Product 2</td>
				<td>$15.00</td>
				<td>$20.00</td>
				<td>
					<button class="action-btn">Edit</button>
					<button class="action-btn">Delete</button>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
