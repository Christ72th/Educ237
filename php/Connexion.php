<?php
    include('../include/ConnexionBd.php');
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
    }
    try {
        $stmt = $conn->prepare('SELECT Motpasse, Matricule FROM utilisateurs WHERE Email = ?');
        $stmt->execute([$email]);
        if($stmt->rowCount()>0 ){
            $user = $stmt->fetch();
        }
        if($user && password_verify($_POST['password'],$user['Motpasse'])){
            $_SESSION['Matricule']=$user["Matricule"];
            header('location:Accueil.php');
        }
    } catch (PDOEXCEPTION $e) {
        echo $e.getMessage();
    }

?>