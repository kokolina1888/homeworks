<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Events</title>
</head>
<body>
	<form action="01.php" method="post">
		<p>Изберете категория събитие -</p>
		<input type="radio" name="type" value="music" required>Музика
		<input type="radio" name="type" value="sport">Спорт
		<input type="radio" name="type" value="cinema">Кино
		<P>Къде - </P>
		<select name="place">
			<option value="Vratsa">Враца</option>
			<option value="Sofia">София</option>
			<option value="Kavarna">Каварна</option>
		</select>
		<input type="submit" value="Избери">	
	</form>
	<?php 
	//тук слагам post, защото се съмнявам, че Eмо Чолаков ще може да събере прогнозата си в 250 символар колкото е ограничението за get!
	
	if (!empty($_GET)) {
		$type = $_GET['type'];
		$place = $_GET['place'];
		if ($place == 'Kavarna') {
			if ($type == 'music') {
				echo "<br />";
				echo "Kavarna Rock Fest от 28 юни до 2 юли 2015 година";
			}
			elseif ($type == 'sport') {
				echo "<br />";
				echo "Шампионат по ветроходство, Каварна 22-25 юни 2015 година";
			}
			else {
				echo "<br />";
				echo "Няма събитие по посочените критерии!";
			}
		}
		if ($place == 'Vratsa') {
			if ($type == 'music') {
				echo "<br />";
				echo "Рокерски събор Леденика, 25-28 юни 2015 година";
			}
			elseif ($type == 'sport') {
				echo "<br />";
				echo "Национален шампионат по волейбол за младежи и девойки, 1-5 юни 2015 година.";
			}
			else {
				echo "<br />";
				echo "Няма събитие по посочените критерии!";
			}
		}
		if ($place == 'Sofia') {
			if($type == 'cinema') {
				echo "<br />";
				echo "София Филм Фест - 22 - 30 юни 2015 година.";

			}
			elseif ($type == 'sport') {
				echo "<br />";
				echo "Световен ншампионат по волейбол. Зала Арена Армеец, 22-28 юни 2015 година";
			}
			elseif ($type == 'music') {
				echo "<br />";
				echo "Roxette, Зала Арена Армеец, 18 юни 2015 година ";
			}
		}
	}
	?>	
</body>
</html>