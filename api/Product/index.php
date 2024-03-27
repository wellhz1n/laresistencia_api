<?php
require_once '../../vendor/autoload.php';

use Entidades\Produto;

header('Content-Type: application/json');
// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
$produtos = [
    new Produto(1, "Lava Prato"),
    new Produto(2, "Lava Carro"),
    new Produto(3, "Lava Ar"),
];

switch ($method) {
    case 'GET':
        // Read operation (fetch books)
        // $stmt = $pdo->query('SELECT * FROM books');
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (isset ($_GET['id'])) {
            $result = array_filter($produtos, function ($v) {
                return $v->id == $_GET['id'];
            });

            echo json_encode(count($result) > 0 ? array_shift($result) : "");
        } else
            echo json_encode($produtos);
        break;
}