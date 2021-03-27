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
    include_once '../models/candidature.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les authentificationq 
    $candidature = new Candidature($db);

    // On récupère les données
    $donnees = json_decode(file_get_contents("php://input"));

    // On récupère les données
    $stmt = $candidature->lire_candidature();

    // On vérifie si on a au moins 1 authentification
    if ($stmt->rowCount() > 0) {

        $donnees->Entreprise_offre;
        $donnees->Nom;
        $donnees->Prenom;

        // On initialise un tableau associatif
        $tableaucandidature = [];
        $tableaucandidature['candidature'] = [];

        // On parcourt les authentification
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $candi = [
                "ID_Candidature" => $ID_Candidature,
                "CV_etudiant" => $CV_etudiant,
                "Nom" => $Nom,
                "Prenom" => $Prenom,
                "Lettre_de_motivation_etudiant" => $Lettre_de_motivation_etudiant,
                "Fiche_de_validation" => $Fiche_de_validation,
                "Convention_de_stage" => $Convention_de_stage,
                "LIEN_OFFRE" => $LIEN_OFFRE,
                "ID_Utilisateur" => $ID_Utilisateur,
                "ID_offre" => $ID_offre,
                "ID_Utilisateur_Pilote" => $ID_Utilisateur_Pilote,
                "ID_Login" => $ID_Login,
                "Entreprise_offre" => $Entreprise_offre,
            ];

            switch (true) {
                case ((!empty($donnees->Nom) and !empty($donnees->Prenom) and !empty($donnees->Entreprise_offre)) and
                    $donnees->Nom == $candi['Nom'] and
                    $donnees->Prenom == $candi['Prenom'] and
                    $donnees->Entreprise_offre == $candi['Entreprise_offre']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((!empty($donnees->Nom) and !empty($donnees->Prenom) and empty($donnees->Entreprise_offre)) and
                    $donnees->Nom == $candi['Nom'] and
                    $donnees->Prenom == $candi['Prenom']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((!empty($donnees->Nom) and empty($donnees->Prenom) and !empty($donnees->Entreprise_offre)) and
                    $donnees->Nom == $candi['Nom'] and
                    $donnees->Entreprise_offre == $candi['Entreprise_offre']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((!empty($donnees->Nom) and empty($donnees->Prenom) and empty($donnees->Entreprise_offre)) and
                    $donnees->Nom == $candi['Nom']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((empty($donnees->Nom) and !empty($donnees->Prenom) and !empty($donnees->Entreprise_offre)) and
                    $donnees->Prenom == $candi['Prenom'] and
                    $donnees->Entreprise_offre == $candi['Entreprise_offre']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((empty($donnees->Nom) and !empty($donnees->Prenom) and empty($donnees->Entreprise_offre)) and
                    $donnees->Prenom == $candi['Prenom']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((empty($donnees->Nom) and empty($donnees->Prenom) and !empty($donnees->Entreprise_offre)) and
                    $donnees->Entreprise_offre == $candi['Entreprise_offre']):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
                case ((empty($donnees->Nom) and empty($donnees->Prenom) and empty($donnees->Entreprise_offre))):
                    $tableaucandidature['candidature'][] = $candi;
                    break;
            }
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableaucandidature);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
