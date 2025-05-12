<?php
    include('../include/ConnexionBd.php');
    include('../include/neige.php');
    session_start();
    if(!isset($_SESSION['Matricule'])){
        header('location:../index.html');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleAnimation.css">
    <link rel="stylesheet" href="../style/styleAccueil.css">
    <title>Accueil-Educ237</title>
</head>
<body>
    <?php
        $stmt=$conn->prepare('SELECT * FROM utilisateurs WHERE Matricule = ?');
        $stmt->execute([$_SESSION["Matricule"]]);
        if($stmt->rowCount() >0){
            $user=$stmt->fetch();
        }
    ?>

    <div class="en-tete">
        <h1>Educ237 - Tableau de Bord</h1>
        <div class="actions">
            <a href="Deconnexion.php"><div class="btn">Deconnexion</div></a>
        </div>
    </div>
    
    <h2>Salut <?php if ($user['Sexe'] == 'F') {
            $civilite ='Mlle';
        }
        else{
            $civilite = 'M';
        }
        echo $civilite.' '.$user['Nom'];?>
    </h2>
        <?php ?>

</body>
</html>