<?php

$genre = $_POST['genre'];
$age = $_POST['age'];
$fc_repos = $_POST['fc_repos'];


if ($genre === 'male' && !empty($age)) {
    $fc_max = 220 - $age;
}

else if ($genre === 'female' && !empty($age)) {
    $fc_max = 226 - $age;
}

else {
    // TODO ici et/ou ailleurs : Gestion précise des erreurs : âges & rythmes cardiaques loufoques, etc ...
}

if ($age && $fc_repos !== null) {
    $result = ($fc_max - $fc_repos) / 2 + $fc_repos;
}

else {
    $result = 'Il y a une erreur dans une de vos données';
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lipox Calculator</title>
</head>
<body>
    <div class="container">
        <div class="calculator">
            <h1>Lipox Calculator</h1>
            <form action="" method="POST">
                <label for="genre">Sélectionnez votre sexe</label>
                <select name="genre" id="genre">
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                </select>
                <label for="age">Entrez ici votre âge</label>
                <input id="age" name="age" type="number">
                <label for="fc_repos">Entez ici votre fréquence cardiaque au repos</label>
                <input id="fc_repos" name="fc_repos" type="number">
                <input type="submit" value="Calculer">
            </form>

            <p>Votre seuil de lipolyse s'affiche ici : <?= $result ?> </p>
        </div>
    </div>
</body>
</html>