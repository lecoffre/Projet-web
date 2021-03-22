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
    include_once '../models/droitdelegue.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues
    $droitdelegue = new Droitdelegue($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Utilisateur) && !empty($donnees->ID_Utilisateur__Assigne_DROIT) && !empty($donnees->Creer_une_offre) && !empty($donnees->Modifier_une_offre) && !empty($donnees->Supprimer_une_offre) 
    && !empty($donnees->Rechercher_un_compte_delegue) && !empty($donnees->Creer_un_delegue) && !empty($donnees->Modifier_un_compte_delegue) && !empty($donnees->Supprimer_un_compte_delegue) && !empty($donnees->Rechercher_un_compte_etudiant) 
    && !empty($donnees->Creer_un_etudiant) && !empty($donnees->Modifier_un_etudiant) && !empty($donnees->Supprimer_un_etudiant) && !empty($donnees->Consulter_les_stats_des_etudiants) && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3) 
    && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4)) {
        // Ici on a reçu les données
        // On hydrate notre objet

        $droitdelegue->ID_Utilisateur = $donnees->ID_Utilisateur;
        $droitdelegue->ID_Utilisateur__Assigne_DROIT = $donnees->ID_Utilisateur__Assigne_DROIT;
        $droitdelegue->Creer_une_offre = $donnees->Creer_une_offre;
        $droitdelegue->Modifier_une_offre = $donnees->Modifier_une_offre;
        $droitdelegue->Supprimer_une_offre = $donnees->Supprimer_une_offre;
        $droitdelegue->Rechercher_un_compte_delegue = $donnees->Rechercher_un_compte_delegue;
        $droitdelegue->Creer_un_delegue = $donnees->Creer_un_delegue;
        $droitdelegue->Modifier_un_compte_delegue = $donnees->Modifier_un_compte_delegue;
        $droitdelegue->Supprimer_un_compte_delegue = $donnees->Supprimer_un_compte_delegue;
        $droitdelegue->Rechercher_un_compte_etudiant = $donnees->Rechercher_un_compte_etudiant;
        $droitdelegue->Creer_un_etudiant = $donnees->Creer_un_etudiant;
        $droitdelegue->Modifier_un_etudiant = $donnees->Modifier_un_etudiant;
        $droitdelegue->Supprimer_un_etudiant = $donnees->Supprimer_un_etudiant;
        $droitdelegue->Consulter_les_stats_des_etudiants = $donnees->Consulter_les_stats_des_etudiants;
        $droitdelegue->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
        $droitdelegue->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;


        if ($droitdelegue->creer_droit_delegue()) {
            // Ici la création a fonctionné
            // On envoie un code 201
            http_response_code(201);
            echo json_encode(["message" => "L'ajout a été effectué"]);
        } else {
            // Ici la création n'a pas fonctionné
            // On envoie un code 503
            http_response_code(503);
            echo json_encode(["message" => "L'ajout1 n'a pas été effectué"]);
        }
    } else {
        echo json_encode(["message" => "L'ajout2 n'a pas été effectué"]);
    }
} else {

    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
