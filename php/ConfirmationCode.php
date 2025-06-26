<?php
session_start();
if (isset($_SESSION["Code"])) {
    $code = $_SESSION["Code"];

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleAnimation.css">
    <link rel="stylesheet" href="../style/stylereinit.css">
    <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
    <title>Confirmation du Code - Educ237</title>
</head>

<body>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <div class="flocon"></div>
    <form action="ConfirmationCode.php" method="post">
        <h1>Confirmation</h1>
        <label for="code">Code de recuperation</label>
        <input type="text" placeholder="Code de recuperation" name="code">
        <input type="submit" value="Verifier">
    </form>

    <?php
        echo $code;
        $codeUtilisateur = '';
        if (isset($_POST['code'])) {
            $codeUtilisateur = $_POST['code'];
        }
        if ($code == $codeUtilisateur) {
            header('location:../resetMotDePasse.html');
        } else if ($codeUtilisateur != '') {
            echo '<div class = "error">Code errone : ' . $codeUtilisateur . '</div>';
        }
        echo $codeUtilisateur;
        var_dump($codeUtilisateur)
    ?>
</body>

</html>