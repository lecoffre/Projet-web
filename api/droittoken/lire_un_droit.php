<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/droittoken.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues
    $droittoken = new DroitToken($db);


    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Utilisateur)) {
        $droittoken->ID_Utilisateur = $donnees->ID_Utilisateur;

        // On récupère du delegue
        $droittoken->lire_un_droit_token();

        // On vérifie si du delegue existe
        if ($droittoken->ID_Utilisateur != null) {

            $droitDeleg = [
                "Token" => $droittoken->Token,
                "ID_Utilisateur" => $droittoken->ID_Utilisateur,
                "Rechercher_une_entreprise" => $droittoken->Rechercher_une_entreprise,
                "Creer_une_entreprise" => $droittoken->Creer_une_entreprise,
                "Modifier_une_entreprise" => $droittoken->Modifier_une_entreprise,
                "Evaluer_une_entreprise" => $droittoken->Evaluer_une_entreprise,
                "Supprimer_une_entreprise" => $droittoken->Supprimer_une_entreprise,
                "Consulter_les_stats_des_entreprises" => $droittoken->Consulter_les_stats_des_entreprises,
                "Rechercher_une_offre" => $droittoken->Rechercher_une_offre,
                "Creer_une_offre" => $droittoken->Creer_une_offre,
                "Modifier_une_offre" => $droittoken->Modifier_une_offre,
                "Supprimer_une_offre" => $droittoken->Supprimer_une_offre,
                "Consulter_les_stats_des_offres" => $droittoken->Consulter_les_stats_des_offres,
                "Rechercher_un_compte_pilote" => $droittoken->Rechercher_un_compte_pilote,
                "Creer_un_compte_pilote" => $droittoken->Creer_un_compte_pilote,
                "Modifier_un_compte_pilote" => $droittoken->Modifier_un_compte_pilote,
                "Supprimer_un_compte_pilote" => $droittoken->Supprimer_un_compte_pilote,
                "Rechercher_un_compte_delegue" => $droittoken->Rechercher_un_compte_delegue,
                "Creer_un_compte_delegue" => $droittoken->Creer_un_compte_delegue,
                "Modifier_un_compte_delegue" => $droittoken->Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $droittoken->Supprimer_un_compte_delegue,
                "Rechercher_un_compte_delegue" => $droittoken->Rechercher_un_compte_delegue,
                "Creer_un_compte_delegue" => $droittoken->Creer_un_compte_delegue,
                "Modifier_un_compte_delegue" => $droittoken->Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $droittoken->Supprimer_un_compte_delegue,
                "Assigner_des_droits_a_un_delegue" => $droittoken->Assigner_des_droits_a_un_delegue,
                "Rechercher_un_compte_etudiant" => $droittoken->Rechercher_un_compte_etudiant,
                "Creer_un_compte_etudiant" => $droittoken->Creer_un_compte_etudiant,
                "Modifier_un_compte_etudiant" => $droittoken->Modifier_un_compte_etudiant,
                "Supprimer_un_compte_etudiant" => $droittoken->Supprimer_un_compte_etudiant,
                "Consulter_les_stats_des_etudiants" => $droittoken->Consulter_les_stats_des_etudiants,
                "Ajouter_une_offre_a_la_wish_list" => $droittoken->Ajouter_une_offre_a_la_wish_list,
                "Retirer_une_offre_a_la_wish_list" => $droittoken->Retirer_une_offre_a_la_wish_list,
                "Postuler_a_une_offre" => $droittoken->Postuler_a_une_offre,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_1" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_2" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_3" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_4" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_5" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_6" => $droittoken->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6,
            ];
        }


        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($droitDeleg);
    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(array("message" => "Les droits pour ce delegue n'existent pas'."));
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
