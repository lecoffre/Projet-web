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
    include_once '../models/administrateur.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les authentificationq 
    $pilote = new Administrateur($db);


    // On récupère les données
    $stmt = $pilote->lire_administrateur();

    // On vérifie si on a au moins 1 authentification
    if ($stmt->rowCount() > 0) {
        // On initialise un tableau associatif
        $tableauadministrateur = [];
        $tableauadministrateur['administrateur'] = [];

        // On parcourt les authentification
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $admin = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Photo_Utilisateur" => $Photo_Utilisateur,
                "Role" => $Role,
                "ID_Login" => $ID_Login,
            ];

            $tableauadministrateur['administrateur'][] = $admin;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauadministrateur);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
