<?php
class Authentification
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données

    // object properties
    public $ID_login;
    public $Login;
    public $Mot_de_passe;

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
    public function lire_authentification()
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
    public function creer_authentification()
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

    /**
     * Voire une entreprise
     *
     * @return void
     */
    public function lireUne_authentification()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table . " WHERE ID_Login = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Login);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->Login = $row['Login'];
        $this->Mot_de_passe = $row['Mot_de_passe'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_authentification()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_Login = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->ID_Login));

        // On attache l'id
        $query->bindParam(1, $this->ID_Login);

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
    public function modifier_authentification()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Login=:Login, Mot_de_passe=:Mot_de_passe WHERE ID_Login= :ID_Login";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Login = htmlspecialchars(strip_tags($this->Login));
        $this->Mot_de_passe = htmlspecialchars(strip_tags($this->Mot_de_passe));
        $this->ID_Login = htmlspecialchars(strip_tags($this->ID_Login));

        // Ajout des données protégées
        $query->bindParam(':Login', $this->Login);
        $query->bindParam(':Mot_de_passe', $this->Mot_de_passe);
        $query->bindParam(':ID_Login', $this->ID_Login);



        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
