<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
session_start();

if (!isset($_SESSION['UserId'])) {
		$_SESSION['msg'] = "You have to log in first";
		header('location: login.php');
	}

if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['UserId']);
		header("location: login.php");
	}



?>
         
        <form action="login.php" method="post">
            <input type="submit" name="button1" value="Login">
        </form>
        <form action="addlivraison.php" method="post">
            <input type="submit" name="button2" value="Livraison">
        </form>
        <form action="addpayment.php" method="post">
            <input type="submit" name="button3" value="Paiement">
        </form>
        <form action="additem.php" method="post">
            <input type="submit" name="button4" value="Vendre">
        </form>
        <form action="categorie.php" method="post">
            <input type="submit" name="button5" value="Categories">
        </form>
        <?php  if (isset($_SESSION['UserId'])) : ?> 
            <p> 
                Welcome  
                <strong> 
                    <?php echo $_SESSION['UserId']; ?>
                    <p> <a href="index.php?logout='1'" style="color: red;">Click here to Logout</a> </p>
                </strong> 
            </p> 
        <?php endif ?> 
    </body>
</html>