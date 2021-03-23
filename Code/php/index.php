<?php 
require "database.php";
$db = new Database();
$teachers = $db->getAllTeachers($id);

// echo "<pre>";
// print_r($teachers);
// echo "</pre>";
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
        <h3>Liste des enseignants</h3> <a href="addTeacher.php" class="btn">Ajouter</a>
        <table class="tableau" width = "60%">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Surnom</th>
                <th>Options</th>
            <?php foreach($teachers as $teacher): ?>
                </tr>
                    <td><?php echo $teacher["teaName"] ?></td>
                    <td><?php echo $teacher["teaFirstname"] ?></td>
                    <td><?php echo $teacher["teaNickname"] ?></td>
                    <td>
                        <a href="detail.php?idTeacher=<?= $teacher["idTeacher"];?>"> <img src="../../icons/edit.svg" width="20" height="20"></a>
                        <button onclick="myFunction()"><img src="../../icons/trash.svg"></img></a></button>
                        <a href="detail.php?idTeacher=<?= $teacher["idTeacher"];?>"> <img src="../../icons/search.svg" width="20" height="20"></a>
                    </td>   
                </tr>  
                <script>
                        function myFunction()
                        {
                            var msg = confirm("Êtes-vous sûr de vouloir supprimer l'enseignant ?");
                            if (msg == true) {
                                alert("Enseignant supprimé");
                            } else {
                                alert("Action annulée");
                            }
                        }
                </script> 
        <?php endforeach; ?>    
        </table>    
    </body> 
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
        <p>© Copyright | Killian Good - CIN2B</p>
    </footer>
</html>
