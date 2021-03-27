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
    include_once '../models/delegue.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les delegues 
    $delegue = new Delegue($db);



    $donnees = json_decode(file_get_contents("php://input"));

    if (!empty($donnees->ID_Login)) {
        $delegue->ID_Login = $donnees->ID_Login;

        // On récupère du delegue
        $delegue->lire_un_delegue();

        // On vérifie si du delegue existe
        if ($delegue->ID_Utilisateur != null) {

            $deleg = [
                "ID_Utilisateur" => $delegue->ID_Utilisateur,
                "Centre_Delegue" => $delegue->Centre_Delegue,
                "Promotion_delegue" => $delegue->Promotion_delegue,
                "Specialite" => $delegue->Specialite,
                "Nom" => $delegue->Prenom,
                "Prenom" => $delegue->Prenom,
                "Role" => $delegue->Role,
                "Photo_Utilisateur" => $delegue->Photo_Utilisateur,
                "Specialite" => $delegue->Specialite,
                "ID_Utilisateur__CREE" => $delegue->ID_Utilisateur__CREE,
                "ID_Login" => $delegue->ID_Login
            ];
            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($deleg);
        } else {
            // 404 Not found
            http_response_code(404);

            echo json_encode(array("message" => "Le delegue n'existe pas'."));
        }
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
