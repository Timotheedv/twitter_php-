
<!--Dans la page recherche.php, on va pouvoir effectuer une recherche en fonction du texte émis par l'utilisateur-->

<?php
    require_once "connexion.php";

    if ($_GET["recherche"]) {
        $data = [
            "recherche" => $_GET["recherche"]
        ];

        $requete = $database->prepare("SELECT * FROM tweet WHERE content LIKE CONCAT ('%', :recherche, '%')"); 
        //L'attribut WHERE sert à isoler certaines lignes, on réalise donc une concaténation avec l'attribut LIKE pour une recherche spécifique,
        //ici la recherche se fera en fonction des lettres recherché
        $requete->execute($data);

        $requeteimage = $database->prepare("SELECT image FROM users WHERE id=1");
        $requeteimage->execute();

        $image = $requeteimage->fetchAll(PDO::FETCH_ASSOC)[0]["image"];        
        //ici la partie associative est conservé avec fetchAll(PDO::FETCH_ASSOC)
        $tweet = $requete->fetchAll(PDO::FETCH_ASSOC);
        //execution de la requete
        foreach($tweet as $article) { ?>
            <div>
                <img src = <?php echo $image; ?>>
                <p><?php echo $article["content"]; ?><p>
                <p><?php echo $article["date"]; ?><p>
            </div>
            <hr>
        <?php
        }
        //Ici dans le html on créer une boucle foreach qui va apermettre de parcourir un à un les élements du tableaux :
        //Pour chacun de mes tweets que je stock dans une variable article une image sera insérée (toujours la meme dans cette exercice),
        //un texte et la date à laquelle le message et l'image ont été publiés
    } else {
        echo "Veuillez remplir le champ de recherche";
    }
?>