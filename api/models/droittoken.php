<?php
class DroitToken
{
    // Connexion
    private $connexion;
    private $table = "droit_token"; //table de la base de données

    // object properties 
    public $Token;
    public $ID_Utilisateur;
    public $Rechercher_une_entreprise;
    public $Creer_une_entreprise;
    public $Modifier_une_entreprise;
    public $Evaluer_une_entreprise;
    public $Supprimer_une_entreprise;
    public $Consulter_les_stats_des_entreprises;
    public $Rechercher_une_offre;
    public $Creer_une_offre;
    public $Modifier_une_offre;
    public $Supprimer_une_offre;
    public $Consulter_les_stats_des_offres;
    public $Rechercher_un_compte_pilote;
    public $Creer_un_compte_pilote;
    public $Modifier_un_compte_pilote;
    public $Supprimer_un_compte_pilote;
    public $Rechercher_un_compte_delegue;
    public $Creer_un_compte_delegue;
    public $Modifier_un_compte_delegue;
    public $Supprimer_un_compte_delegue;
    public $Assigner_des_droits_a_un_delegue;
    public $Rechercher_un_compte_etudiant;
    public $Creer_un_compte_etudiant;
    public $Modifier_un_compte_etudiant;
    public $Supprimer_un_compte_etudiant;
    public $Consulter_les_stats_des_etudiants;
    public $Ajouter_une_offre_a_la_wish_list;
    public $Retirer_une_offre_a_la_wish_list;
    public $Postuler_a_une_offre;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_1;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_2;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_3;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_4;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_5;
    public $Informer_le_systeme_de_l_avancement_de_la_candidature_step_6;

    
    
    
    
    
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
     * Créer droit token
     *
     * @return void
     */
    public function creer_droit_token()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Token=:Token, ID_Utilisateur=:ID_Utilisateur,
                                                Rechercher_une_entreprise=:Rechercher_une_entreprise, Creer_une_entreprise=:Creer_une_entreprise, Modifier_une_entreprise=:Modifier_une_entreprise, Evaluer_une_entreprise=:Evaluer_une_entreprise,
                                                Supprimer_une_entreprise=:Supprimer_une_entreprise, Consulter_les_stats_des_entreprises=:Consulter_les_stats_des_entreprises, 
                                                Rechercher_une_offre=:Rechercher_une_offre,Creer_une_offre=:Creer_une_offre, Modifier_une_offre=:Modifier_une_offre, Supprimer_une_offre=:Supprimer_une_offre, Consulter_les_stats_des_offres=:Consulter_les_stats_des_offres, Rechercher_un_compte_pilote=:Rechercher_un_compte_pilote,
                                                Creer_un_compte_pilote=:Creer_un_compte_pilote, Modifier_un_compte_pilote=:Modifier_un_compte_pilote, Supprimer_un_compte_pilote=:Supprimer_un_compte_pilote,
                                                Rechercher_un_compte_delegue=:Rechercher_un_compte_delegue, Creer_un_compte_delegue=:Creer_un_compte_delegue, Modifier_un_compte_delegue=:Modifier_un_compte_delegue, 
                                                Supprimer_un_compte_delegue=:Supprimer_un_compte_delegue, Assigner_des_droits_a_un_delegue=:Assigner_des_droits_a_un_delegue,
                                                Rechercher_un_compte_etudiant=:Rechercher_un_compte_etudiant, Creer_un_compte_etudiant=:Creer_un_compte_etudiant, Modifier_un_compte_etudiant=:Modifier_un_compte_etudiant, Supprimer_un_compte_etudiant=:Supprimer_un_compte_etudiant, 
                                                Consulter_les_stats_des_etudiants=:Consulter_les_stats_des_etudiants, 
                                                Ajouter_une_offre_a_la_wish_list=:Ajouter_une_offre_a_la_wish_list, Retirer_une_offre_a_la_wish_list=:Retirer_une_offre_a_la_wish_list,
                                                Postuler_a_une_offre=:Postuler_a_une_offre, Informer_le_systeme_de_l_avancement_de_la_candidature_step_1=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_2=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_2,
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_3=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_3, 
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_4=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_5=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
                                                Informer_le_systeme_de_l_avancement_de_la_candidature_step_6=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_6";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Token = htmlspecialchars(strip_tags($this->Token));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        
        $this->Rechercher_une_entreprise = htmlspecialchars(strip_tags($this->Rechercher_une_entreprise));
        $this->Creer_une_entreprise = htmlspecialchars(strip_tags($this->Creer_une_entreprise));
        $this->Modifier_une_entreprise = htmlspecialchars(strip_tags($this->Modifier_une_entreprise));
        $this->Evaluer_une_entreprise = htmlspecialchars(strip_tags($this->Evaluer_une_entreprise));
        $this->Supprimer_une_entreprise = htmlspecialchars(strip_tags($this->Supprimer_une_entreprise));
        $this->Consulter_les_stats_des_entreprises = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_entreprises));

        $this->Rechercher_une_offre  = htmlspecialchars(strip_tags($this->Rechercher_une_offre ));
        $this->Creer_une_offre  = htmlspecialchars(strip_tags($this->Creer_une_offre ));
        $this->Modifier_une_offre = htmlspecialchars(strip_tags($this->Modifier_une_offre));
        $this->Supprimer_une_offre = htmlspecialchars(strip_tags($this->Supprimer_une_offre));
        $this->Consulter_les_stats_des_offres = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_offres));

        $this->Rechercher_un_compte_pilote = htmlspecialchars(strip_tags($this->Rechercher_un_compte_pilote));
        $this->Creer_un_compte_pilote = htmlspecialchars(strip_tags($this->Creer_un_compte_pilote));
        $this->Modifier_un_compte_pilote = htmlspecialchars(strip_tags($this->Modifier_un_compte_pilote));
        $this->Supprimer_un_compte_pilote = htmlspecialchars(strip_tags($this->Supprimer_un_compte_pilote));
        
        $this->Rechercher_un_compte_delegue = htmlspecialchars(strip_tags($this->Rechercher_un_compte_delegue));
        $this->Creer_un_compte_delegue = htmlspecialchars(strip_tags($this->Creer_un_compte_delegue));
        $this->Modifier_un_compte_delegue = htmlspecialchars(strip_tags($this->Modifier_un_compte_delegue));
        $this->Supprimer_un_compte_delegue = htmlspecialchars(strip_tags($this->Supprimer_un_compte_delegue));
        $this->Assigner_des_droits_a_un_delegue = htmlspecialchars(strip_tags($this->Assigner_des_droits_a_un_delegue));

        $this->Rechercher_un_compte_etudiant  = htmlspecialchars(strip_tags($this->Rechercher_un_compte_etudiant ));
        $this->Creer_un_etudiant = htmlspecialchars(strip_tags($this->Creer_un_etudiant));
        $this->Modifier_un_etudiant = htmlspecialchars(strip_tags($this->Modifier_un_etudiant));
        $this->Supprimer_un_etudiant = htmlspecialchars(strip_tags($this->Supprimer_un_etudiant));
        $this->Consulter_les_stats_des_etudiants = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_etudiants));

        $this->Ajouter_une_offre_a_la_wish_list = htmlspecialchars(strip_tags($this->Ajouter_une_offre_a_la_wish_list));
        $this->Retirer_une_offre_a_la_wish_list = htmlspecialchars(strip_tags($this->Retirer_une_offre_a_la_wish_list));
        $this->Postuler_a_une_offre = htmlspecialchars(strip_tags($this->Postuler_a_une_offre));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6));


        // Ajout des données protégées
        $query->bindParam(":Token", $this->Token);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        
        $query->bindParam(":Rechercher_une_entreprise", $this->Rechercher_une_entreprise);
        $query->bindParam(":Creer_une_entreprise", $this->Creer_une_entreprise);
        $query->bindParam(":Modifier_une_entreprise", $this->Modifier_une_entreprise);
        $query->bindParam(":Evaluer_une_entreprise", $this->Evaluer_une_entreprise);
        $query->bindParam(":Supprimer_une_entreprise", $this->Supprimer_une_entreprise);
        $query->bindParam(":Consulter_les_stats_des_entreprises", $this->Consulter_les_stats_des_entreprises);

        $query->bindParam(":Rechercher_une_offre", $this->Rechercher_une_offre);
        $query->bindParam(":Creer_une_offre", $this->Creer_une_offre);
        $query->bindParam(":Modifier_une_offre", $this->Modifier_une_offre);
        $query->bindParam(":Supprimer_une_offre", $this->Supprimer_une_offre);
        $query->bindParam(":Consulter_les_stats_des_offres", $this->Consulter_les_stats_des_offres);

        $query->bindParam(":Rechercher_un_compte_pilote", $this->Rechercher_un_compte_pilote);
        $query->bindParam(":Creer_un_compte_pilote", $this->Creer_un_compte_pilote);
        $query->bindParam(":Modifier_un_compte_pilote", $this->Modifier_un_compte_pilote);
        $query->bindParam(":Supprimer_un_compte_pilote", $this->Supprimer_un_compte_pilote);

        $query->bindParam(":Rechercher_un_compte_delegue", $this->Rechercher_un_compte_delegue);
        $query->bindParam(":Creer_un_delegue", $this->Creer_un_delegue);
        $query->bindParam(":Modifier_un_compte_delegue", $this->Modifier_un_compte_delegue);
        $query->bindParam(":Supprimer_un_compte_delegue", $this->Supprimer_un_compte_delegue);
        $query->bindParam(":Assigner_des_droits_a_un_delegue", $this->Assigner_des_droits_a_un_delegue);

        $query->bindParam(":Rechercher_un_compte_etudiant", $this->Rechercher_un_compte_etudiant);
        $query->bindParam(":Creer_un_etudiant", $this->Creer_un_etudiant);
        $query->bindParam(":Modifier_un_etudiant", $this->Modifier_un_etudiant);
        $query->bindParam(":Supprimer_un_etudiant", $this->Supprimer_un_etudiant);
        $query->bindParam(":Consulter_les_stats_des_etudiants", $this->Consulter_les_stats_des_etudiants);

        $query->bindParam(":Ajouter_une_offre_a_la_wish_list", $this->Ajouter_une_offre_a_la_wish_list);
        $query->bindParam(":Retirer_une_offre_a_la_wish_list", $this->Retirer_une_offre_a_la_wish_list);
        $query->bindParam(":Postuler_a_une_offre", $this->Postuler_a_une_offre);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_1", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_2", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_3", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_4", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_5", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_6", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Voir un droit token
     *
     * @return void
     */
    public function lire_un_droit_token()
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
        $this->Token = $row['Token'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];

        $this->Rechercher_une_entreprise = $row['Rechercher_une_entreprise'];
        $this->Creer_une_entreprise = $row['Creer_une_entreprise'];
        $this->Modifier_une_entreprise = $row['Modifier_une_entreprise'];
        $this->Evaluer_une_entreprise = $row['Evaluer_une_entreprise'];
        $this->Supprimer_une_entreprise = $row['Supprimer_une_entreprise'];
        $this->Consulter_les_stats_des_entreprises = $row['Consulter_les_stats_des_entreprises'];

        $this->Rechercher_une_offre = $row['Rechercher_une_offre'];
        $this->Creer_une_offre = $row['Creer_une_offre'];
        $this->Modifier_une_offre = $row['Modifier_une_offre'];
        $this->Supprimer_une_offre = $row['Supprimer_une_offre'];
        $this->Consulter_les_stats_des_offres = $row['Consulter_les_stats_des_offres'];
        
        $this->Rechercher_un_compte_pilote = $row['Rechercher_un_compte_pilote'];
        $this->Creer_un_compte_pilote = $row['Creer_un_compte_pilote'];
        $this->Modifier_un_compte_pilote = $row['Modifier_un_compte_pilote'];
        $this->Supprimer_un_compte_pilote = $row['Supprimer_un_compte_pilote'];

        $this->Rechercher_un_compte_delegue = $row['Rechercher_un_compte_delegue'];
        $this->Creer_un_delegue = $row['Creer_un_delegue'];
        $this->Modifier_un_compte_delegue = $row['Modifier_un_compte_delegue'];
        $this->Supprimer_un_compte_delegue = $row['Supprimer_un_compte_delegue'];
        $this->Assigner_des_droits_a_un_delegue = $row['Assigner_des_droits_a_un_delegue'];

        $this->Rechercher_un_compte_etudiant = $row['Rechercher_un_compte_etudiant'];
        $this->Creer_un_etudiant = $row['Creer_un_etudiant'];
        $this->Modifier_un_etudiant = $row['Modifier_un_etudiant'];
        $this->Supprimer_un_etudiant = $row['Supprimer_un_etudiant'];
        $this->Consulter_les_stats_des_etudiants = $row['Consulter_les_stats_des_etudiants'];

        $this->Ajouter_une_offre_a_la_wish_list = $row['Ajouter_une_offre_a_la_wish_list'];
        $this->Retirer_une_offre_a_la_wish_list = $row['Retirer_une_offre_a_la_wish_list'];
        $this->Postuler_a_une_offre = $row['Postuler_a_une_offre'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_1'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_2'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_3'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_4'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_5'];
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6 = $row['Informer_le_systeme_de_l_avancement_de_la_candidature_step_6'];
    }

    /**
     * Supprimer un droit token
     *
     * @return void
     */
    public function supprimer_droit_token()
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
    public function modifier_droit_token()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Token=:Token, ID_Utilisateur=:ID_Utilisateur,
                                            Rechercher_une_entreprise=:Rechercher_une_entreprise, Creer_une_entreprise=:Creer_une_entreprise, Modifier_une_entreprise=:Modifier_une_entreprise, Evaluer_une_entreprise=:Evaluer_une_entreprise,
                                            Supprimer_une_entreprise=:Supprimer_une_entreprise, Consulter_les_stats_des_entreprises=:Consulter_les_stats_des_entreprises, 
                                            Rechercher_une_offre=:Rechercher_une_offre,Creer_une_offre=:Creer_une_offre, Modifier_une_offre=:Modifier_une_offre, Supprimer_une_offre=:Supprimer_une_offre, Consulter_les_stats_des_offres=:Consulter_les_stats_des_offres, Rechercher_un_compte_pilote=:Rechercher_un_compte_pilote,
                                            Creer_un_compte_pilote=:Creer_un_compte_pilote, Modifier_un_compte_pilote=:Modifier_un_compte_pilote, Supprimer_un_compte_pilote=:Supprimer_un_compte_pilote,
                                            Rechercher_un_compte_delegue=:Rechercher_un_compte_delegue, Creer_un_compte_delegue=:Creer_un_compte_delegue, Modifier_un_compte_delegue=:Modifier_un_compte_delegue, 
                                            Supprimer_un_compte_delegue=:Supprimer_un_compte_delegue, Assigner_des_droits_a_un_delegue=:Assigner_des_droits_a_un_delegue,
                                            Rechercher_un_compte_etudiant=:Rechercher_un_compte_etudiant, Creer_un_compte_etudiant=:Creer_un_compte_etudiant, Modifier_un_compte_etudiant=:Modifier_un_compte_etudiant, Supprimer_un_compte_etudiant=:Supprimer_un_compte_etudiant, 
                                            Consulter_les_stats_des_etudiants=:Consulter_les_stats_des_etudiants, 
                                            Ajouter_une_offre_a_la_wish_list=:Ajouter_une_offre_a_la_wish_list, Retirer_une_offre_a_la_wish_list=:Retirer_une_offre_a_la_wish_list,
                                            Postuler_a_une_offre=:Postuler_a_une_offre, Informer_le_systeme_de_l_avancement_de_la_candidature_step_1=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_1,
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_2=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_2,
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_3=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_3, 
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_4=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_4,
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_5=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_5,
                                            Informer_le_systeme_de_l_avancement_de_la_candidature_step_6=:Informer_le_systeme_de_l_avancement_de_la_candidature_step_6 
                                            WHERE ID_Utilisateur=:ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Token = htmlspecialchars(strip_tags($this->Token));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        
        $this->Rechercher_une_entreprise = htmlspecialchars(strip_tags($this->Rechercher_une_entreprise));
        $this->Creer_une_entreprise = htmlspecialchars(strip_tags($this->Creer_une_entreprise));
        $this->Modifier_une_entreprise = htmlspecialchars(strip_tags($this->Modifier_une_entreprise));
        $this->Evaluer_une_entreprise = htmlspecialchars(strip_tags($this->Evaluer_une_entreprise));
        $this->Supprimer_une_entreprise = htmlspecialchars(strip_tags($this->Supprimer_une_entreprise));
        $this->Consulter_les_stats_des_entreprises = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_entreprises));

        $this->Rechercher_une_offre  = htmlspecialchars(strip_tags($this->Rechercher_une_offre ));
        $this->Creer_une_offre  = htmlspecialchars(strip_tags($this->Creer_une_offre ));
        $this->Modifier_une_offre = htmlspecialchars(strip_tags($this->Modifier_une_offre));
        $this->Supprimer_une_offre = htmlspecialchars(strip_tags($this->Supprimer_une_offre));
        $this->Consulter_les_stats_des_offres = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_offres));

        $this->Rechercher_un_compte_pilote = htmlspecialchars(strip_tags($this->Rechercher_un_compte_pilote));
        $this->Creer_un_compte_pilote = htmlspecialchars(strip_tags($this->Creer_un_compte_pilote));
        $this->Modifier_un_compte_pilote = htmlspecialchars(strip_tags($this->Modifier_un_compte_pilote));
        $this->Supprimer_un_compte_pilote = htmlspecialchars(strip_tags($this->Supprimer_un_compte_pilote));
        
        $this->Rechercher_un_compte_delegue = htmlspecialchars(strip_tags($this->Rechercher_un_compte_delegue));
        $this->Creer_un_compte_delegue = htmlspecialchars(strip_tags($this->Creer_un_compte_delegue));
        $this->Modifier_un_compte_delegue = htmlspecialchars(strip_tags($this->Modifier_un_compte_delegue));
        $this->Supprimer_un_compte_delegue = htmlspecialchars(strip_tags($this->Supprimer_un_compte_delegue));
        $this->Assigner_des_droits_a_un_delegue = htmlspecialchars(strip_tags($this->Assigner_des_droits_a_un_delegue));

        $this->Rechercher_un_compte_etudiant  = htmlspecialchars(strip_tags($this->Rechercher_un_compte_etudiant ));
        $this->Creer_un_compte_etudiant = htmlspecialchars(strip_tags($this->Creer_un_compte_etudiant));
        $this->Modifier_un_compte_etudiant = htmlspecialchars(strip_tags($this->Modifier_un_compte_etudiant));
        $this->Supprimer_un_compte_etudiant = htmlspecialchars(strip_tags($this->Supprimer_un_compte_etudiant));
        $this->Consulter_les_stats_des_etudiants = htmlspecialchars(strip_tags($this->Consulter_les_stats_des_etudiants));

        $this->Ajouter_une_offre_a_la_wish_list = htmlspecialchars(strip_tags($this->Ajouter_une_offre_a_la_wish_list));
        $this->Retirer_une_offre_a_la_wish_list = htmlspecialchars(strip_tags($this->Retirer_une_offre_a_la_wish_list));
        $this->Postuler_a_une_offre = htmlspecialchars(strip_tags($this->Postuler_a_une_offre));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5));
        $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6 = htmlspecialchars(strip_tags($this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6));


        // Ajout des données protégées
        $query->bindParam(":Token", $this->Token);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        
        $query->bindParam(":Rechercher_une_entreprise", $this->Rechercher_une_entreprise);
        $query->bindParam(":Creer_une_entreprise", $this->Creer_une_entreprise);
        $query->bindParam(":Modifier_une_entreprise", $this->Modifier_une_entreprise);
        $query->bindParam(":Evaluer_une_entreprise", $this->Evaluer_une_entreprise);
        $query->bindParam(":Supprimer_une_entreprise", $this->Supprimer_une_entreprise);
        $query->bindParam(":Consulter_les_stats_des_entreprises", $this->Consulter_les_stats_des_entreprises);

        $query->bindParam(":Rechercher_une_offre", $this->Rechercher_une_offre);
        $query->bindParam(":Creer_une_offre", $this->Creer_une_offre);
        $query->bindParam(":Modifier_une_offre", $this->Modifier_une_offre);
        $query->bindParam(":Supprimer_une_offre", $this->Supprimer_une_offre);
        $query->bindParam(":Consulter_les_stats_des_offres", $this->Consulter_les_stats_des_offres);

        $query->bindParam(":Rechercher_un_compte_pilote", $this->Rechercher_un_compte_pilote);
        $query->bindParam(":Creer_un_compte_pilote", $this->Creer_un_compte_pilote);
        $query->bindParam(":Modifier_un_compte_pilote", $this->Modifier_un_compte_pilote);
        $query->bindParam(":Supprimer_un_compte_pilote", $this->Supprimer_un_compte_pilote);

        $query->bindParam(":Rechercher_un_compte_delegue", $this->Rechercher_un_compte_delegue);
        $query->bindParam(":Creer_un_compte_delegue", $this->Creer_un_compte_delegue);
        $query->bindParam(":Modifier_un_compte_delegue", $this->Modifier_un_compte_delegue);
        $query->bindParam(":Supprimer_un_compte_delegue", $this->Supprimer_un_compte_delegue);
        $query->bindParam(":Assigner_des_droits_a_un_delegue", $this->Assigner_des_droits_a_un_delegue);

        $query->bindParam(":Rechercher_un_compte_etudiant", $this->Rechercher_un_compte_etudiant);
        $query->bindParam(":Creer_un_compte_etudiant", $this->Creer_un_compte_etudiant);
        $query->bindParam(":Modifier_un_compte_etudiant", $this->Modifier_un_compte_etudiant);
        $query->bindParam(":Supprimer_un_compte_etudiant", $this->Supprimer_un_compte_etudiant);
        $query->bindParam(":Consulter_les_stats_des_etudiants", $this->Consulter_les_stats_des_etudiants);

        $query->bindParam(":Ajouter_une_offre_a_la_wish_list", $this->Ajouter_une_offre_a_la_wish_list);
        $query->bindParam(":Retirer_une_offre_a_la_wish_list", $this->Retirer_une_offre_a_la_wish_list);
        $query->bindParam(":Postuler_a_une_offre", $this->Postuler_a_une_offre);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_1", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_1);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_2", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_2);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_3", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_3);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_4", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_4);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_5", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_5);
        $query->bindParam(":Informer_le_systeme_de_l_avancement_de_la_candidature_step_6", $this->Informer_le_systeme_de_l_avancement_de_la_candidature_step_6);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
