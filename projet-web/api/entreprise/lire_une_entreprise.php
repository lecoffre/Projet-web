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
    include_once '../models/entreprise.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $entreprise = new Entreprise($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Entreprise)) {
        $entreprise->ID_Entreprise = $donnees->ID_Entreprise;

        // On récupère l'entreprise
        $entreprise->lireUn();
        // On vérifie si l'entreprise existe
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
            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($entre);
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
