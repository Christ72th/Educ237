<?php
function genererCode()
{
    $a = rand(100001, 999999);
    return $a;
}

function sendMessage($email, $code)
{
    $sujet = 'Code de reinitialisation';
    echo $email;
    if (mail("$email", $sujet, "Votre code de verification est : " . $code, "From : christianeyebe72@gmail.com")) {
        echo "Email envoyé avec succès.";
        return true;
    } else {
        return false;
    }
}

session_start();
include "../include/ConnexionBd.php";
include "../include/genererCode.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    try {
        $sql = $conn->prepare("SELECT Email FROM Utilisateurs WHERE Email = ?");
        $sql->execute([$email]);
        if ($sql->rowCount() == 1) {
            $code = genererCode();
            $row = $sql->fetch();
            if (sendMessage($email, $code)) {
                $_SESSION['Code']= $code;
                header('location:ConfirmationCode.php');
            } else {
                echo "L'envoi du mail a échoué.";
            }
        } else {
            echo 'Erreur interne veuillez reessayer plus tard';
        }
    } catch (PDOException $e) {
        echo 'L\'erreur : ' . $e->getMessage() . ' s\'est produite';
    }
}


?>