

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
    session_start();
    include('../include/ConnexionBd.php');
    include('../include/neige.php');
    if(!isset($_SESSION['Matricule'])){
        header('location:../index.html');
    }

?>
    <?php
        $stmt=$conn->prepare('SELECT * FROM utilisateurs WHERE Matricule = ?');
        $stmt->execute([$_SESSION["Matricule"]]);
        if($stmt->rowCount() >0){
            $user=$stmt->fetch();
        }
        
        $_SESSION['Nom'] = $user['Nom'];
    include('../include/genererPp.php');
    ?>

    <div class="en-tete">
        <h1>Educ237 - Tableau de Bord</h1>
        <div class="actions">
            <div class="btn"><a href="#">Accueil</a></div>
            <div class="btn" onmouseover="montrerDeroulant('cat')" onmouseout="fermerDeroulant('cat')">
                Mes sujets<img src="../img/deroulant.png" alt="cat" >
                <div id="cat" style="display: none;">
                    <p><a href="ensembleSujet.html">En cours </a></p>
                    <hr>
                    <p><a href="ensembleSujet.html">Termines</a></p>
                </div>
            </div>
            
            <div class="btn" onmouseover="montrerDeroulant('cat1')" onmouseout="fermerDeroulant('cat1')">
                Mes Parametres<img src="../img/deroulant.png" alt="cat" >
                <div id="cat1" style="display: none;">
                    <p><a href="ensembleSujet.html">En cours </a></p>
                    <hr>
                    <p><a href="ensembleSujet.html">Termines</a></p>
                </div>
            </div>
            <a href="Deconnexion.php"><div class="btn">Deconnexion</div></a>
        </div>
        <div class="profil">
            <div class="containerPhoto">
                <img src="../profilUsers/profil<?php echo $_SESSION['Matricule']?>.png" alt="<?php echo $user['Nom'];?>">
            </div>
            <div class="classe"><?php echo $user['Niveau'].' '.$user['Serie'];?></div>
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


        <div class="recherche-container">
            <div class="recherche-champ">
                <input type="search" name="" id = "" placeholder = "Rechercher un sujet">
            </div>
            <img src="../img/recherche.png" alt="">
        </div>


</body>


        <script>
            function montrerDeroulant(champ){
                document.getElementById(champ).style.display = 'block';

            }
            function fermerDeroulant(champ){
                document.getElementById(champ).style.display = 'none';

            }
        </script>
</html>