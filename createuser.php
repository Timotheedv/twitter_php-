<?php

require_once "connexion.php";

if($_POST["pseudo"] != "" && $_POST["password"] != "" && $_POST["name"] != ""  && $_POST["mail"] != "" && $_POST["image"] != ""){
    $data = [
        "pseudo" => $_POST["pseudo"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "name" => $_POST["name"],
        "mail" => $_POST["mail"],
        "image" => $_POST["image"]
    ];

    $requete = $database->prepare("INSERT INTO users (pseudo, password, name, mail, image) VALUES (:pseudo, :password, :name, :mail, :image)");
    $requete->execute($data);

    if($requete){
        header("Location: inscription.php");

    }else{
       echo "Veillez remplir tous les champs";
    } 
}
?>
<!--Ici meme fonctionnement pour la création d'un compte. On récupère les données avec $_POST tout en brouillant le mot de passe pour rester 
en toute légalité.
La requete va permettre d'affiner les recherches et de selectionner des élements spécifiques. La requete doit etre executer pour fonctionner.