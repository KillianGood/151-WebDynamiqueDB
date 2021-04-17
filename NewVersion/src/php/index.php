<?php 
require "header.php";
$teachers = $db->getAllTeachers();
?>   

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
                        <a href="editTeacher.php?idTeacher=<?= $teacher["idTeacher"]; ?>"><img src="../../userContent/edit.svg" width="20" height="20"></a>
                        <a href="deleteTeacher.php?idTeacher=<?= $teacher["idTeacher"]; ?>" onclick="return confirm('Êtes vous sûr de voiloir supprimer l\'enseignant ?')"><img src="../../userContent/trash.svg"></img></a>
                        <a href="detail.php?idTeacher=<?= $teacher["idTeacher"]; ?>"> <img src="../../userContent/search.svg" width="20" height="20"></a>
                    </td>   
                </tr>  
        <?php endforeach; ?>    
</table>        
<?php require "footer.php";