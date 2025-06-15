
<?php 
    
    session_start();
    include('../include/ConnexionBd.php');
    include('../include/neige.php');
    if(!isset($_SESSION['Matricule'])){
        header('location:../index.html');
    }

?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametres - Educ237</title>
</head>
<body>
</body>
</html>