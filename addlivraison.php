<?php

session_start();

//recuperer les données venant de la page HTML
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";

//init
$DispId = $_SESSION['UserId'];
$DispMail = NULL;
$DispPassword= NULL;
$DispNom= NULL;
$DispPrenom= NULL;
$DispAdresse= NULL;


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
        $sql = "SELECT * FROM livraison";
        if ($DispId != "")
        {
            //on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE IdLogin LIKE '%$DispId%'";
        }
        $result = mysqli_query($db_handle, $sql);
        //tester s'il y a de résultat
        if (mysqli_num_rows($result) == 0)
        {
            //le client correspondant n'existe pas
            $sql = "INSERT INTO livraison(IdLogin,Nom,Prenom,Adresse)VALUES($DispId,'$Nom','$Prenom','$Adresse')";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful UserId = $DispId<br>";
        }
            else
            {
                echo "error with UserId = $DispId <br>";
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