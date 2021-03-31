<?php
class Login
{
    // Connexion
    private $connexion;
    private $droit_token = "droit_token"; 
    private $table = "authentification"; //table de la base de données
    private $table_2 = "utilisateur"; //table de la base de données
    private $table_3 = "administrateur"; //table de la base de données
    private $table_4 = "etudiant"; //table de la base de données
    private $table_5 = "pilote"; //table de la base de données
    private $table_6 = "delegue"; //table de la base de données
    
    // object properties 

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db)
    {
        $this->connexion = $db;
    }

    /**
     * Lecture des entreprises
     *
     * @return void
     */


    


    public function login() // Methode POST ou l'on fournit login et mot de passe
    {
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . " WHERE Login =:Login AND Mot_de_passe =:Mot_de_passe";
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        // On attache l'id
        $query->bindParam(':Login', $this->Login);
        $query->bindParam(':Mot_de_passe', $this->Mot_de_passe);
        // On exécute la requête
        $query->execute();
        // On hydrate l'objet
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->ID_Login  = $row['ID_Login'];


        $sql = "SELECT * FROM " . $this->table_2 . " WHERE ID_Login =:ID_Login"; //continue ici (recherche utilisateur par ID)
        $query = $this->connexion->prepare($sql);
        $query->bindParam(':ID_Login', $this->ID_Login);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->Role = $row['Role'];






        
    switch($this->Role){
        case 'administrateur': 
            $sql = "SELECT * FROM " . $this->table_3 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            
            break;
            
        case 'etudiant':
            $sql = "SELECT * FROM " . $this->table_4 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_etudiant = $row['Centre_etudiant'];
            $this->Promotion_etudiant = $row['Promotion_etudiant'];
            $this->Specialite = $row['Specialite'];
            $this->ID_Utilisateur__CREE = $row['ID_Utilisateur__CREE'];
            
            break;

        case 'pilote':
            $sql = "SELECT * FROM " . $this->table_5 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_pilote = $row['Centre_pilote'];
            $this->Promotion_pilote = $row['Promotion_pilote'];
            $this->ID_Utilisateur_Administrateur = $row['ID_Utilisateur_Administrateur'];
        
            break;


        case 'delegue':
            $sql = "SELECT * FROM " . $this->table_6 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_Delegue = $row['Centre_Delegue'];
            $this->Promotion_delegue = $row['Promotion_delegue'];
            $this->Specialite = $row['Specialite'];
            $this->ID_Utilisateur__CREE = $row['ID_Utilisateur__CREE'];
     
            break;
            default:
            $this->Role = 'aucun';
            break;


    }


    //-----------------------------------------------------------------------

    $sql = "SELECT * FROM " . $this->droit_token . " WHERE ID_Utilisateur =:ID_Utilisateur"; 
    $query = $this->connexion->prepare($sql);
    $query->bindParam(':ID_Utilisateur', $this->ID_Utilisateur);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    //$token = $row['Token'];
    $token = $row['Token'] ??= null;
    if( $token == null)
        {
            switch($this->Role){
                case 'administrateur': 
                    $this->Rechercher_entreprise='1'; //1
                    $this->Creer_une_entreprise='1';
                    $this->Modifier_une_entreprise='1';
                    $this->Evaluer_une_entreprise='1';
                    $this->Supprimer_une_entreprise='1';
                    $this->Consulter_les_stats_des_entreprises='1';
                    $this->Rechercher_une_offre='1';
                    $this->Creer_une_offre='1';
                    $this->Modifier_une_offre='1';
                    $this->Supprimer_une_offre='1'; //10
                    $this->Consulter_les_stats_des_offres='1';
                    $this->Rechercher_un_compte_pilote='1';
                    $this->Creer_un_compte_pilote='1';
                    $this->Modifier_un_compte_pilote='1';
                    $this->Supprimer_un_compte_pilote='1';
                    $this->Rechercher_un_compte_delegue='1';
                    $this->Creer_un_compte_delegue='1';
                    $this->Modifier_un_compte_delegue='1';
                    $this->Supprimer_un_compte_delegue='1';
                    $this->Assigner_des_droits_a_un_delegue='1'; //20
                    $this->Rechercher_un_compte_etudiant='1';
                    $this->Creer_un_compte_etudiant='1';
                    $this->Modifier_un_compte_etudiant='1';
                    $this->Supprimer_un_compte_etudiant='1';
                    $this->Consulter_les_stats_des_etudiants='1';
                    $this->Ajouter_une_offre_a_la_wish_list='1';
                    $this->Retirer_une_offre_a_la_wish_list='1';
                    $this->Postuler_a_une_offre='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2='1'; //30
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6='1'; //34          
                    break;       
                case 'etudiant':
                    $this->Rechercher_entreprise='1'; //1
                    $this->Creer_une_entreprise='1';
                    $this->Modifier_une_entreprise='1';
                    $this->Evaluer_une_entreprise='1';
                    $this->Supprimer_une_entreprise='1';
                    $this->Consulter_les_stats_des_entreprises='1';
                    $this->Rechercher_une_offre='1';
                    $this->Creer_une_offre='0';
                    $this->Modifier_une_offre='0';
                    $this->Supprimer_une_offre='0'; //10
                    $this->Consulter_les_stats_des_offres='1';
                    $this->Rechercher_un_compte_pilote='0';
                    $this->Creer_un_compte_pilote='0';
                    $this->Modifier_un_compte_pilote='0';
                    $this->Supprimer_un_compte_pilote='0';
                    $this->Rechercher_un_compte_delegue='0';
                    $this->Creer_un_compte_delegue='0';
                    $this->Modifier_un_compte_delegue='0';
                    $this->Supprimer_un_compte_delegue='0';
                    $this->Assigner_des_droits_a_un_delegue='0'; //20
                    $this->Rechercher_un_compte_etudiant='0';
                    $this->Creer_un_compte_etudiant='0';
                    $this->Modifier_un_compte_etudiant='0';
                    $this->Supprimer_un_compte_etudiant='0';
                    $this->Consulter_les_stats_des_etudiants='0';
                    $this->Ajouter_une_offre_a_la_wish_list='1';
                    $this->Retirer_une_offre_a_la_wish_list='1';
                    $this->Postuler_a_une_offre='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2='1'; //30
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6='0'; //34
                    break;
                case 'pilote':
                    $this->Rechercher_entreprise='1'; //1
                    $this->Creer_une_entreprise='1';
                    $this->Modifier_une_entreprise='1';
                    $this->Evaluer_une_entreprise='1';
                    $this->Supprimer_une_entreprise='1';
                    $this->Consulter_les_stats_des_entreprises='1';
                    $this->Rechercher_une_offre='1';
                    $this->Creer_une_offre='1';
                    $this->Modifier_une_offre='1';
                    $this->Supprimer_une_offre='1'; //10
                    $this->Consulter_les_stats_des_offres='1';
                    $this->Rechercher_un_compte_pilote='0';
                    $this->Creer_un_compte_pilote='0';
                    $this->Modifier_un_compte_pilote='0';
                    $this->Supprimer_un_compte_pilote='0';
                    $this->Rechercher_un_compte_delegue='1';
                    $this->Creer_un_compte_delegue='1';
                    $this->Modifier_un_compte_delegue='1';
                    $this->Supprimer_un_compte_delegue='1';
                    $this->Assigner_des_droits_a_un_delegue='1'; //20
                    $this->Rechercher_un_compte_etudiant='1';
                    $this->Creer_un_compte_etudiant='1';
                    $this->Modifier_un_compte_etudiant='1';
                    $this->Supprimer_un_compte_etudiant='1';
                    $this->Consulter_les_stats_des_etudiants='1';
                    $this->Ajouter_une_offre_a_la_wish_list='0';
                    $this->Retirer_une_offre_a_la_wish_list='0';
                    $this->Postuler_a_une_offre='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2='0'; //30
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6='0'; //34
                    break;
                case 'delegue':
                    $this->Rechercher_entreprise='1'; //1
                    $this->Creer_une_entreprise='0';
                    $this->Modifier_une_entreprise='0';
                    $this->Evaluer_une_entreprise='0';
                    $this->Supprimer_une_entreprise='0';
                    $this->Consulter_les_stats_des_entreprises='0';
                    $this->Rechercher_une_offre='0';
                    $this->Creer_une_offre='0';
                    $this->Modifier_une_offre='0';
                    $this->Supprimer_une_offre='0'; //10
                    $this->Consulter_les_stats_des_offres='0';
                    $this->Rechercher_un_compte_pilote='0';
                    $this->Creer_un_compte_pilote='0';
                    $this->Modifier_un_compte_pilote='0';
                    $this->Supprimer_un_compte_pilote='0';
                    $this->Rechercher_un_compte_delegue='0';
                    $this->Creer_un_compte_delegue='0';
                    $this->Modifier_un_compte_delegue='0';
                    $this->Supprimer_un_compte_delegue='0';
                    $this->Assigner_des_droits_a_un_delegue='0'; //20
                    $this->Rechercher_un_compte_etudiant='0';
                    $this->Creer_un_compte_etudiant='0';
                    $this->Modifier_un_compte_etudiant='0';
                    $this->Supprimer_un_compte_etudiant='0';
                    $this->Consulter_les_stats_des_etudiants='0';
                    $this->Ajouter_une_offre_a_la_wish_list='0';
                    $this->Retirer_une_offre_a_la_wish_list='0';
                    $this->Postuler_a_une_offre='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2='0'; //30
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5='0';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6='0'; //34


                    break;
                    default:
                    $this->Rechercher_entreprise='1'; //1
                    $this->Creer_une_entreprise='1';
                    $this->Modifier_une_entreprise='1';
                    $this->Evaluer_une_entreprise='1';
                    $this->Supprimer_une_entreprise='1';
                    $this->Consulter_les_stats_des_entreprises='1';
                    $this->Rechercher_une_offre='1';
                    $this->Creer_une_offre='1';
                    $this->Modifier_une_offre='1';
                    $this->Supprimer_une_offre='1'; //10
                    $this->Consulter_les_stats_des_offres='1';
                    $this->Rechercher_un_compte_pilote='1';
                    $this->Creer_un_compte_pilote='1';
                    $this->Modifier_un_compte_pilote='1';
                    $this->Supprimer_un_compte_pilote='1';
                    $this->Rechercher_un_compte_delegue='1';
                    $this->Creer_un_compte_delegue='1';
                    $this->Modifier_un_compte_delegue='1';
                    $this->Supprimer_un_compte_delegue='1';
                    $this->Assigner_des_droits_a_un_delegue='1'; //20
                    $this->Rechercher_un_compte_etudiant='1';
                    $this->Creer_un_compte_etudiant='1';
                    $this->Modifier_un_compte_etudiant='1';
                    $this->Supprimer_un_compte_etudiant='1';
                    $this->Consulter_les_stats_des_etudiants='1';
                    $this->Ajouter_une_offre_a_la_wish_list='1';
                    $this->Retirer_une_offre_a_la_wish_list='1';
                    $this->Postuler_a_une_offre='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2='1'; //30
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5='1';
                    $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6='1'; //34
                    break;
            }
  
            // Ecriture de la requête SQL en y insérant le nom de la table
            $sql = "INSERT INTO " . $this->droit_token . " SET 
            Token=:Token,
            Rechercher_une_entreprise=:Rechercher_une_entreprise,
            Creer_une_entreprise=:Creer_une_entreprise,
            Modifier_une_entreprise=:Modifier_une_entreprise,
            Evaluer_une_entreprise=:Evaluer_une_entreprise,
            Supprimer_une_entreprise=:Supprimer_une_entreprise,
            Consulter_les_stats_des_entreprises=:Consulter_les_stats_des_entreprises,
            Rechercher_une_offre=:Rechercher_une_offre,
            Creer_une_offre=:Creer_une_offre,
            Modifier_une_offre=:Modifier_une_offre,
            Supprimer_une_offre=:Supprimer_une_offre,
            Consulter_les_stats_des_offres=:Consulter_les_stats_des_offres,
            Rechercher_un_compte_pilote=:Rechercher_un_compte_pilote,
            Creer_un_compte_pilote=:Creer_un_compte_pilote,
            Modifier_un_compte_pilote=:Modifier_un_compte_pilote,
            Supprimer_un_compte_pilote=:Supprimer_un_compte_pilote,
            Rechercher_un_compte_delegue=:Rechercher_un_compte_delegue,
            Creer_un_compte_delegue=:Creer_un_compte_delegue,
            Modifier_un_compte_delegue=:Modifier_un_compte_delegue,
            Supprimer_un_compte_delegue=:Supprimer_un_compte_delegue,
            Assigner_des_droits_a_un_delegue=:Assigner_des_droits_a_un_delegue,
            Rechercher_un_compte_etudiant=:Rechercher_un_compte_etudiant,
            Creer_un_compte_etudiant=:Creer_un_compte_etudiant,
            Modifier_un_compte_etudiant=:Modifier_un_compte_etudiant,
            Supprimer_un_compte_etudiant=:Supprimer_un_compte_etudiant,
            Consulter_les_stats_des_etudiants=:Consulter_les_stats_des_etudiants,
            Ajouter_une_offre_a_la_wish_list=:Ajouter_une_offre_a_la_wish_list,
            Retirer_une_offre_a_la_wish_list=:Retirer_une_offre_a_la_wish_list,
            Postuler_a_une_offre=:Postuler_a_une_offre,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_1=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_2=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_2,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_3=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_3,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_4=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_5=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
            Informer_le_systeme_de_l_avancement_de_la_candidature_step_6=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_6,

            ID_Utilisateur =:ID_Utilisateur";

            // Préparation de la requête
            $query = $this->connexion->prepare($sql);

 

            $NewToken;
            $this->NewToken = 'TOKEN_:'.bin2hex(random_bytes(40)); 
            // Ajout des données protégées
            
            $query->bindParam(':Token', $this->NewToken);
            $query->bindParam(':ID_Utilisateur', $this->ID_Utilisateur);
            $query->bindParam(':Rechercher_une_entreprise', $this->Rechercher_entreprise); //1
            $query->bindParam(':Creer_une_entreprise', $this->Creer_une_entreprise);
            $query->bindParam(':Modifier_une_entreprise', $this->Modifier_une_entreprise);
            $query->bindParam(':Evaluer_une_entreprise', $this->Evaluer_une_entreprise);
            $query->bindParam(':Supprimer_une_entreprise', $this->Supprimer_une_entreprise);
            $query->bindParam(':Consulter_les_stats_des_entreprises', $this->Consulter_les_stats_des_entreprises);
            $query->bindParam(':Rechercher_une_offre', $this->Rechercher_une_offre);
            $query->bindParam(':Creer_une_offre', $this->Creer_une_offre);
            $query->bindParam(':Modifier_une_offre', $this->Modifier_une_offre);
            $query->bindParam(':Supprimer_une_offre', $this->Supprimer_une_offre); //10
            $query->bindParam(':Consulter_les_stats_des_offres', $this->Consulter_les_stats_des_offres);
            $query->bindParam(':Rechercher_un_compte_pilote', $this->Rechercher_un_compte_pilote);
            $query->bindParam(':Creer_un_compte_pilote', $this->Creer_un_compte_pilote);
            $query->bindParam(':Modifier_un_compte_pilote', $this->Modifier_un_compte_pilote);
            $query->bindParam(':Supprimer_un_compte_pilote', $this->Supprimer_un_compte_pilote);
            $query->bindParam(':Rechercher_un_compte_delegue', $this->Rechercher_un_compte_delegue);
            $query->bindParam(':Creer_un_compte_delegue', $this->Creer_un_compte_delegue);
            $query->bindParam(':Modifier_un_compte_delegue', $this->Modifier_un_compte_delegue);
            $query->bindParam(':Supprimer_un_compte_delegue', $this->Supprimer_un_compte_delegue);
            $query->bindParam(':Assigner_des_droits_a_un_delegue', $this->Assigner_des_droits_a_un_delegue); //20
            $query->bindParam(':Rechercher_un_compte_etudiant', $this->Rechercher_un_compte_etudiant);
            $query->bindParam(':Creer_un_compte_etudiant', $this->Creer_un_compte_etudiant);
            $query->bindParam(':Modifier_un_compte_etudiant', $this->Modifier_un_compte_etudiant);
            $query->bindParam(':Supprimer_un_compte_etudiant', $this->Supprimer_un_compte_etudiant);
            $query->bindParam(':Consulter_les_stats_des_etudiants', $this->Consulter_les_stats_des_etudiants);
            $query->bindParam(':Ajouter_une_offre_a_la_wish_list', $this->Ajouter_une_offre_a_la_wish_list);
            $query->bindParam(':Retirer_une_offre_a_la_wish_list', $this->Retirer_une_offre_a_la_wish_list);
            $query->bindParam(':Postuler_a_une_offre', $this->Postuler_a_une_offre);
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_1', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1);
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_2', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2); //30
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_3', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_4', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_5', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5);
            $query->bindParam(':Informer_le_systeme_de_l_avancement_de_la_candidature_step_6', $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6); //34

            
            // Exécution de la requête
            if ($query->execute()) {
                
            $this->Token = null;
            }else{ 
                return false;
                }
        }else if( $row['Token'] != null) {
            $this->Token = $row['Token'];
            





            $sql = "SELECT * FROM " . $this->droit_token . " WHERE Token=:Token"; 
            $query = $this->connexion->prepare($sql);
            // On attache l'id
            $query->bindParam(':Token', $row['Token']);
            // On exécute la requête
            $query->execute();
            // On hydrate l'objet
            $row = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->Rechercher_entreprise = $row['Rechercher_une_entreprise']; //1
            $this->Creer_une_entreprise= $row['Creer_une_entreprise'];
            $this->Modifier_une_entreprise= $row['Modifier_une_entreprise'];
            $this->Evaluer_une_entreprise= $row['Evaluer_une_entreprise'];
            $this->Supprimer_une_entreprise= $row['Supprimer_une_entreprise'];
            $this->Consulter_les_stats_des_entreprises= $row['Consulter_les_stats_des_entreprises'];
            $this->Rechercher_une_offre= $row['Rechercher_une_offre'];
            $this->Creer_une_offre= $row['Creer_une_offre'];
            $this->Modifier_une_offre= $row['Modifier_une_offre'];
            $this->Supprimer_une_offre= $row['Supprimer_une_offre']; //10
            $this->Consulter_les_stats_des_offres= $row['Consulter_les_stats_des_offres'];
            $this->Rechercher_un_compte_pilote= $row['Rechercher_un_compte_pilote'];
            $this->Creer_un_compte_pilote= $row['Creer_un_compte_pilote'];
            $this->Modifier_un_compte_pilote= $row['Modifier_un_compte_pilote'];
            $this->Supprimer_un_compte_pilote= $row['Supprimer_un_compte_pilote'];
            $this->Rechercher_un_compte_delegue= $row['Rechercher_un_compte_delegue'];
            $this->Creer_un_compte_delegue= $row['Creer_un_compte_delegue'];
            $this->Modifier_un_compte_delegue= $row['Modifier_un_compte_delegue'];
            $this->Supprimer_un_compte_delegue= $row['Supprimer_un_compte_delegue'];
            $this->Assigner_des_droits_a_un_delegue= $row['Assigner_des_droits_a_un_delegue']; //20
            $this->Rechercher_un_compte_etudiant= $row['Rechercher_un_compte_etudiant'];
            $this->Creer_un_compte_etudiant= $row['Creer_un_compte_etudiant'];
            $this->Modifier_un_compte_etudiant= $row['Modifier_un_compte_etudiant'];
            $this->Supprimer_un_compte_etudiant= $row['Supprimer_un_compte_etudiant'];
            $this->Consulter_les_stats_des_etudiants= $row['Consulter_les_stats_des_etudiants'];
            $this->Ajouter_une_offre_a_la_wish_list= $row['Ajouter_une_offre_a_la_wish_list'];
            $this->Retirer_une_offre_a_la_wish_list= $row['Retirer_une_offre_a_la_wish_list'];
            $this->Postuler_a_une_offre= $row['Postuler_a_une_offre'];
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_1'];
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_2']; //30
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_3'];
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_4'];
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_5'];
            $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6= $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_6']; //34
            

            
            }else{ 
            return false;
        }


    }








    public function changerToken($ID_Utilisateur_change_token){
        $sql = "UPDATE " . $this->droit_token . " SET Token=:Token WHERE ID_Utilisateur=:ID_Utilisateur";
        $query = $this->connexion->prepare($sql);
                $NewToken;
                $this->NewToken = 'TOKEN_:'.bin2hex(random_bytes(40)); 
     
                $query->bindParam(':Token', $this->NewToken);
                $query->bindParam(':ID_Utilisateur', $ID_Utilisateur_change_token);
    
        if ($query->execute()) {
            return true;
        }else{
        return false;
    }
        }










    //-----------------------------------------------------------------------
    }





    




