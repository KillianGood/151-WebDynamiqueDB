<?php
require "database.php";
$db = new Database();
$id = $_GET["idTeacher"];

$teachers = $db->getOneTeacher($id);
$sections = $db->getOneTeacherSection($id);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
		ETML
		Auteur      : Killian Good
		Date        : 22.03.2021
		Description : Detail page of my website
		-->
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <title>Surnom</title>
    </head>
    <body>
    <a href="index.php" class="button">Zone pour le menu</a>
    <?php foreach($teachers as $teacher): ?> 
        <h3>Détails : <?= $teacher["teaName"] ?><?= " ";?><?= $teacher["teaFirstname"] ?>
        </div>
            <?php if($teacher["teaGender"] == "M")
            {
                echo '<img src="../../icons/maleGender.png" width"22px" height="22px" alt="icons">';
            }
            else 
            {
                echo '<img src="../../icons/femaleGender.png" width"22px" height="22px" alt="icons">';
            }?>
        <?php foreach($sections as $section): ?> 
        <p>Section : <?= $section["secName"] ?></p> 
        <?php endforeach; ?>   
        <div class="iconsDetail">
            <a href="updateTeacher.php?idTeacher=<?= $teacher["idTeacher"]; ?>"><img src="../../icons/edit.svg"></img></a>
            <a href="deleteTeacher.php?idTeacher=<?= $teacher["idTeacher"]; ?>" onclick="return confirm('Êtes vous sûr de voiloir supprimer l\'enseignant ?')"><img src="../../icons/trash.svg"></img></a>
        </div>
        <h4>Surnom : <?= $teacher["teaNickname"] ?></h4>
        <h4>Origine : <?= $teacher["teaOrigin"] ?></h4>
        <?php endforeach; ?>  
    </body>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
</html>
