<?php
require "database.php";
$db = new Database();
$oneTeachers = $db->getOneTeacher();
$sections = $db->getAllSections();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
		ETML
		Auteur      : Killian Good
		Date        : 15.03.2021
		Description : 
		-->
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <title>Surnom</title>
    </head>
    <body>
        <h1>Surnom des enseignants</h1>
        <a href="#" class="button">Zone pour le menu</a>
        <?php foreach($oneTeachers as $oneTeacher): ?><?php
            if($oneTeacher["teaGender"] == "M") {
                $Gender = '<img src="../../icons/maleGender.png" width"22px" height="22px" alt="icons">';
            }
            else 
            {
                $Gender = '<img src="../../icons/femaleGender.png" width"22px" height="22px" alt="icons">';
            }
            ?>
        <?php foreach($sections as $section) {} ?>
        <h3> Détails : <?= $oneTeacher["teaFirstname"] . " " . $oneTeacher["teaName"]  . " " . $Gender . " " . $section["secName"]?></h3>
        <p>Surnom :  <?= $oneTeacher["teaNickname"] ?></p>
        <p><br>Description :  <?= $oneTeacher["teaOrigin"]  ?></p>     
         <?php endforeach; ?>
    </body>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
            <p>Copyright Killian Good - CIN2B</p>
    </footer>
</html>
