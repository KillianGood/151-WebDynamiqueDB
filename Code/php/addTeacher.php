<?php
require "database.php";
$db = new Database();
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
        <?php 
                if(isset($_POST['btnSubmit'])) {
                    if(!(isset($_POST['genre'])) || empty($_POST['name']) ||  empty($_POST['firstname']) ||  empty($_POST['nickname']) || empty($_POST['origin'])) { // || $_POST['section'] == 'section') {
                        echo '<h1 style="color:red; margin:0; padding-top:40px; ">Veuillez renseignez tout les champs</h1>';
                    }
                    else {
                        $teachers = $db->getAllTeachers();
                        $sections = $db->getAllSections();

                        foreach($teachers as $teacher) {

                        }

                        foreach($sections as $section) {

                        }

                        $db->addTeacher($_POST['name'], $_POST['firstname'], $_POST['genre'], $_POST['nickname'], $_POST['origin']);
                        // $db->addTeacherSection($teacher['idTeacher'] + 1, $section['idSection']);
                    }
                }
            ?>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
    </body>
</html>
