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
    include_once '../models/offre.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $offre = new Offre($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_offre)) {
        $offre->ID_offre = $donnees->ID_offre;

        // On récupère l'entreprise
        $offre->lireUn();

        // On vérifie si l'entreprise existe
        if ($offre->Entreprise_offre != null) {

            $ofr = [
                "ID_offre" => $offre->ID_offre,
                "Secteur" => $offre->Secteur,
                "Titre_offre" => $offre->Titre_offre,
                "Competences_offre" => $offre->Competences_offre,
                "Localite_offre" => $offre->Localite_offre,
                "Entreprise_offre" => $offre->Entreprise_offre,
                "Type_de_promotion_concernee" => $offre->Type_de_promotion_concernee,
                "Duree_du_stage" => $offre->Duree_du_stage,
                "Base_de_remuneration" => $offre->Base_de_remuneration,
                "Date_de_offre" => $offre->Date_de_offre,
                "Nombre_de_places_disponible" => $offre->Nombre_de_places_disponible,
                "ID_Entreprise" => $offre->ID_Entreprise,
                "ID_Utilisateur" => $offre->ID_Utilisateur,


            ];
            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($ofr);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "L'offre n'existe pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
