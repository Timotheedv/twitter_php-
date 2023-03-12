<?php
    require_once "connexion.php";

    if($_POST["content"] != "") {
        $data = [
            "content" => $_POST["content"],
            "date" => date("Y-m-d H:i:s")
        ];

        $requete = $database->prepare("INSERT INTO tweet (content, date) VALUES (:content, :date)");
        $requete->execute($data);

        if($requete) {
            header("Location: index.php");

        } else {
            echo "Une erreur est survenue";
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }

?>

<!--la page createtweet.php va permettre de récuperer et/ou envoyer les données des tweets qui seront stockés dans la base de donnée.
require_once "connexion.php" va permettre le suivi du chemin vers cette meme page.
Les informations du tweet vont etre récuperées afin que les tweets puisse etre affichés dans l'ordre le plus récent.
