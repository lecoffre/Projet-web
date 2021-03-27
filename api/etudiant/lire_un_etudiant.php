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



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Login)) {
        $etudiant->ID_Login = $donnees->ID_Login;

        // On récupère l'etudiant
        $etudiant->lire_un_etudiant();

        // On vérifie si l'etudiant existe
        if ($etudiant->ID_Utilisateur != null) {

            $etud = [
                "ID_Utilisateur" => $etudiant->ID_Utilisateur,
                "Centre_etudiant" => $etudiant->Centre_etudiant,
                "Promotion_etudiant" => $etudiant->Promotion_etudiant,
                "Specialite" => $etudiant->Specialite,
                "Nom" => $etudiant->Nom,
                "Prenom" => $etudiant->Prenom,
                "Role" => $etudiant->Role,
                "Photo_Utilisateur" => $etudiant->Photo_Utilisateur,
                "ID_Utilisateur__CREE" => $etudiant->ID_Utilisateur__CREE,
                "ID_Login" => $etudiant->ID_Login
            ];
            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($etud);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "L'etudiant n'existe pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
