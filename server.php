<?php

session_start();

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


if (isset($_POST["login_button"])){
    //recuperer les données venant de la page HTML
$Login = isset($_POST["Login"])? $_POST["Login"] : "";
$Password = isset($_POST["Password"])? $_POST["Password"] : "";
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
            header('Location:indexsignin.php');
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
            $_SESSION['UserId'] = $DispId;
            // Welcome message 
            $_SESSION['success'] = "login successful"; 
             echo "<br>";
             echo "IdClient = $DispId <br>";
             echo "Mail = $DispMail <br>";
             echo "Mdp = $DispPassword <br>";
             echo "Niveau = $DispNiveau <br>";
            header('location: index.php');
        }
    }
}
///signin
if (isset($_POST["signin_button"])){
    
    //recuperer les données venant de la page HTML
$Login = isset($_POST["Login"])? $_POST["Login"] : "";
$PasswordA = isset($_POST["PasswordA"])? $_POST["PasswordA"] : "";
$PasswordB = isset($_POST["PasswordB"])? $_POST["PasswordB"] : "";
    
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
            while ($data = mysqli_fetch_assoc($result))
            {
                $DispId = $data['IdLogin'];
                $DispMail = $data['Login'];
                $DispPassword = $data['Mdp'];
                $DispNiveau = $data['Niveau'];
                $_SESSION['UserId'] = $DispId;
                header('location: index.php');
                
            }
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


///add livraison
//si le bouton est cliqué

if (isset($_POST["adddelivery_button"])){
    
    //recuperer les données venant de la page HTML
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";

    
    if ($db_found)
    {  
        $sql = "SELECT * FROM livraison";
        $DispId = $_SESSION['UserId'];
        if ($DispId != "")
        {
            //on cherche l'adresse avec cet id'
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
            header('location: index.php');
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
///add payment
//si le bouton est cliqué

if (isset($_POST["addpayment_button"])){
    
    //recuperer les données venant de la page HTML
$Numero = isset($_POST["Numero"])? $_POST["Numero"] : "";
$NomPrenom = isset($_POST["NomPrenom"])? $_POST["NomPrenom"] : "";
$DateExp = isset($_POST["DateExp"])? $_POST["DateExp"] : "";
$Code = isset($_POST["Code"])? $_POST["Code"] : "";
$Type= isset($_POST["Type"])?$_POST["Type"] : "";
    
    if ($db_found)
    {  
        $sql = "SELECT * FROM paiement";
        $DispId = $_SESSION['UserId'];
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
            $sql = "INSERT INTO paiement(IdLogin,Type,Numero,NomPrenom,DateExp,Code)VALUES($DispId,'$Type','$Numero','$NomPrenom','$DateExp','$Code')";
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
             header('location: index.php');
            }
    }
    else
    {
        echo "Database not found";
    }
}

///add item
//si le bouton est cliqué

if (isset($_POST["additem_button"])){
    
    //recuperer les données venant de la page HTML
$Photo = isset($_POST["Photo"])? $_POST["Photo"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Description = isset($_POST["Description"])? $_POST["Description"] : "";
$Video = isset($_POST["Video"])? $_POST["Video"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Categorie = isset($_POST["Categorie"])?$_POST["Categorie"] : "";

//init
/*
$DispId = $_SESSION['VendeurId'];
*/
///DEFAULT
$DispId = $_SESSION['UserId'];
    
    if ($db_found)
    {  
        $sql = "SELECT * FROM item";
        if ($DispId != "")
        {
            //on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE Nom LIKE '%$Nom%'";
        }
        $result = mysqli_query($db_handle, $sql);
        //tester s'il y a de résultat
        if (mysqli_num_rows($result) == 0)
        {
            //le client correspondant n'existe pas
            $sql = "INSERT INTO item(Nom,Photo,Description,Video,Prix,Categorie,IdVendeur)VALUES('$Nom','$Photo','$Description','$Video','$Prix','$Categorie',$DispId)";
            $result = mysqli_query($db_handle, $sql);
            echo "Add successful Item : $Nom<br>";
        }
            else
            {
                echo "Paiement infos for Item = $Nom <br>";
                while ($data = mysqli_fetch_assoc($result))
            {
                $Categorie = $data['Categorie'];
                $Nom = $data['Nom'];
                $Photo = $data['Photo'];
                $Description = $data['Description'];
                $Video = $data['Video'];
                $Prix = $data['Prix'];
            }
             echo "Categorie = $Categorie <br>";
             echo "Nom = $Nom <br>";
             echo "Photo = $Photo <br>";
             echo "Description = $Description <br>";
             echo "Video = $Video <br>";
             echo "Prix = $Prix <br>";
             echo "Vendeur = $DispId <br>";
             header('location: index.php');
            }
    }
    else
    {
        echo "Database not found";
    }
}

///choose delivery
/*
{
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
}
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
}*/
//fermer la connexion
mysqli_close($db_handle);
?>