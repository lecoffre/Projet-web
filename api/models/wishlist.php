<?php
class Wishlist
{
    // Connexion
    private $connexion;
    private $table = "wishlist"; //table de la base de données
    private $table1 = "offre"; //table de la base de données

    // object properties 
    public $ID_Wishlist;
    public $ID_offre;
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
    public function lire_favoris()
    {
        // On écrit la requête 
        $sql =
            "SELECT offre.ID_offre, offre.Secteur, offre.Titre_offre, offre.Competences_offre, offre.Localite_offre, offre.Entreprise_offre, 
        offre.Type_de_promotion_concernee, offre.Duree_du_stage, offre.Base_de_remuneration, 
        offre.Date_de_offre, offre.Nombre_de_places_disponible, offre.ID_Entreprise, offre.ID_Utilisateur AS ID_Utilisateur_offre,
         wishlist.ID_Wishlist, wishlist.ID_Utilisateur FROM "
            . $this->table1 . " INNER JOIN " . $this->table . " ON " . $this->table1 . ".ID_offre = " . $this->table . ".ID_offre";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Utilisateur);

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
    public function ajouter_wishlist()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . "
         SET ID_offre=:ID_offre ,ID_Utilisateur=:ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->ID_offre = htmlspecialchars(strip_tags($this->ID_offre));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));


        // Ajout des données protégées
        $query->bindParam(":ID_offre", $this->ID_offre);
        $query->bindParam(":ID_Utilisateur", $this->ID_Utilisateur);



        // Exécution de la requête
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
    public function supprimer_wishlist()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_Wishlist = ?";

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

}
