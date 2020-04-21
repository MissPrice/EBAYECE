<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add delivery adress</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Add delivery adress</h2>
        <form action="addlivraison.php" method="post">
            <table>
                <tr>
                    <td>Nom:</td>
                    <td><input type="text" name="Nom"></td>
                </tr>
                <tr>
                    <td>Prénom:</td>
                    <td><input type="text" name="Prenom"></td>
                </tr>
                <tr>
                    <td>Adresse:</td>
                    <td><input type="text" name="Adresse"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="adddelivery_button" value="Valider"></td>
                </tr>
            </table>
        </form>
    </body>
</html>