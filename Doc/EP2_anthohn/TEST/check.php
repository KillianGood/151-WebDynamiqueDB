<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!-- Lien vers la page css -->
        <link rel="stylesheet" type="text/css" href="./style.css"  />
        <!-- titre onglet -->
		<title>Vérifications des données</title>
    </head>
</html>
<?php  
/**
 * ETML
 * Auteur : Anthony Höhn
 * Date : 09.03.2021
 * Desctiption :  Page résumé avec la liste des ressources (possible de la visualisé en écrivant dans l'URL "resume.php") 
 * Avant d’afficher les résultats, vérifier chaque champ selon cette logique :
 */

//Création des variables de session
session_start();
error_reporting(0);

    //variables de session
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['distance'] = $_POST['distance'];
    $_SESSION['textbox'] = $_POST['textbox'];
    $_SESSION['equipement'] = $_POST['equipement'];
    $_SESSION['ecouteur'] = $_POST['ecouteur'];
    $_SESSION['internet'] = $_POST['internet'];

    // Variable conservée en mémoire avec la méthode "$ _POST"
    $email = $_POST["email"];
    $textbox = $_POST["textbox"];
    $equipement = $_POST["equipement"];
    $ecouteur = $_POST["ecouteur"];
    $button = $_POST["btnSubmit"];  
    $radioBouton = $_POST["distance"];

// Stockage du cookie
if(isset($_POST["connexion"])){
    setcookie('connexion', $_POST['connexion'], time() + 3600);
};
//EMAIL erreur champs vide
if(isset($button))
{
    // vérification avec regex
    if(empty($email) || !preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/', $email))
    {
        echo "Le formulaire contient une ou des erreurs cause(s)";
        echo "<ul><li>Le champs Email peut être vide ou doit respecter un de ces formats : xxx.xxx@xxx.xx / xxx@xxx.xx</li></ul>";
    }
    else 
    {
        echo "Votre email : " . $email;
    }
}
//Si aucun des boutons n'est cocché
if(!empty($_POST["distance"]))
{
    if($radioBouton == "oui"){
        echo "<br>Avez-vous la posibilité de travailler à distance : " . $radioBouton;
    }
    else
    {
        echo "Le formulaire contient une ou des erreurs cause(s)";
    }
}
else{
    echo "<ul><li>Veuillez choisir une réponse pour le travail à distance</li></ul>";
}
// Si l'utilisateur a coché "non" mais n'a pas préciser dans la texte box en dessous
if($radioBouton == "non" && empty($_POST["desc"])){
    echo "<ul><li>Veuillez préciser pourquoi dans le travail à distance</ul></li>";
}
else {
    echo "";
}
// Si non pourquoi
if($radioBouton == "non" && !empty($_POST["desc"])){
    echo "<br><br>Non : " . $_POST["desc"];
}
else 
{
    echo "";
}
if($_POST["distance"] == "non"){
    echo "";
}   
else {
    echo "";
}
// Boucle pour les différents équipements disponibles et pour les montrer et les stocker dans un tableau
if(empty($_POST["equipement"])){
    echo "<ul><li>Remplir la zone équipement</ul></li>";
}
else
{
    echo "<br><br>Mes équipement disponible : ";
    if(!empty($_POST['equipement'])) {
        foreach($_POST['equipement'] as $check) {
 
         $_SESSION['equipement']=$check; 
         echo $check;
       }
   }
}
// Boucle pour les différents équipements audio disponibles
if(empty($_POST["ecouteur"])){
    echo "<ul><li>il faut faire un seul choix pour les écouteurs/microphone</ul></li>";
}
else
{
    echo "<br><br>Mes équipement disponible : ";
    if(!empty($_POST['ecouteur'])) {
        foreach($_POST['ecouteur'] as $check) {
 
         $_SESSION['ecouteur']=$check; 
         echo "<ul><li>$check</li></ul>";
       }
   }
}

// Stock la valeur de la liste déroulante
if(!empty($_COOKIE["internet"])){
  echo "<br>Connexion : " . $_COOKIE["internet"] . "</br>";
}
else {
  echo "<ul><li>Veuillez choisir une valeur pour la liste de déroulante</ul></li>". "</br>";
}
?>  
<html>
    <head>
    </head>
    <body>
        <br>
        <!-- lien vers la page de récap -->
        <button onclick="location.href='resume.php'">Récapitulatif </button>
    </body> 
</html>