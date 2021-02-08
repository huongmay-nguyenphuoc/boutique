<?php
require_once('../includes/config.php');

class database
{
    private $connection;

    //Connexion
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->connection;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    //Destruction
    public function __destruct()
    {
        $this->connection = NULL;
    }


    //Exécution d'une requête
    public function Execute($statement = '', $parameters = [])
    {
        try {
            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Insertion de données
    public function Insert($statement = '', $parameters = [])
    {
        try {
            $this->Execute($statement, $parameters);
            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Récupération de données
    public function Select($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->Execute($statement, $parameters);
            return $stmt->fetchAll();

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Mise à jour de données
    public function Update($statement = "", $parameters = [])
    {
        try {

            $this->Execute($statement, $parameters);
            return true;

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}