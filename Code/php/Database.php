<?php

/**
 * 
 * TODO : à compléter
 * 
 * Auteur : Killian Good
 * Date : 15.03.2021
 * Description :
 */

 class Database {

    // Variable de classe
    private $connector;

    public function __construct(){
    try{
        $this->connector = new PDO("mysql:host=localhost;dbname=db_nickname_kilgood;charset=utf8", "dbNicknameUser", "grp2B_21");
        }catch(PDOException $e){
            die("<h1>Impossible de se connecter à la base de données</h1> erreur :". $e->getMessage()); 
        }
    }

    /**
     * TODO: à compléter
     */
    private function querySimpleExecute($query){

        $req = $this->connector->query($query);
        return $req;
    }

    /**
     * TODO: à compléter
     */
    private function queryPrepareExecute($query, $binds){
        // $req = $this->$connector->prepare('SELECT * FROM t_teacher WHERE id = :varId AND input = :varInput');
        // $req->bindValue('varId', $id, PDO::PARAM_INT);
        // $req->bindValue('varInput', $input, PDO::PARAM_STR);
        // $req->execute();
    }

    /**
     * TODO: à compléter
     */
    private function formatData($req){
        $results = $req->fetchALL(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * TODO: à compléter
     */
    private function unsetData($req){
        $req->closeCursor(); //Vider le jeu d’enregistrements
    }

    /**
     * TODO: à compléter
     */
    public function getAllTeachers(){
        $query = "SELECT * FROM t_teacher";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * TODO: à compléter
     */
    public function getOneTeacher(){
        $query = "SELECT * FROM t_teacher WHERE idTeacher =" . $_GET["idTeacher"];
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
        // TODO: récupère la liste des informations pour 1 enseignant
        // TODO: avoir la requête sql pour 1 enseignant (utilisation de l'id)
        // TODO: appeler la méthode pour executer la requête
        // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
        // TODO: retour l'enseignant
    }

    public function getAllSections(){

        $query = 'SELECT * FROM t_teaches JOIN t_teacher ON t_teaches.fkteacher = t_teacher.idTeacher JOIN t_section ON t_teaches.fksection = t_section.idSection';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

    // + tous les autres méthodes dont vous aurez besoin pour la suite (insertTeacher ... etc)
 }
?>