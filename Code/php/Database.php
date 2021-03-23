<?php

/**
 * 
 * Auteur : Killian Good
 * Date : 22.03.2021
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
        $req = $this->connector->prepare($query);
        foreach($binds as $bind){
            $req->bindValue($bind['field'], $bind['value'], $bind['type']);
        }
        $req->execute();
        return $req;
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

 
    
    public function getOneTeacher($id){
        $query = "SELECT * FROM t_teacher WHERE idTeacher = :id";
        $binds = array(
            0 => array(
                'field' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        
        $this->unsetData($reqExecuted);
        return $results;
    }


    public function getAllSections(){

        $query = 'SELECT * FROM t_teaches JOIN t_teacher ON t_teaches.fkteacher = t_teacher.idTeacher JOIN t_section ON t_teaches.fksection = t_section.idSection';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

    public function addTeacher($surname, $firstname, $gender, $nickname, $nicknameOrigin){

        $query = "INSERT INTO t_teacher (teaName, teaFirstname, teaGender, teaNickname, teaOrigin) VALUES (:surname, :firstname, :gender, :nickname, :nicknameOrigin)";
        $results = $this->connector->prepare($query);
        $results->execute(['surname' => $surname, 'firstname' => $firstname, 'gender' => $gender, 'nickname' => $nickname, 'nicknameOrigin' => $nicknameOrigin]);

        return $results;
    }

    // public function addTeacherSection($idTeacher, $idSection){

    //     $query = "INSERT INTO t_teaches (fkteacher, fksection) VALUES (:idxTeacher, :idxSection)";
    //     $results = $this->connector->prepare($query);
    //     $results->execute(['idxTeacher' => $idTeacher, 'idxSection' => $idSection]);

    //     return $results;
    // }

    // + tous les autres méthodes dont vous aurez besoin pour la suite (insertTeacher ... etc)
 }
?>