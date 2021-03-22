<?php
class Administrateur
{
    // Connexion
    private $connexion;
    private $table = "administrateur"; //table de la base de données

    // object properties
    public $ID_Utilisateur;
    public $Nom;
    public $Prenom;
    public $Photo_Utilisateur;
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
    public function lire_administrateur()
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
     * Créer une entreprise
     *
     * @return void
     */
    public function creer_administrateur()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET ID_Utilisateur=:ID_Utilisateur, Nom=:Nom, Prenom=:Prenom,  Photo_Utilisateur=:Photo_Utilisateur, ID_Login=:ID_Login";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
        $query->bindParam(":Nom", $this->Nom);
        $query->bindParam(":Prenom", $this->Prenom);
        $query->bindParam(":Photo_Utilisateur", $this->Photo_Utilisateur);
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
    public function lire_un_administrateur()
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
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->ID_Login = $row['ID_Login'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_administrateur()
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
     * Créer une entreprise
     *
     * @return void
     */
    public function modifier_administrateur()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET  Nom=:Nom, Prenom=:Prenom,  Photo_Utilisateur=:Photo_Utilisateur, ID_Login=:ID_Login WHERE ID_Utilisateur= :ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));


        // Ajout des données protégées
        $query->bindParam(':ID_Utilisateur', $this->ID_Utilisateur);
        $query->bindParam(':Nom', $this->Nom);
        $query->bindParam(':Prenom', $this->Prenom);
        $query->bindParam(':Photo_Utilisateur', $this->Photo_Utilisateur);
        $query->bindParam(':ID_Login', $this->ID_Login);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
