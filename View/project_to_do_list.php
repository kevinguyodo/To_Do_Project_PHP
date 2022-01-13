<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/home.css">
    <title>Document</title>
</head>

<body>
    <div class="Welcome">
        <h2>Bienvenue dans votre Projet</h2>
    </div>
    <div class="Project">
        <button>Numéro du projet</button>
    </div>
    <?=addToDoList()?>
    <!-- <button class="add"><img src="./IMG/plus_button.png"></button> -->
    
    <!-- La variable content sera le contenu qui sera apporté à la page -->
    <?= $content?>
    <!-- Appelle de fonction pour test -->
    
</body>

</html>