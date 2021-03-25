<<<<<<< HEAD
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


    // On récupère les données
    $stmt = $pilote->lire_pilote();

    // On vérifie si on a au moins 1 authentification
    if (($stmt->rowCount() > 0) && (!empty($donnees->Centre_pilote) or !empty($donnees->Promotion_pilote))) {
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

            switch (true) {
                case ((!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote)) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;

                case ((!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote)) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;

                case ((empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote)) and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
            }


            $tableaupilote['pilote'][] = $pilo;
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
=======
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


    // On récupère les données
    $stmt = $pilote->lire_pilote();

    // On vérifie si on a au moins 1 authentification
    if (($stmt->rowCount() > 0) && (!empty($donnees->Centre_pilote) or !empty($donnees->Promotion_pilote))) {
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

            switch (true) {
                case ((!empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote)) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote'] and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;

                case ((!empty($donnees->Centre_pilote) and empty($donnees->Promotion_pilote)) and
                    $donnees->Centre_pilote == $pilo['Centre_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;

                case ((empty($donnees->Centre_pilote) and !empty($donnees->Promotion_pilote)) and
                    $donnees->Promotion_pilote == $pilo['Promotion_pilote']):
                    $tableaupilote['pilote'][] = $pilo;
                    break;
            }


            $tableaupilote['pilote'][] = $pilo;
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
>>>>>>> 80bacf67f89d013e7e3cfc5411ba743e8573cc96