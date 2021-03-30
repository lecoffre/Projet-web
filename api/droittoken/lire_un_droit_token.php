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
    include_once '../models/droittoken.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues 
    $droitdelegue = new DroitToken($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Utilisateur)) {
        $droitdelegue->ID_Utilisateur = $donnees->ID_Utilisateur;

        // On récupère du delegue
        $droitdelegue->lire_un_droit_token();

        // On vérifie si du delegue existe
        if ($droitdelegue->ID_Utilisateur != null) {

            $droitDeleg = [
                "ID_Utilisateur" => $droitdelegue->ID_Utilisateur,
                "ID_Utilisateur__Assigne_DROIT" => $droitdelegue->ID_Utilisateur__Assigne_DROIT,
                "Creer_une_offre" => $droitdelegue->Creer_une_offre,
                "Modifier_une_offre" => $droitdelegue->Modifier_une_offre,
                "Supprimer_une_offre" => $droitdelegue->Supprimer_une_offre,
                "Rechercher_un_compte_delegue" => $droitdelegue->Rechercher_un_compte_delegue,
                "Creer_un_delegue" => $droitdelegue->Creer_un_delegue,
                "Modifier_un_compte_delegue" => $droitdelegue->Modifier_un_compte_delegue,
                "Supprimer_un_compte_delegue" => $droitdelegue->Supprimer_un_compte_delegue,
                "Rechercher_un_compte_etudiant" => $droitdelegue->Rechercher_un_compte_etudiant,
                "Creer_un_etudiant" => $droitdelegue->Creer_un_etudiant,
                "Modifier_un_etudiant" => $droitdelegue->Modifier_un_etudiant,
                "Supprimer_un_etudiant" => $droitdelegue->Supprimer_un_etudiant,
                "Consulter_les_stats_des_etudiants" => $droitdelegue->Consulter_les_stats_des_etudiants,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_3" => $droitdelegue->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
                "Informer_le_systeme_de_l_avancement_de_la_candidature_step_4" => $droitdelegue->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4
            ];
            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($droitDeleg);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "Les droits pour ce delegue n'existent pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
