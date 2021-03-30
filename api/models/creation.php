<?php
class Creation
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données
    private $table2 = "utilisateur";
    private $table3 = "administrateur";
    private $table4 = "delegue";
    private $table5 = "etudiant";
    private $table6 = "pilote";
    private $table7 = "droit_token";

    // object properties table
    public $ID_Login;
    public $Login;
    public $Mot_de_passe;

    // object properties table2
    public $ID_Utilisateur;
    public $Nom;
    public $Prenom;
    public $Photo_Utilisateur;


    // object properties table4
    public $Centre_Delegue;
    public $Promotion_delegue;
    public $Specialite;
    public $ID_Utilisateur__CREE;

    // object properties table5
    public $Centre_etudiant;
    public $Promotion_etudiant;

    // object properties table6
    public $Centre_pilote;
    public $Promotion_pilote;
    public $ID_Utilisateur__Administrateur;


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
     * Voire une entreprise
     *
     * @return void
     */
    public function lire_login()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table . " WHERE Login = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->Login);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->ID_Login = $row['ID_Login'];
        $this->Mot_de_passe = $row['Mot_de_passe'];
    }


    public function creer_login()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Login=:Login, Mot_de_passe=:Mot_de_passe";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Login = htmlspecialchars(strip_tags($this->Login));
        $this->Mot_de_passe = htmlspecialchars(strip_tags($this->Mot_de_passe));


        // Ajout des données protégées
        $query->bindParam(":Login", $this->Login);
        $query->bindParam(":Mot_de_passe", $this->Mot_de_passe);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    public function creer_utilisateur()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table2 . " SET Nom= :Nom, Prenom= :Prenom, Photo_Utilisateur= :Photo_Utilisateur, Role= :Role, ID_Login= :ID_Login";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->Role = htmlspecialchars(strip_tags($this->Role));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":Nom", $this->Nom);
        $query->bindParam(":Prenom", $this->Prenom);
        $query->bindParam(":Photo_Utilisateur", $this->Photo_Utilisateur);
        $query->bindParam(":Role", $this->Role);
        $query->bindParam(":ID_Login", $this->ID_Login);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Voire une entreprise
     *
     * @return void
     */
    public function lire_un_utilisateur()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table2 . " WHERE ID_Login = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Login);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->Role = $row['Role'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
    }


    /**
     * Créer une entreprise
     *
     * @return void
     */
    public function creer_administrateur()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table3 . " SET ID_Utilisateur=:ID_Utilisateur, ID_Login=:ID_Login";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":ID_Login", $this->ID_Login);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Créer un delegue
     *
     * @return void
     */
    public function creer_delegue()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table4 . " SET ID_Utilisateur=:ID_Utilisateur, Centre_Delegue=:Centre_Delegue, Promotion_delegue=:Promotion_delegue, Specialite=:Specialite, ID_Utilisateur__CREE=:ID_Utilisateur__CREE, ID_Login=:ID_Login";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Centre_Delegue = htmlspecialchars(strip_tags($this->Centre_Delegue));
        $this->Promotion_delegue = htmlspecialchars(strip_tags($this->Promotion_delegue));
        $this->Specialite = htmlspecialchars(strip_tags($this->Specialite));

        $this->ID_Utilisateur__CREE = htmlspecialchars(strip_tags($this->ID_Utilisateur__CREE));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Centre_Delegue", $this->Centre_Delegue);
        $query->bindParam(":Promotion_delegue", $this->Promotion_delegue);
        $query->bindParam(":Specialite", $this->Specialite);
        $query->bindParam(":ID_Utilisateur__CREE", $this->ID_Utilisateur__CREE);
        $query->bindParam(":ID_Login", $this->ID_Login);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }


    /**
     * Créer un etudiant
     *
     * @return void
     */
    public function creer_etudiant()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table5 . " SET ID_Utilisateur=:ID_Utilisateur, Centre_etudiant=:Centre_etudiant, Promotion_etudiant=:Promotion_etudiant, Specialite=:Specialite, ID_Utilisateur__CREE=:ID_Utilisateur__CREE, ID_Login=:ID_Login";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Centre_etudiant = htmlspecialchars(strip_tags($this->Centre_etudiant));
        $this->Promotion_etudiant = htmlspecialchars(strip_tags($this->Promotion_etudiant));
        $this->Specialite = htmlspecialchars(strip_tags($this->Specialite));
        $this->ID_Utilisateur__CREE = htmlspecialchars(strip_tags($this->ID_Utilisateur__CREE));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Centre_etudiant", $this->Centre_etudiant);
        $query->bindParam(":Promotion_etudiant", $this->Promotion_etudiant);
        $query->bindParam(":Specialite", $this->Specialite);
        $query->bindParam(":ID_Utilisateur__CREE", $this->ID_Utilisateur__CREE);
        $query->bindParam(":ID_Login", $this->ID_Login);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }


    /**
     * Créer une entreprise
     *
     * @return void
     */
    public function creer_pilote()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table6 . " SET ID_Utilisateur=:ID_Utilisateur, Centre_pilote=:Centre_pilote, Promotion_pilote=:Promotion_pilote, ID_Utilisateur_Administrateur=:ID_Utilisateur_Administrateur, ID_Login=:ID_Login";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Centre_pilote = htmlspecialchars(strip_tags($this->Centre_pilote));
        $this->Promotion_pilote = htmlspecialchars(strip_tags($this->Promotion_pilote));
        $this->ID_Utilisateur_Administrateur = htmlspecialchars(strip_tags($this->ID_Utilisateur_Administrateur));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Centre_pilote", $this->Centre_pilote);
        $query->bindParam(":Promotion_pilote", $this->Promotion_pilote);
        $query->bindParam(":ID_Utilisateur_Administrateur", $this->ID_Utilisateur_Administrateur);
        $query->bindParam(":ID_Login", $this->ID_Login);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }



    /**
     * Voire une entreprise
     *
     * @return void
     */
    public function rechercher_utilisateur()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table2 . " WHERE Nom =:Nom and Prenom =:Prenom LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(':Nom', $this->Nom);
        $query->bindParam(':Prenom', $this->Prenom);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
        $this->ID_Login = $row['ID_Login'];
    }



    /**
     * Créer un delegue
     *
     * @return void
     */
    public function creer_droit()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table7 . " SET 
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

        // Ajout des données protégées

        $query->bindParam(':Token', $this->Token);
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
            return true;
        }
        return false;
    }
}
