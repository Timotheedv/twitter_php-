<?php
    require_once "connexion.php";

    $data = [
        "id" => $_GET["id"]
    ];

    $requete = $database->prepare("DELETE FROM tweet WHERE id = :id");
    $requete->execute($data);

    header("Location: index.php");
//La page supprimer.php va permettre de supprimer un tweet à la fois sur l'interface du site intenet mais aussi dans la base de donnée
//On va donc récuperer l'identifiant du tweet "id" pour effectuer la requete de suppression du tweet
?>