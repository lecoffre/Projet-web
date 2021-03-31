<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        !empty($donnees->ID_Utilisateur)
        or !empty($donnees->Creer_une_entreprise)
        or !empty($donnees->Modifier_une_entreprise)
        or !empty($donnees->Evaluer_une_entreprise)
        or !empty($donnees->Supprimer_une_entreprise)
        or !empty($donnees->Consulter_les_stats_des_entreprises)
        or !empty($donnees->Rechercher_une_offre)
        or !empty($donnees->Creer_une_offre)
        or !empty($donnees->Modifier_une_offre)
        or !empty($donnees->Supprimer_une_offre)
        or !empty($donnees->Consulter_les_stats_des_offres)
        or !empty($donnees->Rechercher_un_compte_pilote)
        or !empty($donnees->Rechercher_un_compte_etudiant)
        or !empty($donnees->Creer_un_compte_etudiant)
        or !empty($donnees->Modifier_un_compte_etudiant)
        or !empty($donnees->Supprimer_un_compte_etudiant)
        or !empty($donnees->Consulter_les_stats_des_etudiants)
        or !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3)
        or !empty($donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4)
    ) {
        // Ici on a reçu les données
        // On hydrate notre objet

        $droittoken->Token = 'TOKENPROVISOIRE_:' . bin2hex(random_bytes(40)); //1
        $droittoken->Rechercher_une_entreprise = '1'; //1
        $droittoken->Creer_une_entreprise = $donnees->Creer_une_entreprise;
        $droittoken->Modifier_une_entreprise = $donnees->Modifier_une_entreprise;
        $droittoken->Evaluer_une_entreprise = $donnees->Evaluer_une_entreprise;
        $droittoken->Supprimer_une_entreprise = $donnees->Supprimer_une_entreprise;
        $droittoken->Consulter_les_stats_des_entreprises = $donnees->Consulter_les_stats_des_entreprises;
        $droittoken->Rechercher_une_offre = $donnees->Rechercher_une_offre;
        $droittoken->Creer_une_offre = $donnees->Creer_une_offre;
        $droittoken->Modifier_une_offre = $donnees->Modifier_une_offre;
        $droittoken->Supprimer_une_offre = $donnees->Supprimer_une_offre; //10
        $droittoken->Consulter_les_stats_des_offres = $donnees->Consulter_les_stats_des_offres;
        $droittoken->Rechercher_un_compte_pilote = $donnees->Rechercher_un_compte_pilote;
        $droittoken->Creer_un_compte_pilote = '0';
        $droittoken->Modifier_un_compte_pilote = '0';
        $droittoken->Supprimer_un_compte_pilote = '0';
        $droittoken->Rechercher_un_compte_delegue = '0';
        $droittoken->Creer_un_compte_delegue = '0';
        $droittoken->Modifier_un_compte_delegue = '0';
        $droittoken->Supprimer_un_compte_delegue = '0';
        $droittoken->Assigner_des_droits_a_un_delegue = '0'; //20
        $droittoken->Rechercher_un_compte_etudiant = '1';
        $droittoken->Creer_un_compte_etudiant = $donnees->Creer_un_compte_etudiant;
        $droittoken->Modifier_un_compte_etudiant = $donnees->Modifier_un_compte_etudiant;
        $droittoken->Supprimer_un_compte_etudiant = $donnees->Supprimer_un_compte_etudiant;
        $droittoken->Consulter_les_stats_des_etudiants = $donnees->Consulter_les_stats_des_etudiants;
        $droittoken->Ajouter_une_offre_a_la_wish_list = '1';
        $droittoken->Retirer_une_offre_a_la_wish_list = '1';
        $droittoken->Postuler_a_une_offre = '1';
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1 = '1';
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2 = '1';
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $donnees->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5 = '1';
        $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6 = '1';
        $droittoken->ID_Utilisateur = $donnees->ID_Utilisateur;


        if ($droittoken->creer_droit_token()) {
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
