<?php
session_start();
$level1 = array(array());
$p = rand(0, 99);
if (empty($_SESSION['cnt'])){
        $_SESSION['cnt'] = 0;
    }
    if (empty($_SESSION['result'])){
        $_SESSION['result'] = 0;
    }
if ($_SESSION['cnt'] <= 10) {
for ($i=0; $i < 100; $i+=2) { 
	$m = rand(1, 1000);
	$n = rand(1, 1000);	
	if ($m > $n) {
			//problem
		$level1[$i][0] = "$m"."-"."$n"."=?";	
			//answer
		$level1[$i][1] = $m - $n;					
	} else {
		//problem
		$level1[$i][0] = "$n"."-"."$m"."=?";	
			//answer
		$level1[$i][1] = $n - $m;		
	}
	//problem
	$level1[$i+1][0] = "$n"."+"."$m"."=?";	
			//answer
		$level1[$i+1][1] = $n + $m;		
	}
}
//var_dump($level1);
?>
<form action="index.php" method="post">
	<p><?php 
		$problem = $level1[$p][0];
		echo $problem;?>
	</p>
	<input type="text" name="user_answ">
	<input type="hidden" name="answ" value="<?php echo $level1[$p][1]; ?>">
	<p><input type="submit" name="submit" value="answer"></p>

</form>
<?php 

if(isset($_POST['submit'])) {
	 
     //echo $_SESSION['cnt'].' --> ';
            $_SESSION['cnt']++;
            echo "game ".$_SESSION['cnt'];
    if ($_POST['user_answ'] == $_POST['answ']) {
		echo "<h2>Correct!</h2>";
		
		$_SESSION['result'] += 5;
		echo "<h3>".$_SESSION['result']."</h3>";
	} else {
		echo "<h2>Wrong answer!</h2>";
		
		$_SESSION['result'] -= 5;
		echo "<h3>".$_SESSION['result']."</h3>";
	}
	//TODO when to proceed to the next level, when to loose the game ...
	if ($_SESSION['cnt'] == 10 && $_SESSION['result'] > 35 ) {
		header('Location: level2.php');
	} elseif($_SESSION['cnt'] == 10 && $_SESSION['result'] <= 0) {
		$_SESSION['cnt'] = 0;
		header('Location: end_of_game.php');
		
	}
}
echo "<p><a href='unset.php'>Start a new game</a></p>";
echo "<p><a href='logout.php'>Log out</a></p>";

?>