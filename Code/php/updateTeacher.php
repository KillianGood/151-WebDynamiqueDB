<?php
//
// Author : Killian Good
// Date : 22.03.2021
// Description : adding a teacher to my website
//
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Surnom des enseignants</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Surnom des enseignants</h1>
        <a href="#" class="button">Zone pour le menu</a>
        <h3>Modification d'un enseignant</h3>
        <form action="/action_page.php">
        <input type="radio" id="homme" name="gender" value="homme">
            <label for="homme">Homme</label>
        <input type="radio" id="femme" name="gender" value="femme">
            <label for="femme">Femme</label>
        <input type="radio" id="autre" name="gender" value="autre">
            <label for="autre">Autre</label><br>
        <label for="name">Nom :</label>
            <input type="text" id="name" name="name"><br>
        <label for="name">Prénom :</label>
            <input type="text" id="firstname" name="firstname"><br>
        <label for="name">Surnom :</label>
            <input type="text" id="nickName" name="nickName"><br>
        <label for="desc">Description :</label>
            <textarea id="desc" name="desc"></textarea><br>
        <select name="section" id="section">
            <option value="">+</option>
            <option value="dog">Informatique</option>
            <option value="cat">Théorie</option>
        </select>
        <br><button type="button">Modifier</button>
    </body>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
            <p>© Copyright Killian Good - CIN2B</p>
    </footer>
</html>