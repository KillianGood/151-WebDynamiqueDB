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

    // Function to show all the teachers
    public function getAllTeachers(){
        $query = "SELECT * FROM t_teacher";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

 
    // Function to get one teacher 
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

    // Function to get all the different sections
    public function getAllSections(){
        $query = "SELECT * FROM t_section";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    // Function to add a new teacher
    public function addTeacher($surname, $firstname, $gender , $nickname, $origin){
        $query = "INSERT INTO t_teacher (teaFirstname, teaName, teaNickname, teaGender, teaOrigin) VALUES (:teaFirstname, :teaName, :teaNickname, :teaGender, :teaOrigin)";
        $binds = array(
            0 => array(
                'field' => ':teaFirstname',
                'value' => $surname,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':teaName',
                'value' => $firstname,
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'field' => ':teaGender',
                'value' => $gender,
                'type' => PDO::PARAM_STR
            ),
            3 => array(
                'field' => ':teaNickname',
                'value' => $nickname,
                'type' => PDO::PARAM_STR
            ),
            4 => array(
                'field' => ':teaOrigin',
                'value' => $origin,
                'type' => PDO::PARAM_STR
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);
        return $results;
    }

    // Function to delete only one teacher
    public function DeleteOneTeacher($id){
        $query = "DELETE FROM t_teacher WHERE idTeacher = :id";
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

    public function getOneTeacherSection($id){
        $query = "SELECT * FROM t_teaches JOIN t_teacher ON fkteacher = idTeacher JOIN t_section ON fksection = idSection WHERE idTeacher = :id";
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

    public function addTeacherSection($section){
        $query = "INSERT INTO t_teaches (fkteacher, fksection) VALUES (LAST_INSERT_ID(), :fksection)";
        $binds = array(
            0 => array(
                'field' => ':fksection',
                'value' => $section,
                'type' => PDO::PARAM_INT
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);
        return $results;
    }



        
}
?>