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
    include_once '../models/utilisateur.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $utilisateur = new Utilisateur($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Utilisateur)) {
        $utilisateur->ID_Utilisateur = $donnees->ID_Utilisateur;

        // On récupère l'entreprise
        $utilisateur->lire_un_utilisateur();

        // On vérifie si l'entreprise existe
        if ($utilisateur->Nom != null) {
            $utili = [
                "ID_Utilisateur" => $utilisateur->ID_Utilisateur,
                "Nom" => $utilisateur->Nom,
                "Prenom" => $utilisateur->Prenom,
                "Photo_Utilisateur" => $utilisateur->Photo_Utilisateur,
                "ID_Login" => $utilisateur->ID_Login,
            ];

            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($utili);
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
