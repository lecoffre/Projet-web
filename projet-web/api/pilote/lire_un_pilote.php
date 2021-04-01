<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/pilote.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $pilote = new Pilote($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Login)) {
        $pilote->ID_Login = $donnees->ID_Login;

        // On récupère l'entreprise
        $pilote->lire_un_pilote();

        // On vérifie si l'entreprise existe
        if ($pilote->Nom != null) {
            $pilo = [
                "ID_Utilisateur" => $pilote->ID_Utilisateur,
                "Centre_pilote" => $pilote->Centre_pilote,
                "Promotion_pilote" => $pilote->Promotion_pilote,
                "Nom" => $pilote->Nom,
                "Prenom" => $pilote->Prenom,
                "Role" => $pilote->Role,
                "Photo_Utilisateur" => $pilote->Photo_Utilisateur,
                "ID_Utilisateur_Administrateur" => $pilote->ID_Utilisateur_Administrateur,
                "ID_Login" => $pilote->ID_Login,
            ];

            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($pilo);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "L'entreprise n'existe pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
