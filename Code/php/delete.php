<?php

/**
 * 
 * Auteur : Killian Good
 * Date : 22.03.2021
 * Description :
 */
require "database.php";

$db = new Database();
$id = $_GET["idTeacher"];
$DeleteOneTeacher = $db->DeleteOneTeacher($id);

header('Location: index.php');
?>
