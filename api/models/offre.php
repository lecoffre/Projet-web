<?php
class Offre
{
    // Connexion
    private $connexion;
    private $table = "offre"; //table de la base de données

    // object properties 
    public $ID_offre;
    public $Competences_offre;
    public $Localite_offre;
    public $Entreprise_offre;
    public $Type_de_promotion_concernee;
    public $Duree_du_stage;
    public $Base_de_remuneration;
    public $Date_de_l’offre;
    public $Nombre_de_places_disponible;
    public $ID_Entreprise;
    public $ID_Utilisateur;


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
     * Lecture des entreprises
     *
     * @return void
     */
    public function lire_offre()
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
    public function creer_offre()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Competences_offre=:Competences_offre, Localite_offre=:Localite_offre, Entreprise_offre=:Entreprise_offre, Type_de_promotion_concernee=:Type_de_promotion_concernee, Duree_du_stage=:Duree_du_stage, Base_de_remuneration=:Base_de_remuneration, Date_de_l’offre=:Date_de_l’offre, Nombre_de_places_disponible=:Nombre_de_places_disponible, ID_Entreprise:=ID_Entreprise, ID_Utilisateur:=ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Competences_offre = htmlspecialchars(strip_tags($this->Competences_offre));
        $this->Localite_offre = htmlspecialchars(strip_tags($this->Localite_offre));
        $this->Entreprise_offre = htmlspecialchars(strip_tags($this->Entreprise_offre));
        $this->Type_de_promotion_concernee = htmlspecialchars(strip_tags($this->Type_de_promotion_concernee));
        $this->Duree_du_stage = htmlspecialchars(strip_tags($this->Duree_du_stage));
        $this->Base_de_remuneration = htmlspecialchars(strip_tags($this->Base_de_remuneration));
        $this->Date_de_l’offre = htmlspecialchars(strip_tags($this->Date_de_l’offre));
        $this->Nombre_de_places_disponible = htmlspecialchars(strip_tags($this->Nombre_de_places_disponible));
        $this->ID_Entreprise = htmlspecialchars(strip_tags($this->ID_Entreprise));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));

        // Ajout des données protégées
        $query->bindParam(":Competences_offre", $this->Competences_offre);
        $query->bindParam(":Localite_offre", $this->Localite_offre);
        $query->bindParam(":Entreprise_offre", $this->Entreprise_offre);
        $query->bindParam(":Type_de_promotion_concernee", $this->Type_de_promotion_concernee);
        $query->bindParam(":Duree_du_stage", $this->Duree_du_stage);
        $query->bindParam(":Base_de_remuneration", $this->Base_de_remuneration);
        $query->bindParam(":Date_de_l’offre", $this->Date_de_l’offre);
        $query->bindParam(":Nombre_de_places_disponible", $this->Nombre_de_places_disponible);
        $query->bindParam(":ID_Entreprise", $this->ID_Entreprise);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);


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
    public function lireUn()
    {
        // On écrit la requête

        $sql = "SELECT * FROM " . $this->table . " WHERE ID_offre = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_offre);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->Competences_offre = $row['Competences_offre'];
        $this->Localite_offre = $row['Localite_offre'];
        $this->Entreprise_offre = $row['Entreprise_offre'];
        $this->Type_de_promotion_concernee = $row['Type_de_promotion_concernee'];
        $this->Duree_du_stage = $row['Duree_du_stage'];
        $this->Base_de_remuneration = $row['Base_de_remuneration'];
        $this->Date_de_l’offre = $row['Date_de_l’offre'];
        $this->Nombre_de_places_disponible = $row['Nombre_de_places_disponible'];
        $this->ID_Entreprise = $row['ID_Entreprise'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_offre()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_offre = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->ID_offre));

        // On attache l'id
        $query->bindParam(1, $this->ID_offre);

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
    public function modifier_offre()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Competences_offre=:Competences_offre, Localite_offre=:Localite_offre, Entreprise_offre=:Entreprise_offre, Type_de_promotion_concernee=:Type_de_promotion_concernee, Duree_du_stage=:Duree_du_stage, Base_de_remuneration=:Base_de_remuneration, Date_de_l’offre=:Date_de_l’offre, Nombre_de_places_disponible=:Nombre_de_places_disponible, ID_Utilisateur=:ID_Utilisateur
         WHERE ID_offre =:ID_offre";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Competences_offre = htmlspecialchars(strip_tags($this->Competences_offre));
        $this->Localite_offre = htmlspecialchars(strip_tags($this->Localite_offre));
        $this->Entreprise_offre = htmlspecialchars(strip_tags($this->Entreprise_offre));
        $this->Type_de_promotion_concernee = htmlspecialchars(strip_tags($this->Type_de_promotion_concernee));
        $this->Duree_du_stage = htmlspecialchars(strip_tags($this->Duree_du_stage));
        $this->Base_de_remuneration = htmlspecialchars(strip_tags($this->Base_de_remuneration));
        $this->Date_de_l’offre = htmlspecialchars(strip_tags($this->Date_de_l’offre));
        $this->Nombre_de_places_disponible = htmlspecialchars(strip_tags($this->Nombre_de_places_disponible));
        $this->ID_Entreprise = htmlspecialchars(strip_tags($this->ID_Entreprise));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_offre = htmlspecialchars(strip_tags($this->ID_offre));

        // Ajout des données protégées
        $query->bindParam(':Competences_offre', $this->Competences_offre);
        $query->bindParam(':Localite_offre', $this->Localite_offre);
        $query->bindParam(':Entreprise_offre', $this->Entreprise_offre);
        $query->bindParam(':Type_de_promotion_concernee', $this->Type_de_promotion_concernee);
        $query->bindParam(':Duree_du_stage', $this->Duree_du_stage);
        $query->bindParam(':Base_de_remuneration', $this->Base_de_remuneration);
        $query->bindParam(':Date_de_l’offre', $this->Date_de_l’offre);
        $query->bindParam(':Nombre_de_places_disponible', $this->Nombre_de_places_disponible);
        $query->bindParam(':ID_Entreprise', $this->ID_Entreprise);
        $query->bindParam(':ID_Utilisateur', $this->ID_Utilisateur);
        $query->bindParam(':ID_offre', $this->ID_offre);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
