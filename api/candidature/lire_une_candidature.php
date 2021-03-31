<?php
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

    // On instancie les entreprises
    $candidature = new Candidature($db);

    $donnees = json_decode(file_get_contents("php://input"));


    if (!empty($donnees->ID_Candidature)) {
        $candidature->ID_Candidature = $donnees->ID_Candidature;
        // On récupère l'entreprise
        $candidature->lire_une_candidature();

        // On vérifie si l'entreprise existe
        if ($candidature->CV_etudiant != null) {
            $candi = [
                "CV_etudiant" => $candidature->CV_etudiant,
                "Lettre_de_motivation_etudiant" => $candidature->Lettre_de_motivation_etudiant,
                "Fiche_de_validation" => $candidature->Fiche_de_validation,
                "Nom" => $candidature->Nom,
                "Prenom" => $candidature->Prenom,
                "Convention_de_stage" => $candidature->Convention_de_stage,
                "LIEN_OFFRE" => $candidature->LIEN_OFFRE,
                "ID_Utilisateur" => $candidature->ID_Utilisateur,
                "ID_offre" => $candidature->ID_offre,
                "ID_Utilisateur_Pilote" => $candidature->ID_Utilisateur_Pilote,
                "Entreprise_offre" => $candidature->Entreprise_offre,
            ];


            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($candi);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "L'entreprise n'existe pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
