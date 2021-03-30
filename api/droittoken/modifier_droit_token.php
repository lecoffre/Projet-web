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
    include_once '../models/droittoken.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues
    $droittoken = new DroitToken($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));


    if (
        !empty($donnees->Token) &&!empty($donnees->ID_Utilisateur)
        && !empty($donnees->Rechercher_une_entreprise) && !empty($donnees->Creer_une_entreprise) && !empty($donnees->Modifier_une_entreprise) && !empty($donnees->Evaluer_une_entreprise) && !empty($donnees->Supprimer_une_entreprise) && !empty($donnees->Consulter_les_stats_des_entreprises)
        && !empty($donnees->Rechercher_une_offre) && !empty($donnees->Creer_une_offre) && !empty($donnees->Modifier_une_offre) && !empty($donnees->Supprimer_une_offre) && !empty($donnees->Consulter_les_stats_des_offres)
        && !empty($donnees->Rechercher_un_compte_pilote) && !empty($donnees->Creer_un_compte_pilote) && !empty($donnees->Modifier_un_compte_pilote) && !empty($donnees->Supprimer_un_compte_pilote)
        && !empty($donnees->Rechercher_un_compte_delegue) && !empty($donnees->Creer_un_compte_delegue) && !empty($donnees->Modifier_un_compte_delegue) && !empty($donnees->Supprimer_un_compte_delegue) && !empty($donnees->Assigner_des_droits_a_un_delegue)
        && !empty($donnees->Rechercher_un_compte_etudiant) && !empty($donnees->Creer_un_compte_etudiant) && !empty($donnees->Modifier_un_compte_etudiant) && !empty($donnees->Supprimer_un_compte_etudiant) && !empty($donnees->Consulter_les_stats_des_etudiants)
        && !empty($donnees->Ajouter_une_offre_a_la_wish_list) && !empty($donnees->Retirer_une_offre_a_la_wish_list) && !empty($donnees->Postuler_a_une_offre) 
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1) 
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2)
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3) 
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4)
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5) 
        && !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6)) {
        // Ici on a reçu les données
        // On hydrate notre objet
        $droittoken->Token = $donnees->Token;
        $droittoken->ID_Utilisateur = $donnees->ID_Utilisateur;

        $droittoken->Rechercher_une_entreprise = $donnees->Rechercher_une_entreprise;
        $droittoken->Creer_une_entreprise = $donnees->Creer_une_entreprise;
        $droittoken->Modifier_une_entreprise = $donnees->Modifier_une_entreprise;
        $droittoken->Evaluer_une_entreprise = $donnees->Evaluer_une_entreprise;
        $droittoken->Supprimer_une_entreprise = $donnees->Supprimer_une_entreprise;
        $droittoken->Consulter_les_stats_des_entreprises = $donnees->Consulter_les_stats_des_entreprises;

        $droittoken->Rechercher_une_offre = $donnees->Rechercher_une_offre;
        $droittoken->Creer_une_offre = $donnees->Creer_une_offre;
        $droittoken->Modifier_une_offre = $donnees->Modifier_une_offre;
        $droittoken->Supprimer_une_offre = $donnees->Supprimer_une_offre;
        $droittoken->Consulter_les_stats_des_offres = $donnees->Consulter_les_stats_des_offres;

        $droittoken->Rechercher_un_compte_pilote = $donnees->Rechercher_un_compte_pilote;
        $droittoken->Creer_un_compte_pilote = $donnees->Creer_un_compte_pilote;
        $droittoken->Modifier_un_compte_pilote = $donnees->Modifier_un_compte_pilote;
        $droittoken->Supprimer_un_compte_pilote = $donnees->Supprimer_un_compte_pilote;

        $droittoken->Rechercher_un_compte_delegue = $donnees->Rechercher_un_compte_delegue;
        $droittoken->Creer_un_compte_delegue = $donnees->Creer_un_compte_delegue;
        $droittoken->Modifier_un_compte_delegue = $donnees->Modifier_un_compte_delegue;
        $droittoken->Supprimer_un_compte_delegue = $donnees->Supprimer_un_compte_delegue;
        $droittoken->Assigner_des_droits_a_un_delegue = $donnees->Assigner_des_droits_a_un_delegue;

        $droittoken->Rechercher_un_compte_etudiant = $donnees->Rechercher_un_compte_etudiant;
        $droittoken->Creer_un_compte_etudiant = $donnees->Creer_un_compte_etudiant;
        $droittoken->Modifier_un_compte_etudiant = $donnees->Modifier_un_compte_etudiant;
        $droittoken->Supprimer_un_compte_etudiant = $donnees->Supprimer_un_compte_etudiant;
        $droittoken->Consulter_les_stats_des_etudiants = $donnees->Consulter_les_stats_des_etudiants;

        $droittoken->Ajouter_une_offre_a_la_wish_list = $donnees->Ajouter_une_offre_a_la_wish_list;
        $droittoken->Retirer_une_offre_a_la_wish_list = $donnees->Retirer_une_offre_a_la_wish_list;
        $droittoken->Postuler_a_une_offre = $donnees->Postuler_a_une_offre;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;


        if ($droittoken->modifier_droit_token()) {
            // Ici la création a fonctionné
            // On envoie un code 200
            http_response_code(201);
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
