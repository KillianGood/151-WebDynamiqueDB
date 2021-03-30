<?php
require "database.php";
$db = new Database();
$sections = $db->getAllSections();
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
		<form method="post" action="addTeacher.php">
           <p>
		      <label>Genre :</label>
		      <input type="radio" name="genre" value="M">Homme
		      <input type="radio" name="genre" value="W">Femme
              <input type="radio" name="genre" value="O">Autre
		   </p>
		   <p>
		      <label for="firstname">Prénom :</label>
		      <input type="text" name="firstname" id="firstname" />
		   </p>
           <p>
		      <label for="name">Nom:</label>
		      <input type="text" name="name" id="name" />
		   </p>
           <p>
		      <label for="nickname">Surnom:</label>
		      <input type="text" name="nickname" id="nickname" />
		   </p>
		   <p>
		      <label for="origin">Origine du surnom :</label><br>
		      <textarea name="origin" id="origin"></textarea>
		   </p>
		   <p> 
           <div class="selectSection input">
                <select name="section" id="section">
                    <option value="0">Section </option>
                    <?php foreach($sections as $section) : ?>
                        <option value="<?= $section["idSection"]; ?>"><?= $section["secName"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
		   </p>
           <div class="btnSubmit">
		      <input type="submit" name="btnSubmit" value="Ajouter l'enseignant(e)" />
            </div>
            <div class="btnDelete">
		      <input type="reset" name="btnDelete" value="Effacer" />
            </div>
		</form>
        <?php 
        if(isset($_POST["btnSubmit"]))
        {
            if(empty($_POST["gender"]) || empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["nickname"]) || empty($_POST["origin"]) || $_POST["section"] == 0 )
        {
        echo "<h1 style='background-color:red; border-radius: 20px; text-align:center; height: 50px; width: 600px;'>Veuillez renseigner tous les champs !</h1>";
        } 
        else {
        $teachers = $db->getAllTeachers();
        $db->addTeacher( $_POST['name'], $_POST['surname'],$_POST['gender'], $_POST['nickname'], $_POST['origin']);
        $db->addTeacherSection($section['idSection']);
        echo "<h1 style='background-color:green; border-radius: 20px; text-align:center; height: 50px; width: 600px; color: white;'>L'enseigant a bien été ajouté !</h1>";
        }
    }
        ?>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
    </body>
</html>
