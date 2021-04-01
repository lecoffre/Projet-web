<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/entreprise.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $entreprise = new Entreprise($db);
    $doublon = new Entreprise($db);
    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    $doublon->Nom_entreprise = $donnees->Nom_entreprise;
    $doublon->verification_doublon();

    if ($doublon->ID_Entreprise != null) {
        echo json_encode("L'entreprise existe deja");
    } else {

        if (!empty($donnees->Nom_entreprise) && !empty($donnees->Secteur_activite) && !empty($donnees->Competences_recherchees_dans_les_stages) && !empty($donnees->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage) && !empty($donnees->Evaluation_des_stagiaires) && !empty($donnees->Confiance_du_Pilote_de_promotion) && !empty($donnees->Localite_entreprise) && !empty($donnees->Logo_Entreprise) && !empty($donnees->ID_Utilisateur)) {
            // Ici on a reçu les données
            // On hydrate notre objet

            $entreprise->Nom_entreprise = $donnees->Nom_entreprise;
            $entreprise->Secteur_activite = $donnees->Secteur_activite;
            $entreprise->Competences_recherchees_dans_les_stages = $donnees->Competences_recherchees_dans_les_stages;
            $entreprise->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = $donnees->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage;
            $entreprise->Evaluation_des_stagiaires = $donnees->Evaluation_des_stagiaires;
            $entreprise->Confiance_du_Pilote_de_promotion = $donnees->Confiance_du_Pilote_de_promotion;
            $entreprise->Localite_entreprise = $donnees->Localite_entreprise;
            $entreprise->Logo_Entreprise = $donnees->Logo_Entreprise;
            $entreprise->ID_Utilisateur = $donnees->ID_Utilisateur;


            if ($entreprise->creer_entreprise()) {
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "L'ajout a été effectué"]);
            } else {
                // Ici la création n'a pas fonctionné
                // On envoie un code 503
                http_response_code(503);
                echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
            }
        } else {
            echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
        }
    }
} else {

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
