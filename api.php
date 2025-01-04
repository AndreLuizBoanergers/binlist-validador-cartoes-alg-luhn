<?php
// Arquivo: api.php

header('Content-Type: application/json');

// Verifica se o parâmetro 'number' foi fornecido
if (!isset($_GET['number']) || strlen($_GET['number']) != 6 || !is_numeric($_GET['number'])) {
    echo json_encode(['error' => 'Invalid or missing "number" parameter. Provide a 6-digit number.']);
    exit;
}

$number = $_GET['number'];

// Inclui a classe de consulta ao banco de dados
require_once 'Database.php';

try {
    // Instancia a classe Database
    $db = new Database('./database/bin2.db');
    
    // Consulta as informações pelo número
    $result = $db->getBinsByNumber($number);
    
    if (empty($result)) {
        echo json_encode(['message' => 'No data found for the given number.']);
    } else {
        echo json_encode(['data' => $result]);
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'Internal server error.', 'details' => $e->getMessage()]);
}
