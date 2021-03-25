<?php
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


    // On récupère les données
    $stmt = $delegue->lire_delegue();

    // On vérifie si on a au moins 1 delegue
    if (($stmt->rowCount() > 0) && (!empty($donnees->Centre_delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite))) {
        // On initialise un tableau associatif
        $tableauDelegue = [];
        $tableauDelegue['delegue'] = [];

        // On parcourt les delegues
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $deleg = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "Centre_delegue" => $Centre_delegue,
                "Promotion_delegue" => $Promotion_delegue,
                "Specialite" => $Specialite,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Photo_Utilisateur" => $Photo_Utilisateur,
                "ID_Utilisateur__CREE" => $ID_Utilisateur__CREE,
                "ID_Login" => $ID_Login
            ];

            switch (true) {
                case ((!empty($donnees->Centre_delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite)) and
                    $donnees->Centre_delegue == $deleg['Centre_delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((!empty($donnees->Centre_delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite)) and
                    $donnees->Centre_delegue == $deleg['Centre_delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((!empty($donnees->Centre_delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite)) and
                    $donnees->Centre_delegue == $deleg['Centre_delegue']
                    and $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((empty($donnees->Centre_delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite)) and
                    $donnees->Specialite == $deleg['Specialite'] and $donnees->Promotion_delegue == $deleg['Promotion_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((!empty($donnees->Centre_delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite)) and
                    $donnees->Centre_delegue == $deleg['Centre_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((empty($donnees->Centre_delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite)) and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;

                case ((empty($donnees->Centre_delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite)) and
                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
            }
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauDelegue);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
