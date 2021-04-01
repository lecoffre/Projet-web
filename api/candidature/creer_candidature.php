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
    include_once '../models/candidature.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les authentificationq 
    $candidature = new Candidature($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    if (
        !empty($donnees->CV_etudiant) && !empty($donnees->Lettre_de_motivation_etudiant) && !empty($donnees->Fiche_de_validation) && !empty($donnees->Convention_de_stage) && !empty($donnees->LIEN_OFFRE)
        && !empty($donnees->ID_Utilisateur) && !empty($donnees->ID_offre) && !empty($donnees->ID_Utilisateur_Pilote)
        && !empty($donnees->Candidature_step_1) && !empty($donnees->Candidature_step_2) && !empty($donnees->Candidature_step_3)
        && !empty($donnees->Candidature_step_4) && !empty($donnees->Candidature_step_5) && !empty($donnees->Candidature_step_6)
    ) {

        // Ici on a reçu les données
        // On hydrate notre objet
        $candidature->CV_etudiant = $donnees->CV_etudiant;
        $candidature->Lettre_de_motivation_etudiant = $donnees->Lettre_de_motivation_etudiant;
        $candidature->Fiche_de_validation = $donnees->Fiche_de_validation;
        $candidature->Convention_de_stage = $donnees->Convention_de_stage;
        $candidature->LIEN_OFFRE = $donnees->LIEN_OFFRE;
        $candidature->ID_Utilisateur = $donnees->ID_Utilisateur;
        $candidature->ID_offre = $donnees->ID_offre;
        $candidature->ID_Utilisateur_Pilote = $donnees->ID_Utilisateur_Pilote;
        $candidature->Candidature_step_1 = $donnees->Candidature_step_1;
        $candidature->Candidature_step_2 = $donnees->Candidature_step_2;
        $candidature->Candidature_step_3 = $donnees->Candidature_step_3;
        $candidature->Candidature_step_4 = $donnees->Candidature_step_4;
        $candidature->Candidature_step_5 = $donnees->Candidature_step_5;
        $candidature->Candidature_step_6 = $donnees->Candidature_step_6;

        if ($candidature->creer_candidature()) {
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

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
