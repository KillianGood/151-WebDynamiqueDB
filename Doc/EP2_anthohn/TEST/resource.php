<?php
//start de la session
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <!--
        ETML
        Author      : Anthony Höhn
        Date        : 09.03.2021
        Description : Formulaire du client permettant de récupérer 
        les ressources informations d'une personne 
        -->
    <head>
        <meta charset="utf-8">
        <!-- Lien vers la page css -->
        <link rel="stylesheet" type="text/css" href="./style.css"  />
        <!-- titre onglet -->
		<title>Vos ressources informatiques</title>
    </head>
    <body>
        
        <h1>Vos ressources informatiques</h1>          
            <form method="post" action="check.php">
                 <!-- formulaire email -->
                <p>
                    <label for="email">Email</label><br>
                    <input type="text" name="email" id="email"/>
                </p>
                <!-- radio boutons travailler à distance oui / non -->
                <p>Avez-vous la possibilité de travailler à distance ?<br>
                    <input type="radio" id="oui" name="distance" value="oui">
                    <label for="oui">Oui</label><br>
                    <input type="radio" id="non" name="distance" value="non">
                    <label for="non">Non</label>
                </p>    
                <!-- Champs de text *si* l'utilisateur dit non -->
                <p>
                    <label for="textbox">Si non, veuillez préciser pourquoi :</label></br>
                    <textarea id="textbox" name="textbox"rows="5" cols="33"></textarea>
                 </p>
                <!-- checkbox concernant les équipement informatique  -->
                <p>Cocher tous les équipements que vous avez <br />
                    <input type="checkbox" name="equipement[]" value="Ordinateur fixe" />Ordinateur fixe<br />
                    <input type="checkbox" name="equipement[]" value="Ordinateur portable" />Ordinateur portable<br />
                    <input type="checkbox" name="equipement[]" value="Tablette" />Tablette<br />
                    <input type="checkbox" name="equipement[]" value="Smartphone" />Smartphone<br />
                    <input type="checkbox" name="equipement[]" value="Aucun" />Aucun
                </p>  
                <!-- checlbox concernant les écouteurs et microphone -->
                <p>Avez-vous des écouteurs/microphone ? <br />
                    <input type="checkbox" name="ecouteur[]" value="Uniquement écouteurs" />Uniquement écouteurs<br />
                    <input type="checkbox" name="ecouteur[]" value="Uniquement microphone" />Uniquement microphone<br />
                    <input type="checkbox" name="ecouteur[]" value="Les deux" />Les deux<br />
                    <input type="checkbox" name="ecouteur[]" value="Aucun" />Aucun
                </p> 
                <!-- Une liste déroulante concernant la connexion à internet de l'utilisateur chez lui -->
                <p>
                    <label for="ConnexionInternetType">Quelle connexion internet avez-vous ?</label><br>
                    <select name="internet" id="internet" >
                        <option value="" selected disabled hidden>--Choisir--</option>
                        <option value="aucun">Aucun</option>
                        <option value="UniFilaire">Uniquement en filaire</option>
                        <option value="UniWifi">Uniquement en wifi</option>
                        <option value="FilaireWifi">En filaire et wifi</option>
                    </select>
                </p>
                <!-- envoie du formulaire -->
                <p>
                    <input type="submit" name="btnSubmit" value="Enregistrer les informations"/>
                </p>
            </form>
    </body>
</html>