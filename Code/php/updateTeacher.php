<?php 
require "database.php";
$db = new Database();
$id = $_GET["idTeacher"];
$oneTeachers = $db->getOneTeacher($id);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
		ETML
		Auteur      : Killian Good
		Date        : 23.03.2021
		Description : Page de détails pour chaque enseignant
		-->
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <title>Surnom</title>
    </head>
    <body>
    <h1>Surnom des enseignants</h1>
    <a href="index.php" class="button">Zone pour le menu</a>
    <h2>Ajout d'un enseignant</h2>
    <?php foreach($oneTeachers as $oneTeacher): ?>
		<form method="post" action="addTeacher.php">
           <p>
		      <label>Genre :</label>
		      <input type="radio" name="genre" value="M">Homme
		      <input type="radio" name="genre" value="W">Femme
              <input type="radio" name="genre" value="O">Autre
		   </p>
		   <p>
		      <label for="firstname">Prénom :</label>
		      <input type="text" name="firstname" id="firstname" value="<?= $oneTeacher["teaFirstname"] ?>"/>
		   </p>
           <p>
		      <label for="name">Nom:</label>
		      <input type="text" name="name" id="name" value="<?= $oneTeacher["teaName"] ?>"/>
		   </p>
           <p>
		      <label for="nickname">Surnom:</label>
		      <input type="text" name="nickname" id="nickname" value="<?= $oneTeacher["teaNickname"] ?>"/>
		   </p>
		   <p>
		      <label for="origin">Origine du surnom :</label><br>
		      <textarea name="origin" id="origin" rows="3" cols="50">
                <?= $oneTeacher["teaOrigin"] ?>
              </textarea>
		   </p>
		   <p>
		      <label for="section">Section :</label>
		      <select name="section" id="section">
		         <option value="info">Informatique</option>
		         <option value="theory">Théorie</option>
		      </select>
		   </p>
           <div class="btnSubmit">
		      <input type="submit" name="btnSubmit" value="Ajouter l'enseignant(e)" />
            </div>
            <div class="btnDelete">
		      <input type="reset" name="btnDelete" value="Effacer" />
            </div>
		</form>
        <?php endforeach; ?>