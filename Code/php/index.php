<?php 
require "database.php";
$db = new Database();
$teachers = $db->getAllTeachers();

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
        <h3>Liste des enseignants</h3>
        <table class="tableau" width = "60%">
            <tr>
                <th>Nom</th>
                <th>Surnom</th>
                <th>Options</th>
            <?php foreach($teachers as $teacher): ?>
                </tr>
                    <td><?php echo $teacher["teaName"] ?></td>
                    <td><?php echo $teacher["teaNickname"] ?></td>
                    <td><a href="#">
                    <a href="detail.php?idTeacher=<?= $teacher["idTeacher"]; ?>">+</a>
                </tr>   
        <?php endforeach; ?>    
        </table>    
    </body>
    <footer>
        <hr style="width:1900px;text-align:left;margin-left:0">
            <p>Copyright Killian Good - CIN2B</p>
    </footer>
</html>
