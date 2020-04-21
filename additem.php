<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add item to market</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Add item to market</h2>
        <form action="additem.php" method="post">
            <table>
                <tr>
                    <td>Type carte:</td>
                    <td><input type="radio" name="Categorie" value="1">Ferraille ou Tresor</td>
                    <td><input type="radio" name="Categorie" value="2">Bon pour le musée</td>
                    <td><input type="radio" name="Categorie" value="3">Accessoire VIP</td>
                </tr>
                <tr>
                    <td>Nom item:</td>
                    <td><input type="text" name="Nom"></td>
                </tr>
                <tr>
                    <td>Photo:</td>
                    <td><input type="text" name="Photo"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><input type="text" name="Description"></td>
                </tr>
                <tr>
                    <td>Video:</td>
                    <td><input type="text" name="Video"></td>
                </tr>
                <tr>
                    <td>Prix:</td>
                    <td><input type="text" name="Prix"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="additem_button" value="Valider"></td>
                </tr>
            </table>
        </form>
    </body>
</html>