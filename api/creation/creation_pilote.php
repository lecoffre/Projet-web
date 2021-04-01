<?php
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
    include_once '../models/creation.php';


    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les entreprises 
    $authentification = new Creation($db);

    // On instancie les entreprises 
    $authentification = new Creation($db);
    $utilisateur = new Creation($db);

    // On récupère les informations envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    if (
        !empty($donnees->Login) && !empty($donnees->Mot_de_passe) && !empty($donnees->Prenom) && !empty($donnees->Nom) && !empty($donnees->Photo_Utilisateur)
        && !empty($donnees->Centre_pilote) && !empty($donnees->Promotion_pilote) && !empty($donnees->ID_Utilisateur_Administrateur)
    ) {
        $authentification->Login = $donnees->Login;
        $utilisateur->Nom = $donnees->Nom;
        $utilisateur->Prenom = $donnees->Prenom;

        // On récupère l'entreprise
        $authentification->lire_login();
        $utilisateur->rechercher_utilisateur();

        // On vérifie si le login existe deja
        if (($authentification->ID_Login != null) or ($utilisateur->ID_Login != null)) {

            echo json_encode("il existe deja");
            //si le login n'existe pas on crée un nouveau login
        } elseif (!empty($donnees->Login) && !empty($donnees->Mot_de_passe)) {
            $authentification->Mot_de_passe = $donnees->Mot_de_passe;

            if ($authentification->creer_login()) {
                // Ici la création a fonctionné
                // On envoie un code 201
                http_response_code(201);
                echo json_encode(["message" => "L'ajout a été effectué"]);

                $authentification->lire_login();
                $authen = [
                    "ID_Login" => $authentification->ID_Login,
                    "Login" => $authentification->Login,
                    "Mot_de_passe" => $authentification->Mot_de_passe,
                ];
                //On envoie le code réponse 200 OK
                http_response_code(200);



                //a partir du dernier element créé nous pouvons créer un nouvel utilisateur pour cela nous devons recuper le dernier ID_Login

                //creation de l'utilisateur
                if (!empty($donnees->Nom) && !empty($donnees->Prenom) && !empty($donnees->Photo_Utilisateur)) {
                    // Ici on a reçu les données
                    // On hydrate notre objet

                    $authentification->Nom = $donnees->Nom;
                    $authentification->Prenom = $donnees->Prenom;
                    $authentification->Photo_Utilisateur = $donnees->Photo_Utilisateur;
                    $authentification->Role = 'pilote';
                    $authentification->ID_Login = $authen['ID_Login'];

                    if ($authentification->creer_utilisateur()) {
                        // Ici la création a fonctionné
                        // On envoie un code 201
                        http_response_code(201);
                        echo json_encode(["message" => "L'ajout a été effectué"]);

                        // On récupère l'entreprise
                        $authentification->lire_un_utilisateur();

                        // On vérifie si l'entreprise existe
                        if ($authentification->Nom != null) {
                            $utili = [
                                "ID_Utilisateur" => $authentification->ID_Utilisateur,
                                "Nom" => $authentification->Nom,
                                "Prenom" => $authentification->Prenom,
                                "Photo_Utilisateur" => $authentification->Photo_Utilisateur,
                                "Role" => $authentification->Role,
                                "ID_Login" => $authentification->ID_Login,
                            ];

                            // On envoie le code réponse 200 OK
                            http_response_code(200);
                            // On envoie le code réponse 200 OK
                            http_response_code(200);
                            if (!empty($donnees->Centre_pilote) && !empty($donnees->Promotion_pilote) && !empty($donnees->ID_Utilisateur_Administrateur)) {
                                //On crée notre etudiant
                                $authentification->ID_Utilisateur = $utili['ID_Utilisateur'];
                                $authentification->ID_Login = $utili['ID_Login'];
                                $authentification->Centre_pilote = $donnees->Centre_pilote;
                                $authentification->Promotion_pilote = $donnees->Promotion_pilote;
                                $authentification->ID_Utilisateur_Administrateur = $donnees->ID_Utilisateur_Administrateur;


                                if ($authentification->creer_pilote()) {
                                    // Ici la création a fonctionné
                                    // On envoie un code 201
                                    http_response_code(201);
                                    echo json_encode(["message" => "L'ajout a été effectué"]);
                                } else {
                                    // Ici la création n'a pas fonctionné
                                    // On envoie un code 503
                                    http_response_code(503);
                                    echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
                                }
                            }
                        } else {
                            // 404 Not found
                            http_response_code(404);
                            echo json_encode(array("message" => "L'utilisateur n'existe pas'."));
                        }
                    } else {
                        // Ici la création n'a pas fonctionné
                        // On envoie un code 503
                        http_response_code(503);
                        echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
                    }
                } else {
                    http_response_code(503);
                    echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
                }

                //nous recommencons le mm processus pour l'admin
            } else {
                // Ici la création n'a pas fonctionné
                // On envoie un code 503
                http_response_code(503);
                echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
            }
        } else {
            http_response_code(503);
            echo json_encode(["message" => "L'ajout n'a pas été effectué"]);
        }
    } else {
        echo json_encode(["message" => "L'ajout n'a pas été effectué car il manque des champs"]);
    }
} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
