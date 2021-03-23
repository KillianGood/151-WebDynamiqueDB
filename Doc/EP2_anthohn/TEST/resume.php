<?php
    /**
     * ETML
     * Auteur : Anthony Höhn
     * Date : 09.03.2021
     * Desctiption :  Page résumé avec la liste des ressources (possible de la visualisé en écrivant dans l'URL "resume.php") 
     * Avant d’afficher les résultats, vérifier chaque champ selon cette logique :
     */

    // Variables de session
	session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <!-- Lien vers la page css -->
        <link rel="stylesheet" type="text/css" href="./style.css"  />
        <!-- titre onglet -->
		<title>Récapitulatif</title>
	</head>
	<body>
        <h1>Résumé des ressources personnelles</h1>
    <table>
    <thead>
        <tr>
        <!-- Entête du tableau -->
            <td colspan="1">Email</td>
            <td colspan="1">Possibilité de travailler à distance</td>
            <td colspan="1">Matériel à disposition</td>
            <td colspan="1">Ecouteur/microphone</td>
            <td colspan="1">Accès à internet</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- Information de mon tableau -->
            <td><?php if(!empty($_SESSION["email"])){
                echo $_SESSION["email"];
            } 
            else{
                echo "Aucun email inscrit";
            }?></td>

            <td><?php if(!empty($_SESSION["distance"])){
                echo $_SESSION["distance"];
            } 
            else{
                echo "Aucune valeur indiquée";
            }?></td>

            <td><?php if(!empty($_SESSION["equipement"])){
                echo $_SESSION["equipement"];
            } 
            else{
                echo "Aucune valeur indiquée";
            }?></td>

            <td><?php if(!empty($_SESSION["ecouteur"])){
                echo $_SESSION["ecouteur"];
            } 
            else{
                echo "Aucune valeur indiquée";
            }?></td>

            <td><?php if(!empty($_SESSION["internet"])){
                echo $_SESSION["internet"];
            } 
            else{
                echo "Aucune valeur indiquée";
            }?></td>
        </tr>
    </tbody>               
    </table>
    </body>
</html>