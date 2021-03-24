<?php
class Delegue
{
    // Connexion
    private $connexion;
    private $table = "delegue"; //table de la base de données

    // object properties 
    public $ID_Utilisateur;
    public $Centre_delegue;
    public $Promotion_delegue;
    public $Specialite;
    public $Nom;
    public $Prenom;
    public $Photo_Utilisateur;
    public $ID_Utilisateur__CREE;
    public $ID_Login;



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
    public function lire_delegue()
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
     * Créer un delegue
     *
     * @return void
     */
    public function creer_delegue()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET ID_Utilisateur=:ID_Utilisateur, Centre_delegue=:Centre_delegue, Promotion_delegue=:Promotion_delegue, Specialite=:Specialite, Nom=:Nom, Prenom=:Prenom, Photo_Utilisateur=:Photo_Utilisateur, ID_Utilisateur__CREE=:ID_Utilisateur__CREE, ID_Login=:ID_Login";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Centre_delegue = htmlspecialchars(strip_tags($this->Centre_delegue));
        $this->Promotion_delegue = htmlspecialchars(strip_tags($this->Promotion_delegue));
        $this->Specialite = htmlspecialchars(strip_tags($this->Specialite));
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->ID_Utilisateur__CREE = htmlspecialchars(strip_tags($this->ID_Utilisateur__CREE));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Centre_delegue", $this->Centre_delegue);
        $query->bindParam(":Promotion_delegue", $this->Promotion_delegue);
        $query->bindParam(":Specialite", $this->Specialite);
        $query->bindParam(":Nom", $this->Nom);
        $query->bindParam(":Prenom", $this->Prenom);
        $query->bindParam(":Photo_Utilisateur", $this->Photo_Utilisateur);
        $query->bindParam(":ID_Utilisateur__CREE", $this->ID_Utilisateur__CREE);
        $query->bindParam(":ID_Login", $this->ID_Login);


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
    public function lire_un_delegue()
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
        $this->Centre_delegue = $row['Centre_delegue'];
        $this->Promotion_delegue = $row['Promotion_delegue'];
        $this->Specialite = $row['Specialite'];
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->ID_Utilisateur__CREE = $row['ID_Utilisateur__CREE'];
        $this->ID_Login = $row['ID_Login'];
    }

    /**
     * Supprimer un delegue
     *
     * @return void
     */
    public function supprimer_delegue()
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
    public function modifier_delegue()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Centre_delegue=:Centre_delegue, Promotion_delegue=:Promotion_delegue, Specialite=:Specialite, Nom=:Nom, Prenom=:Prenom, Photo_Utilisateur=:Photo_Utilisateur, ID_Utilisateur__CREE=:ID_Utilisateur__CREE, ID_Login=:ID_Login WHERE ID_Utilisateur=:ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Centre_delegue = htmlspecialchars(strip_tags($this->Centre_delegue));
        $this->promotion_delegue = htmlspecialchars(strip_tags($this->Promotion_delegue));
        $this->Specialite = htmlspecialchars(strip_tags($this->Specialite));
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->ID_Utilisateur__CREE = htmlspecialchars(strip_tags($this->ID_Utilisateur__CREE));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));

        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Centre_delegue", $this->Centre_delegue);
        $query->bindParam(":Promotion_delegue", $this->Promotion_delegue);
        $query->bindParam(":Specialite", $this->Specialite);
        $query->bindParam(":Nom", $this->Nom);
        $query->bindParam(":Prenom", $this->Prenom);
        $query->bindParam(":Photo_Utilisateur", $this->Photo_Utilisateur);
        $query->bindParam(":ID_Utilisateur__CREE", $this->ID_Utilisateur__CREE);
        $query->bindParam(":ID_Login", $this->ID_Login);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}