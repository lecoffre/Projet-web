<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/pilote.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $pilote = new Pilote($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));


    if (
        !empty($donnees->ID_Utilisateur) && !empty($donnees->Centre_pilote) &&
        !empty($donnees->Promotion_pilote) && !empty($donnees->Nom) &&
        !empty($donnees->Prenom) && !empty($donnees->Photo_Utilisateur) &&
        !empty($donnees->ID_Utilisateur_Administrateur) && !empty($donnees->ID_Login)
    ) {

        // Ici on a reçu les données
        // On hydrate notre objet
        $pilote->ID_Utilisateur = $donnees->ID_Utilisateur;
        $pilote->Centre_pilote = $donnees->Centre_pilote;
        $pilote->Promotion_pilote = $donnees->Promotion_pilote;
        $pilote->Nom = $donnees->Nom;
        $pilote->Prenom = $donnees->Prenom;
        $pilote->Photo_Utilisateur = $donnees->Photo_Utilisateur;
        $pilote->ID_Utilisateur_Administrateur = $donnees->ID_Utilisateur_Administrateur;
        $pilote->ID_Login = $donnees->ID_Login;

        if ($pilote->modifier_pilote()) {
            // Ici la création a fonctionné
            // On envoie un code 200
            http_response_code(200);
            echo json_encode(["message" => "La modification a été effectuée"]);
        } else {
            // Ici la création n'a pas fonctionné
            // On envoie un code 503
            http_response_code(503);
            echo json_encode(["message" => "La modification1 n'a pas été effectuée"]);
        }
    } else {
        echo json_encode(["message" => "La modification2 n'a pas été effectué"]);
    }
} else {

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
