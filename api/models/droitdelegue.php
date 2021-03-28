<?php
class Droitdelegue
{
    // Connexion
    private $connexion;
    private $table = "droitdelegue"; //table de la base de données

    // object properties 
    public $ID_Utilisateur;
    public $ID_Utilisateur_Assigne_DROIT;
    public $Creer_une_offre;
    public $Modifier_une_offre;
    public $Supprimer_une_offre;
    public $Rechercher_un_compte_delegue;
    public $Creer_un_delegue;
    public $Modifier_un_compte_delegue;
    public $Supprimer_un_compte_delegue;
    public $Rechercher_un_compte_etudiant;
    public $Creer_un_etudiant;
    public $Modifier_un_etudiant;
    public $Supprimer_un_etudiant;
    public $Consulter_les_stats_des_etudiants;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;



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
     * Lecture des authentifications
     *
     * @return void
     */
    public function lire_droit_delegue()
    {
        // On écrit la requête 
        $sql = "SELECT * FROM " . $this->table;

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Créer droit delegue
     *
     * @return void
     */
    public function creer_droit_delegue()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET ID_Utilisateur=:ID_Utilisateur, ID_Utilisateur__Assigne_DROIT=:ID_Utilisateur__Assigne_DROIT, Creer_une_offre=:Creer_une_offre, 
                                                Modifier_une_offre=:Modifier_une_offre, Supprimer_une_offre=:Supprimer_une_offre, Rechercher_un_compte_delegue=:Rechercher_un_compte_delegue, 
                                                Creer_un_delegue=:Creer_un_delegue, Modifier_un_compte_delegue=:Modifier_un_compte_delegue, Supprimer_un_compte_delegue=:Supprimer_un_compte_delegue, 
                                                Rechercher_un_compte_etudiant=:Rechercher_un_compte_etudiant, Creer_un_etudiant=:Creer_un_etudiant, Modifier_un_etudiant=:Modifier_un_etudiant, Supprimer_un_etudiant=:Supprimer_un_etudiant, 
                                                Consulter_les_stats_des_etudiants=:Consulter_les_stats_des_etudiants, Informer_le_systeme_de_l_avancement_de_la_candidature_step_3=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_3, 
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_4=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_4";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_Utilisateur__Assigne_DROIT = htmlspecialchars(strip_tags($this->ID_Utilisateur__Assigne_DROIT));
        $this->Creer_une_offre  = htmlspecialchars(strip_tags($this->Creer_une_offre ));
        $this->Modifier_une_offre = htmlspecialchars(strip_tags($this->Modifier_une_offre));
        $this->Supprimer_une_offre = htmlspecialchars(strip_tags($this->Supprimer_une_offre));
        $this->Rechercher_un_compte_delegue = htmlspecialchars(strip_tags($this->Rechercher_un_compte_delegue));
        $this->Creer_un_delegue = htmlspecialchars(strip_tags($this->Creer_un_delegue));
        $this->Modifier_un_compte_delegue = htmlspecialchars(strip_tags($this->Modifier_un_compte_delegue));
        $this->Supprimer_un_compte_delegue = htmlspecialchars(strip_tags($this->Supprimer_un_compte_delegue));
        $this->Rechercher_un_compte_etudiant  = htmlspecialchars(strip_tags($this->Rechercher_un_compte_etudiant ));
        $this->Creer_un_etudiant = htmlspecialchars(strip_tags($this->Creer_un_etudiant));
        $this->Modifier_un_etudiant = htmlspecialchars(strip_tags($this->Modifier_un_etudiant));
        $this->Supprimer_un_etudiant = htmlspecialchars(strip_tags($this->Supprimer_un_etudiant));
        $this->Consulter_les_stats_des_etudiants = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_etudiants));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":ID_Utilisateur__Assigne_DROIT", $this->ID_Utilisateur__Assigne_DROIT);
        $query->bindParam(":Creer_une_offre", $this->Creer_une_offre);
        $query->bindParam(":Modifier_une_offre", $this->Modifier_une_offre);
        $query->bindParam(":Supprimer_une_offre", $this->Supprimer_une_offre);
        $query->bindParam(":Rechercher_un_compte_delegue", $this->Rechercher_un_compte_delegue);
        $query->bindParam(":Creer_un_delegue", $this->Creer_un_delegue);
        $query->bindParam(":Modifier_un_compte_delegue", $this->Modifier_un_compte_delegue);
        $query->bindParam(":Supprimer_un_compte_delegue", $this->Supprimer_un_compte_delegue);
        $query->bindParam(":Rechercher_un_compte_etudiant", $this->Rechercher_un_compte_etudiant);
        $query->bindParam(":Creer_un_etudiant", $this->Creer_un_etudiant);
        $query->bindParam(":Modifier_un_etudiant", $this->Modifier_un_etudiant);
        $query->bindParam(":Supprimer_un_etudiant", $this->Supprimer_un_etudiant);
        $query->bindParam(":Consulter_les_stats_des_etudiants", $this->Consulter_les_stats_des_etudiants);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_3", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_4", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Voir une delegue
     *
     * @return void
     */
    public function lire_un_droit_delegue()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table . " WHERE ID_Utilisateur = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Utilisateur);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
        $this->ID_Utilisateur__Assigne_DROIT = $row['ID_Utilisateur__Assigne_DROIT'];
        $this->Creer_une_offre = $row['Creer_une_offre'];
        $this->Modifier_une_offre = $row['Modifier_une_offre'];
        $this->Supprimer_une_offre = $row['Supprimer_une_offre'];
        $this->Rechercher_un_compte_delegue = $row['Rechercher_un_compte_delegue'];
        $this->Creer_un_delegue = $row['Creer_un_delegue'];
        $this->Modifier_un_compte_delegue = $row['Modifier_un_compte_delegue'];
        $this->Supprimer_un_compte_delegue = $row['Supprimer_un_compte_delegue'];
        $this->Rechercher_un_compte_etudiant = $row['Rechercher_un_compte_etudiant'];
        $this->Creer_un_etudiant = $row['Creer_un_etudiant'];
        $this->Modifier_un_etudiant = $row['Modifier_un_etudiant'];
        $this->Supprimer_un_etudiant = $row['Supprimer_un_etudiant'];
        $this->Consulter_les_stats_des_etudiants = $row['Consulter_les_stats_des_etudiants'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_3'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_4'];
    }

    /**
     * Supprimer un delegue
     *
     * @return void
     */
    public function supprimer_droit_delegue()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_Utilisateur = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->ID_Utilisateur));

        // On attache l'id
        $query->bindParam(1, $this->ID_Utilisateur);

        // On exécute la requête
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
    public function modifier_droit_delegue()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET ID_Utilisateur__Assigne_DROIT=:ID_Utilisateur__Assigne_DROIT, Creer_une_offre=:Creer_une_offre, Modifier_une_offre=:Modifier_une_offre, 
                                            Supprimer_une_offre=:Supprimer_une_offre, Rechercher_un_compte_delegue=:Rechercher_un_compte_delegue, Creer_un_delegue=:Creer_un_delegue, Modifier_un_compte_delegue=:Modifier_un_compte_delegue, 
                                            Supprimer_un_compte_delegue=:Supprimer_un_compte_delegue, Rechercher_un_compte_etudiant=:Rechercher_un_compte_etudiant, Creer_un_etudiant=:Creer_un_etudiant, Modifier_un_etudiant=:Modifier_un_etudiant, 
                                            Supprimer_un_etudiant=:Supprimer_un_etudiant, Consulter_les_stats_des_etudiants=:Consulter_les_stats_des_etudiants, 
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_3=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_3, 
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_4=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 WHERE ID_Utilisateur=:ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_Utilisateur__Assigne_DROIT = htmlspecialchars(strip_tags($this->ID_Utilisateur__Assigne_DROIT));
        $this->Creer_une_offre  = htmlspecialchars(strip_tags($this->Creer_une_offre ));
        $this->Modifier_une_offre = htmlspecialchars(strip_tags($this->Modifier_une_offre));
        $this->Supprimer_une_offre = htmlspecialchars(strip_tags($this->Supprimer_une_offre));
        $this->Rechercher_un_compte_delegue = htmlspecialchars(strip_tags($this->Rechercher_un_compte_delegue));
        $this->Creer_un_delegue = htmlspecialchars(strip_tags($this->Creer_un_delegue));
        $this->Modifier_un_compte_delegue = htmlspecialchars(strip_tags($this->Modifier_un_compte_delegue));
        $this->Supprimer_un_compte_delegue = htmlspecialchars(strip_tags($this->Supprimer_un_compte_delegue));
        $this->Rechercher_un_compte_etudiant  = htmlspecialchars(strip_tags($this->Rechercher_un_compte_etudiant ));
        $this->Creer_un_etudiant = htmlspecialchars(strip_tags($this->Creer_un_etudiant));
        $this->Modifier_un_etudiant = htmlspecialchars(strip_tags($this->Modifier_un_etudiant));
        $this->Supprimer_un_etudiant = htmlspecialchars(strip_tags($this->Supprimer_un_etudiant));
        $this->Consulter_les_stats_des_etudiants = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_etudiants));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4));
        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":ID_Utilisateur__Assigne_DROIT", $this->ID_Utilisateur__Assigne_DROIT);
        $query->bindParam(":Creer_une_offre", $this->Creer_une_offre);
        $query->bindParam(":Modifier_une_offre", $this->Modifier_une_offre);
        $query->bindParam(":Supprimer_une_offre", $this->Supprimer_une_offre);
        $query->bindParam(":Rechercher_un_compte_delegue", $this->Rechercher_un_compte_delegue);
        $query->bindParam(":Creer_un_delegue", $this->Creer_un_delegue);
        $query->bindParam(":Modifier_un_compte_delegue", $this->Modifier_un_compte_delegue);
        $query->bindParam(":Supprimer_un_compte_delegue", $this->Supprimer_un_compte_delegue);
        $query->bindParam(":Rechercher_un_compte_etudiant", $this->Rechercher_un_compte_etudiant);
        $query->bindParam(":Creer_un_etudiant", $this->Creer_un_etudiant);
        $query->bindParam(":Modifier_un_etudiant", $this->Modifier_un_etudiant);
        $query->bindParam(":Supprimer_un_etudiant", $this->Supprimer_un_etudiant);
        $query->bindParam(":Consulter_les_stats_des_etudiants", $this->Consulter_les_stats_des_etudiants);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_3", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_4", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
