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
    public function creer_entreprise()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Nom_entreprise=:Nom_entreprise, Secteur_activite=:Secteur_activite, Competences_recherchees_dans_les_stages=:Competences_recherchees_dans_les_stages, Nombre_de_stagiaires_CESI_deja_acceptes_en_stage=:Nombre_de_stagiaires_CESI_deja_acceptes_en_stage, Evaluation_des_stagiaires=:Evaluation_des_stagiaires, Confiance_du_Pilote_de_promotion=:Confiance_du_Pilote_de_promotion, Localite_entreprise=:Localite_entreprise, Logo_Entreprise=:Logo_Entreprise, ID_Utilisateur=:ID_Utilisateur";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Nom_entreprise = htmlspecialchars(strip_tags($this->Nom_entreprise));
        $this->Secteur_activite = htmlspecialchars(strip_tags($this->Secteur_activite));
        $this->Competences_recherchees_dans_les_stages = htmlspecialchars(strip_tags($this->Competences_recherchees_dans_les_stages));
        $this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = htmlspecialchars(strip_tags($this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage));
        $this->Evaluation_des_stagiaires = htmlspecialchars(strip_tags($this->Evaluation_des_stagiaires));
        $this->Confiance_du_Pilote_de_promotion = htmlspecialchars(strip_tags($this->Confiance_du_Pilote_de_promotion));
        $this->Localite_entreprise = htmlspecialchars(strip_tags($this->Localite_entreprise));
        $this->Logo_Entreprise = htmlspecialchars(strip_tags($this->Logo_Entreprise));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));

        // Ajout des données protégées
        $query->bindParam(":Nom_entreprise", $this->Nom_entreprise);
        $query->bindParam(":Secteur_activite", $this->Secteur_activite);
        $query->bindParam(":Competences_recherchees_dans_les_stages", $this->Competences_recherchees_dans_les_stages);
        $query->bindParam(":Nombre_de_stagiaires_CESI_deja_acceptes_en_stage", $this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage);
        $query->bindParam(":Evaluation_des_stagiaires", $this->Evaluation_des_stagiaires);
        $query->bindParam(":Confiance_du_Pilote_de_promotion", $this->Confiance_du_Pilote_de_promotion);
        $query->bindParam(":Localite_entreprise", $this->Localite_entreprise);
        $query->bindParam(":Logo_Entreprise", $this->Logo_Entreprise);
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

        $sql = "SELECT * FROM " . $this->table . " WHERE ID_Entreprise = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->ID_Entreprise);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->Nom_entreprise = $row['Nom_entreprise'];
        $this->Secteur_activite = $row['Secteur_activite'];
        $this->Competences_recherchees_dans_les_stages = $row['Competences_recherchees_dans_les_stages'];
        $this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = $row['Nombre_de_stagiaires_CESI_deja_acceptes_en_stage'];
        $this->Evaluation_des_stagiaires = $row['Evaluation_des_stagiaires'];
        $this->Confiance_du_Pilote_de_promotion = $row['Confiance_du_Pilote_de_promotion'];
        $this->Localite_entreprise = $row['Localite_entreprise'];
        $this->Logo_Entreprise = $row['Logo_Entreprise'];
        $this->ID_Utilisateur = $row['ID_Utilisateur'];
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer_entreprise()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE ID_Entreprise = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->ID_Entreprise));

        // On attache l'id
        $query->bindParam(1, $this->ID_Entreprise);

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
    public function modifier_entreprise()
    {


        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "UPDATE " . $this->table . " SET Nom_entreprise=:Nom_entreprise, Secteur_activite=:Secteur_activite, Competences_recherchees_dans_les_stages=:Competences_recherchees_dans_les_stages, Nombre_de_stagiaires_CESI_deja_acceptes_en_stage=:Nombre_de_stagiaires_CESI_deja_acceptes_en_stage, Evaluation_des_stagiaires=:Evaluation_des_stagiaires, Confiance_du_Pilote_de_promotion=:Confiance_du_Pilote_de_promotion, Localite_entreprise=:Localite_entreprise, Logo_Entreprise=:Logo_Entreprise, ID_Utilisateur=:ID_Utilisateur
         WHERE ID_Entreprise =:ID_Entreprise";


        // Préparation de la requête
        $query = $this->connexion->prepare($sql);


        // Protection contre les injections
        $this->Nom_entreprise = htmlspecialchars(strip_tags($this->Nom_entreprise));
        $this->Secteur_activite = htmlspecialchars(strip_tags($this->Secteur_activite));
        $this->Competences_recherchees_dans_les_stages = htmlspecialchars(strip_tags($this->Competences_recherchees_dans_les_stages));
        $this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage = htmlspecialchars(strip_tags($this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage));
        $this->Evaluation_des_stagiaires = htmlspecialchars(strip_tags($this->Evaluation_des_stagiaires));
        $this->Confiance_du_Pilote_de_promotion = htmlspecialchars(strip_tags($this->Confiance_du_Pilote_de_promotion));
        $this->Localite_entreprise = htmlspecialchars(strip_tags($this->Localite_entreprise));
        $this->Logo_Entreprise = htmlspecialchars(strip_tags($this->Logo_Entreprise));
        $this->ID_Utilisateur = htmlspecialchars(strip_tags($this->ID_Utilisateur));
        $this->ID_Entreprise = htmlspecialchars(strip_tags($this->ID_Entreprise));

        // Ajout des données protégées
        $query->bindParam(':Nom_entreprise', $this->Nom_entreprise);
        $query->bindParam(':Secteur_activite', $this->Secteur_activite);
        $query->bindParam(':Competences_recherchees_dans_les_stages', $this->Competences_recherchees_dans_les_stages);
        $query->bindParam(':Nombre_de_stagiaires_CESI_deja_acceptes_en_stage', $this->Nombre_de_stagiaires_CESI_deja_acceptes_en_stage);
        $query->bindParam(':Evaluation_des_stagiaires', $this->Evaluation_des_stagiaires);
        $query->bindParam(':Confiance_du_Pilote_de_promotion', $this->Confiance_du_Pilote_de_promotion);
        $query->bindParam(':Localite_entreprise', $this->Localite_entreprise);
        $query->bindParam(':Logo_Entreprise', $this->Logo_Entreprise);
        $query->bindParam(':ID_Utilisateur', $this->ID_Utilisateur);
        $query->bindParam(':ID_Entreprise', $this->ID_Entreprise);


        // Exécution de la requête
        if ($query->execute()) {
            return true;
        }
        return false;
    }
}
