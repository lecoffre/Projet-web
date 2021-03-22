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
    include_once '../models/offre.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $offre = new Offre($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));


    if (
        !empty($donnees->Competences_offre) &&
     !empty($donnees->Localite_offre) &&
     !empty($donnees->Entreprise_offre) &&
      !empty($donnees->Type_de_promotion_concernee) &&
       !empty($donnees->Duree_du_stage) &&
        !empty($donnees->Base_de_remuneration) &&
         !empty($donnees->Date_de_offre) &&
          !empty($donnees->Nombre_de_places_disponible) && 
          !empty($donnees->ID_Entreprise) &&
          !empty($donnees->ID_Utilisateur)
    ) {
        // Ici on a reçu les données
        // On hydrate notre objet
        $offre->ID_offre = $donnees->ID_offre;
        $offre->Competences_offre = $donnees->Competences_offre;
        $offre->Localite_offre = $donnees->Localite_offre;
        $offre->Entreprise_offre = $donnees->Entreprise_offre;
        $offre->Type_de_promotion_concernee = $donnees->Type_de_promotion_concernee;
        $offre->Duree_du_stage = $donnees->Duree_du_stage;
        $offre->Base_de_remuneration = $donnees->Base_de_remuneration;
        $offre->Date_de_offre = $donnees->Date_de_offre;
        $offre->Nombre_de_places_disponible = $donnees->Nombre_de_places_disponible;
        $offre->ID_Entreprise = $donnees->ID_Entreprise;
        $offre->ID_Utilisateur = $donnees->ID_Utilisateur;

        if ($offre->modifier_offre()) {
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
