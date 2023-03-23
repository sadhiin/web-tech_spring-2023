<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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

		form {
			max-width: 500px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}

		label {
			display: inline-block;
			margin-bottom: 5px;
		}

		input[type=text],
		input[type=number] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			box-sizing: border-box;
			margin-bottom: 20px;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}
        
	</style>
</head>
<body>

<h1>Product Info</h1>
	<form>
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" ><br><br>

		<label for="buy-price">Buy Price:</label>
		<input type="number" id="buy-price" name="buy-price" ><br><br>

		<label for="sell-price">Selling Price:</label>
		<input type="number" id="sell-price" name="sell-price" >

        <input type="checkbox" name="display" id="display">
        <label for="display">Display</label>
        <br>
        <br>
		<input type="submit" value="Save">
		<input type="displayall" value="Display">

	</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Product Info</title>

</head>
<body>

</body>
</html>
