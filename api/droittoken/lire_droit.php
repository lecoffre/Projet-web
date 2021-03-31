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


    // On récupère les données
    $stmt = lire_droit_token();

    // On vérifie si on a au moins 1 delegue
    if ($stmt->rowCount() > 1) {
        // On initialise un tableau associatif
        $tableauDroitDelegue = [];
        $tableauDroitDelegue['droitdelegue'] = [];

        // On parcourt les delegues
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $droitDeleg = [
                "Token" => $Token,
                "ID_Utilisateur" => $ID_Utilisateur,
                "Rechercher_une_entreprise" => $Rechercher_une_entreprise,
                "Creer_une_entreprise" => $Creer_une_entreprise,
                "Modifier_une_entreprise" => $Modifier_une_entreprise,
                "Evaluer_une_entreprise" => $Evaluer_une_entreprise,
                "Supprimer_une_entreprise" => $Supprimer_une_entreprise,
                "Consulter_les_stats_des_entreprises" => $Consulter_les_stats_des_entreprises,
                "Rechercher_une_offre" => $Rechercher_une_offre,
                "Creer_une_offre" => $Creer_une_offre,
                "Modifier_une_offre" => $Modifier_une_offre,
                "Supprimer_une_offre" => $Supprimer_une_offre,
                "Consulter_les_stats_des_offres" => $Consulter_les_stats_des_offres,
                "Rechercher_un_compte_pilote" => $Rechercher_un_compte_pilote,
                "Creer_un_compte_pilote" => $Creer_un_compte_pilote,
                "Modifier_un_compte_pilote" => $Modifier_un_compte_pilote,
                "Supprimer_un_compte_pilote" => $Supprimer_un_compte_pilote,
                "Rechercher_un_compte_delegue" => $Rechercher_un_compte_delegue,
                "Creer_un_compte_delegue" => $Creer_un_compte_delegue,
                "Modifier_un_compte_delegue" => $Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $Supprimer_un_compte_delegue,
                "Rechercher_un_compte_delegue" => $Rechercher_un_compte_delegue,
                "Creer_un_compte_delegue" => $Creer_un_compte_delegue,
                "Modifier_un_compte_delegue" => $Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $Supprimer_un_compte_delegue,
                "Assigner_des_droits_a_un_delegue" => $Assigner_des_droits_a_un_delegue,
                "Rechercher_un_compte_etudiant" => $Rechercher_un_compte_etudiant,
                "Creer_un_compte_etudiant" => $Creer_un_compte_etudiant,
                "Modifier_un_compte_etudiant" => $Modifier_un_compte_etudiant,
                "Supprimer_un_compte_etudiant" => $Supprimer_un_compte_etudiant,
                "Consulter_les_stats_des_etudiants" => $Consulter_les_stats_des_etudiants,
                "Ajouter_une_offre_a_la_wish_list" => $Ajouter_une_offre_a_la_wish_list,
                "Retirer_une_offre_a_la_wish_list" => $Retirer_une_offre_a_la_wish_list,
                "Postuler_a_une_offre" => $Postuler_a_une_offre,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_1" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_2" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_2,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_3" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_4" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_5" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_6" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_6,
            ];

            $tableauDroitDelegue['droitdelegue'][] = $droitDeleg;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauDroitDelegue);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
