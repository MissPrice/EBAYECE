<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Sign in</h2>
        <form action="signin.php" method="post">
            <table>
                <tr>
                    <td>Mail:</td>
                    <td><input type="text" name="Login"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="PasswordA"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="PasswordB"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="signin_button" value="Valider"></td>
                </tr>
            </table>
        </form>
    </body>
</html>