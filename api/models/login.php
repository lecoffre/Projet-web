<?php
class Login
{
    // Connexion
    private $connexion;
    private $table = "authentification"; //table de la base de données
    private $table_2 = "utilisateur"; //table de la base de données
    private $table_3 = "administrateur"; //table de la base de données
    private $table_4 = "etudiant"; //table de la base de données
    private $table_5 = "pilote"; //table de la base de données
    private $table_6 = "delegue"; //table de la base de données

    // object properties 
  



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


    public function login() // Methode POST ou l'on fournit login et mot de passe
    {
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . " WHERE Login =:Login AND Mot_de_passe =:Mot_de_passe";
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        // On attache l'id
        $query->bindParam(':Login', $this->Login);
        $query->bindParam(':Mot_de_passe', $this->Mot_de_passe);
        // On exécute la requête
        $query->execute();
        // On hydrate l'objet
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->ID_Login  = $row['ID_Login'];


        $sql = "SELECT * FROM " . $this->table_2 . " WHERE ID_Login =:ID_Login"; //continue ici (recherche utilisateur par ID)
        $query = $this->connexion->prepare($sql);
        $query->bindParam(':ID_Login', $this->ID_Login);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->Nom = $row['Nom'];
        $this->Prenom = $row['Prenom'];
        $this->Photo_Utilisateur = $row['Photo_Utilisateur'];
        $this->Role = $row['Role'];



        
    switch($this->Role){
        case 'administrateur': 
            $sql = "SELECT * FROM " . $this->table_3 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            
            break;
            
        case 'etudiant':
            $sql = "SELECT * FROM " . $this->table_4 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_etudiant = $row['Centre_etudiant'];
            $this->Promotion_etudiant = $row['Promotion_etudiant'];
            $this->Specialite = $row['Specialite'];
            $this->ID_Utilisateur__CREE = $row['ID_Utilisateur__CREE'];
            
            break;

        case 'pilote':
            $sql = "SELECT * FROM " . $this->table_5 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_pilote = $row['Centre_pilote'];
            $this->Promotion_pilote = $row['Promotion_pilote'];
            $this->ID_Utilisateur_Administrateur = $row['ID_Utilisateur_Administrateur'];
        
            break;


        case 'delegue':
            $sql = "SELECT * FROM " . $this->table_6 . " WHERE ID_Login =:ID_Login";
            $query = $this->connexion->prepare($sql);
            $query->bindParam(':ID_Login', $this->ID_Login);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $this->ID_Utilisateur = $row['ID_Utilisateur'];
            $this->Centre_Delegue = $row['Centre_Delegue'];
            $this->Promotion_delegue = $row['Promotion_delegue'];
            $this->Specialite = $row['Specialite'];
            $this->ID_Utilisateur__CREE = $row['ID_Utilisateur__CREE'];
     
            break;
            default:
            $this->Role = 'aucun';
            break;


    }





    }






}