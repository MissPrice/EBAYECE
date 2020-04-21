<?php include('login.php');


if (isset($_POST['buttonOUT'])) { 
    session_destroy(); 
    unset($_SESSION['UserId']);
    unset($_SESSION['UserName']);
    header("location: index.html"); 
}
header('Location:index.html');
?>