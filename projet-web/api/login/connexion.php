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

        $droits = [
            "Rechercher_entreprise" => $authentification->Rechercher_entreprise,
            "Creer_une_entreprise" => $authentification->Creer_une_entreprise,
            "Modifier_une_entreprise" => $authentification->Modifier_une_entreprise,
            "Evaluer_une_entreprise" => $authentification->Evaluer_une_entreprise,
            "Supprimer_une_entreprise"=> $authentification->Supprimer_une_entreprise,
            "Consulter_les_stats_des_entreprises"=> $authentification->Consulter_les_stats_des_entreprises,
            "Rechercher_une_offre"=> $authentification->Rechercher_une_offre,
            "Creer_une_offre"=> $authentification->Creer_une_offre,
            "Modifier_une_offre"=> $authentification->Modifier_une_offre,
            "Supprimer_une_offre"=> $authentification->Supprimer_une_offre, //10
            "Consulter_les_stats_des_offres"=> $authentification->Consulter_les_stats_des_offres,
            "Rechercher_un_compte_pilote"=> $authentification->Rechercher_un_compte_pilote,
            "Creer_un_compte_pilote"=> $authentification->Creer_un_compte_pilote,
            "Modifier_un_compte_pilote"=> $authentification->Modifier_un_compte_pilote,
            "Supprimer_un_compte_pilote"=> $authentification->Supprimer_un_compte_pilote,
            "Rechercher_un_compte_delegue"=> $authentification->Rechercher_un_compte_delegue,
            "Creer_un_compte_delegue"=> $authentification->Creer_un_compte_delegue,
            "Modifier_un_compte_delegue"=> $authentification->Modifier_un_compte_delegue,
            "Supprimer_un_compte_delegue"=> $authentification->Supprimer_un_compte_delegue,
            "Assigner_des_droits_a_un_delegue"=> $authentification->Assigner_des_droits_a_un_delegue, //20
            "Rechercher_un_compte_etudiant"=> $authentification->Rechercher_un_compte_etudiant,
            "Creer_un_compte_etudiant"=> $authentification->Creer_un_compte_etudiant,
            "Modifier_un_compte_etudiant"=> $authentification->Modifier_un_compte_etudiant,
            "Supprimer_un_compte_etudiant"=> $authentification->Supprimer_un_compte_etudiant,
            "Consulter_les_stats_des_etudiants"=> $authentification->Consulter_les_stats_des_etudiants,
            "Ajouter_une_offre_a_la_wish_list"=> $authentification->Ajouter_une_offre_a_la_wish_list,
            "Retirer_une_offre_a_la_wish_list"=> $authentification->Retirer_une_offre_a_la_wish_list,
            "Postuler_a_une_offre"=> $authentification->Postuler_a_une_offre,
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_1"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_2"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2, //30
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_3"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_4"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_5"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
            "Informer_le_systeme_de_l_avancement_de_la_candidature_step_6"=> $authentification->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6, //34
            
            
        ];


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
               



            
            // -------------------------TOKEN-------------------------
            if($authentification->Token != null){
            if(str_starts_with($authentification->Token, 'TOKENPROVISOIRE_')){
                $authentification->changerToken($authen['ID_Utilisateur']);//MODIFIE LE TOKEN PROVISOIRE
                $message = 'Token provisoire récupéré avec succès, nouveau token généré';
                $authen['Nouveau_Token'] = $authentification->NewToken;
            }else{
                $authen['Token'] = $authentification->Token;
                $authen['Rechercher_entreprise'] = $authentification->Rechercher_entreprise;
                $message = 'Token récupéré avec succès';
            }
            }
            else if($authentification->NewToken != null){
            $authen['Nouveau_Token'] = $authentification->NewToken;
            //$authen['Rechercher_entreprise'] = $authentification->Rechercher_entreprise;
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

            
            

            $authen = array_merge($authen, $droits);
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
