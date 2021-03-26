<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/authentification.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les authentificationq 
    $authentification = new Authentification($db);


    // On récupère les données
    $stmt = $authentification->lire_authentification();

    // On vérifie si on a au moins 1 authentification
    if ($stmt->rowCount() > 0) {
        // On initialise un tableau associatif
        $tableauauthentification = [];
        $tableauauthentification['authentification'] = [];

        // On parcourt les authentification
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $authen = [
                "ID_Login" => $ID_Login,
                "Login" => $Login,
                "Mot_de_passe" => $Mot_de_passe,
            ];
            $tableauauthentification['authentification'][] = $authen;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauauthentification);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
