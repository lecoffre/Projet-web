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
    include_once '../models/wishlist.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues 
    $wishlist = new Wishlist($db);
    $donnees = json_decode(file_get_contents("php://input"));


    // On récupère les données
    $stmt  = $wishlist->lire_favoris();

    // On vérifie si on a au moins 1 entreprise
    if ($stmt->rowCount() > 1) {
        // On initialise un tableau associatif
        $tableauoffre = [];
        $tableauoffre['offre'] = [];

        // On parcourt les entreprises
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $ofr = [
                "ID_offre" => $ID_offre,
                "Secteur" => $Secteur,
                "Titre_offre" => $Titre_offre,
                "Competences_offre" => $Competences_offre,
                "Localite_offre" => $Localite_offre,
                "Entreprise_offre" => $Entreprise_offre,
                "Type_de_promotion_concernee" => $Type_de_promotion_concernee,
                "Duree_du_stage" => $Duree_du_stage,
                "Base_de_remuneration" => $Base_de_remuneration,
                "Date_de_offre" => $Date_de_offre,
                "Nombre_de_places_disponible" => $Nombre_de_places_disponible,
                "ID_Entreprise" => $ID_Entreprise,
                "ID_Utilisateur" => $ID_Utilisateur,
                "ID_Wishlist" => $ID_Wishlist
            ];
            if ($donnees->ID_Utilisateur == $ofr['ID_Utilisateur']) {
                $tableauoffre['offre'][] = $ofr;
            }
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauoffre);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
