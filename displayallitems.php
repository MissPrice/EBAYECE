<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Displaying items</h2>
        
        <?php include('server.php');
        
        //identifier votre BDD
$database = "bdd";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root|votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

        
        if(isset($_POST['C1']))
        {
        $sql = "SELECT * FROM item WHERE Categorie LIKE '1'";
        $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //les items correspondant n'existent pas
                echo "no items found";
            }
            else
            {
                //on trouve le client correspondant
                while ($data = mysqli_fetch_assoc($result))
                {
                    $IdItem = $data['IdItem'];
                    $NomItem = $data['Nom'];
                    $PhotoItem = $data['Photo'];
                    $DescItem = $data['Description'];
                    $VideoItem = $data['Video'];
                    $PrixItem = $data['Prix'];
                    $VendeurId = $data['IdVendeur'];
                    echo "Item ID = $IdItem <br>";
                    echo "Nom item = $NomItem <br>";
                    echo "<a href ='item.php' name='$IdItem'>  $PhotoItem </a> <br> ";
                    echo "Description = $DescItem <br>";
                    echo "Video = $VideoItem <br>";
                    echo "Prix = $PrixItem € <br>";
                    echo "Vendeur = $VendeurId <br><br>";
                }
            }
        }
        if(isset($_POST['C2']))
        {
        $sql = "SELECT * FROM item WHERE Categorie LIKE '2'";
        $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //les items correspondant n'existent pas
                echo "no items found";
            }
            else
            {
                //on trouve le client correspondant
                while ($data = mysqli_fetch_assoc($result))
                {
                    $IdItem = $data['IdItem'];
                    $NomItem = $data['Nom'];
                    $PhotoItem = $data['Photo'];
                    $DescItem = $data['Description'];
                    $VideoItem = $data['Video'];
                    $PrixItem = $data['Prix'];
                    $VendeurId = $data['IdVendeur'];
                    echo "Item ID = $IdItem <br>";
                    echo "Nom item = $NomItem <br>";
                    echo "<a href ='item.php' name='$IdItem'>  $PhotoItem </a> <br> ";
                    echo "Description = $DescItem <br>";
                    echo "Video = $VideoItem <br>";
                    echo "Prix = $PrixItem € <br>";
                    echo "Vendeur = $VendeurId <br><br>";
                }
            }
        }
        if(isset($_POST['C3']))
        {
        $sql = "SELECT * FROM item WHERE Categorie LIKE '3'";
        $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //les items correspondant n'existent pas
                echo "no items found";
            }
            else
            {
                //on trouve le client correspondant
                while ($data = mysqli_fetch_assoc($result))
                {
                    $IdItem = $data['IdItem'];
                    $NomItem = $data['Nom'];
                    $PhotoItem = $data['Photo'];
                    $DescItem = $data['Description'];
                    $VideoItem = $data['Video'];
                    $PrixItem = $data['Prix'];
                    $VendeurId = $data['IdVendeur'];
                    echo "Item ID = $IdItem <br>";
                    echo "Nom item = $NomItem <br>";
                    echo "<a href ='item.php' name='$IdItem'>  $PhotoItem </a> <br> ";
                    echo "Description = $DescItem <br>";
                    echo "Video = $VideoItem <br>";
                    echo "Prix = $PrixItem € <br>";
                    echo "Vendeur = $VendeurId <br> <br>";
                }
            }
        }
        if(isset($_POST['C4']))
        {
        $sql = "SELECT * FROM item";
        $result = mysqli_query($db_handle, $sql);
            //tester s'il y a de résultat
            if (mysqli_num_rows($result) == 0)
            {
                //les items correspondant n'existent pas
                echo "no items found";
            }
            else
            {
                //on trouve le client correspondant
                while ($data = mysqli_fetch_assoc($result))
                {
                    $IdItem = $data['IdItem'];
                    $NomItem = $data['Nom'];
                    $PhotoItem = $data['Photo'];
                    $DescItem = $data['Description'];
                    $VideoItem = $data['Video'];
                    $PrixItem = $data['Prix'];
                    $VendeurId = $data['IdVendeur'];
                    echo "Item ID = $IdItem <br>";
                    echo "Nom item = $NomItem <br>";
                    echo "<a href ='item.php' name='$IdItem'>  $PhotoItem </a> <br> ";
                    echo "Description = $DescItem <br>";
                    echo "Video = $VideoItem <br>";
                    echo "Prix = $PrixItem € <br>";
                    echo "Vendeur = $VendeurId <br><br>";
                }
            }
        }
        ?>

    </body>
</html>