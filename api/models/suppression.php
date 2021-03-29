<?php
class Suppression
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données
    private $table2 = "utilisateur";
    private $table3 = "administrateur";
    private $table4 = "delegue";
    private $table5 = "etudiant";
    private $table6 = "pilote";

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
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_administrateur()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table3 . " WHERE ID_Login = ?";

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
     * Supprimer un delegue
     *
     * @return void
     */
    public function supprimer_delegue()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table4 . " WHERE ID_Login = ?";

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
     * Supprimer un etudiant
     *
     * @return void
     */
    public function supprimer_etudiant()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table5 . " WHERE ID_Login = ?";

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
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_pilote()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table6 . " WHERE ID_Login = ?";

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
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_utilisateur()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table2 . " WHERE ID_Login = ?";

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

}
