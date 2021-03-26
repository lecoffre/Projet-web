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
    $donnees = json_decode(file_get_contents("php://input"));

    // On récupère les données
    $stmt = $delegue->lire_delegue();

    // On vérifie si on a au moins 1 delegue
    if ($stmt->rowCount() > 0) {

        $donnees->Centre_Delegue;
        $donnees->Promotion_delegue;
        $donnees->Specialite;
        $donnees->Nom;
        $donnees->Prenom;

        // On initialise un tableau associatif
        $tableauDelegue = [];
        $tableauDelegue['delegue'] = [];

        // On parcourt les delegues
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $deleg = [
                "ID_Utilisateur" => $ID_Utilisateur,
                "Centre_Delegue" => $Centre_Delegue,
                "Promotion_delegue" => $Promotion_delegue,
                "Specialite" => $Specialite,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Photo_Utilisateur" => $Photo_Utilisateur,
                "ID_Utilisateur__CREE" => $ID_Utilisateur__CREE,
                "ID_Login" => $ID_Login
            ];



            switch (true) {
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((!empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and
                    $donnees->Centre_Delegue == $deleg['Centre_Delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and
                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite'] and

                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and !empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and

                    $donnees->Promotion_delegue == $deleg['Promotion_delegue']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and


                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and


                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and


                    $donnees->Specialite == $deleg['Specialite'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and !empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom)) and


                    $donnees->Specialite == $deleg['Specialite']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and !empty($donnees->Prenom)) and



                    $donnees->Nom == $deleg['Nom'] and
                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and !empty($donnees->Nom) and empty($donnees->Prenom)) and



                    $donnees->Nom == $deleg['Nom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and !empty($donnees->Prenom)) and




                    $donnees->Prenom == $deleg['Prenom']):
                    $tableauDelegue['delegue'][] = $deleg;
                    break;
                case ((empty($donnees->Centre_Delegue) and empty($donnees->Promotion_delegue) and empty($donnees->Specialite) and empty($donnees->Nom) and empty($donnees->Prenom))):
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
