<?php
class Entreprise{
    // Connexion
    private $connexion;
    private $table = "entreprise"; //table de la base de données

    // object properties 
    public $ID_Entreprise;
    public $Nom_entreprise;
    public $Secteur_activite;
    public $Competences_recherchees_dans_les_stages;
    public $Nombre_de_stagiaires_CESI_deja_acceptes_en_stage;
    public $Evaluation_des_stagiaires;
    public $Confiance_du_Pilote_de_promotion;
    public $Localite_entreprise;
    public $Logo_Entreprise;
    public $ID_Utilisateur;
    

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Lecture des entreprises
     *
     * @return void
     */
    public function lire_entreprises(){
        // On écrit la requête 
        $sql = "SELECT * FROM ". $this->table;

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
    public function creer_entreprise(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET nom=:nom, prix=:prix, description=:description, categories_id=:categories_id, created_at=:created_at";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->prix=htmlspecialchars(strip_tags($this->prix));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->categories_id=htmlspecialchars(strip_tags($this->categories_id));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));

        // Ajout des données protégées
        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":prix", $this->prix);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":categories_id", $this->categories_id);
        $query->bindParam(":created_at", $this->created_at);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }
}