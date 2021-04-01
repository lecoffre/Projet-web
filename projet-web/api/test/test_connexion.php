<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    http_response_code(200);
    echo json_encode(["message_connexion" => "Connexion établie avec succès (BDD/API_OK)"]);

} else {

    // On gère l'erreur
    http_response_code(405);
}
