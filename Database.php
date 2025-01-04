<?php
// Arquivo: Database.php

class Database
{
    private $pdo;

    public function __construct($dbPath)
    {
        if (!file_exists($dbPath)) {
            throw new Exception('Database file not found.');
        }
        
        $this->pdo = new PDO('sqlite:' . $dbPath);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Consulta a tabela bins pelo número
     */
    public function getBinsByNumber($number)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM bins WHERE number = :number');
        $stmt->bindValue(':number', $number, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
