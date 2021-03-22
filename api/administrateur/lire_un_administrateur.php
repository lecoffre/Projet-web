<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/administrateur.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises
    $administrateur = new Administrateur($db);

    $donnees = json_decode(file_get_contents("php://input"));


    if (!empty($donnees->ID_Utilisateur)) {
        $administrateur->ID_Utilisateur = $donnees->ID_Utilisateur;
        // On récupère l'entreprise
        $administrateur->lire_un_administrateur();

        // On vérifie si l'entreprise existe
        if ($administrateur->Nom != null) {
            $admin = [
                "ID_Utilisateur" => $administrateur->ID_Utilisateur,
                "Nom" => $administrateur->Nom,
                "Prenom" => $administrateur->Prenom,
                "Photo_Utilisateur" => $administrateur->Photo_Utilisateur,
                "ID_Login" => $administrateur->ID_Login,
            ];

            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($admin);
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
