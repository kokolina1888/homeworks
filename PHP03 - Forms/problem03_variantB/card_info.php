<?php 
session_start();
if (!empty($_POST)) {
	if (empty ($_POST['card_info'])) {
		$err_card = "Моля въведете номера на Вашата карта!";
	}
	elseif (empty($_POST['money_account'])) {
		$err_money = "Моля въведете наличността по сметката си!";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Дебитна/кредитна карта</title>
</head>
<body>
	<form method="post" action="card_info.php">
		<p>номер на кредитната карта</p>
		<input type="text" name="card_info" value="<?php if (!empty($_POST['card_info'])) {
			echo $_POST['card_info'];
		}?>">
		<?php if (isset($err_card)) {
			echo $err_card;
		}?>
		<p>налична сума</p>
		<input type="text" name="money_account" value="<?php if (!empty($_POST['money_account'])) {
			echo $_POST['money_account'];
		}?>">
		<?php if (isset($err_money)) {
			echo $err_money;
		}?>
		<!--regex for credit card number-->
		<input type="submit" name="submit" value="Въведи">
	</form>
	<?php 
	if (!empty($_POST['card_info']) && !empty($_POST['money_account'])) {
	$money_account = $_POST['money_account'];
	$count = count($_SESSION['products']);
	$products = $_SESSION['products'];
	$quantity = $_SESSION['quantity'];
	$sum_products = 0;
	echo "Вашата количка съдържа -"
	?>
	<ol>
		<?php
		for ($i=0; $i < $count; $i++) { 
			$product_price[$i] = explode('_', $products[$i]);
				//var_dump($product_price[$i]);
			$product_total[$i] = $product_price[$i][1]*$quantity[$i];
			$sum_products = $sum_products + $product_total[$i];
			echo "<li>".$product_price[$i][0]." - ".$quantity[$i]." броя</li>";
		}
		?>
	</ol>
	<p>На обща стойност	<?php echo $sum_products." лева";?></p>
	<?php
	if ($money_account >= $sum_products) {
		$result = $money_account - $sum_products;
		echo "Остатъка по вашата сметка е ". $result." лева"."<br />";
		echo "<br />";
		echo "<a href='payment.php'>Потвърди покупката!</a>";
		echo " ";
		echo "<a href='unset.php'>Откажи покупката!</a>";

	}
	else {
		echo "Недостатъчна наличност по сметката Ви!"."<br />";
		echo "<br />";
		
	}

}
echo "<br />";
echo "<a href='logout.php'>Излизане</a>";


?>
</body>
</html>

