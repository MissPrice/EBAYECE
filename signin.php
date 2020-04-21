<?php
//recuperer les données venant de la page HTML
$Login = isset($_POST["Login"])? $_POST["Login"] : "";
$PasswordA = isset($_POST["PasswordA"])? $_POST["PasswordA"] : "";
$PasswordB = isset($_POST["PasswordB"])? $_POST["PasswordB"] : "";

//init
$DispId = NULL;
$DispMail = NULL;
$DispPassword= NULL;
$DispNom= NULL;
$DispPrenom= NULL;
$DispAdresse= NULL;
$DispNiveau = NULL;
/*
$_SESSION['UserId'] = NULL;
$_SESSION['VendeurId'] = NULL;
$_SESSION['AdminId'] = NULL;
*/
//identifier votre BDD
$database = "bdd";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root|votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

//si le bouton est cliqué

if ($_POST["button1"]){
    if ($db_found)
    {  
        if($PasswordA == $PasswordB)
        {
        $sql = "SELECT * FROM login";
        if ($Login != "")
        {
            //on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE Login LIKE '%$Login%'";
        }
        $result = mysqli_query($db_handle, $sql);
        //tester s'il y a de résultat
        if (mysqli_num_rows($result) == 0)
        {
            //le client correspondant n'existe pas
            $sql = "INSERT INTO login(Login,Mdp)VALUES('$Login','$PasswordA')";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful. <br>";
        }
            else
            {
                echo "email : $Login already registered <br>";
            }
        }
        else 
        {   
            echo "error : passwords don't match <br>";
        }
    }
    else
    {
        echo "Database not found";
    }
}
//fermer la connexion
mysqli_close($db_handle);
?>