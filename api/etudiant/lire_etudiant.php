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
    include_once '../models/etudiant.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les etudiants 
    $etudiant = new Etudiant($db);


    // On récupère les données
    $stmt = $etudiant->lire_etudiant();

    // On vérifie si on a au moins 1 etudiant
    if ($stmt->rowCount() > 1) {
        // On initialise un tableau associatif
        $tableauEtudiant = [];
        $tableauEtudiant['etudiant'] = [];

        // On parcourt les etudiants
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $etud = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "Centre_etudiant" => $Centre_etudiant,
                "Promotion_etudiant" => $promotion_etudiant,
                "Specialite" => $Specialite,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Photo_Utilisateur" => $Photo_Utilisateur,
                "ID_Utilisateur__CREE" => $ID_Utilisateur__CREE,
                "ID_Login" => $ID_Login
            ];

            $tableauEtudiant['etudiant'][] = $etud;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauEtudiant);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
