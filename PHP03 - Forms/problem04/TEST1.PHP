РАБОТИ - НЕКСТ - УВЕЛИЧАВАР КЛИЪР - ИЗЧИСТВА!
<?php session_start()?>
<form name="testForm" method="post">
<?php 
    if (empty($_SESSION['cnt'])){
        $_SESSION['cnt'] = 0;
    }
?>

<input type="submit" name="next" id="next" value="NEXT"/>
<input type="submit" name="clear" id="clear" value="CLEAR"/>

<?php
    if(isset($_POST['next'])){
        if($_SESSION['cnt']< 10){
            echo $_SESSION['cnt'].' --> ';
            $_SESSION['cnt']++;
            echo $_SESSION['cnt'];
        }
    }
    if(isset($_POST['clear'])){
        $_SESSION['cnt'] = 0;
    }
?>
</form>