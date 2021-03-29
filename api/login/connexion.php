<?php



/*--------------------------------------------------------------------------------------------------------------------------------

Requete POST
essayez avec ce type de requete

{
    "Login": "thotho",
    "Mot_de_passe": "testmdp123*"
}

--------------------------------------------------------------------------------------------------------------------------------*/


// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/database.php';
    include_once '../models/login.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();
    // On instancie les entreprises 
    $authentification = new Login($db);
    $donnees = json_decode(file_get_contents("php://input"));


    try {





    if (!empty($donnees->Login) && !empty($donnees->Mot_de_passe)) {
        $authentification->Login = $donnees->Login;
        $authentification->Mot_de_passe = $donnees->Mot_de_passe; 
        $authentification->login();
       
        if ($authentification->Login != null && $authentification->Nom != null && $authentification->ID_Utilisateur != null) { 
           
            $authen = [
                "ID_Login" => $authentification->ID_Login,
                "Login" => $authentification->Login,
                "Mot_de_passe" => $authentification->Mot_de_passe,
                "Nom" => $authentification->Nom,
                "Prenom" => $authentification->Prenom,
                "Photo_Utilisateur" => $authentification->Photo_Utilisateur,
                "Role" => $authentification->Role,
                "ID_Utilisateur" => $authentification->ID_Utilisateur,
            ];
            if($authen['ID_Login'] != null || $authen['Role'] != null || $authen['ID_Utilisateur'] != null ){

                switch($authentification->Role){
                    case 'administrateur':
                        $authen['Authorisations'] = 'Complet : authorisations administrateur avec ID: '.$authentification->ID_Utilisateur;
                        $message = 'ok';
                        break;
                    case 'etudiant':
                        $authen['Centre_etudiant'] = $authentification->Centre_etudiant ;
                        $authen['Promotion_etudiant'] = $authentification->Promotion_etudiant ;
                        $authen['Centre_etudiant'] = $authentification->Centre_etudiant ;
                        $authen['ID_Utilisateur__CREE'] = $authentification->ID_Utilisateur__CREE ;
                        $authen['Authorisations'] = 'Restreint : authorisations du pilote avec ID: '.$authentification->ID_Utilisateur;
                        $message = 'ok';                
                        break;
                    case 'pilote':
                        $authen['Centre_pilote'] = $authentification->Centre_pilote ;
                        $authen['Promotion_pilote'] = $authentification->Promotion_pilote ;
                        $authen['ID_Utilisateur_Administrateur'] = $authentification->ID_Utilisateur_Administrateur ;
                        $authen['Authorisations'] = 'Restreint : authorisations du pilote avec ID: '.$authentification->ID_Utilisateur;
                        $message = 'ok';                      
                        break;
                    case 'delegue':
                        $authen['Centre_Delegue'] = $authentification->Centre_Delegue ;
                        $authen['Promotion_delegue'] = $authentification->Promotion_delegue ;
                        $authen['Specialite'] = $authentification->Specialite ;
                        $authen['ID_Utilisateur__CREE'] = $authentification->ID_Utilisateur__CREE ;
                        $authen['Authorisations'] = 'Restreint : authorisations du delegue avec ID: '.$authentification->ID_Utilisateur;
                        $message = 'ok';
                        break;
                    default:
                        $message = "ok, mais aucun role";
                        break;
                }
               
            http_response_code(200);




            
            // -------------------------TOKEN-------------------------
            if($authentification->Token != null){
            $authen['Token'] = $authentification->Token;
            $message = 'Token récupéré avec succès';
            }
            else if($authentification->NewToken != null){
            $authen['Nouveau_Token'] = $authentification->NewToken;
            $authen['Rechercher_entreprise'] = $authentification->Rechercher_entreprise;
            if($authentification->Role == 'administrateur'){
                $message = 'Token généré avec succès, vous avez tout les droits d\'API';
            }else{
                $message = 'Token généré avec succès, vos droits d\'API sont restreints, contactez un administrateur pour vous octroyer des droits supplémentaire';
            }
            }
            else{
            $authen['Token'] = 'Problème de géneration du Token';
            }
            // -------------------------TOKEN-------------------------
            $authen['message'] = $message;
            echo json_encode($authen);
            }else{
                http_response_code(404);
                echo json_encode(array("message" => "L'ID utilisateur n'existe pas'."));
                }
        } 
        else {
            // 404 Not found
            http_response_code(404);
            echo json_encode(array("message" => "L'utilisateur n'existe pas'."));
        }
    }




}catch (Exception $e) {
    $message = ("Caught exception: ".$e->getMessage() );
    if (($e->getMessage())=="SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'ID_Utilisateur' cannot be null"){
        $message = 'Binome login - mot de passe incorrects';
    }
    $authen['message'] = $message;
    echo json_encode($authen);

    http_response_code(404);
}




















} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
