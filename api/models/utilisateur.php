<?php
class Utilisateur
{
    // Connexion
    private $connexion;
    private $table = "utilisateur"; //table de la base de données

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
    public function lire_utilisateur()
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
    public function creer_utilisateur()
    {

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Nom= :Nom, Prenom= :Prenom, Photo_Utilisateur= :Photo_Utilisateur, Role= :Role, ID_Login= :ID_Login";

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
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->Role = $row['Role'];
        $this->ID_Login = $row['ID_Login'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_utilisateur()
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
    public function modifier_utilisateur()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Nom= :Nom, Prenom= :Prenom, Photo_Utilisateur= :Photo_Utilisateur, Role= :Role, ID_Login= :ID_Login WHERE ID_Utilisateur= :ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->Nom = htmlspecialchars(strip_tags($this->Nom));
        $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
        $this->Photo_Utilisateur = htmlspecialchars(strip_tags($this->Photo_Utilisateur));
        $this->Role = htmlspecialchars(strip_tags($this->Role));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));

        // Ajout des données protégées
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);
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
}
