<?php

session_start();

//recuperer les données venant de la page HTML
$Login = isset($_POST["Login"])? $_POST["Login"] : "";
$Password = isset($_POST["Password"])? $_POST["Password"] : "";

//init
$DispId = NULL;
$DispMail = NULL;
$DispPassword= NULL;
$DispNom= NULL;
$DispPrenom= NULL;
$DispAdresse= NULL;
$DispType = NULL;
$DispNumero = NULL;
$DispNomPrenom = NULL;
$DispDateExp = NULL;
$DispCode = NULL;
$DispNiveau = NULL;
$_SESSION['UserId'] = NULL;
$_SESSION['VendeurId'] = NULL;
$_SESSION['AdminId'] = NULL;
$UserId = "";
$Login = "";
$Username = "";
$_SESSION['success'] = "";
$errors = array();

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
        $sql = "SELECT * FROM login";
        if ($Login != "")
        {
            //on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE Login LIKE '%$Login%'";
            if ($Password != "") {
                $sql .= "AND Mdp LIKE '%$Password%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
        //tester s'il y a de résultat
        if (mysqli_num_rows($result) == 0)
        {
            //le client correspondant n'existe pas
            echo "Item not found";
            header('Location:indexsignin.html');
        } 
        else 
        {   
            //on trouve le client correspondant
            while ($data = mysqli_fetch_assoc($result))
            {
                $DispId = $data['IdLogin'];
                $DispMail = $data['Login'];
                $DispPassword = $data['Mdp'];
                $DispNiveau = $data['Niveau'];
            }
            // Storing user id of the logged in user, 
            // in the session variable 
            if($DispNiveau == 'acheteur')
            {
                $_SESSION['UserId'] = $DispId;
            }
            if($DispNiveau == 'vendeur')
            {
                $_SESSION['VendeurId'] = $DispId;
            }
            if($DispNiveau == 'admin')
            {
                $_SESSION['AdminId'] = $DispId;
            }
             
          
            // Welcome message 
            $_SESSION['success'] = "login successful"; 
             echo "<br>";
             echo "IdClient = $DispId <br>";
             echo "Mail = $DispMail <br>";
             echo "Mdp = $DispPassword <br>";
             echo "Niveau = $DispNiveau <br>";
            
            ///livraison

            $sql = "SELECT * FROM livraison";
            if ($DispId != "")
            {
                $sql .=" WHERE IdLogin LIKE '%$DispId%'";
            }
            $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //pas d'adresse enregistrée
                echo "Pas d'adresse de livraison<br>";
                header('Location:addlivraison.html');
            }
            else
            {
                while ($data = mysqli_fetch_assoc($result))
            {
                $DispNom = $data['Nom'];
                $DispPrenom = $data['Prenom'];
                $DispAdresse = $data['Adresse'];
            }
                //on trouve l'adresse associée au client
                
                // Storing username of the logged in user, 
                // in the session variable 
                $_SESSION['Username'] = $DispNom; 
             echo "Nom = $DispNom <br>";
             echo "Prenom = $DispPrenom <br>";
             echo "Adresse = $DispAdresse <br>";
                
                ///paiement
                $sql = "SELECT * FROM paiement";
            if ($DispId != "")
            {
                $sql .=" WHERE IdLogin LIKE '%$DispId%'";
            }
            $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //pas d'adresse enregistrée
                echo "Pas d'infos de paiement<br>";
                header('Location:addpayment.html');
            }
                else
            {
                while ($data = mysqli_fetch_assoc($result))
            {
                $DispType = $data['Type'];
                $DispNumero = $data['Numero'];
                $DispNomPrenom = $data['NomPrenom'];
                $DispDateExp = $data['DateExp'];
                $DispCode = $data['Code'];
            }
                //on trouve l'adresse associée au client
                
                // Storing username of the logged in user, 
                // in the session variable 
                $_SESSION['Username'] = $DispNom; 
             echo "Type carte = $DispType <br>";
             echo "Numero = $DispNumero <br>";
             echo "Nom Prenom = $DispNomPrenom <br>";
             echo "Date Exp = $DispDateExp <br>";
             echo "CCV = $DispCode <br>";
            }
        }
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