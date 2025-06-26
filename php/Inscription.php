<?php
    include("../include/ConnexionBd.php");
    include("../include/generer.php");
    if (isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['date']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['filiere']) && isset($_POST['email']) && isset($_POST['email']) && isset($_POST['password'])) {
        header('location:../Inscription.html');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $matricule = $id;
        $nom = $_POST['name'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe']; 
        $date = $_POST['date'];
        $lieu = $_POST['lieu'];
        $niveau = $_POST['niveau'];
        $filiere = $_POST['filiere'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    }
    try {

        $stmt = $conn->prepare("INSERT INTO utilisateurs(Matricule, Nom, Prenom, Sexe, LieuNaissance, DateNaissance, Email, Niveau, Serie, DateCreation, Motpasse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->execute([$matricule, $nom, $prenom, $sexe, $lieu, $date, $email, $niveau, $filiere, $password]);
        header('location:../Connexion.html');
    } catch (PDOEXception $e) {
        if($e->getCode()==1062){
            $errors[]='Compte existant';
            $_SESSION['Errors']=$errors;
            echo'Ce compte est existe deja';
            echo'<script>';
                    echo'alert("Cet email est deja associé à un compte")';
            echo'</script>';
        }
        echo $e->getMessage();
    }
?>