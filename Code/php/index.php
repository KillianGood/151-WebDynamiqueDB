<?php 
require "database.php";
$db = new Database();
$teachers = $db->getAllTeachers();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
		ETML
		Auteur      : Killian Good
		Date        : 22.03.2021
		Description : index.php
		-->
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <title>Surnom</title>
    </head>
    <body>
        <h1>Surnom des enseignants</h1>
        <a href="#" class="button">Zone pour le menu</a>
        <a href="addTeacher.php"> <img alt="Ajouter" src="../../icons/icons8-ajouter-un-utilisateur-homme-52.png" width="50" height="50"></a>
        <table class="tableau" width = "60%">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Surnom</th>
                <th>Options</th>
            <?php foreach($teachers as $teacher): ?>
                </tr>
                    <td><?= $teacher["teaName"] ?></td>
                    <td><?= $teacher["teaFirstname"] ?></td>
                    <td><?= $teacher["teaNickname"] ?></td>
                    <td>
                        <a href="updateTeacher.php?idTeacher=<?= $teacher["idTeacher"];?>"> <img src="../../icons/edit.svg" width="20" height="20"></a>
                        <a href="delete.php?idTeacher=<?= $teacher["idTeacher"]; ?>" onclick="return confirm('Êtes vous sûr de voiloir supprimer l\'enseignant ?')"><img src="../../icons/trash.svg"></img></a>
                        <a href="detail.php?idTeacher=<?= $teacher["idTeacher"];?>"> <img src="../../icons/search.svg" width="20" height="20"></a>
                    </td>   
                </tr>  
        <?php endforeach; ?>    
        </table>    
    </body> 
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
</html>

