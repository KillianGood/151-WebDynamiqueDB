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
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Surnom</title>
    </head>
    <body>
        <h1>Surnom des enseignants</h1>
        <h3>Liste des enseignants</h3>
        <table>
            <tr>
                <th>Nom</th>
                <th>Surnom</th>
                <th>Options</th>
            <?php foreach($teachers as $teacher): ?>
                </tr>
                <td><?php echo $teacher["teaName"] ?></td>
                <td><?php echo $teacher["teaNickname"] ?></td>
                <td>Wait</td>
            </tr>   
        <?php endforeach; ?>    
        </table>    
        <footer>
            <p>Killian Good</p>
        </footer>
    </body>
</html>
