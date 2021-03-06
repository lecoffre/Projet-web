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
    include_once '../models/entreprise.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $entreprise = new Entreprise($db);


    // On récupère les données
    $stmt = $entreprise->lire_entreprises();

    // On vérifie si on a au moins 1 entreprise
    if ($stmt->rowCount() > 0) {
        // On initialise un tableau associatif
        $tableauentreprise = [];
        $tableauentreprise['entreprise'] = [];

        // On parcourt les entreprises
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $entre = [
                "ID_Entreprise" => $ID_Entreprise,
                "Nom_entreprise" => $Nom_entreprise,
                "Secteur_activite" => $Secteur_activite,
                "Competences_recherchees_dans_les_stages" => $Competences_recherchees_dans_les_stages,
                "Nombre_de_stagiaires_CESI_deja_acceptes_en_stage" => $Nombre_de_stagiaires_CESI_deja_acceptes_en_stage,
                "Evaluation_des_stagiaires" => $Evaluation_des_stagiaires,
                "Confiance_du_Pilote_de_promotion" => $Confiance_du_Pilote_de_promotion,
                "Localite_entreprise" => $Localite_entreprise,
                "Logo_Entreprise" => $Logo_Entreprise,
                "ID_Utilisateur" => $ID_Utilisateur
            ];

            $tableauentreprise['entreprise'][] = $entre;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauentreprise);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
