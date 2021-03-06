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
    include_once '../models/etudiant.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $etudiant = new Etudiant($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));


    if (
        !empty($donnees->ID_Utilisateur) && !empty($donnees->Centre_etudiant) && !empty($donnees->promotion_etudiant) && !empty($donnees->Specialite) && !empty($donnees->ID_Utilisateur__CREE) && !empty($donnees->ID_Login)
    ) {
        // Ici on a reçu les données
        // On hydrate notre objet
        $etudiant->ID_Utilisateur = $donnees->ID_Utilisateur;
        $etudiant->Centre_etudiant = $donnees->Centre_etudiant;
        $etudiant->promotion_etudiant = $donnees->Promotion_etudiant;
        $etudiant->Specialite = $donnees->Specialite;
        $etudiant->ID_Utilisateur__CREE = $donnees->ID_Utilisateur__CREE;
        $etudiant->ID_Login = $donnees->ID_Login;


        if ($etudiant->modifier_etudiant()) {
            // Ici la création a fonctionné
            // On envoie un code 200
            http_response_code(200);
            echo json_encode(["message" => "La modification a été effectué"]);
        } else {
            // Ici la création n'a pas fonctionné
            // On envoie un code 503
            http_response_code(503);
            echo json_encode(["message" => "La modification1 n'a pas été effectué"]);
        }
    } else {
        echo json_encode(["message" => "La modification2 n'a pas été effectué"]);
    }
} else {

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
