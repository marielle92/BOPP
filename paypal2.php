<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment</title>
</head>
<body>
	<div class="payment-container">
		<h2 class="header">Downpayment</h2>
		<form action="checkout.php" method="post" autocomplete="off">
			<label for="item">
				Product
				<input type="text" name="product">
			</label>
			<label for="amount">
				Price
				<input type="text" name="price">
			</label>
			<input type="submit" value="pay">
		</form>
	</div>
</body>
</html>