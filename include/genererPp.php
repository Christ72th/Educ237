<?php
    $nom ="";
    $nom = strtoupper(substr($_SESSION['Nom'],0,2));
    $longueur = 100;
    $largeur =100;
    $pp=imagecreatetruecolor($largeur, $longueur);

    $couleurBg = imagecolorallocate($pp, 255, 255, 255);
    $couleurfg = imagecolorallocate($pp, 0, 0, 240);

    imagefilledrectangle($pp, 0, 0, $largeur, $longueur, $couleurBg);

    $font = "../font/police.ttf";
    imagettftext($pp,60,-20,0,50,$couleurfg, $font, $nom);

    $nompp = '../profilUsers/profil'. $_SESSION["Matricule"].'.png';
    imagepng($pp,$nompp);
    imagedestroy($pp);
?>