<?php session_start();


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
            }
        session_destroy();
        unset($_SESSION['VendeurId']);
    }
    else
    {
        echo "Database not found";
    }
}
//fermer la connexion
mysqli_close($db_handle);
?>