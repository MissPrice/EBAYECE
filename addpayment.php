<?php

session_start();

//recuperer les données venant de la page HTML
$Numero = isset($_POST["Numero"])? $_POST["Numero"] : "";
$NomPrenom = isset($_POST["NomPrenom"])? $_POST["NomPrenom"] : "";
$DateExp = isset($_POST["DateExp"])? $_POST["DateExp"] : "";
$Code = isset($_POST["Code"])? $_POST["Code"] : "";
$Type= isset($_POST["Type"])?$_POST["Type"] : "";

//init
$DispId = $_SESSION['UserId'];
$DispDateExp = NULL;
$DispCode= NULL;
$DispType= NULL;
$DispNomPrenom= NULL;
$DispNumero= NULL;


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
        $sql = "SELECT * FROM paiement";
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
            $sql = "INSERT INTO paiement(IdLogin,Type,Numero,NomPrenom,DateExp,Code)VALUES($DispId,"$_POST['Type']",'$Numero','$NomPrenom','$DateExp','$Code')";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful UserId = $DispId<br>";
        }
            else
            {
                echo "Paiement infos for UserId = $DispId <br>";
                while ($data = mysqli_fetch_assoc($result))
            {
                $DispType = $_POST['Type'];
                $DispNumero = $data['Numero'];
                $DispNomPrenom = $data['NomPrenom'];
                $DispDateExp = $data['DateExp'];
                $DispCode = $data['Code'];
            }
             echo "Type carte = $DispType <br>";
             echo "Numero = $DispNumero <br>";
             echo "Nom Prenom = $DispNomPrenom <br>";
             echo "Date Exp = $DispDateExp <br>";
             echo "CCV = $DispCode <br>";
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