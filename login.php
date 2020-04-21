<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Mail:</td>
                    <td><input type="text" name="Login"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="Password"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="login_button" value="Valider"></td>
                </tr>
            </table>
        </form>
    </body>
</html>