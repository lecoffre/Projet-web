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
    include_once '../models/offre.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $offre = new Offre($db);
    $entreprise = new Offre($db);
    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    $entreprise->Nom_entreprise = $donnees->Entreprise_offre;
    $entreprise->id_entreprise();



    if ($entreprise->ID_Entreprise != null) {

        $entre = [
            "ID_Entreprise" => $entreprise->ID_Entreprise,
            "Nom_entreprise" => $entreprise->Nom_entreprise,
            "Secteur_activite" => $entreprise->Secteur_activite,
            "Competences_recherchees_dans_les_stages" => $entreprise->Competences_recherchees_dans_les_stages,
            "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage" => $entreprise->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage,
            "Evaluation_des_stagiaires" => $entreprise->Evaluation_des_stagiaires,
            "Confiance_du_Pilote_de_promotion" => $entreprise->Confiance_du_Pilote_de_promotion,
            "Localite_entreprise" => $entreprise->Localite_entreprise,
            "Logo_Entreprise" => $entreprise->Logo_Entreprise,
            "ID_Utilisateur" => $entreprise->ID_Utilisateur
        ];

        json_encode($entre);

        if (
            !empty($donnees->Competences_offre) &&
            !empty($donnees->Titre_offre) &&
            !empty($donnees->Secteur) &&
            !empty($donnees->Localite_offre) &&
            !empty($donnees->Entreprise_offre) &&
            !empty($donnees->Type_de_promotion_concernee) &&
            !empty($donnees->Duree_du_stage) &&
            !empty($donnees->Base_de_remuneration) &&
            !empty($donnees->Date_de_offre) &&
            !empty($donnees->Nombre_de_places_disponible) &&
            !empty($donnees->ID_Utilisateur) &&
            !empty($donnees->Secteur)
        ) {
            // Ici on a reçu les données
            // On hydrate notre objet

            $offre->Secteur = $donnees->Secteur;
            $offre->Titre_offre = $donnees->Titre_offre;
            $offre->Competences_offre = $donnees->Competences_offre;
            $offre->Localite_offre = $donnees->Localite_offre;
            $offre->Entreprise_offre = $donnees->Entreprise_offre;
            $offre->Type_de_promotion_concernee = $donnees->Type_de_promotion_concernee;
            $offre->Duree_du_stage = $donnees->Duree_du_stage;
            $offre->Base_de_remuneration = $donnees->Base_de_remuneration;
            $offre->Date_de_offre = $donnees->Date_de_offre;
            $offre->Nombre_de_places_disponible = $donnees->Nombre_de_places_disponible;
            $offre->ID_Entreprise = $entre['ID_Entreprise'];
            $offre->ID_Utilisateur = $donnees->ID_Utilisateur;

            if ($offre->creer_offre()) {
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
    } else {
        echo json_encode(["message" => "L'entreprise n'existe pas"]);
    }
} else {

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
