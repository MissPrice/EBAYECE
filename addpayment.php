<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>add payment method</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Add payment infos</h2>
        <form action="addpayment.html" method="post">
            <table>
                <tr>
                    <td>Type carte:</td>
                    <td><input type="radio" name="Type" value="VISA">VISA</td>
                    <td><input type="radio" name="Type" value="VISAElectron">VISA Electron</td>
                    <td><input type="radio" name="Type" value="Mastercard">Mastercard</td>
                    <td><input type="radio" name="Type" value="AmericanExpress">American Express</td>
                </tr>
                <tr>
                    <td>Numéro carte:</td>
                    <td><input type="text" name="Numero"></td>
                </tr>
                <tr>
                    <td>Nom et Prénom:</td>
                    <td><input type="text" name="NomPrenom"></td>
                </tr>
                <tr>
                    <td>Date Expiration</td>
                    <td><input type="text" name="DateExp"></td>
                </tr>
                <tr>
                    <td>Code secret:</td>
                    <td><input type="password" name="Code"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="addpayment_button" value="Valider"></td>
                </tr>
            </table>
        </form>
    </body>
</html>