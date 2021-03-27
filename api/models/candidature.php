<?php
class Candidature
{
    // Connexion
    private $connexion;
    private $table = "candidature"; //table de la base de données
    private $table1 = "utilisateur"; //table de la base de données
    private $table2 = "offre"; //table de la base de données

    // object properties
    public $ID_Candidature;
    public $CV_etudiant;
    public $Lettre_de_motivation_etudiant;
    public $Fiche_de_validation;
    public $Convention_de_stage;
    public $LIEN_OFFRE;
    public $ID_Utilisateur;
    public $ID_offre;
    public $ID_Utilisateur_Pilote;

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
    public function lire_candidature()
    {
        // On écrit la requête 
        $sql = "SELECT * FROM " . $this->table . " INNER JOIN " . $this->table1 . " ON " . $this->table . ".ID_Utilisateur=" . $this->table1 . ".ID_Utilisateur" .
            " INNER JOIN " . $this->table2 . " ON " . $this->table . ".ID_offre=" . $this->table2 . ".ID_offre";



        // On prépare la requête
        $query = $this->connexion->prepare($sql);


        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Créer une entreprise
     *
     * @return void
     */
    public function creer_candidature()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET CV_etudiant= :CV_etudiant, Lettre_de_motivation_etudiant= :Lettre_de_motivation_etudiant,
        Fiche_de_validation= :Fiche_de_validation, Convention_de_stage= :Convention_de_stage, LIEN_OFFRE= :LIEN_OFFRE,
        ID_Utilisateur= :ID_Utilisateur, ID_offre= :ID_offre, ID_Utilisateur_Pilote= :ID_Utilisateur_Pilote";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->CV_etudiant = htmlspecialchars(strip_tags($this->CV_etudiant));
        $this->Lettre_de_motivation_etudiant = htmlspecialchars(strip_tags($this->Lettre_de_motivation_etudiant));
        $this->Fiche_de_validation = htmlspecialchars(strip_tags($this->Fiche_de_validation));
        $this->Convention_de_stage = htmlspecialchars(strip_tags($this->Convention_de_stage));
        $this->LIEN_OFFRE = htmlspecialchars(strip_tags($this->LIEN_OFFRE));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_offre = htmlspecialchars(strip_tags($this->ID_offre));
        $this->ID_Utilisateur_Pilote = htmlspecialchars(strip_tags($this->ID_Utilisateur_Pilote));

        // Ajout des données protégées
        $query->bindParam(":CV_etudiant", $this->CV_etudiant);
        $query->bindParam(":Lettre_de_motivation_etudiant", $this->Lettre_de_motivation_etudiant);
        $query->bindParam(":Fiche_de_validation", $this->Fiche_de_validation);
        $query->bindParam(":Convention_de_stage", $this->Convention_de_stage);
        $query->bindParam(":LIEN_OFFRE", $this->LIEN_OFFRE);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":ID_offre", $this->ID_offre);
        $query->bindParam(":ID_Utilisateur_Pilote", $this->ID_Utilisateur_Pilote);

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
    public function lire_une_candidature()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table . " INNER JOIN " . $this->table1 . " ON " . $this->table . ".ID_Utilisateur=" . $this->table1 . ".ID_Utilisateur" .
            " INNER JOIN " . $this->table2 . " ON " . $this->table . ".ID_offre=" . $this->table2 . ".ID_offre WHERE ID_Candidature = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Candidature);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->CV_etudiant = $row['CV_etudiant'];
        $this->Lettre_de_motivation_etudiant = $row['Lettre_de_motivation_etudiant'];
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Fiche_de_validation = $row['Fiche_de_validation'];
        $this->Convention_de_stage = $row['Convention_de_stage'];
        $this->LIEN_OFFRE = $row['LIEN_OFFRE'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
        $this->ID_offre = $row['ID_offre'];
        $this->ID_Utilisateur_Pilote = $row['ID_Utilisateur_Pilote'];
        $this->Entreprise_offre = $row['Entreprise_offre'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_candidature()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_Candidature = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->ID_Candidature));

        // On attache l'id
        $query->bindParam(1, $this->ID_Candidature);

        // On exécute la requête
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
    public function modifier_candidature()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET CV_etudiant= :CV_etudiant, Lettre_de_motivation_etudiant= :Lettre_de_motivation_etudiant,
        Fiche_de_validation= :Fiche_de_validation, Convention_de_stage= :Convention_de_stage, LIEN_OFFRE= :LIEN_OFFRE,
        ID_Utilisateur= :ID_Utilisateur, ID_offre= :ID_offre, ID_Utilisateur_Pilote= :ID_Utilisateur_Pilote 
        WHERE ID_Candidature= :ID_Candidature";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->CV_etudiant = htmlspecialchars(strip_tags($this->CV_etudiant));
        $this->Lettre_de_motivation_etudiant = htmlspecialchars(strip_tags($this->Lettre_de_motivation_etudiant));
        $this->Fiche_de_validation = htmlspecialchars(strip_tags($this->Fiche_de_validation));
        $this->Convention_de_stage = htmlspecialchars(strip_tags($this->Convention_de_stage));
        $this->LIEN_OFFRE = htmlspecialchars(strip_tags($this->LIEN_OFFRE));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_offre = htmlspecialchars(strip_tags($this->ID_offre));
        $this->ID_Utilisateur_Pilote = htmlspecialchars(strip_tags($this->ID_Utilisateur_Pilote));
        $this->ID_Candidature = htmlspecialchars(strip_tags($this->ID_Candidature));

        // Ajout des données protégées
        $query->bindParam(":CV_etudiant", $this->CV_etudiant);
        $query->bindParam(":Lettre_de_motivation_etudiant", $this->Lettre_de_motivation_etudiant);
        $query->bindParam(":Fiche_de_validation", $this->Fiche_de_validation);
        $query->bindParam(":Convention_de_stage", $this->Convention_de_stage);
        $query->bindParam(":LIEN_OFFRE", $this->LIEN_OFFRE);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":ID_offre", $this->ID_offre);
        $query->bindParam(":ID_Utilisateur_Pilote", $this->ID_Utilisateur_Pilote);
        $query->bindParam(":ID_Candidature", $this->ID_Candidature);

        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
