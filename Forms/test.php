БРОИ!!!
<?php
session_start();
?>
<html>
    <head></head>
    <body>
        <form method="post" action="test.php">
            <input type="submit" name="count" value="Start counting" />
        </form>
        <?php
        if(isset($_POST['count'])){
            if(!($_SESSION['count'])){
                $_SESSION['count'] = 1;
            }else{
                $count = $_SESSION['count'] + 1;
                $_SESSION['count'] = $count;
            }
        }
        echo $_SESSION['count'];
        ?>
    </body>
</html>