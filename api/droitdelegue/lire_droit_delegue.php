<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/droitdelegue.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues 
    $droitdelegue = new Droitdelegue($db);


    // On récupère les données
    $stmt = $droitdelegue->lire_droit_delegue();

    // On vérifie si on a au moins 1 delegue
    if ($stmt->rowCount() > 1) {
        // On initialise un tableau associatif
        $tableauDroitDelegue = [];
        $tableauDroitDelegue['droitdelegue'] = [];

        // On parcourt les delegues
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $droitDeleg = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "ID_Utilisateur__Assigne_DROIT" => $ID_Utilisateur__Assigne_DROIT,
                "Creer_une_offre" => $Creer_une_offre,
                "Modifier_une_offre" => $Modifier_une_offre,
                "Supprimer_une_offre" => $Supprimer_une_offre,
                "Rechercher_un_compte_delegue" => $Rechercher_un_compte_delegue,
                "Creer_un_delegue" => $Creer_un_delegue,
                "Modifier_un_compte_delegue" => $Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $Supprimer_un_compte_delegue,
                "Rechercher_un_compte_etudiant" => $Rechercher_un_compte_etudiant,
                "Creer_un_etudiant" => $Creer_un_etudiant,
                "Modifier_un_etudiant" => $Modifier_un_etudiant,
                "Supprimer_un_etudiant" => $Supprimer_un_etudiant,
                "Consulter_les_stats_des_etudiants" => $Consulter_les_stats_des_etudiants,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_3" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_4" => $Informer_le_systeme_de_l_avancement_de_la_candidature_step_4
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
