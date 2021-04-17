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
		      <input type="radio" name="teaGender" value="M">Homme
		      <input type="radio" name="teaGender" value="W">Femme
              <input type="radio" name="teaGender" value="O">Autre
		   </p>
		   <p>
		      <label for="teaFirstname">Prénom :</label>
		      <input type="text" name="teaFirstname" id="teaFirstname" />
		   </p>
           <p>
		      <label for="teaName">Nom:</label>
		      <input type="text" name="teaName" id="teaName" />
		   </p>
           <p>
		      <label for="teaNickname">Surnom:</label>
		      <input type="text" name="teaNickname" id="teaNickname" />
		   </p>
		   <p>
		      <label for="teaOrigin">Origine du surnom :</label><br>
		      <textarea name="teaOrigin" id="teaOrigin"></textarea>
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
            if(empty($_POST["teaGender"]) || empty($_POST["teaFirstname"]) || empty($_POST["teaName"]) || empty($_POST["teaNickname"]) || empty($_POST["teaOrigin"]) || $_POST["section"] == 0 )
        {
        echo "<h1>Veuillez remplir tous les champs</h1>";
        } 
        else 
        {
            $teachers = $db->getAllTeachers();
            $db->addTeacher( $_POST['teaFirstname'], $_POST['teaName'],$_POST['teaGender'], $_POST['teaNickname'], $_POST['teaOrigin']);
            $db->addTeacherSection($section['idSection']);
            echo "<h3>Enseignant ajouté(e)</h3>";
        }
    }
        ?>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
    </body>
</html>
