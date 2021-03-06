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
    include_once '../models/pilote.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les authentificationq 
    $pilote = new Pilote($db);

    $donnees = json_decode(file_get_contents("php://input"));
    // On récupère les données
    $stmt = $pilote->lire_pilote();

    // On vérifie si on a au moins 1 authentification
    if ($stmt->rowCount() > 0) {

        $donnees->Centre_pilote;
        $donnees->Promotion_pilote;
        $donnees->Nom;
        $donnees->Prenom;

        // On initialise un tableau associatif
        $tableaupilote = [];
        $tableaupilote['pilote'] = [];

        // On parcourt les authentification
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $pilo = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "Centre_pilote" => $Centre_pilote,
                "Promotion_pilote" => $Promotion_pilote,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Photo_Utilisateur" => $Photo_Utilisateur,
                "ID_Utilisateur_Administrateur" => $ID_Utilisateur_Administrateur,
                "ID_Login" => $ID_Login,
            ];


            //fonction de filtrage
            switch (true) {
                case (!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Nom == $pilo['Nom'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Nom == $pilo['Nom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Nom == $pilo['Nom'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Nom == $pilo['Nom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;

                case (empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and !empty($donnees->Prenom) and

                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Nom == $pilo['Nom'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and empty($donnees->Prenom) and

                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Nom == $pilo['Nom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote) and empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Nom == $pilo['Nom'] and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and !empty($donnees->Nom) and empty($donnees->Prenom) and
                    $donnees->Nom == $pilo['Nom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and empty($donnees->Nom) and !empty($donnees->Prenom) and
                    $donnees->Prenom == $pilo['Prenom']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
                case (empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote) and empty($donnees->Nom) and empty($donnees->Prenom)):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
            }
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableaupilote);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
