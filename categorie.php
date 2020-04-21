<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categories</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Categories</h2>
                <form action="displayallitems.php" method="post">
                
                    <p>Ferraille ou trésor:</p>
                    <input type="submit" name="C1" value ="Ferraille ou trésor">
                    <p>Bon pour le musée:</p>
                    <input type ="submit" name="C2" value="Bon pour le musée">
                    <p>Accessoire VIP:</p>
                    <input type="submit" name="C3" value="Accessoire VIP">
                    <p>All:</p>
                    <input type="submit" name="C4" value="All">
            </form>
    </body>
</html>